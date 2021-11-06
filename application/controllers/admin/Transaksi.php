<?php 


class Transaksi extends CI_Controller{
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
		$data['transaksi']=$this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer")->result();
		$data['title']="Halaman Transaksi";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi',$data);
		$this->load->view('templates_admin/footer');
	}

	public function batal_transaksi($id)
	{
		$where = array('id_rental' => $id );
		$data=$this->rental_model->get_where('transaksi',$where)->row();

		$where1 = array('id_mobil' => $data->id_mobil );
		$data1 = array('status' => '1' );
		$this->rental_model->update_data('mobil',$data1,$where1);
		$this->rental_model->delete_data('transaksi',$where);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Transaksi Berhasil DIBatalkan</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
		redirect('admin/transaksi');
	}

	public function cek_pembayaran($id)
	{
		$data['transaksi']=$this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
		$data['title']="Halaman Transaksi";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/cek_pembayaran',$data);
		$this->load->view('templates_admin/footer');
	}


	public function cek_pembayaran_aksi()
	{
		$id=$this->input->post('id_rental');
		$status_pembayaran=$this->input->post('status_pembayaran');

		$data = array('status_pembayaran' => $status_pembayaran );

		$where = array('id_rental' => $id );
		$this->rental_model->update_data('transaksi',$data,$where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Status Pembayaran Berhasil DiUpdate</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
		redirect('admin/transaksi');
	}


	public function download_pembayaran($id)
	{
		$this->load->helper('download');
		$file_pembayaran=$this->rental_model->downloadpembayaran($id);
		$file = 'assets/upload/'.$file_pembayaran['bukti_pembayaran'];
		force_download($file,NULL);
	}


	public function transaksi_selesai($id)
	{
		$data['transaksi']=$this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
		$data['title']="Transaksi Selesai";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi_selesai',$data);
		$this->load->view('templates_admin/footer');
	}


	public function transaksi_selesai_aksi()
 
	{
		$denda 					=$this->input->post('denda');
		$tanggal_kembali  		=$this->input->post('tanggal_kembali');
		$id_mobil 				=$this->input->post('id_mobil');
		$id 					=$this->input->post('id_rental');
		$tanggal_pengembalian	=$this->input->post('tanggal_pengembalian');
		$status_pengembalian	=$this->input->post('status_pengembalian');
		$status_rental 			=$this->input->post('status_rental');
		$status 				=$this->input->post('status');

		$x = strtotime($tanggal_kembali);
		$y =strtotime($tanggal_pengembalian);
		$total=abs($y-$x)/(60*60*24);

		$totaldenda=$total*$denda;


		$data = array(
			'tanggal_pengembalian' => $tanggal_pengembalian,
			'status_pengembalian' => $status_pengembalian,
			'status_rental' => $status_rental,
			'total_denda'	=> $totaldenda
		 );
		$where = array('id_rental' => $id );
		$where1 = array('id_mobil' => $id_mobil );
		$data1 = array('status' => $status );

		$this->rental_model->update_data('transaksi',$data,$where);
		$this->rental_model->update_data('mobil',$data1,$where1);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Rental Selesai Berhasil DiUpdate</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
		redirect('admin/transaksi');


	}



}




 ?>