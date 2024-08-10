<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Bobot</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Kriteria') ?> ">Kriteria</a></li>
                        <li class="breadcrumb-item active">Ubah Bobot</li>
                    </ol>
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="./simpanBobot" method="post">

                <table class="table col-6">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($kriteria as $key => $value) { ?>
                            <tr>
                                <td><?= $value['nama_kr'] ?></td>
                                <td><input class="form-control" type="number" name="<?= $value['id_kr'] ?>" value="<?= $value['nilai_bobot'] ?>"></td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <a href="<?= base_url('Kriteria') ?>" class="btn btn-danger pull-left">Batal</a>
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </form>
        </div>
    </section>
</div>