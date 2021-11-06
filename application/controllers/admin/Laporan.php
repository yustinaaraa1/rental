<?php 


class Laporan extends CI_Controller{
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
		$data['title']="Filter Laporan";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporan',$data);
		$this->load->view('templates_admin/footer');
	}


	public function laporan_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run()==FALSE) {
			$this->index();
		}else{
			$dari =$this->input->post('dari');
			$sampai=$this->input->post('sampai');
			$data['laporan']=$this->db->query("SELECT * FROM transaksi tr,mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND date(tanggal_rental)>='$dari' AND date(tanggal_rental)<='$sampai'")->result();
			$data['title']="Filter Laporan";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/filter_laporan',$data);
		$this->load->view('templates_admin/footer');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('dari','DARI TANGGAL','required');
		$this->form_validation->set_rules('sampai','SAMPAI TANGGAL','required');
	}

	public function print()
	{
		$dari =$this->input->get('dari');
			$sampai=$this->input->get('sampai');
			$data['laporan']=$this->db->query("SELECT * FROM transaksi tr,mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND date(tanggal_rental)>='$dari' AND date(tanggal_rental)<='$sampai'")->result();
			$data['title']="Filter Laporan";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/print',$data);

	}


}



 ?>