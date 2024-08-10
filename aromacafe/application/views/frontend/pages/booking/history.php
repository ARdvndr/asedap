<?php $this->load->view('frontend/@app-components/partials/master-layout', array(
    'title' => 'Riwayat Pesanan',
));
?>

<section>
    <div class="my-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pembayaran-tab"
                    data-toggle="tab"
                    href="#pembayaran"
                    role="tab"
                    aria-controls="pembayaran"
                    aria-selected="true">
                    Menunggu Pembayaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="proses-tab"
                    data-toggle="tab"
                    href="#proses"
                    role="tab"
                    aria-controls="proses"
                    aria-selected="false">
                    Dalam Proses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="selesai-tab"
                    data-toggle="tab"
                    href="#selesai"
                    role="tab"
                    aria-controls="selesai"
                    aria-selected="false">
                    Riwayat Transaksi
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active my-3" id="pembayaran" role="tabpanel" aria-labelledby="pembayaran-tab">
                <div class="row">

                    <?php 
                    if(!empty($pending)) :
                        foreach($pending as $value): ?>

                            <div class="col-md-4 my-2">
                            <?php $this->load->view('frontend/@app-components/card/card-history', array(
                                    'class'                     => 'text-danger',
                                    'card_text_id_pesan'        => $value['id_booking'],
                                    'card_text_tanggal_pesan'   => $value['tanggal_pesan'],
                                    'card_text_tanggal_acara'   => $value['tanggal_booking'],
                                    'card_text_lama_sewa'       => $value['lama_sewa'],
                                    'card_text_status'          => $value['status'],
                                    'card_text_tempat'          => $value['nama_tempat'],
                                    'card_text_paket'           => $value['paket'],
                                    'card_text_total'           => $value['total'],
                                    'card_text_jumlah_orang'    => $value['jumlah_orang'],
                                    'button_detail'             => $value['id_paket'],
                                    'button_bayar'              => $value['id_booking'],
                                    'detail_booking'            => $value['detail'],
                            )); ?>
                            </div>
                    
                    <?php
                        endforeach;
                    else : ?>
                        <h1 class="p-5">Tidak ada transaksi</h1>
                    <?php endif; ?>
                
                </div>

            </div>

            <div class="tab-pane fade my-3" id="proses" role="tabpanel" aria-labelledby="proses-tab">
                <div class="row">

                    <?php 
                    if(!empty($proses)) : 
                        foreach($proses as $valueProses): ?>

                            <div class="col-md-4 my-2">
                            <?php $this->load->view('frontend/@app-components/card/card-history', array(
                                'class'                     => 'text-warning',
                                'card_text_id_pesan'        => $valueProses['id_booking'],
                                'card_text_tanggal_pesan'   => $valueProses['tanggal_pesan'],
                                'card_text_tanggal_acara'   => $valueProses['tanggal_booking'],
                                'card_text_lama_sewa'       => $valueProses['lama_sewa'],
                                'card_text_status'          => $valueProses['status'],
                                'card_text_tempat'          => $valueProses['nama_tempat'],
                                'card_text_paket'           => $valueProses['paket'],
                                'card_text_total'           => $valueProses['total'],
                                'card_text_jumlah_orang'    => $valueProses['jumlah_orang'],
                                'button_detail'             => $valueProses['id_paket'],
                                'detail_booking'            => $valueProses['detail'],
                            )); ?>
                            </div>
                    
                    <?php endforeach;
                    else : ?>
                        <h1 class="p-5">Tidak ada transaksi</h1>
                    <?php endif; ?>

                </div>
            </div>

            <div class="tab-pane fade my-3" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                <div class="row">

                    <?php 
                    if(!empty($selesai)) : 
                        foreach($selesai as $valueSelesai): ?>

                            <div class="col-md-4 my-2">
                            <?php $this->load->view('frontend/@app-components/card/card-history', array(
                                'class'                     => 'text-success',
                                'card_text_id_pesan'        => $valueSelesai['id_booking'],
                                'card_text_tanggal_pesan'   => $valueSelesai['tanggal_pesan'],
                                'card_text_tanggal_acara'   => $valueSelesai['tanggal_booking'],
                                'card_text_lama_sewa'       => $valueSelesai['lama_sewa'],
                                'card_text_status'          => $valueSelesai['status'],
                                'card_text_tempat'          => $valueSelesai['nama_tempat'],
                                'card_text_paket'           => $valueSelesai['paket'],
                                'card_text_total'           => $valueSelesai['total'],
                                'card_text_jumlah_orang'    => $valueSelesai['jumlah_orang'],
                                'button_detail'             => $valueSelesai['id_paket'],
                                'detail_booking'            => $valueSelesai['detail'],
                            )); ?>
                            </div>
                    
                    <?php
                        endforeach;
                    else : ?>
                        <h1 class="p-5">Tidak ada transaksi</h1>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>