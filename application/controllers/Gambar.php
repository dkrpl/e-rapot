<?php
class Gambar extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Model_gambar");
		$this->load->model("Model_siswa");
		if (!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$data['data'] = $this->Model_gambar->getAll();
		$data['nis'] = $this->Model_siswa->getAll();
		$data['autoid'] = $this->autoid();
		$this->template->display_admin('admin/view_gambar.php', $data);
	}



	function simpan()
	{
		// konfigurasi library upload
		$config = array(
			'allowed_types' => 'jpg|jpeg|png', 'upload_path' => './assets/foto/', 'max_size' => '1024',
			'file_name' => url_title($this->input->post('foto'))
		);

		// inisialisasi
		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto')) {
			$id = $this->input->post('id', true);
			$nis = $this->input->post('nis', true);
			$foto = $this->upload->file_name;
			$aktif = $this->input->post('aktif', true);

			$simpan = $this->Model_gambar->simpan($id, $nis, $foto, $aktif);
			$this->session->set_flashdata('info', 'Data Berhasil Diupload!');
			redirect('gambar');
		} else {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('danger', $error);
			redirect('gambar');
		}
	}

	function ubah()
	{
		//config untuk upload file			
		$config = array(
			'allowed_types' => 'jpg|jpeg|png', 'upload_path' => './assets/foto/', 'max_size' => '1024',
			'file_name' => url_title($this->input->post('foto'))
		);
		//jika update tanpa gambar
		if (empty($_FILES['gambar']['tmp_name'])) {
			$id = $this->input->post('id', true);
			$nis = $this->input->post('nis', true);
			$aktif = $this->input->post('aktif', true);
			$this->Model_gambar->updateNoImg($id, $nis, $aktif);
			redirect('gambar');
		} else { //upload dengan gambar
			//hapus gambar lama
			$data = $this->Model_gambar->getByID($id);
			$result = $data->row();
			if (!empty($result->foto)) {
				$path = (APPPATH . '../assets/foto/');
				$hapus = unlink($path . $result->foto);
				if ($hapus) {
					//$this->Model_menu->del($id_menu);
					$this->upload->initialize($config);
					if ($this->upload->do_upload('foto')) {
						$id = $this->input->post('id', true);
						$nis = $this->input->post('nis', true);
						$foto = $this->upload->file_name;
						$aktif = $this->input->post('aktif', true);
						$this->Model_gambar->ubah($id, $nis, $foto, $aktif);
						redirect('gambar');
					} else {
						$error = $this->upload->display_errors();
						echo $error;
					}
				}
			}
		}
	}



	function hapus()
	{
		$id = $this->uri->segment(3);
		$data = $this->Model_menu->getByID($id);
		$result = $data->row();
		if (!empty($result->gambar)) {
			$path = (APPPATH . '../assets/foto/');
			$hapus = unlink($path . $result->foto);
			if ($hapus) {
				$this->Model_gambar->hapus($id);
				redirect('gambar');
			}
		} else {
			$id = $this->uri->segment(3);
			$this->Model_gambar->hapus($id);
			redirect('gambar');
		}
	}
	function autoid()
	{
		$max = $this->Model_gambar->maxdata();
		$result = $max->row();
		$lastid = $result->lastid;
		if (empty($lastid)) {
			$id = "00001";
		} else {
			$lastid = $lastid + 1;
			if (strlen($lastid) == '1') {
				$id = "0000" . $lastid;
			} else if (strlen($lastid) == '2') {
				$id = "000" . $lastid;
			} else if (strlen($lastid) == '3') {
				$id = "00" . $lastid;
			} else if (strlen($lastid) == '4') {
				$id = "0" . $lastid;
			} else {
				$id = $lastid;
			}
		}
		return $id;
	}
}
