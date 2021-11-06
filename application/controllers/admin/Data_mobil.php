<?php 

class Data_mobil extends CI_Controller{
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
		$data['title']="Data Mobil";
		$data['mobil']=$this->rental_model->get_data('mobil')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_mobil',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_mobil()
	{
		$data['title']="Form Tambah Mobil";
		$data['type']=$this->rental_model->get_data('type')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_mobil',$data);
		$this->load->view('templates_admin/footer');

	}

	public function tambah_mobil_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run()==FALSE) {
			$this->tambah_mobil();
		}else{
			$kode_type 		=$this->input->post('kode_type');
			$merk 			=$this->input->post('merk');
			$no_plat  		=$this->input->post('no_plat');
			$warna 			=$this->input->post('warna');
			$tahun 			=$this->input->post('tahun');
			$status 		=$this->input->post('status');
			$harga 			=$this->input->post('harga');
			$denda 			=$this->input->post('denda');

			$gambar =$_FILES['gambar']['name'];
			if ($gambar='') {}else{
				$config['upload_path']='./assets/upload';
				$config['allowed_types']='jpg|jpeg|png|tiff';
				$this->load->library('upload',$config);
				if (!$this->upload->do_upload('gambar')) {
					echo "gambar tidak dapa diupload";

				}else{
					$gambar=$this->upload->data('file_name');
				}

			}

			$data = array(
				'kode_type' => $kode_type,
				'merk' 		=> $merk,
				'no_plat' 	=> $no_plat,
				'warna'	 	=> $warna,
				'tahun' 	=> $tahun,
				'status' 	=> $status,
				'harga' 	=> $harga,
				'denda' 	=> $denda,
				'gambar' 	=> $gambar, );

			$this->rental_model->insert_data('mobil',$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Mobil Berhasil DiTambahkan!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('admin/data_mobil');
		}
	}

	public function update_mobil($id)
	{
		$data['title']="Form Update Mobil";
		$data['mobil']=$this->db->query("SELECT * FROM mobil WHERE id_mobil='$id'")->result();
		$data['type']=$this->rental_model->get_data('type')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/update_mobil',$data);
		$this->load->view('templates_admin/footer');

	}

	public function update_mobil_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run()==FALSE) {
			$this->update_mobil();
		}else{
			$id 			=$this->input->post('id_mobil');
			$kode_type 		=$this->input->post('kode_type');
			$merk 			=$this->input->post('merk');
			$no_plat  		=$this->input->post('no_plat');
			$warna 			=$this->input->post('warna');
			$tahun 			=$this->input->post('tahun');
			$status 		=$this->input->post('status');
			$harga 			=$this->input->post('harga');
			$denda 			=$this->input->post('denda');

			$gambar =$_FILES['gambar']['name'];
			if ($gambar){
				$config['upload_path']='./assets/upload';
				$config['allowed_types']='jpg|jpeg|png|tiff';
				$this->load->library('upload',$config);
				if ($this->upload->do_upload('gambar')) {
					$gambar=$this->upload->data('file_name');
					$this->db->set('gambar',$gambar);

				}else{
					echo "gambar gagal diupload";
					
				}

			}

			$data = array(
				'kode_type' => $kode_type,
				'merk' 		=> $merk,
				'no_plat' 	=> $no_plat,
				'warna'	 	=> $warna,
				'tahun' 	=> $tahun,
				'status' 	=> $status,
				'harga' 	=> $harga,
				'denda' 	=> $denda );
			$where = array('id_mobil' => $id );

			$this->rental_model->update_data('mobil',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Mobil Berhasil DiTambahkan!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('admin/data_mobil');
		}
	}


	public function _rules()
	{
		$this->form_validation->set_rules('kode_type','Type','required');
		$this->form_validation->set_rules('merk','Merk','required');
		$this->form_validation->set_rules('no_plat','No Plat','required');
		$this->form_validation->set_rules('warna','Warna','required');
		$this->form_validation->set_rules('tahun','Tahu','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('denda','Denda','required');
	}

	public function detail_mobil($id)
	{
		$where = array('id_mobil' => $id );
		$data['title']="Detail Mobil";
		$data['mobil']=$this->rental_model->detail_data('mobil',$where)->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_mobil',$data);
		$this->load->view('templates_admin/footer');
	}

	public function delete_mobil($id)
	{
		$where = array('id_mobil' => $id );
		$this->rental_model->delete_data('mobil',$where);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data Mobil Berhasil DiHapus!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
		redirect('admin/data_mobil');
	}


}




 ?>