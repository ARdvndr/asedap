<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Penilaian') ?> ">Penilaian</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="pt-2 col-6">
                <form action="../Penilaian/simpan" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kel">Nama Keluarga</label>
                        <select name="kel" class="form-control" style="width: 100%;" required>
                            <?php foreach ($keluarga as $kel) {
                                $n = $this->db
                                    ->where('id_kel', $kel['id_kel'])
                                    ->get('penilaian')
                                    ->row_array();

                                if ($n == null) {
                                    echo "<option value='$kel[id_kel]'>$kel[id_kel] - $kel[nama_kel]</option>";
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <?php foreach ($kriteria as $kr) { ?>
                            <div class="form-group col-6">
                                <label for="<?= $kr['id_kr'] ?>"><?= $kr['nama_kr'] ?></label>

                                <?php
                                if ($kr['jenis_kr'] == 'Kualitatif') {
                                    $param = $this->db->where('id_kr', $kr['id_kr'])->get('parameter')->result_array();
                                    echo '<select class="form-control" name="' . $kr['id_kr'] . '">';
                                    foreach ($param as $p) {
                                        echo '<option value="' . $p['nilai_parameter'] . '">' . $p['nilai_asli'] . '</option>';
                                    }
                                    echo '</select>';
                                ?>

                                <?php } else { ?>
                                    <input type="number" class="form-control" name="<?= $kr['id_kr'] ?>">
                                <?php } ?>

                            </div>
                        <?php } ?>
                    </div>

                    <a href="<?= base_url('Penilaian') ?>" class="btn btn-danger pull-left">Batal</a>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </section>
</div>