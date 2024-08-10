<div class="modal fade" id="modalDetail<?= $button_detail ?>"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: brown;">
                <h5 class="modal-title text-light" id="exampleModalLabel">Detail Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column font-weight-bold">
                    <div class="row">
                        <div class="col-4">Tanggal Acara</div>
                        <div class="col-2">:</div>
                        <div class="col"><?= date('Y-m-d', strtotime($card_text_tanggal_acara)) ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4">Lama Sewa</div>
                        <div class="col-2">:</div>
                        <div class="col"><?= $card_text_lama_sewa ?> Jam</div>
                    </div>
                    <div class="row">
                        <div class="col-4">Jam Mulai</div>
                        <div class="col-2">:</div>
                        <?php 
                            $hours = date('H', strtotime($card_text_tanggal_acara))+ $card_text_lama_sewa; 
                            $minutes = date('i', strtotime($card_text_tanggal_acara));
                            $hours > 24 ? $until = "00:$minutes" : $until = $hours.':'.$minutes;
                        ?>
                        <div class="col"><?= date('H:i', strtotime($card_text_tanggal_acara)).' - '.$until; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4">Jumlah</div>
                        <div class="col-2">:</div>
                        <div class="col"><?= $card_text_jumlah_orang ?> Orang</div>
                    </div>
                    <div class="row">
                        <div class="col-4">Paket</div>
                        <div class="col-2">:</div>
                        <div class="col"><?= $card_text_paket ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4">Makanan</div>
                        <div class="col-2">:</div>
                        <div class="col">
                            <ul>
                                <?php foreach($detail_booking as $makanan): ?>
                                    <li><?= $makanan['nama_makanan'] ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Total</div>
                        <div class="col-2">:</div>
                        <div class="col">Rp. <?= number_format($card_text_total) ?></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

</div>

<?php if(!empty($button_bayar)) : ?>
    <div class="modal fade" id="modalBayar<?= $button_bayar ?>"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: brown;">
                    <h5 class="modal-title text-light" id="exampleModalLabel">Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('booking/payment') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_booking" value="<?= $button_bayar ?>">
                        <div class="form-group">
                            <label for="bukti-bayar">Foto Bukti Pembayaran</label>
                            <input type="file" class="form-control" name="bukti_bayar" id="bukti-bayar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>

    </div>

<?php endif; ?>
