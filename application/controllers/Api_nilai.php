<?php 
class Api_nilai extends CI_controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_nilai");
		// agar jadi data JSON
		header("Access-Control-Allow-Origin: *");
		header("Content-type:application/json");
		}
	function lihat_nilai(){
		// ambil data semua nilai dari fbsql_database
		$data=$this->Model_nilai->getAll()->result();
		echo json_encode($data);
	}
	function cari(){
		$nis=$_GET['nis'];
	$data=$this->Model_nilai->cari($nis)->result();
		echo json_encode($data);	
	}
}
?>