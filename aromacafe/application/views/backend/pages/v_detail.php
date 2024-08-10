<!-- This will load all view from master-layout -->
<?php $this->load->view('backend/@app-components/partials/master-layout', array(
  'title' => 'Detail Paket'
)); ?>

<style>
  html {
    scroll-behavior: smooth;
  }

  section {
    min-height: 50vh;
  }
</style>

<!-- Must be initialize with id="renderContent" to send view into master-layout -->
<div id="renderContent">
  <div class="card">
    <div class="card-body">
      <section id="detail">
        <form action="../addDetail/<?= $paket[0]['id_paket'] ?>" method="post">
          <?php foreach ($paket as $n) { ?>
            <h5>
              Jenis Paket : <?= $n['jenis_paket'] ?> <br />
              Nama Paket : <?= $n['nama_paket'] ?> <br />
              Harga Paket : <?= $n['harga_paket'] ?> <br />
            </h5>
          <?php } ?>

          <div class="row">
            <div class="col">
              <button type="submit" value="Simpan" class="btn btn-primary">Simpan</button>
              <a href="../../paket" class="btn btn-danger">Kembali</a>
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              <table id="tableMakananDetail" class="table table-striped">
                <thead>
                  <tr>
                    <th colspan="2">Main Course</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($makanan as $m) {
                    $chk = $this->db
                      ->where('id_paket', $paket[0]['id_paket'])
                      ->where('id_makanan', $m['id_makanan'])
                      ->get('detail_paket')
                      ->result();

                    if ($m['jenis_makanan'] == 'Main') :
                  ?>
                      <tr>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-control" name="makanan[]" value="<?= $m['id_makanan'] ?>" <?= !empty($chk) ? "checked" : "" ?>>
                        </td>
                        <td><?= $m['nama_makanan'] ?>
                        </td>
                      </tr>
                  <?php endif;
                  } ?>
                </tbody>
              </table>
            </div>

            <div class="col-6">
              <table id="tablePelengkapDetail" class="table table-striped">
                <thead>
                  <tr>
                    <th colspan="2">Pelengkap</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($makanan as $m) {
                    $chk = $this->db
                      ->where('id_paket', $paket[0]['id_paket'])
                      ->where('id_makanan', $m['id_makanan'])
                      ->get('detail_paket')
                      ->result();

                    if ($m['jenis_makanan'] == 'Pelengkap') :
                  ?>
                      <tr>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-control" name="makanan[]" value="<?= $m['id_makanan'] ?>" <?= !empty($chk) ? "checked" : "" ?>>
                        </td>
                        <td><?= $m['nama_makanan'] ?>
                        </td>
                      </tr>
                  <?php endif;
                  } ?>
                </tbody>
              </table>

              <table id="tableDessertDetail" class="table table-striped">
                <thead>
                  <tr>
                    <th colspan="2">Dessert</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($makanan as $m) {
                    $chk = $this->db
                      ->where('id_paket', $paket[0]['id_paket'])
                      ->where('id_makanan', $m['id_makanan'])
                      ->get('detail_paket')
                      ->result();

                    if ($m['jenis_makanan'] == 'Dessert') :
                  ?>
                      <tr>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-control" name="makanan[]" value="<?= $m['id_makanan'] ?>" <?= !empty($chk) ? "checked" : "" ?>>
                        </td>
                        <td><?= $m['nama_makanan'] ?>
                        </td>
                      </tr>
                  <?php endif;
                  } ?>
                </tbody>
              </table>

              <table id="tableMinumanDetail" class="table table-striped">
                <thead>
                  <tr>
                    <th colspan="2">Minuman</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($makanan as $m) {
                    $chk = $this->db
                      ->where('id_paket', $paket[0]['id_paket'])
                      ->where('id_makanan', $m['id_makanan'])
                      ->get('detail_paket')
                      ->result();

                    if ($m['jenis_makanan'] == 'Minuman') :
                  ?>
                      <tr>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-control" name="makanan[]" value="<?= $m['id_makanan'] ?>" <?= !empty($chk) ? "checked" : "" ?>>
                        </td>
                        <td><?= $m['nama_makanan'] ?>
                        </td>
                      </tr>
                  <?php endif;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>

        </form>
      </section>

    </div>
  </div>
</div>