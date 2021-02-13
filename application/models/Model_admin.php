<?php
class Model_admin extends CI_Model {
	
	function __construct(){
		parent:: __construct();
	}

	function getAll() {
		$data = $this->db->order_by('id_admin','ASC');
		$data = $this->db->get('tb_admin');
		return $data;
	}
	function getByID($id_admin) {
		$data = $this->db->where('id_admin',$id_admin);
		$data = $this->db->get('tb_admin');
		return $data;
	}
	function simpan($id_admin,$username,$password){
		$data=array(
				'id_admin'=>$id_admin,
				'username'=>$username,
				'password'=>$password
			);
		$this->db->insert('tb_admin',$data);
	}
	function ubah($id_admin,$username,$password) {
		$data=array(
				'username'=>$username,
				'password'=>$password
			);

		$this->db->where('id_admin',$id_admin);	
		$this->db->update('tb_admin',$data);
	}

	function hapus($id){
		$data=$this->db->where('id_admin',$id);
		$data=$this->db->delete('tb_admin');
		if($id) {
				return TRUE;
			} else {
				return FALSE;
			}
	}
}	