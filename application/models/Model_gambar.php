<?php
class Model_gambar extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function getAll()
	{
		$data = $this->db->query("SELECT tb_siswa.nis AS nis , tb_siswa.nama AS nama ,tb_gambar.id AS id, tb_gambar.nis AS nis , tb_gambar.foto AS gambar ,tb_gambar.aktif AS aktif FROM tb_gambar LEFT JOIN tb_siswa ON tb_gambar.nis = tb_siswa.nis ORDER BY tb_gambar.id DESC");
		return $data;
	}
	function getByID($id)
	{
		$data = $this->db->where('id', $id);
		$data = $this->db->get('tb_gambar');
		return $data;
	}
	function simpan($id, $nis, $foto, $aktif)
	{
		$data = array(
			'id' => $id,
			'nis' => $nis,
			'foto' => $foto,
			'aktif' => $aktif
		);
		$this->db->insert('tb_gambar', $data);
	}
	function ubah($id, $nis, $foto, $aktif)
	{
		$data = array(
			'nis' => $nis,
			'foto' => $foto,
			'aktif' => $aktif
		);

		$this->db->where('id', $id);
		$this->db->update('tb_gambar', $data);
	}
	function updateNoImg($id, $nis, $aktif)
	{
		$data = array(
			'id' => $id,
			'nis' => $nis,
			'aktif' => $aktif
		);
		$this->db->where('id', $id);
		$this->db->update('tb_gambar', $data);
	}

	function hapus($id)
	{
		$data = $this->db->where('id', $id);
		$data = $this->db->delete('tb_gambar');
		if ($id) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function maxdata()
	{
		$data = $this->db->select_max('id', 'lastid');
		$data = $this->db->get('tb_gambar');
		return $data;
	}
}
