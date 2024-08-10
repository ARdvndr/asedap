<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aroma Cafe - <?= $title; ?></title>

    <?php $this->load->view('backend/@app-components/partials/head') ?>
</head>

<body>

    <div class="wrapper">

        <?php $this->load->view('backend/@app-components/partials/sidebar'); ?>

        <main class="main-panel" id="main-panel">

            <?php $this->load->view('backend/@app-components/partials/navbar'); ?>

            <div class="panel-header panel-header-sm"></div>

            <div class="content"></div>

            <!-- Footer -->
            <?php $this->load->view('backend/@app-components/partials/footer') ?>
            <!-- End Footer -->
        </main>

    </div>


    <!-- Initialize -->
    <script type="text/javascript">
        $(document).ready(() => {
            $("#renderContent").appendTo(".content");
        })
    </script>
    <!-- End Initialize -->

    <!-- Alert -->
    <script>

        // Initialitazing Alertify
        alertify.defaults.transition = "slide";
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.defaults.theme.input = "form-control";
        alertify.set('notifier', 'position', 'top-right');

        <?php if (!empty($this->session->flashdata('errorLogin'))) { ?>
            alertify.error("<?php echo $this->session->flashdata('errorLogin'); ?>");
        <?php } else if (!empty($this->session->flashdata('success'))) { ?>
            alertify.success("<?php echo $this->session->flashdata('success'); ?>");
        <?php } else if (!empty($this->session->flashdata('error'))) { ?>
            alertify.error("<?php echo $this->session->flashdata('error'); ?>");
        <?php } ?>
    </script>
    <!-- End Alert -->

</body>

</html>