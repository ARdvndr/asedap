<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK RJB</title>
  <link rel="shortcut icon" href="<?= base_url('assets/dist/img/favicon.png'); ?>" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/buttons.datatables.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <!-- jQuery -->
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>assets/plugins/datatables/datatables.min.js"></script>

  <!-- <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> -->
  <!-- <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> -->
  <!-- <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->

  <script src="<?= base_url() ?>assets/plugins/datatables/datatables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
  
  <!-- Sweetalert -->
  <script src="<?= base_url() ?>assets/plugins/sweetalert2/swal.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php
    $this->load->view('partial/navbar');
    $this->load->view('partial/sidebar');
    ?>