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
            <h4 class="m-0 font-weight-bold text-primary">Data Nilai
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
                        <th scope="col">ID Nilai</th>
                        <th scope="col">Nis</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Nama mapel</th>
                        <th scope="col">Guru</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data->result_array() as $row) {
                    ?>
                        <tr>
                            <td><?= $row['id_nilai']; ?></td>
                            <td><?= $row['nis']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['nama_mapel']; ?></td>
                            <td><?= $row['guru']; ?></td>
                            <td><?= $row['nilai']; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_Modal" onclick="edit('<?php echo $row['id_nilai']; ?>')">Edit</button>
                                <a href="<?php echo base_url(); ?>nilai/hapus/<?php echo $row['id_nilai']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus?');" onclick="return confirm('Yakin Mau di Hapus?');">Hapus</a>
                            </td>
                        <?php } ?>
                </tbody>
            </table>
            <!-- end table -->
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
                <form action="<?php echo base_url() . 'nilai/simpan'; ?>" method="post">
                    <div class='form-group'>
                        <!-- <label for='' class='control-label'>Nis:</label> -->
                        <input type='hidden' class='form-control' name='id_nilai' id='id_nilai'>
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
                    <div class='form-group'>
                        <label for='mapel' class='control-label'>Mapel:</label>
                        <select name='mapel' class='form-control custom-select'>
                            <option value="">---Pilih Mapel---</option>
                            <?php foreach ($mapel->result_array() as $row) { ?>
                                <option value="<?php echo $row['id_mapel'] ?>"><?php echo $row['nama_mapel'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for='nilai' class='control-label'>Nilai :</label>
                        <input type='text' class='form-control' name='nilai' id='nilai'>
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
                <h5 class="modal-title text-white" id="exampleModalLabel">Edit Nilai</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="edit_nilai">


            </div>
        </div>
    </div>
</div>
<!-- end edit Data -->
<script type="text/javascript">
    function edit(id_nilai) {
        var id = id_nilai;
        $.ajax({
            type: 'POST',
            data: 'id_nilai=' + id,
            url: '<?php echo base_url(); ?>nilai/edit',
            success: function(data) {
                $('#edit_nilai').html(data);
            }
        });
    }
</script>