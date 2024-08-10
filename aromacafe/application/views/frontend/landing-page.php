<?php

$this->load->view('frontend/@app-components/partials/master-layout', array(
    'title'         => 'Landing Page',
    'header_text'   => 'Relax and Enjoy Every Moments',
));

function listMenu($params = [])
{
    $list = "Detail: <ul>";
    foreach ($params as $value) {
        $list .= "<li>$value[nama_makanan]</li>";
    }
    $list .= "</ul>";

    return $list;
}

function cardBody(string $text, string $price, $list = [])
{
    $price = number_format($price);
    $body = "
    <div class='d-flex flex-row justify-content-between'>
        <div><h4>$text</h4></div>
        <div><h6><b>Rp. $price</h6></b></div>
    </div>";
    $body .= listMenu($list);

    return $body;
}

?>

<section>
    <div class="my-5">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <div class="col-md col-lg col-sm text-muted"></div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <h1>Aroma's Cafe Catalogues</h1>
                <h6>This is a catalogue about our places and menus</h6>
            </div>
        </div>

        <div class="my-5">
            <h1 data-aos="fade-right" data-aos-duration="1000">Our Available Spot</h1>
            <div class="d-flex justify-content-start">
                <div class="row justify-content-center">
                    <?php foreach ($tempat as $value) : ?>
                        <div class="col-md-5" data-aos="flip-right" data-aos-offset="300" data-aos-duration="1000">
                            <?php
                            $this->load->view('frontend/@app-components/card/custom-card', array(
                                'class'                 => 'aroma-card-catalogue',
                                'card_name_spot'        => $value['nama_tempat'],
                                'card_image_spot'       => 'assets/img/tempat/' . $value['foto_tempat'],
                                'card_text_spot'        => $value['deskripsi'],
                                'card_button_spot'      => 'spot/detail/' . $value['id_tempat'],
                                'card_button_booking'   => 'booking/spot/' . $value['id_tempat'],
                            ));
                            ?>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="my-5">
            <h1>Our Available Menus</h1>

            <div class="row mt-5">
                <div class="col-2">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <?php foreach ($jenis['jenis'] as $key => $value) : ?>
                            <a class="nav-link <?= $key === 0 ? 'active' : ''; ?>" id="v-pills-<?= $value ?>-tab" data-toggle="pill" href="#v-pills-<?= $value ?>" role="tab" aria-controls="v-pills-<?= $value ?>" aria-selected="true"><?= $value; ?> Food
                            </a>
                        <?php endforeach ?>

                    </div>
                </div>
                <div class="col-10">

                    <div class="tab-content" id="v-pills-tabContent">
                        <?php foreach ($jenis['jenis'] as $key => $value) : ?>
                            <div class="tab-pane fade <?= $key === 0 ? 'show active' : ''; ?>" id="v-pills-<?= $value ?>" role="tabpanel" aria-labelledby="v-pills-<?= $value ?>-tab">
                                <div class="row">
                                    <?php foreach ($paket as $pkt) : ?>

                                        <?php if ($pkt['jenis'] === $value) : ?>
                                            <div class="col-md mt-0 mb-2">
                                                <div class="card aroma-card-menus">
                                                    <div class="swiper-container">
                                                        <div class="swiper-wrapper">
                                                            <?php foreach ($pkt['detail'] as $img) : ?>
                                                                <div class="swiper-slide">
                                                                    <div class="swiper-lazy">
                                                                        <img src="<?= base_url('assets/img/makanan/' . $img['foto_makanan']) ?>" alt="" class="swiper-lazy">
                                                                        <div class="swiper-lazy-preloader"></div>
                                                                    </div>

                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <!-- Add Pagination -->
                                                        <!-- <div class="swiper-pagination"></div> -->
                                                    </div>
                                                    <div class="card-body aroma-card-menus__body text-light">
                                                        <?= cardBody($pkt['nama'], $pkt['harga'], $pkt['detail']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>


                                    <?php endforeach; ?>

                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script type="text/javascript">
    $(document).ready(function() {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            lazy: true,
            loop: true,
            effect: 'fade',
            observer: true,
            centeredSlides: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

    })
</script>