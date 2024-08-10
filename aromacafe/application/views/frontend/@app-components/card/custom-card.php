<div class="card <?= !empty($class) ?  $class : ''; ?>">
    <img src="<?= base_url($card_image_spot) ?>" alt="Card image cap">
    <div class="card-body aroma-card-catalogue__body">
        <div class="d-flex flex-column aroma-card-catalogue__card-text">
            
            <h4><?= $card_name_spot; ?></h4>
            <br/>

            <h6>
                <?= strlen($card_text_spot) >= 30 ? substr($card_text_spot, 0, 30).'...' : $card_text_spot; ?>
            </h6>
            <br/>

            <div class="row">
            
                <?php if (!empty($card_button_spot)) : ?>
                    <div class="col">
                        <a class="btn aroma-nav-link"
                            href="<?= $card_button_spot ?>"
                            style="background-color: brown;">
                            Detail
                        </a>
                    </div>
                <?php endif; ?>

                <?php if (!empty($card_button_booking)) : ?>
                    <div class="col">
                        <a class="btn aroma-nav-link btn-success"
                            href="<?= $card_button_booking ?>">
                            Pesan
                        </a>
                    </div>
                <?php endif; ?>
            
            </div>

        </div>
    </div>
</div>
