<?php
class Model_login extends CI_Model {
	
	function __construct(){
		parent:: __construct();
	}

	function cek_admin($username,$password) {
		$data=$this->db->where('username',$username);
		$data=$this->db->where('password',$password);
		$data=$this->db->get('tb_admin');

		if($data->num_rows() > 0) { //jika data ada
			return TRUE;
		} else {
			return FALSE; //jika data ndak ada
		}
	}

	function cek_siswa($nis,$pass) {
		$data=$this->db->where('nis',$nis);
		$data=$this->db->where('password',$pass);
		$data=$this->db->get('tb_siswa');

		if($data->num_rows() > 0) { //jika data ada
			return TRUE;
		} else {
			return FALSE; //jika data ndak ada
		}
	}

	// function updateIsLogin($id_user,$is_login) {
	// 	$data=array(
	// 		'is_login' => $is_login
	// 	);
	// 	$this->db->where('id_user',$id_user);
	// 	$this->db->update('tb_user',$data);
	// }

	//mencari id user dari email dan password

	// function GetIdUser($user,$pass) {
	// 	$data=$this->db->where('username',$user);
	// 	$data=$this->db->where('password',$pass);
	// 	$data=$this->db->get('tb_admin');
	// 	return $data;
	// }

}