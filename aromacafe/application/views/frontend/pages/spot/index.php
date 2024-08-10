<?php
$this->load->view('frontend/@app-components/partials/master-layout', array(
    'title' => 'Spot',
));

$path = $tempat[0]['foto_tempat'];
?>

<section>
    <div class="d-flex justify-content-between align-items-center my-5">
        <div class="col spot-image">
            <img src="<?= base_url("assets/img/tempat/$path"); ?>" alt="my pictures" class="img-fluid">
        </div>
        <div class="col-md-4">
            <h1>Spot <?= $tempat[0]['nama_tempat'] ?></h1>
            <hr>
            <br/>
            <h4><?= $tempat[0]['deskripsi'] ?></h4>
            <div class="back-button">
                <a class="btn aroma-nav-link" style="background-color: brown;" href="<?= base_url()?>">
                    <i class="fas fa fa-chevron-left"></i> Back To Home
                </a>
                <a class="btn aroma-nav-link btn-success" href="<?= base_url('booking/spot/'. $tempat[0]['id_tempat'])?>">
                    Pesan
                </a>
            </div>
        </div>
    </div>
    
</section>
