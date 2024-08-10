<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah keluarga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Keluarga') ?> ">Keluarga</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="pt-2 col-6">
                <form action="../../keluarga/update" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $keluarga['id_kel'] ?>">
                    <div class="form-group">
                        <label for="nama">Nama Keluarga</label>
                        <input type="text" class="form-control" name="nama" value="<?= $keluarga['nama_kel'] ?>" autofocus required>
                    </div>

                    <div class=" form-row">
                        <div class="form-group col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" value="<?= $keluarga['tgl_lahir'] ?>" required>
                        </div>
                        <div class=" form-group col-md-6">
                            <label for="jenis">Jenis Kelamin</label>
                            <select name="jenis" class="form-control" style="width: 100%;" required>
                                <option value="Laki-Laki" <?= $keluarga['jk_kel'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= $keluarga['jk_kel'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" cols="30" rows="5" required><?= $keluarga['alamat_kel'] ?></textarea>
                    </div>

                    <a href="<?= base_url('Keluarga') ?>" class="btn btn-danger pull-left">Batal</a>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </section>
</div>