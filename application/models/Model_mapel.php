<?php
class Model_mapel extends CI_Model {
	
	function __construct(){
		parent:: __construct();
	}

	function getAll() {
		$data = $this->db->order_by('id_mapel','ASC');
		$data = $this->db->get('tb_mapel');
		return $data;
	}
	function getByID($id_mapel) {
		$data = $this->db->where('id_mapel',$id_mapel);
		$data = $this->db->get('tb_mapel');
		return $data;
	}
	function simpan($id_mapel,$nama_mapel,$guru,$aktif){
		$data=array(
				'id_mapel'=>$id_mapel,
				'nama_mapel'=>$nama_mapel,
				'guru'=>$guru,
				'aktif'=>$aktif
			);
		$this->db->insert('tb_mapel',$data);
	}
	function ubah($id_mapel,$nama_mapel,$guru,$aktif) {
		$data=array(
				'nama_mapel'=>$nama_mapel,
				'guru'=>$guru,
				'aktif'=>$aktif
			);

		$this->db->where('id_mapel',$id_mapel);	
		$this->db->update('tb_mapel',$data);
	}

	function hapus($id){
		$data=$this->db->where('id_mapel',$id);
		$data=$this->db->delete('tb_mapel');
		if($id) {
				return TRUE;
			} else {
				return FALSE;
			}
	}
}