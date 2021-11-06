<?php 

class Auth extends CI_Controller{

	public function index()
	{
		$data['title']="Halaman Login";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('login');
		$this->load->view('templates_admin/footer');

	}

	public function login_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run()==FALSE) {
			$this->index();
		}else{
			$username=$this->input->post('username');
			$password=$this->input->post('password');

			$cek=$this->rental_model->cek_login($username,$password);
			if ($cek==FALSE) {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>USERNAME/PASSWORD-SALAH!!!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
				redirect('auth');
			}else{
				$this->session->set_userdata('username',$cek->username);
				$this->session->set_userdata('role_id',$cek->role_id);
				$this->session->set_userdata('nama',$cek->nama);
				$this->session->set_userdata('id_customer',$cek->id_customer);

				switch ($cek->role_id) {
					case '1':redirect('admin/dashboard');
						break;
					case '2':redirect('customer/dashboard');
						break;
					default:
						break;
				}
			}
		}

	}


	public function _rules()
	{
		$this->form_validation->set_rules('username','USERNAME','required');
		$this->form_validation->set_rules('password','PASSWORD','required');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}





}




 ?>