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
            <h4 class="m-0 font-weight-bold text-primary">Data Gambar
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
                        <th scope="col">ID Gambar</th>
                        <th scope="col">Nis</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aktif</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data->result_array() as $row) {
                    ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['nis']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><img src="<?php echo base_url() . 'assets/foto/' . $row['gambar']; ?>" width="80px" height="60px"></td>
                            <td><?= $row['aktif']; ?></td>

                        <?php } ?>
                </tbody>
            </table>

        </div>
        <!-- end card -->

    </div>
    <!-- end container -->
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-fw fa-box"></span>&nbsp&nbspTambahkan Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'gambar/simpan'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <!-- <label for="id_gambar" class="control-label">ID Gambar:</label> -->
                        <input type="hidden" class="form-control" name="id_gambar" id="gambar" readonly="readonly" value="<?php echo $autoid; ?>" required="required">
                    </div>

                    <div class='form-group'>
                        <label for='nis' class='control-label'>Nis:</label>
                        <select name='nis' class='form-control custom-select'>
                            <option value="">---Pilih Siswa---</option>
                            <?php foreach ($nis->result_array() as $row) { ?>
                                <option value="<?php echo $row['nis'] ?>"><?php echo $row['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="control-label">Gambar :</label>
                        <input type="file" class="form-control" name="foto" id="foto">
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