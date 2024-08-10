<!-- This will load all view from master-layout -->
<?php $this->load->view('backend/@app-components/partials/master-layout', array(
    'title' => 'Paket'
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
                <h5>Data Paket</h5>
                <hr />

                <?php
                $jenis = array(
                    0 => array(
                        'value' => 'Indonesian',
                        'label' => 'Indonesian',
                    ),
                    1 => array(
                        'value' => 'American',
                        'label' => 'American',
                    ),
                    2 => array(
                        'value' => 'Italian',
                        'label' => 'Italian',
                    ),
                    3 => array(
                        'value' => 'Mexican',
                        'label' => 'Mexican',
                    ),
                );

                $body = array(
                    0 => array(
                        'label'         => 'Jenis',
                        'type'          => 'select',
                        'name'          => 'jenis',
                        'option'        => $jenis,
                        'placeholder'   => '-Pilih Jenis-'
                    ),
                    1 => array(
                        'label'         => 'Nama Paket',
                        'type'          => 'text',
                        'name'          => 'nama',
                        'placeholder'   => 'Nama Paket',
                    ),
                    2 => array(
                        'label'         => 'Harga',
                        'type'          => 'number',
                        'name'          => 'harga',
                        'min'           => 10000,
                    ),
                    3 => array(
                        'type'          => 'hidden',
                        'name'          => 'id',
                    ),
                );

                $this->load->view('backend/@app-components/modals/modal-form', array(
                    'button'    => 'Tambah',
                    'title'     => 'Tambah Paket',
                    'name'      => 'modal-paket',
                    'action'    => './paket/add',
                    'body'      => $body,
                ));

                $this->load->view('backend/@app-components/modals/modal-form', array(
                    'button'    => '',
                    'title'     => 'Ubah Paket',
                    'name'      => 'modal-ubah',
                    'action'    => './paket/update',
                    'body'      => $body,
                ));
                ?>

                <table id="tablePaket" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Jenis</th>
                            <th>Nama</th>
                            <th>Harga</th>
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
    var table = $('#tablePaket').DataTable({
        ajax: "../backend/PaketController/getAll/",
        columns: [{
                data: 'no'
            },
            {
                data: 'id'
            },
            {
                data: 'jenis'
            },
            {
                data: 'nama'
            },
            {
                data: 'txtharga'
            },
            {
                data: 'aksi'
            }
        ],
        buttons: [
            'excel', 'pdf',
        ],
        columnDefs: [
            {
                targets: [5],
                createdCell: function(td, row) {
                    $(td).css('text-align', 'center');
                    $(td).css('width', '19rem');
                }
            },
            {
                targets: [0],
                createdCell: function(td, row) {
                    $(td).css('text-align', 'center');
                    $(td).css('width', '50px');
                }
            }
        ]
    });

    $(".dt-buttons .dt-button").addClass('btn btn-primary');

    $('#tablePaket tbody').on('click', '.ubahPaket', function() {
        var dataPaket = table.row($(this).parents('tr')).data();
        $("#id").val(dataPaket.id);
        $("#jenis").val(dataPaket.jenis);
        $("#nama").val(dataPaket.nama);
        $("#harga").val(dataPaket.harga);

    });

    function deletePaket(id, name) {
        alertify.confirm(
            'Yakin Menghapus ' + name + ' ?',
            'Data ini akan dihapus dari database',
            function() {
                try {
                    window.location.href = "/aromacafe/admin/paket/delete/" + id;
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