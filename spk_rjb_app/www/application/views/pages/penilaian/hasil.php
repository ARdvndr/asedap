<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hasil Perhitungan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Penilaian') ?> ">Penilaian</a></li>
                        <li class="breadcrumb-item active">Hasil</li>
                    </ol>
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="pt-2">

                <ul class="nav nav-tabs" id="hasil-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="ranking-tab" data-toggle="tab" href="#ranking" role="tab" aria-controls="ranking" aria-selected="true">Ranking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="matriks-tab" data-toggle="tab" href="#matriks" role="tab" aria-controls="matriks" aria-selected="false">Matriks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="terbobot-tab" data-toggle="tab" href="#terbobot" role="tab" aria-controls="terbobot" aria-selected="false">Matriks Terbobot</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="solusi-tab" data-toggle="tab" href="#solusi" role="tab" aria-controls="solusi" aria-selected="false">Solusi Ideal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="jarak-tab" data-toggle="tab" href="#jarak" role="tab" aria-controls="jarak" aria-selected="false">Jarak Solusi Ideal</a>
                    </li>

                </ul>


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="ranking" role="tabpanel" aria-labelledby="ranking-tab">
                        <div class='row mt-4 justify-content-center'>
                            <table class='table table-hover col-6' id="tabelRanking">
                                <thead class='thead text-center'>
                                    <th width='100'>Ranking</th>
                                    <th width='250'>Nama</th>
                                    <th>Hasil Akhir</th>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($alternatif as $key => $a) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td><?= $a['nama'] ?></td>
                                            <td class="text-center"><?= $a['V'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                           

                    <div class="tab-pane fade" id="matriks" role="tabpanel" aria-labelledby="matriks-tab">
                        <div class='row mt-4 justify-content-center'>
                            <table class='table table-hover kecil'>
                                <thead class='thead text-center'>
                                    <th width='50'>No</th>
                                    <th width='250'>Nama</th>
                                    <?php foreach ($kriteria as $kr) {
                                        echo "<th>$kr[nama_kr]</th>";
                                    } ?>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($alternatif as $key => $a) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td><?= $a['nama'] ?></td>
                                            <?php foreach ($kriteria as $kr) {
                                                echo "<td>" . $a['r' . $kr['id_kr']] . "</td>";
                                            } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="terbobot" role="tabpanel" aria-labelledby="terbobot-tab">
                        <div class='row mt-4 justify-content-center'>
                            <table class='table table-hover kecil'>
                                <thead class='thead text-center'>
                                    <th width='50'>No</th>
                                    <th width='250'>Nama</th>
                                    <?php foreach ($kriteria as $kr) {
                                        echo "<th>$kr[nama_kr]</th>";
                                    } ?>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($alternatif as $key => $a) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td><?= $a['nama'] ?></td>
                                            <?php foreach ($kriteria as $kr) {
                                                echo "<td>" . $a['y' . $kr['id_kr']] . "</td>";
                                            } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="solusi" role="tabpanel" aria-labelledby="solusi-tab">
                        <div class='row mt-4 justify-content-center'>
                            <table class='table table-hover col-6'>
                                <thead class='thead text-center'>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kriteria</th>
                                        <th width='150'>Positif</th>
                                        <th width='150'>Negatif</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($kriteria as $key => $kr) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $kr['id_kr'] ?></td>
                                            <td><?= $kr['nama_kr'] ?></td>
                                            <td><?= $solusi['y+' . $kr['id_kr']]; ?></td>
                                            <td><?= $solusi['y-' . $kr['id_kr']]; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="jarak" role="tabpanel" aria-labelledby="jarak-tab">
                        <div class='row mt-4 justify-content-center'>
                            <table class='table table-hover kecil'>
                                <thead class='thead text-center'>
                                    <th width='50'>No</th>
                                    <th>Nama</th>
                                    <th width=''>D+</th>
                                    <th width=''>D-</th>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($alternatif as $key => $a) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td><?= $a['nama'] ?></td>
                                            <td align="center"><?= $a['D+'] ?></td>
                                            <td align="center"><?= $a['D-'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
</div>

<script type="text/javascript">
$(function(){
    $('#tabelRanking').DataTable({
        dom: 'Bfrtip',
        buttons: ['pdf'],
    })
})
</script>