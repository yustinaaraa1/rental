<?php 	

class Rental_model extends CI_Model{

public function detail_customer($id)
{
	$hasil=$this->db->where('id_customer',$id)->get('customer');
	if ($hasil->num_rows()>0) {
		return $hasil;
	}else{
		return false;
	}
}

public function get_data($table)
{
	return $this->db->get($table);
}

public function insert_data($table,$data)
{
	$this->db->insert($table,$data);
}

public function detail_data($table,$where)
{
	return $this->db->where($where)->get($table);
}

public function delete_data($table,$where)
{
	$this->db->where($where)->delete($table);
}

public function update_data($table,$data,$where)
{
	$this->db->update($table,$data,$where);
}

public function cek_login($username,$password)
{
	$username=set_value('username');
	$password=set_value('password');

	$result =$this->db->where('username',$username)->where('password',md5($password))->limit(1)->get('customer');
	if ($result->num_rows()>0) {
		return $result->row();

	}else{
		return false;
	}
}












}




 ?>