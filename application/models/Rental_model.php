<?php 

class Rental_model extends CI_Model{
	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	public function insert_data($table,$data)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($table,$data,$where)
	{
		$this->db->update($table,$data,$where);
	}

	public function detail_data($table,$where)
	{
		return $this->db->where($where)->get($table);
	}

	public function delete_data($table,$where)
	{
		$this->db->where($where)->delete($table);
	}

	public function cek_login()
	{
	$username=set_value('username');
	$password=set_value('password');

	$cek=$this->db->where('username',$username)->where('password',md5($password))->limit(1)->get('customer');

	if ($cek->num_rows()>0) {
		return $cek->row();
	}else{
		return false;
	}
}

public function downloadpembayaran($id)
{
	$query =$this->db->get_where('transaksi', array('id_rental' => $id ));
	return $query->row_array();
}



	


}



 ?>