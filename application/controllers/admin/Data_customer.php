<?php 	

class Data_customer extends CI_Controller{
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
		$data['title']="Halaman Customer";
		$data['customer']=$this->rental_model->get_data('customer')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/customer',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_customer()
	{
		$data['title']="Form Tambah Customer";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_customer');
		$this->load->view('templates_admin/footer');
	}

	public function tambah_customer_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run()==FALSE) {
			$this->tambah_customer();
		}else{
			$nama 			=$this->input->post('nama');
			$username 		=$this->input->post('username');
			$password 		=$this->input->post('password');
			$alamat 		=$this->input->post('alamat');
			$no_telepon 	=$this->input->post('no_telepon');
			$no_ktp 		=$this->input->post('no_ktp');
			$gender 		=$this->input->post('gender');
			$role_id 		=$this->input->post('role_id');




			$data = array(
				'nama' 			=> $nama,
				'username' 		=> $username,
				'password' 		=> md5($password),
				'alamat' 		=> $alamat,
				'no_telepon' 	=> $no_telepon,
				'no_ktp' 		=> $no_ktp,
				'gender' 		=> $gender,
				'role_id' 		=> $role_id
			 );
			$this->rental_model->insert_data('customer',$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Customer Berhasil DiTambahkan!!!</strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('admin/Data_customer');
		}
	}


	public function update_customer($id)
	{
		$data['customer']=$this->db->query("SELECT * FROM customer WHERE id_customer='$id'")->result();
		$data['title']="Form Update Customer";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/update_customer',$data);
		$this->load->view('templates_admin/footer');
	}

	public function update_customer_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run()==FALSE) {
			$this->update_customer();
		}else{
			$id 			=$this->input->post('id_customer');
			$nama 			=$this->input->post('nama');
			$username 		=$this->input->post('username');
			$password 		=$this->input->post('password');
			$alamat 		=$this->input->post('alamat');
			$no_telepon 	=$this->input->post('no_telepon');
			$no_ktp 		=$this->input->post('no_ktp');
			$gender 		=$this->input->post('gender');
			$role_id 		=$this->input->post('role_id');




			$data = array(
				'nama' 			=> $nama,
				'username' 		=> $username,
				'password' 		=> ($password),
				'alamat' 		=> $alamat,
				'no_telepon' 	=> $no_telepon,
				'no_ktp' 		=> $no_ktp,
				'gender' 		=> $gender,
				'role_id' 		=> $role_id
			 );
			$where = array('id_customer' => $id, );
			$this->rental_model->update_data('customer',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Customer Berhasil DiUpdate!!!</strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('admin/Data_customer');
		}
	}


	public function _rules()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('no_telepon','No.Telp','required');
		$this->form_validation->set_rules('no_ktp','No.Ktp','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('role_id','Daftar Sebagai','required');

	}

	public function delete_customer($id)
	{
		$where = array('id_customer' => $id );
		$this->rental_model->delete_data('customer',$where);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data Customer Berhasil DiHapus!!!</strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('admin/Data_customer');
	}


	public function detail_customer($id)
	{
		$where = array('id_customer' => $id );
		$data['title']="Form Update Customer";
		$data['customer']=$this->rental_model->detail_data('customer',$where)->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_customer',$data);
		$this->load->view('templates_admin/footer');
	}



}



 ?>