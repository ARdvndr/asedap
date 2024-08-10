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

    <div class="login">
        <div class="card">
            <div class="d-flex">
                <div class="card-body login__card-form">
                    <center>
                        <h3>Login</h3>
                    </center>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="d-flex flex-row justify-content-end align-items-center">
                            <div class="p-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body login__card-image login-image"></div>
            </div>
        </div>
    </div>
</body>

</html>