<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Files -->
    <link href="<?= base_url(); ?>assets/frontend/styles.less" rel="stylesheet/less" type="text/css" />

    <!-- JS Files -->
    <script src="<?= base_url(); ?>assets/bootstrap4/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap4/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap4/js/bootstrap.min.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/swiper/swiper-bundle.js"></script>
    <script src="<?= base_url(); ?>assets/swiper/swiper-bundle.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/less/less.js"></script>
    <script src="<?= base_url(); ?>assets/aos/aos.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <title>Aroma Cafe <?= "| " . $title; ?></title>
    
</head>

<body>

    <div class="wrapper">
        <?php $this->load->view('frontend/@app-components/partials/navbar'); ?>

        <?php if(!empty($background)): ?>
            <div class="aroma-header" style="background-image: url('<?= base_url($background) ?>');">
                <div class="aroma-header__content">
                    <?php if(!empty($header_text)): ?>
                        <div class='aroma-header__content-text'><?= $header_text; ?></div>
                    <?php endif ?>
                    <?php if(!empty($header_additional_text)): ?>
                        <div class='aroma-header__content-additional-text'><?= $header_additional_text; ?></div>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>

        <main class="container"></main>

        <?php $this->load->view('frontend/@app-components/partials/footer'); ?>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('main').html($('section'));
            AOS.init();
        })
    </script>

</body>

</html>