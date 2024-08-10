<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Kategori</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?> ">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
          </ol>
        </div>
      </div>
    </div>

  </section>

  <section class="content">
    <div class="container-fluid">
      <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#tambahKategori">
        <i class="fa fa-plus-circle"></i> Tambah Kategori
      </button>

      <div class="pt-2 ">
        <table class="table table-striped table-sm" id="tableKategori" style="width: 100%">
          <thead>
            <tr>
              <th style="width: 5%">No</th>
              <th style="width: 15%">Kode Kategori</th>
              <th>Nama Kategori</th>
              <th style="width: 15%">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('modals/Modal_Kategori'); ?>

<script>
  var table = $("#tableKategori").DataTable({ // Read Data JSON from M_Kategori
    ajax: "Kategori/getKategori/",
    columns: [{
        data: 'no'
      },
      {
        data: 'kdKategori'
      },
      {
        data: 'nama'
      },
      {
        data: 'aksi'
      },
    ],
    columnDefs: [{
      targets: [0, 3],
      createdCell: function(td, row) {
        $(td).css('text-align', 'center');
      }
    }]
  });

  $('#tableKategori tbody').on('click', '.ubahKategori', function() {
    var dataKategori = table.row($(this).parents('tr')).data();
    $("#kd_kategori").val(dataKategori.kdKategori);
    $("#nama_kategori").val(dataKategori.nama);

  });

  function deleteKategoriId(id, name) {
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
          window.location.href = "/inventory-drizq/kategori/hapus/" + id;
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