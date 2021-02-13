<?php
class Model_kelas extends CI_Model {
	
	function __construct(){
		parent:: __construct();
	}

	function getAll() {
		$data = $this->db->order_by('kode_kelas','ASC');
		$data = $this->db->get('tb_kelas');
		return $data;
	}
	function getByID($kode_kelas) {
		$data = $this->db->where('kode_kelas',$kode_kelas);
		$data = $this->db->get('tb_kelas');
		return $data;
	}
	function simpan($kode_kelas,$nama_kelas,$aktif){
		$data=array(
				'kode_kelas'=>$kode_kelas,
				'nama_kelas'=>$nama_kelas,
				'aktif'=>$aktif
			);
		$this->db->insert('tb_kelas',$data);
	}
	function ubah($kode_kelas,$nama_kelas,$aktif) {
		$data=array(
				'nama_kelas'=>$nama_kelas,
				'aktif'=>$aktif
			);

		$this->db->where('kode_kelas',$kode_kelas);	
		$this->db->update('tb_kelas',$data);
	}

	function hapus($id){
		$data=$this->db->where('kode_kelas',$id);
		$data=$this->db->delete('tb_kelas');
		if($id) {
				return TRUE;
			} else {
				return FALSE;
			}
	}
}