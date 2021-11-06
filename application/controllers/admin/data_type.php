<?php 

class Data_type extends CI_Controller{
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
		$data['title']="Data Type";
		$data['type']=$this->rental_model->get_data('type')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_type',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_type()
	{
		$data['title']="Form Tambah Type";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_type');
		$this->load->view('templates_admin/footer');
	}

	public function tambah_type_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run()==FALSE) {
			$this->tambah_type();

		}else{
			$kode_type		=$this->input->post('kode_type');
			$nama_type		=$this->input->post('nama_type');

			$data = array(
				'kode_type' => $kode_type,
				'nama_type' => $nama_type
			 );
			$this->rental_model->insert_data('type',$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Type Berhasil diTambahkan!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('admin/data_type');
		}
	}

	public function update_type($id)
	{
		$data['title']="Form Update Type";
		$data['type']=$this->db->query("SELECT * FROM type WHERE id_type='$id'")->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/update_type',$data);
		$this->load->view('templates_admin/footer');
	}

	public function update_type_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run()==FALSE) {
			$this->update_type();

		}else{
			$id 			=$this->input->post('id_type');
			$kode_type		=$this->input->post('kode_type');
			$nama_type		=$this->input->post('nama_type');

			$data = array(
				'kode_type' => $kode_type,
				'nama_type' => $nama_type
			 );
			$where = array('id_type' => $id, );
			$this->rental_model->update_data('type',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Type Berhasil diUpdate!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('admin/data_type');
		}
	}


	public function _rules()
	{
		$this->form_validation->set_rules('kode_type','Kode Type','required');
		$this->form_validation->set_rules('nama_type','Nama Type','required');
	}

	public function delete_type($id)
	{
		$where = array('id_type' => $id );
		$this->rental_model->delete_data('type',$where);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data Type Berhasil diHapus!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
		redirect('admin/data_type');
	}


	public function barcode()
	{
		
		$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
		echo $generator->getBarcode('0812317', $generator::TYPE_CODE_128);
//$redColor = [255, 0, 0];

//$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
//file_put_contents('barcode.png', $generator->getBarcode('081231723897', $generator::TYPE_CODE_128, 3, 50, $redColor));
	}

	public function coba()
	{
		$qrcode= new Endroid\QrCode\QrCode('Life is too short to be generating QR code');
		header('Content-Type :'.$qrcode->getContentType());
		echo $qrcode->writeString();
	}



}




 ?>