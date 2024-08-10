<!-- This will load all view from master-layout -->
<?php $this->load->view('backend/@app-components/partials/master-layout', array(
    'title' => 'Booking'
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
                <h5>Data Booking</h5>
                <hr />

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="approve-tab" data-toggle="tab" href="#approve" role="tab" aria-controls="approve" aria-selected="true">Menunggu Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Menunggu Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="accepted-tab" data-toggle="tab" href="#accepted" role="tab" aria-controls="accepted" aria-selected="false">Riwayat</a>
                    </li>
                </ul>

                <div class="tab-content mt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="approve" role="tabpanel" aria-labelledby="approve-tab">
                        <div class="table-responsive">
                            <table id="tableApprove" class="table table-striped" style="width: 150%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>Lama Sewa</th>
                                        <th>Customer</th>
                                        <th>Tempat</th>
                                        <th>Paket</th>
                                        <th>Jumlah Orang</th>
                                        <th>Total Harga</th>
                                        <th>Bukti Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        <div class="table-responsive">
                            <table id="tablePending" class="table table-striped" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>Lama Sewa</th>
                                        <th>Customer</th>
                                        <th>Tempat</th>
                                        <th>Paket</th>
                                        <th>Jumlah Orang</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
                        <div class="table-responsive">
                            <table id="tableRiwayat" class="table table-striped" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>Lama Sewa</th>
                                        <th>Customer</th>
                                        <th>Tempat</th>
                                        <th>Paket</th>
                                        <th>Jumlah Orang</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </section>
        </div>
    </div>
</div>

<script type="text/javascript">
    var tableApprove = $('#tableApprove').DataTable({
        ajax: "../backend/BookingController/getApprove/",
        columns: [{
                data: 'no'
            },
            {
                data: 'id'
            },
            {
                data: 'tanggal'
            },
            {
                data: 'lama_sewa'
            },
            {
                data: 'customer'
            },
            {
                data: 'tempat'
            },
            {
                data: 'paket'
            },
            {
                data: 'jml_org'
            },
            {
                data: 'txttotal'
            },
            {
                data: 'bukti'
            },
            {
                data: 'aksi'
            }
        ],
        buttons: [
            'excel', 'pdf',
        ],
        columnDefs: [{
            targets: [0, 2, 6, 8],
            createdCell: function(td, row) {
                $(td).css('text-align', 'center');
            }
        }, ]
    });

    var tablePending = $('#tablePending').DataTable({
        ajax: "../backend/BookingController/getPending/",
        columns: [{
                data: 'no'
            },
            {
                data: 'id'
            },
            {
                data: 'tanggal'
            },
            {
                data: 'lama_sewa'
            },
            {
                data: 'customer'
            },
            {
                data: 'tempat'
            },
            {
                data: 'paket'
            },
            {
                data: 'jml_org'
            },
            {
                data: 'txttotal'
            },
            {
                data: 'tgl_pesan'
            },
            {
                data: 'aksi'
            }
        ],
        buttons: [
            'excel', 'pdf',
        ],
        columnDefs: [{
            targets: [0, 2, 6, 8],
            createdCell: function(td, row) {
                $(td).css('text-align', 'center');
            }
        }, ]
    });

    var tableRiwayat = $('#tableRiwayat').DataTable({
        ajax: "../backend/BookingController/getRiwayat/",
        columns: [{
                data: 'no'
            },
            {
                data: 'id'
            },
            {
                data: 'tanggal'
            },
            {
                data: 'lama_sewa'
            },
            {
                data: 'customer'
            },
            {
                data: 'tempat'
            },
            {
                data: 'paket'
            },
            {
                data: 'jml_org'
            },
            {
                data: 'txttotal'
            },
        ],
        buttons: [
            'excel', 'pdf',
        ],
        columnDefs: [{
            targets: [0, 2, 6],
            createdCell: function(td, row) {
                $(td).css('text-align', 'center');
            }
        }, ]
    });

    $(".dt-buttons .dt-button").addClass('btn btn-primary');

    function approve(id) {
        alertify.confirm(
            'Yakin Mensetujui Pesanan ' + id + ' ?',
            'Pesanan yang sudah disetujui tidak dapat diubah kembali',
            function() {
                try {
                    window.location.href = "/aromacafe/admin/booking/approve/" + id;
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

    function batal(id) {
        alertify.confirm(
            'Yakin Membatalkan Pesanan ' + id + ' ?',
            'Pesanan yang sudah dibatalkan tidak dapat diubah kembali',
            function() {
                try {
                    window.location.href = "/aromacafe/admin/booking/batal/" + id;
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