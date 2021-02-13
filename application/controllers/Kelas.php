<?php
class Kelas extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Model_kelas");
		if (!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$data['data'] = $this->Model_kelas->getAll();
		$this->template->display_admin('admin/view_kelas.php', $data);
	}
	function simpan()
	{
		$kode_kelas = $this->input->post('kode_kelas', true);
		$nama_kelas = $this->input->post('nama_kelas', true);
		$aktif = $this->input->post('aktif', true);
		$this->Model_kelas->simpan($kode_kelas, $nama_kelas, $aktif);
		//aksi setelah data tersimpan kembali ke index
		$this->session->set_flashdata('SUCCESS', "Data berhasil di simpan");
		redirect('kelas');
	}
	function ubah()
	{
		$kode_kelas = $this->input->post('kode_kelas', true);
		$nama_kelas = $this->input->post('nama_kelas', true);
		$aktif = $this->input->post('aktif', true);
		$this->Model_kelas->ubah($kode_kelas, $nama_kelas, $aktif);
		//aksi setelah data tersimpan kembali ke index
		$this->session->set_flashdata('PRIMARY', "Data berhasil di Ubah");
		redirect('kelas');
	}
	function edit()
	{
		$kode_kelas = $this->input->post('kode_kelas', true);
		$data = $this->Model_kelas->getByID($kode_kelas);
		$result = $data->row();
		if (!(strcmp($result->aktif, "yes"))) {
			$aktif = "selected";
			$tidak = "";
		} else {
			$aktif = "";
			$tidak = "selected";
		}
		echo "
				<form action='" . base_url() . "kelas/ubah' method='POST'>
				<div class='form-group'>
                 	<label for='kode_kelas' class='control-label'>kode Kelas:</label>
                   	<input type='text' class='form-control'  name='kode_kelas' id='kode_kelas' value='" . $result->kode_kelas . "' readonly>
                </div>

                <div class='form-group'>
                	<label for='nama_kelas' class='control-label'>Nama Kelas :</label>
                	<input type='text' class='form-control' name='nama_kelas' id='nama_kelas' value='" . $result->nama_kelas . "'>
                </div>
                <div class='form-group'>
                	<label for='aktif' class='control-label'>Aktif:</label>
                 	<select name='aktif' class='form-control custom-select'>
                 	<option value='yes' " . $aktif . ">Ya</option>
                   	<option value='no' " . $tidak . ">Tidak</option>
                    </select>
                </div>

                <div class='modal-footer'>
                <button type='reset' class='btn btn-default' data-dismiss='modal'>Batal</button>
                <button type='submit' class='btn btn-primary' name='submit' value='Simpan'>Simpan</button>

				</form>";
	}
	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->Model_kelas->hapus($id);
		$this->session->set_flashdata('DANGER', "Data berhasil di Hapus");
		redirect('kelas');
	}
}
