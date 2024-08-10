<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Keluarga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active">Keluarga</li>
                    </ol>
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <a class="btn btn-primary btn-md" href="Keluarga/tambah">
                <i class="fa fa-plus-circle"></i> Tambah Keluarga
            </a>

            <div class="pt-2 ">
                <table class="table table-striped table-sm" id="tableKeluarga" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Keluarga</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($keluarga as $key => $value) {
                            $id = $value['id_kel'];
                            $nama = $value['nama_kel'];
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $nama ?></td>
                                <td><?= date('d F Y', strtotime($value['tgl_lahir'])) ?></td>
                                <td><?= $value['jk_kel'] ?></td>
                                <td><?= $value['alamat_kel'] ?></td>
                                <td>
                                    <a href="Keluarga/ubah/<?= $id ?>" class="btn btn-sm btn-warning">Ubah</a>
                                    <a href="Keluarga/hapus/<?= $id ?>" class="btn btn-sm btn-warning">hapus</a>
                                    </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        var table = $("#tableKeluarga").DataTable();
    });

    function deleteKeluargaId(id, name) {
        swal({
            title: "Yakin Menghapus " + name + " ?",
            text: "Data ini akan dihapus dari database",
            icon: "warning",
            buttons: [
                'Batal',
                'Hapus'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                try {
                    window.location.href = "./Keluarga/hapus/" + id;
                } catch (err) {
                    console.log(err);
                    swal({
                        title: 'Error',
                        text: err,
                        icon: 'error'
                    })
                }
            }
        });
    }
</script>