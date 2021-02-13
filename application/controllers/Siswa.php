<?php
class siswa extends CI_controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Model_siswa");
        $this->load->model("Model_kelas");
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
    }

    function index()
    {
        $data['data'] = $this->Model_siswa->getAll();
        $data['kelas'] = $this->Model_kelas->getAll();
        $this->template->display_admin('admin/view_siswa.php', $data);
    }
    function simpan()
    {
        $nis = $this->input->post('nis', true);
        $nama = $this->input->post('nama', true);
        $password = $this->input->post('password', true);
        $alamat = $this->input->post('alamat', true);
        $kota_kab = $this->input->post('kota_kab', true);
        $gender = $this->input->post('gender', true);
        $kelas = $this->input->post('kelas', true);
        $this->Model_siswa->simpan($nis, $nama, md5($password), $alamat, $kota_kab, $gender, $kelas);
        //aksi setelah data tersimpan kembali ke index
        $this->session->set_flashdata('SUCCESS', "Data berhasil di simpan");
        redirect('siswa');
    }
    function ubah()
    {
        $nis = $this->input->post('nis', true);
        $nama = $this->input->post('nama', true);
        $password = $this->input->post('password', true);
        $alamat = $this->input->post('alamat', true);
        $kota_kab = $this->input->post('kota_kab', true);
        $gender = $this->input->post('gender', true);
        $kelas = $this->input->post('kelas', true);
        $this->Model_siswa->ubah($nis, $nama, md5($password), $alamat, $kota_kab, $gender, $kelas);
        //aksi setelah data tersimpan kembali ke index
        $this->session->set_flashdata('SUCCESS', "Data berhasil di simpan");
        redirect('siswa');
    }
    function edit()
    {
        $nis = $this->input->post('nis', true);
        $data = $this->Model_siswa->getByID($nis);
        $kelas = $this->Model_kelas->getAll();
        $result = $data->row();
        if (!(strcmp($result->gender, "L"))) {
            $laki = "selected";
            $perempuan = "";
        } else {
            $laki = "";
            $perempuan = "selected";
        }
        echo "
				<form action='" . base_url() . "siswa/ubah' method='POST'>
				<div class='form-group'>
                 	<label for='nis' class='control-label'>kode Kelas:</label>
                   	<input type='text' class='form-control'  name='nis' id='nis' value='" . $result->nis . "' readonly>
                </div>

                <div class='form-group'>
                	<label for='nama' class='control-label'>Nama Kelas :</label>
                	<input type='text' class='form-control' name='nama' id='nama' value='" . $result->nama . "'>
                </div>
                <div class='form-group'>
                	<label for='password' class='control-label'>Password :</label>
                	<input type='password' class='form-control' name='password' id='password' value='" . $result->password . "'>
                </div>
                <div class='form-group'>
                	<label for='kota_kab' class='control-label'>Alamat :</label>
                	<textarea class='form-control' name='alamat' id='alamat'>" . $result->alamat . "'
                	</textarea>
                </div>
                <div class='form-group'>
                	<label for='password' class='control-label'>Kota Kab :</label>
                	<input type='text' class='form-control' name='kota_kab' id='kota_kab' value='" . $result->kota_kab . "'>
                </div>
                <div class='form-group'>
                	<label for='kelas' class='control-label'>gender:</label>
                 	<select name='gender' class='form-control custom-select'>
                 	<option value='L' " . $laki . ">Laki-laki</option>
                   	<option value='P' " . $perempuan . ">Perempuan</option>
                    </select>
                </div>
                <div class='form-group'>
                	<label for='kelas' class='control-label'>kelas:</label>
                 	<select name='kelas' class='form-control custom-select'>";
        foreach ($kelas->result_array() as $row) {
            if (!(strcmp($result->kelas, $row['kode_kelas']))) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo "<option value='" . $row['kode_kelas'] . "' " . $selected . ">" . $row['nama_kelas'] . "</option>";
        }
        echo "
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
        $this->Model_siswa->hapus($id);
        $this->session->set_flashdata('DANGER', "Data berhasil di Hapus");
        redirect('siswa');
    }
}
