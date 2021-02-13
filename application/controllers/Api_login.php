<?php 
class Api_login extends CI_controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_admin");
		$this->load->model("Model_login");
	}

	function index() {
			$data['data']=$this->Model_admin->getAll();
			$this->load->view('admin/view_login',$data);

		}
	function cek() {
			 $post= $this->input->post();
			 $username=$this->input->post('username',true);
			 $password=$this->input->post('password',true);
			 // $akses=$this->input->post('akses',true);
				// echo "ini siswa";
			$cek_siswa=$this->Model_login->cek_siswa($username,md5($password));
				if ($cek_siswa) {
					// echo "Selamat Datang SIswa";
					// $data=array('nis'=>$username,'logged_in'=>true);
					// $this->session->set_userdata($data);

					// redirect('rapot');
					$response =[
						'logged_in'=>TRUE
					];
					echo json_encode($response);
					# code...
				}else{
					// // echo "Data Siswa Tidak Ada";
					// $this->session->set_flashdata('DANGER',"Data Siswa Tidak Ada");
					// redirect('login','refresh');
					$response= [
						'logged_in'=>FALSE
					];
					echo json_encode($response);
				}
			}

	function logout() {
		//hapus session
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$this->session->set_flashdata('DANGER',"Berhasil logout");
		redirect('login','refresh');

	}
}
?>