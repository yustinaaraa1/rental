<?php 

class Auth1 extends CI_Controller{
	
	public function index(){
	$this->_rules();
	if ($this->form_validation->run()==FALSE) {
	$data['title']="Halaman Login";
	$this->load->view('templates_admin/header',$data);
	$this->load->view('form_login1');
	$this->load->view('templates_admin/footer');
	}else{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));

		$cek=$this->rental_model->cek_login($username,$password);

		if ($cek==FALSE) {
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>USERNAME/PASSWORD SALAH!!!	</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('auth');
		}else{
			$this->session->set_userdata('username',$cek->username);
			$this->session->set_userdata('role_id',$cek->role_id);
			$this->session->set_userdata('nama',$cek->nama);

			switch ($cek->role_id) {
				case '1':redirect('admin/dashboad');
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
	$this->form_validation->set_rules('username','Username','required');
	$this->form_validation->set_rules('password','password','required');
}


}



 ?>