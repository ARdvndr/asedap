<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ubah Parameter <?= $kriteria['nama_kr']; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('Kriteria') ?> ">Kriteria</a></li>
            <li class="breadcrumb-item active">Ubah Parameter</li>
          </ol>
        </div>
      </div>
    </div>

  </section>


  <section class="content">
    <div class="container-fluid">
      <form action="../../Kriteria/simpanParameter/<?= $kriteria['id_kr']; ?>" method="post">
        <table class="table" style="width: 50%;">
          <thead>
            <tr>
              <th>Nilai</th>
              <th>Parameter</th>
              <th style="width: 100px;"><button type="button" onclick="addRow();" class="btn btn-outline-primary">Tambah</button></th>
            </tr>
          </thead>

          <tbody id="tableBodyParameter">
            <?php
            foreach ($parameter as $p) {
              echo "<tr>
                        <td><input type='text' class='form-control' name='nilai[]' value='$p[nilai_asli]' required></td>
                        <td><input type='number' class='form-control' name='parameter[]' min='1' value='$p[nilai_parameter]' required></td>
                        <td><button type='button' onclick='deleteRow(this);' class='btn btn-outline-primary'>Hapus</button></td>
                    </tr>";
            }
            ?>
          </tbody>

          <tfoot>
            <tr class="text-right">
              <td colspan="3">
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

<script>
  var items = 0;

  function addRow() {
    var html = "<tr>";
    html += "<td><input type='text' class='form-control' name='nilai[]'></td>";
    html += "<td><input type='number' class='form-control' name='parameter[]' min='1'></td>";
    html += "<td><button type='button' onclick='deleteRow(this);' class='btn btn-outline-primary'>Hapus</button></td>";
    html += "</tr>";

    var row = document.getElementById("tableBodyParameter").insertRow();
    row.innerHTML = html;
  }

  function deleteRow(button) {
    button.parentElement.parentElement.remove();
  }
</script>