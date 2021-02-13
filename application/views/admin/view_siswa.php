<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">
</div>

<!-- container -->
<div class="container-fluid">
	<!-- card -->
	<div class="card shadow mb-4">
		<!-- card header -->
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">Data Siswa
				<a href="#" type="button" class="btn btn-primary btn-icon-split float-right" data-toggle="modal" data-target=".bd-example-modal-xl">
					<span class=" icon text-white-50">
						<i class="fas fa-plus"></i>
					</span>
					<span class="text">Tambah Data</span>
				</a>
			</h4>

		</div>
		<!-- end card header -->
		<div class="card-body">
			<!-- table -->
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Nis</th>
						<th scope="col">Nama</th>
						<th scope="col">Password</th>
						<th scope="col">Alamat</th>
						<th scope="col">Kota/kab</th>
						<th scope="col">Gender</th>
						<th scope="col">Kelas</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data->result_array() as $row) {
					?>
						<tr>
							<td><?= $row['nis']; ?></td>
							<td><?= $row['nama']; ?></td>
							<td>***********</td>
							<td><?= $row['alamat']; ?></td>
							<td><?= $row['kota_kab']; ?></td>
							<td><?= $row['gender']; ?></td>
							<td><?= $row['kelas']; ?></td>
							<td>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_Modal" onclick="edit('<?php echo $row['nis']; ?>')">Edit</button>
								<a href="<?php echo base_url(); ?>siswa/hapus/<?php echo $row['nis']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus?');" onclick="return confirm('Yakin Mau di Hapus?');">Hapus</a>
							</td>
						<?php } ?>
						</tr>
				</tbody>
			</table>
			<!-- end table -->
		</div>
		<!-- end card -->

	</div>
	<!-- end container -->
	<!-- Modal -->
	<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-fw fa-box"></span>&nbsp&nbspTambahkan Siswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url() . 'siswa/simpan'; ?>" method="post">
						<div class='form-group'>
							<label for='nis' class='control-label'>Nis:</label>
							<input type='text' class='form-control' name='nis' id='nis'>
						</div>

						<div class='form-group'>
							<label for='nama' class='control-label'>Nama :</label>
							<input type='text' class='form-control' name='nama' id='nama'>
						</div>
						<div class='form-group'>
							<label for='password' class='control-label'>Password :</label>
							<input type='password' class='form-control' name='password' id='password'>
						</div>
						<div class='form-group'>
							<label for='kota_kab' class='control-label'>Alamat :</label>
							<textarea class='form-control' name='alamat' id='alamat'>
                                                      </textarea>
						</div>
						<div class='form-group'>
							<label for='password' class='control-label'>Kota Kab :</label>
							<input type='text' class='form-control' name='kota_kab' id='kota_kab'>
						</div>
						<div class='form-group'>
							<label for='aktif' class='control-label'>gender:</label>
							<select name='gender' class='form-control custom-select'>
								<option value='L'>Laki-Laki</option>
								<option value='P'>Perempuan</option>
							</select>
						</div>
						<div class='form-group'>
							<label for='aktif' class='control-label'>Kelas:</label>
							<select name='kelas' class='form-control custom-select'>
								<?php foreach ($kelas->result_array() as $row) { ?>
									<option value="<?php echo $row['kode_kelas'] ?>"><?php echo $row['nama_kelas'] ?></option>
								<?php } ?>
							</select>
						</div>

						<div class="modal-footer">
							<button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary" name="submit" value="Simpan">Simpan</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- /. end modal -->
<!-- edit Data -->
<div class="modal fade" id="edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white" id="exampleModalLabel">Edit Siswa</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="edit_siswa">


			</div>
		</div>
	</div>
</div>
<!-- end edit Data -->
<script type="text/javascript">
	function edit(nis) {
		var id = nis;
		$.ajax({
			type: 'POST',
			data: 'nis=' + id,
			url: '<?php echo base_url(); ?>siswa/edit',
			success: function(data) {
				$('#edit_siswa').html(data);
			}
		});
	}
</script>