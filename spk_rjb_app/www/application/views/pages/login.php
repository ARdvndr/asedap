<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK RJB</title>
    <link rel="shortcut icon" href="<?= base_url('assets/dist/img/favicon.png'); ?>" type="image/x-icon">

    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif !important;
            background-image: linear-gradient(to right, #8693ab, #bdd4e7);
            width: 100%;
        }
    </style>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/swal.min.js"></script>
</head>

<body>
    <div class="container-fluid my-5 mx-0 text-center">
        <div class="row">
            <div class="col-md-12 my-2">
                <h1>Sistem Pendukung Keputusan</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 py-5">
                <div class="card col-6 mx-auto" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" name="submit" type="submit">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="<?= base_url() ?>assets/dist/img/favicon.png" width="500px" alt="Logo">
            </div>
        </div>
    </div>

    <script lang="javascript">
        <?php if (!empty($this->session->flashdata('error'))) { ?>
            swal("Kesalahan!", "<?= $this->session->flashdata('error'); ?>", "error");
            <?php $this->session->unset_userdata('error'); ?>
        <?php } else if (!empty($this->session->flashdata('sukses'))) { ?>
            swal("Berhasil!", "<?= $this->session->flashdata('sukses'); ?>", "success");
            <?php $this->session->unset_userdata('sukses'); ?>
        <?php } ?>
    </script>

</body>

</html>