<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kriteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active">Kriteria</li>
                    </ol>
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <a class="btn btn-primary btn-md" href="Kriteria/tambah">
                <i class="fa fa-plus-circle"></i> Tambah Kriteria
            </a>
            <a class="btn btn-secondary btn-md" href="Kriteria/ubahBobot">
                <i class="fa fa-edit"></i> Ubah Bobot
            </a>

            <div class="pt-2 ">
                <table class="table table-striped table-sm" id="tableKriteria" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 15%">Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Nilai Bobot</th>
                            <th>Jenis Kriteria</th>
                            <th>Tipe Kriteria</th>
                            <th style="width: 25%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kriteria as $key => $value) {
                            $id = $value['id_kr'];
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $id ?></td>
                                <td><?= $value['nama_kr'] ?></td>
                                <td><?= $value['nilai_bobot'] ?></td>
                                <td><?= $value['jenis_kr'] ?></td>
                                <td><?= $value['tipe_kr'] ?></td>
                                <td class="text-right">
                                    <?php if ($value['jenis_kr'] == 'Kualitatif') : ?>
                                        <a href="Kriteria/ubahParameter/<?= $id ?>" class="btn btn-sm btn-info mb-1">Ubah Parameter</a>
                                    <?php endif; ?>
                                    <a href="Kriteria/ubah/<?= $id ?>" class="btn btn-sm btn-warning">Ubah</a>
                                    <button onclick="deleteKriteriaId('<?= $id; ?>', '<?= $value['nama_kr']; ?>')" class="btn btn-sm btn-danger">Hapus</button>
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
        var table = $("#tableKriteria").DataTable();
    });

    function deleteKriteriaId(id, name) {
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
                    window.location.href = "./Kriteria/hapus/" + id;
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