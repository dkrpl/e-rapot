<?php
class Nilai extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Model_nilai");
		$this->load->model("Model_mapel");
		$this->load->model("Model_siswa");
		if (!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$data['data'] = $this->Model_nilai->getAll();
		$data['nis'] = $this->Model_siswa->getAll();
		$data['mapel'] = $this->Model_mapel->getAll();
		$this->template->display_admin('admin/view_nilai.php', $data);
	}
	// function search(){
	// 		$keyword = $this->input->post('keyword',true);
	// 		$data['keyword']=$this->Model_nilai->get_keyword($keyword);
	// 		$data['data']=$this->Model_nilai->getAll();
	// 		$data['nis']=$this->Model_siswa->getAll();
	// 		$data['mapel']=$this->Model_mapel->getAll();
	// 		$this->template->display_admin('admin/view_nilai.php',$data);
	// 	}	
	function simpan()
	{
		$id_nilai = $this->input->post('id_nilai', true);
		$nis = $this->input->post('nis', true);
		$mapel = $this->input->post('mapel', true);
		$nilai = $this->input->post('nilai', true);
		$tanggal = $this->input->post('tanggal', true);
		$this->Model_nilai->simpan($id_nilai, $nis, $mapel, $nilai, $tanggal);
		//aksi setelah data tersimpan kembali ke index
		$this->session->set_flashdata('SUCCESS', "Data berhasil di simpan");
		redirect('nilai');
	}
	function ubah()
	{
		$id_nilai = $this->input->post('id_nilai', true);
		$nis = $this->input->post('nis', true);
		$mapel = $this->input->post('mapel', true);
		$nilai = $this->input->post('nilai', true);
		$tanggal = $this->input->post('tanggal', true);
		$this->Model_nilai->ubah($id_nilai, $nis, $mapel, $nilai, $tanggal);
		//aksi setelah data tersimpan kembali ke index
		redirect('nilai');
	}
	function edit()
	{
		$id_nilai = $this->input->post('id_nilai', true);
		$data = $this->Model_nilai->getByID($id_nilai);
		$mapel = $this->Model_mapel->getAll();
		$nis = $this->Model_siswa->getAll();
		$result = $data->row();
		// // if (!(strcmp($result->kelas))) {
		// //       $kelas="selected";
		// //       $lainnya="";} 
		// //     else {  $kelas="";
		// //       $lainnya="selected";}
		// if (!(strcmp($result->gender,"L"))) {
		//       $laki="selected";
		//       $perempuan="";} 
		//     else {   $laki="";
		//       $perempuan="selected";}
		echo "
				<form action='" . base_url() . "nilai/ubah' method='POST'>
				<div class='form-group'>
                   	<input type='hidden' class='form-control'  name='id_nilai' id='id_nilai' value='" . $result->id_nilai . "' readonly>
                </div>

                <div class='form-group'>
                	<label for='kelas' class='control-label'>Nama Siswa:</label>
                 	<select name='nis' class='form-control custom-select'>";
		foreach ($nis->result_array() as $row) {
			if (!(strcmp($result->nis, $row['nis']))) {
				$selected = "selected";
			} else {
				$selected = "";
			}
			echo "<option value='" . $row['nis'] . "' " . $selected . ">" . $row['nama'] . "</option>";
		}
		echo "
                    </select>
                </div>
                <div class='form-group'>
                	<label for='kelas' class='control-label'>Mapel:</label>
                 	<select name='mapel' class='form-control custom-select'>";
		foreach ($mapel->result_array() as $row) {
			if (!(strcmp($result->mapel, $row['id_mapel']))) {
				$selected = "selected";
			} else {
				$selected = "";
			}
			echo "<option value='" . $row['id_mapel'] . "' " . $selected . ">" . $row['nama_mapel'] . "</option>";
		}
		echo "
                    </select>
                </div>
                <div class='form-group'>
                	<label for='nilai' class='control-label'>Nilai :</label>
                	<input type='text' class='form-control' name='nilai' id='nilai' value='" . $result->nilai . "'>
                </div>

                <div class='modal-footer'>
                <button type='reset' class='btn btn-default' data-dismiss='modal'>Batal</button>
                <button type='submit' class='btn btn-primary' name='submit' value='Simpan'>Simpan</button>

				</form>";
	}
	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->Model_nilai->hapus($id);
		$this->session->set_flashdata('DANGER', "Data berhasil di Hapus");
		redirect('nilai');
	}
}
