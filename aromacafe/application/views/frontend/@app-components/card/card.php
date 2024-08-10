<div class="card"
    style="width: 25rem;min-height: 18rem; border: 1px solid brown;">


    <?php if (!empty($card_image)) : ?>
        <div class="swiper-container <?= $card_id; ?>">
            <div class="swiper-wrapper">

                <?php foreach($card_image as $foto): ?>
                    <div class="swiper-slide">
                        <img class="img-fluid"
                            src="<?= base_url('assets/img/makanan/'.$foto['foto_makanan']) ?>"
                            alt="Card image cap"
                            width="50" />
                    </div>
                <?php endforeach;?>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    <?php endif?>

    <div class="card-body">
        <p class="card-text">
            <?= $card_text; ?>
        </p>

    </div>
</div>


<script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
        // spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
