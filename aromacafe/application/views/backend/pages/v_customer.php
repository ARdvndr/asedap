<!-- This will load all view from master-layout -->
<?php $this->load->view('backend/@app-components/partials/master-layout', array(
    'title' => 'Customer'
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
                <h5>Data Customer</h5>
                <hr />

                <?php
                $jenis = array(
                    0 => array(
                        'value' => 'L',
                        'label' => 'Laki-Laki',
                    ),
                    1 => array(
                        'value' => 'P',
                        'label' => 'Perempuan',
                    ),
                );

                $body = array(
                    0 => array(
                        'label'         => 'Nama',
                        'type'          => 'text',
                        'name'          => 'nama',
                        'placeholder'   => 'Nama',
                    ),
                    1 => array(
                      'label'         => 'Alamat',
                      'type'          => 'textarea',
                      'name'          => 'alamat',
                    ),
                    2 => array(
                        'label'         => 'Telepon',
                        'type'          => 'text',
                        'name'          => 'tlp',
                        'placeholder'   => 'No. Telepon',
                    ),
                    3 => array(
                        'label'         => 'Jenis Kelamin',
                        'type'          => 'select',
                        'name'          => 'jkel',
                        'option'        => $jenis,
                        'placeholder'   => '-Pilih Jenis Kelamin-'
                    ),
                    4 => array(
                        'label'         => 'Email',
                        'type'          => 'email',
                        'name'          => 'email',
                        'placeholder'   => 'Email',
                    ),
                    5 => array(
                        'label'         => 'Password',
                        'type'          => 'password',
                        'name'          => 'password',
                        'placeholder'   => 'Password',
                    ),
                    6 => array(
                        'type'          => 'hidden',
                        'name'          => 'id',
                    ),
                );

                $this->load->view('backend/@app-components/modals/modal-form', array(
                    'button'    => 'Tambah',
                    'title'     => 'Tambah Customer',
                    'name'      => 'modal-customer',
                    'action'    => './customer/add',
                    'body'      => $body,
                ));

                $this->load->view('backend/@app-components/modals/modal-form', array(
                    'button'    => '',
                    'title'     => 'Ubah Customer',
                    'name'      => 'modal-ubah',
                    'action'    => './customer/update',
                    'body'      => $body,
                ));
                ?>

                <table id="tableCustomer" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tlp</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
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
    var table = $('#tableCustomer').DataTable({
        ajax: "../backend/CustomerController/getAll/",
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
                data: 'alamat'
            },
            {
                data: 'tlp'
            },
            {
                data: 'txtjkel'
            },
            {
                data: 'email'
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
                targets: [7],
                createdCell: function(td, row) {
                    $(td).css('text-align', 'center');
                    $(td).css('width', '11rem');
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

    $('#tableCustomer tbody').on('click', '.ubahCustomer', function() {
        var dataCustomer = table.row($(this).parents('tr')).data();
        $("#id").val(dataCustomer.id);
        $("#nama").val(dataCustomer.nama);
        $("#alamat").val(dataCustomer.alamat);
        $("#tlp").val(dataCustomer.tlp);
        $("#jkel").val(dataCustomer.jkel);
        $("#email").val(dataCustomer.email);

    });

    function deleteCustomer(id, name) {
        alertify.confirm(
            'Yakin Menghapus ' + name + ' ?',
            'Data ini akan dihapus dari database',
            function() {
                try {
                    window.location.href = "/aromacafe/admin/customer/delete/" + id;
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