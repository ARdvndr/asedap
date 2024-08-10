<div class="card"
    style="width: 20rem; border: 1px solid brown;">
    <div class="card-header">
        <div class="d-flex flex-column">
            <p>Tanggal Pesan: <?= $card_text_tanggal_pesan ?></p>
            <div class="row">
                <div class="col">
                    <p class="<?= $class; ?>">Status: <b><?= $card_text_status ?></b></p>
                </div>

                <?php if(!empty($button_bayar)) : ?>
                    <div class="col">
                        <button class="btn btn-sm btn-success"
                            data-toggle="modal"
                            data-target="#modalBayar<?= $button_bayar ?>">
                            <i class="fas fa fa-money-check"></i> Bayar
                        </button>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table>
            <tr>
                <td>ID Booking</td>
                <td width="2%">:</td>
                <td width="60%" style="text-align: right;"><?= $card_text_id_pesan ?></td>
            </tr>
            <tr>
                <td>Tanggal Acara</td>
                <td width="2%">:</td>
                <td width="60%" style="text-align: right;"><?= date('Y-m-d', strtotime($card_text_tanggal_acara)) ?></td>
            </tr>
            <tr>
                <td>Jam</td>
                <td width="2%">:</td>
                <td width="60%" style="text-align: right;"><?= date('H:i A', strtotime($card_text_tanggal_acara)) ?></td>
            </tr>
            <tr>
                <td>Total Biaya</td>
                <td width="2%">:</td>
                <td width="60%" style="text-align: right;"><b>Rp. <?= number_format($card_text_total) ?></b></td>
            </tr>
        </table>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalDetail<?= $button_detail ?>">
            More Details
        </button>

    </div>
</div>

<?php $this->load->view('frontend/@app-components/modals/modal') ?>
