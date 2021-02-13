<?php
class Rapot extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Model_nilai");
		if (!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		}
	}
	function index()
	{
		$nis = $this->session->userdata('nis');
		$data['data'] = $this->Model_nilai->cari($nis);
		$this->load->view('admin/view_rapot', $data);
	}
	function grafik()
	{
		$nis = $this->session->userdata('nis');
		$data['data'] = $this->Model_nilai->cari($nis);
		$this->load->view('admin/view_grafik', $data);
	}
}
