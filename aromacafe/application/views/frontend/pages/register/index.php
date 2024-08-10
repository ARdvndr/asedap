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
    <link href="<?= base_url(); ?>assets/bootstrap4/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/frontend/styles.less" rel="stylesheet/less" type="text/css" />

    <!-- JS Files -->
    <script src="<?= base_url(); ?>assets/bootstrap4/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap4/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap4/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/less/less.js"></script>

    <title>Aroma Cafe | Login</title>
</head>

<body class="register-body">

    <div class="card card-body register">
        <center>
            <h3>Customer Registration</h3>
        </center>
        <form class="my-5" action="register/new-user" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required>
            </div>
            <div class="form-group">
                <div class="d-flex row">
                    <div class="col-md-4">
                        <label for="nama">Jenis Kelamin</label>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="L" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="P">
                            <label class="form-check-label" for="exampleRadios2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" name="msisdn" placeholder="08xxx" class="form-control">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="Alamat anda" class="form-control" cols="20" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="d-flex flex-row justify-content-start align-items-center">
                <div class="p-2">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <div class="p-2">
                    <a href="home" class="btn btn-warning">Cancel</a>
                </div>
                <div class="p-2">
                    <p> Already have account? <a href="login" class="navlink">Login</a></p>
                </div>
            </div>
        </form>
    </div>

</body>


</html>