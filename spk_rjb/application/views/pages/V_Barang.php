<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Barang</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
            <li class="breadcrumb-item active">Barang</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#tambahBarang">
        <i class="fas fa fa-plus-circle"></i> Tambah Barang
      </button>
      <div class="pt-2">
        <table class="table table-striped table-sm" id="tableBarang" style="width: 100%;font-size:12pt;">
          <thead>
            <tr>
              <th style="width: 4%">No</th>
              <th style="width: 12%">Kode Barang</th>
              <th>Foto Product</th>
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Satuan</th>
              <th>Stok</th>
              <th>Stok Min</th>
              <th style="width: 15%">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('modals/Modal_Barang'); ?>


<script lang="javascript">
  var table = $("#tableBarang").DataTable({
    ajax: "Barang/getBarang/",
    columns: [{
        data: 'no'
      },
      {
        data: 'kdBarang'
      },
      {
        data: 'image'
      },
      {
        data: 'nama'
      },
      {
        data: 'kategori'
      },
      {
        data: 'harga'
      },
      {
        data: 'satuan'
      },
      {
        data: 'stok'
      },
      {
        data: 'minStok'
      },
      {
        data: 'aksi'
      },
    ],
  });

  $('#tableBarang tbody').on('click', '.ubahBarang', function() {
    var data = table.row($(this).parents('tr')).data();
    $("#kd_barang").val(data.kdBarang);
    $("#nama_barang").val(data.nama);
    $("#harga").val(data.harga.replace(/,/g, ""));
    $("#kategori").val(data.kdKategori);
    $("#satuan").val(data.satuan);
    $("#stok").val(data.stok);
    $("#min_stok").val(data.minStok);

  });

  function deleteBarangId(id, name) {
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
          window.location.href = "/inventory-drizq/Barang/hapus/" + id;
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

  function resetModal() {
    $("#kd_barang").val(null);
    $("#nama_barang").val(null);
    $("#kategori_barang").val(null);
    $("#harga").val(null);
    $("#stok").val(null);
    $("#min_stok").val(null);
  }

  $(function() {
    $('.select-kategori').select2({
      theme: 'bootstrap4'
    })
  })
</script>