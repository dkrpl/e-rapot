<?php
class Admin extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Model_admin");
		if (!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$data['data'] = $this->Model_admin->getAll();
		$this->template->display_admin('admin/view_admin.php', $data);
	}
	function simpan()
	{
		$id_admin = $this->input->post('id_admin', true);
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		$this->Model_admin->simpan($id_admin, $username, md5($password));
		//aksi setelah data tersimpan kembali ke index
		$this->session->set_flashdata('SUCCESS', "Data berhasil di simpan");
		redirect('admin');
	}
	function ubah()
	{
		$id_admin = $this->input->post('id_admin', true);
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		$this->Model_admin->ubah($id_admin, $username, md5($password));
		//aksi setelah data tersimpan kembali ke index
		$this->session->set_flashdata('PRIMARY', "Data berhasil di Ubah");
		redirect('admin');
	}
	function edit()
	{
		$id_admin = $this->input->post('id_admin', true);
		$data = $this->Model_admin->getByID($id_admin);
		$result = $data->row();
		// if (!(strcmp($result->aktif,"yes"))) {
		//       $aktif="selected";
		//       $tidak="";} 
		//     else {  $aktif="";
		//       $tidak="selected";}
		echo "
				<form action='" . base_url() . "admin/ubah' method='POST'>
				<div class='form-group'>
                 	<label for='id_admin' class='control-label'>ID Admin:</label>
                   	<input type='text' class='form-control'  name='id_admin' id='id_admin' value='" . $result->id_admin . "' readonly>
                </div>

                <div class='form-group'>
                	<label for='username' class='control-label'>Username :</label>
                	<input type='text' class='form-control' name='username' id='username' value='" . $result->username . "'>
                </div>
                <div class='form-group'>
                	<label for='username' class='control-label'>Password :</label>
                	<input type='password' class='form-control' name='password' id='password' value='" . $result->password . "'>
                </div>
                

                <div class='modal-footer'>
                <button type='reset' class='btn btn-default' data-dismiss='modal'>Batal</button>
                <button type='submit' class='btn btn-primary' name='submit' value='Simpan'>Simpan</button>

				</form>";
	}
	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->Model_admin->hapus($id);
		$this->session->set_flashdata('DANGER', "Data berhasil di Hapus");
		redirect('admin');
	}
}
