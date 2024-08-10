<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Penilaian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active">Penilaian</li>
                    </ol>
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <a class="btn btn-primary btn-md" href="Penilaian/tambah">
                <i class="fa fa-plus-circle"></i> Tambah Penilaian
            </a>
            <a class="btn btn-success btn-md" href="Penilaian/hitung">
                <i class="fa fa-calculator"></i> Hitung
            </a>

            <div class="pt-2 ">
                <table class="table table-striped table-sm" id="tablePenilaian" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Keluarga</th>
                            <?php foreach ($kriteria as $kr) {
                                echo "<th>$kr[nama_kr]</th>";
                            } ?>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($keluarga as $kel) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $kel['nama_kel']; ?></td>
                                <?php foreach ($kriteria as $kr) {
                                    $n = $this->Penilaian_model->getList($kel['id_kel'], $kr['id_kr']);
                                    echo "<td>$n[nilai]</td>";
                                } ?>
                                <td>
                                    <a href="Penilaian/ubah/<?= $kel['id_kel'] ?>" class="btn btn-sm btn-warning">Ubah</a>
                                    <button onclick="deletePenilaianId('<?= $kel['id_kel']; ?>', '<?= $kel['nama_kel']; ?>')" class="btn btn-sm btn-danger">Hapus</button>
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
        var table = $("#tablePenilaian").DataTable();
    });

    function deletePenilaianId(id, name) {
        swal({
            title: "Yakin Menghapus Nilai " + name + " ?",
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
                    window.location.href = "./Penilaian/hapus/" + id;
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