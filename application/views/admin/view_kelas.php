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
			<h4 class="m-0 font-weight-bold text-primary">Data Kelas
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
						<th scope="col">Kode Kelas</th>
						<th scope="col">Nama Kelas</th>
						<th scope="col">Aktif</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data->result_array() as $row) {
					?>
						<tr>
							<td><?= $row['kode_kelas']; ?></td>
							<td><?= $row['nama_kelas']; ?></td>
							<td><?= $row['aktif']; ?></td>
							<td>

								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_Modal" onclick="edit('<?php echo $row['kode_kelas']; ?>')">Edit</button>

								<a href="<?php echo base_url(); ?>kelas/hapus/<?php echo $row['kode_kelas']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus?');" onclick="return confirm('Yakin Mau di Hapus?');">Hapus</a>
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
					<h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-fw fa-box"></span>&nbsp&nbspTambahkan Kelas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form action="<?php echo base_url() . 'kelas/simpan'; ?>" enctype="multipart/form-data" method="POST">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Kode Kelas</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kode_kelas">
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Nama Kelas</label>
							<input type="Text" class="form-control" id="exampleInputPassword1" name="nama_kelas">
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Aktif</label>
							<select class="form-control" aria-label="Default select example" name="aktif">
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select>
						</div>

				</div>
				<!-- end content modal -->
				<div class="modal-footer">
					<button type="submit" class="btn btn-success"><span class="fa fa-save"></span>&nbspSimpan</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span>&nbspBatal</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End Modal -->

	<!-- edit Data -->
	<div class="modal fade" id="edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h5 class="modal-title text-white" id="exampleModalLabel">Edit Kelas</h5>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="edit_kelas">


				</div>
			</div>
		</div>
	</div>
	<!-- end edit Data -->




	<script type="text/javascript">
		function edit(kode_kelas) {
			var id = kode_kelas;
			$.ajax({
				type: 'POST',
				data: 'kode_kelas=' + id,
				url: '<?php echo base_url(); ?>kelas/edit',
				success: function(data) {
					$('#edit_kelas').html(data);
				}
			});
		}
	</script>