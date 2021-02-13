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
            <h4 class="m-0 font-weight-bold text-primary">Data Mapel
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
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Mapel</th>
                        <th scope="col">Nama Mapel</th>
                        <th scope="col">Guru</th>
                        <th scope="col">Aktif</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data->result_array() as $row) {
                    ?>
                        <tr>
                            <td><?= $row['id_mapel']; ?></td>
                            <td><?= $row['nama_mapel']; ?></td>
                            <td><?= $row['guru']; ?></td>
                            <td><?= $row['aktif']; ?></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_Modal" onclick="edit('<?php echo $row['id_mapel']; ?>')">Edit</button>
                                <a href="<?php echo base_url(); ?>mapel/hapus/<?php echo $row['id_mapel']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus?');" onclick="return confirm('Yakin Mau di Hapus?');">Hapus</i></a>
                            </td>
                        <?php } ?>
                </tbody>
            </table>

        </div>
        <!-- end card -->

    </div>

</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-fw fa-box"></span>&nbsp&nbspTambahkan Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'mapel/simpan'; ?>" method="post">
                    <div class="form-group">
                        <label for="id_mapel" class="control-label">ID Mapel:</label>
                        <input type="text" class="form-control" name="id_mapel" id="id_mapel">
                    </div>
                    <div class="form-group">
                        <label for="nama_mapel" class="control-label">Nama Mapel:</label>
                        <input type="text" class="form-control" name="nama_mapel" id="nama_mapel">
                    </div>

                    <div class="form-group">
                        <label for="guru" class="control-label">Guru:</label>
                        <input type="text" class="form-control" name="guru" id="guru" required="required">
                    </div>
                    <div class="form-group">
                        <label for="aktif" class="control-label">Aktif:</label>
                        <select name="aktif" class="form-control custom-select">
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Edit Kelas</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="edit_mapel">


            </div>
        </div>
    </div>
</div>
<!-- end edit Data -->
<script type="text/javascript">
    function edit(id_mapel) {
        var id = id_mapel;
        $.ajax({
            type: 'POST',
            data: 'id_mapel=' + id,
            url: '<?php echo base_url(); ?>mapel/edit',
            success: function(data) {
                $('#edit_mapel').html(data);
            }
        });
    }
</script>