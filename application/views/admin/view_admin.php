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
			<h4 class="m-0 font-weight-bold text-primary">Data Admin
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
						<th scope="col">id_admin</th>
						<th scope="col">Username</th>
						<th scope="col">Password</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data->result_array() as $row) {
					?>
						<tr>
							<td><?= $row['id_admin']; ?></td>
							<td><?= $row['username']; ?></td>
							<td>***********</td>
							<td>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_Modal" onclick="edit('<?php echo $row['id_admin']; ?>')">Edit</i></button>
								<a href="<?php echo base_url(); ?>admin/hapus/<?php echo $row['id_admin']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus?');" onclick="return confirm('Yakin Mau di Hapus?');">Hapus</a>
							</td>
						<?php } ?>
						</tr>
				</tbody>
			</table>
			<!-- end table -->
		</div>
		<!-- end card -->

	</div>
</div>
<!-- end container -->
<!-- Modal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-fw fa-box"></span>&nbsp&nbspTambahkan Admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url() . 'admin/simpan'; ?>" method="post">
					<!-- <div class="form-group">
                                                        <label for="id_admin" class="control-label">ID Admin:</label> -->
					<input type="hidden" class="form-control" name="id_admin" id="id_admin">
					<!-- </div> -->

					<div class="form-group">
						<label for="username" class="control-label">Username :</label>
						<input type="text" class="form-control" name="username" id="username" required="required">
					</div>
					<div class="form-group">
						<label for="password" class="control-label">Password :</label>
						<input type="password" class="form-control" name="password" id="password" required="required">
					</div>

					<!-- <div class="form-group">
                                                        <label for="aktif" class="control-label">Aktif:</label>
                                                        <select name="aktif" class="form-control custom-select">
                                                        <option value="yes">Ya</option>
                                                        <option value="no">Tidak</option>
                                                        </select>
                                                    </div> -->


					<div class="modal-footer">
						<button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary" name="submit" value="Simpan">Simpan</button>
				</form>

			</div>
		</div>
	</div>
</div>
</div>
<!-- edit Data -->
<div class="modal fade" id="edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white" id="exampleModalLabel">Edit Admin</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="edit_admin">


			</div>
		</div>
	</div>
</div>
<!-- end edit Data -->
<script type="text/javascript">
	function edit(id_admin) {
		var id = id_admin;
		$.ajax({
			type: 'POST',
			data: 'id_admin=' + id,
			url: '<?php echo base_url(); ?>admin/edit',
			success: function(data) {
				$('#edit_admin').html(data);
			}
		});
	}
</script>