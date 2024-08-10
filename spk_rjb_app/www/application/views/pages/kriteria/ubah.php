<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Kriteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Kriteria') ?> ">Kriteria</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="pt-2 col-6">
                <form action="../../Kriteria/update" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $kriteria['id_kr'] ?>">
                    <div class="form-group">
                        <label for="namaKriteria">Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama" value="<?= $kriteria['nama_kr'] ?>" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Kriteria</label>
                        <select name="jenis" class="form-control" style="width: 100%;" required>
                            <option value="Kualitatif" <?= $kriteria['jenis_kr'] == 'Kualitatif' ? 'selected' : ''; ?>>Kualitatif</option>
                            <option value="Kuantitatif" <?= $kriteria['jenis_kr'] == 'Kuantitatif' ? 'selected' : ''; ?>>Kuantitatif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Kriteria</label>
                        <select name="tipe" class="form-control" style="width: 100%;" required>
                            <option value="Benefit" <?= $kriteria['tipe_kr'] == 'Benefit' ? 'selected' : ''; ?>>Benefit</option>
                            <option value="Cost" <?= $kriteria['tipe_kr'] == 'Cost' ? 'selected' : ''; ?>>Cost</option>
                        </select>
                    </div>
                    
                    <a href="<?= base_url('Kriteria') ?>" class="btn btn-danger pull-left">Batal</a>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </section>
</div>