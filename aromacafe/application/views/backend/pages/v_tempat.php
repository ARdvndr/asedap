<!-- This will load all view from master-layout -->
<?php $this->load->view('backend/@app-components/partials/master-layout', array(
  'title' => 'Tempat'
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
      <section id="datatable">
        <hr />
        <h5>Data Tempat</h5>
        <hr />

        <?php
        $body = array(
          0 => array(
            'label'         => 'Nama Tempat',
            'type'          => 'text',
            'name'          => 'nama',
            'placeholder'   => 'Nama Tempat',
          ),
          1 => array(
            'label'         => 'Deskripsi',
            'type'          => 'textarea',
            'name'          => 'deskripsi',
          ),
          2 => array(
            'label'         => 'Gambar',
            'type'          => 'file',
            'name'          => 'foto',
            'allowed_types' => 'jpg|png|jpeg',
          ),
          3 => array(
            'type'          => 'hidden',
            'name'          => 'id',
          ),
        );

        $this->load->view('backend/@app-components/modals/modal-form', array(
          'button'    => 'Tambah',
          'title'     => 'Tambah Tempat',
          'name'      => 'modal-Tempat',
          'action'    => './tempat/add',
          'body'      => $body,
        ));

        $this->load->view('backend/@app-components/modals/modal-form', array(
          'button'    => '',
          'title'     => 'Ubah Tempat',
          'name'      => 'modal-ubah',
          'action'    => './tempat/update',
          'body'      => $body,
        ));
        ?>

        <table id="tableTempat" class="table table-striped" style="width: 100%;">
          <thead>
            <tr>
              <th>No</th>
              <th>ID</th>
              <th>Nama</th>
              <th>Gambar</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </section>
    </div>
  </div>
</div>

<script type="text/javascript">
  var table = $('#tableTempat').DataTable({
    ajax: "../backend/TempatController/getAll/",
    columns: [{
        data: 'no'
      },
      {
        data: 'id'
      },
      {
        data: 'nama'
      },
      {
        data: 'image'
      },
      {
        data: 'deskripsi'
      },
      {
        data: 'aksi'
      }
    ],
    buttons: [
      'excel', 'pdf',
    ],
    columnDefs: [{
      targets: [0, 5],
      createdCell: function(td, row) {
        $(td).css('text-align', 'center');
        $(td).css('width', '100px');
      }
    }]
  });

  $(".dt-buttons .dt-button").addClass('btn btn-primary');

  $('#tableTempat tbody').on('click', '.ubahTempat', function() {
    var dataTempat = table.row($(this).parents('tr')).data();
    $("#id").val(dataTempat.id);
    $("#nama").val(dataTempat.nama);
    $("#deskripsi").val(dataTempat.deskripsi);

  });

  function deleteTempat(id, name) {
    alertify.confirm(
      'Yakin Menghapus ' + name + ' ?',
      'Data ini akan dihapus dari database',
      function() {
        try {
          window.location.href = "/aromacafe/admin/tempat/delete/" + id;
        } catch (err) {
          console.log(err);
          swal({
            title: 'Error',
            text: err,
            icon: 'error'
          })
        }
      },
      function() {
        alertify.error('Batal')
      });
  }
</script>