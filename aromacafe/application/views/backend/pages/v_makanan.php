<!-- This will load all view from master-layout -->
<?php $this->load->view('backend/@app-components/partials/master-layout', array(
    'title' => 'Makanan'
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
                <h5>Data Makanan</h5>
                <hr />

                <?php
                $jenis = array(
                    0 => array(
                        'value' => 'Main',
                        'label' => 'Main',
                    ),
                    1 => array(
                        'value' => 'Pelengkap',
                        'label' => 'Pelengkap',
                    ),
                    2 => array(
                        'value' => 'Dessert',
                        'label' => 'Dessert',
                    ),
                    3 => array(
                        'value' => 'Minuman',
                        'label' => 'Minuman',
                    ),
                );

                $body = array(
                    0 => array(
                        'label'         => 'Nama Makanan',
                        'type'          => 'text',
                        'name'          => 'nama',
                        'placeholder'   => 'Nama Makanan',
                    ),
                    1 => array(
                        'label'         => 'Jenis Makanan',
                        'type'          => 'select',
                        'name'          => 'jenis',
                        'option'        => $jenis,
                        'placeholder'   => '-Pilih Jenis Makanan-'
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
                    'title'     => 'Tambah Makanan',
                    'name'      => 'modal-makanan',
                    'action'    => './makanan/add',
                    'body'      => $body,
                ));

                $this->load->view('backend/@app-components/modals/modal-form', array(
                    'button'    => '',
                    'title'     => 'Ubah Makanan',
                    'name'      => 'modal-ubah',
                    'action'    => './makanan/update',
                    'body'      => $body,
                ));
                ?>

                <table id="tableMakanan" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Gambar</th>
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
    var table = $('#tableMakanan').DataTable({
        ajax: "../backend/MakananController/getAll/",
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
                data: 'jenis'
            },
            {
                data: 'image'
            },
            {
                data: 'aksi'
            }
        ],
        buttons: [
            'excel', 'pdf',
        ],
        columnDefs: [{
            targets: [0, 4],
            createdCell: function(td, row) {
                $(td).css('text-align', 'center');
                $(td).css('width', '100px');
            }
        }]
    });

    $(".dt-buttons .dt-button").addClass('btn btn-primary');

    $('#tableMakanan tbody').on('click', '.ubahMakanan', function() {
        var dataMakanan = table.row($(this).parents('tr')).data();
        $("#id").val(dataMakanan.id);
        $("#nama").val(dataMakanan.nama);
        $("#jenis").val(dataMakanan.jenis);

    });

    function deleteMakanan(id, name) {
        alertify.confirm(
            'Yakin Menghapus ' + name + ' ?', 
            'Data ini akan dihapus dari database',
            function() {
                try {
                    window.location.href = "/aromacafe/admin/makanan/delete/" + id;
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