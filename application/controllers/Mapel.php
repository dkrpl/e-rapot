<?php
class Mapel extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Model_mapel");
		if (!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$data['data'] = $this->Model_mapel->getAll();
		$this->template->display_admin('admin/view_mapel.php', $data);
	}
	function simpan()
	{
		$id_mapel = $this->input->post('id_mapel', true);
		$nama_mapel = $this->input->post('nama_mapel', true);
		$guru = $this->input->post('guru', true);
		$aktif = $this->input->post('aktif', true);
		$this->Model_mapel->simpan($id_mapel, $nama_mapel, $guru, $aktif);
		//aksi setelah data tersimpan kembali ke index
		$this->session->set_flashdata('SUCCESS', "Data berhasil di simpan");
		redirect('mapel');
	}
	function ubah()
	{
		$id_mapel = $this->input->post('id_mapel', true);
		$nama_mapel = $this->input->post('nama_mapel', true);
		$guru = $this->input->post('guru', true);
		$aktif = $this->input->post('aktif', true);
		$this->Model_mapel->ubah($id_mapel, $nama_mapel, $guru, $aktif);
		//aksi setelah data tersimpan kembali ke index
		$this->session->set_flashdata('SUCCESS', "Data berhasil di simpan");
		redirect('mapel');
	}
	function edit()
	{
		$id_mapel = $this->input->post('id_mapel', true);
		$data = $this->Model_mapel->getByID($id_mapel);
		$result = $data->row();
		if (!(strcmp($result->aktif, "yes"))) {
			$aktif = "selected";
			$tidak = "";
		} else {
			$aktif = "";
			$tidak = "selected";
		}
		echo "
				<form action='" . base_url() . "mapel/ubah' method='POST'>
				<div class='form-group'>
                 	<label for='id_mapel' class='control-label'>kode Kelas:</label>
                   	<input type='text' class='form-control'  name='id_mapel' id='id_mapel' value='" . $result->id_mapel . "' readonly>
                </div>

                <div class='form-group'>
                	<label for='nama_mapel' class='control-label'>Nama Kelas :</label>
                	<input type='text' class='form-control' name='nama_mapel' id='nama_mapel' value='" . $result->nama_mapel . "'>
                </div>
                <div class='form-group'>
                	<label for='guru' class='control-label'>Nama Kelas :</label>
                	<input type='text' class='form-control' name='guru' id='guru' value='" . $result->guru . "'>
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
		$this->Model_mapel->hapus($id);
		$this->session->set_flashdata('DANGER', "Data berhasil di Hapus");
		redirect('mapel');
	}
}
