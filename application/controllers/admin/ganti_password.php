<?php 

class Ganti_password extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('role_id')!='1') {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						<strong>Anda  Belum Login</strong>
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   						 <span aria-hidden="true">&times;</span>
  						</button>
						</div>');
			  	redirect('auth');
		}
	}

	public function index()
	{
		$this->load->view('admin/ganti_password');
	}

	public function aksi()
	{
		$this->_rules();
		if ($this->form_validation->run()==FALSE) {
			$this->index();
		}else{
			$id = $this->session->userdata('id_customer');
			$pass_baru=$this->input->post('pass_baru');

			$data = array('password' => md5($pass_baru) );
			$where = array('id_customer' => $id );
			$this->rental_model->update_data('customer',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>PASSWOR BERHASIL DIUBAH!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('auth');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('pass_baru','PASSWORD BARU' ,'required');
	}

}



 ?>