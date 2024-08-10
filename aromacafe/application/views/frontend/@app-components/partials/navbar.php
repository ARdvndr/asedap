<nav class="navbar aroma-navbar navbar-expand-lg navbar-light sticky-top">
    <a class="aroma-navbar-brand navbar-brand" href="home">Aroma Cafe</a>
    <button class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mr-auto" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="aroma-nav-link nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="aroma-nav-link nav-link" href="<?= base_url('about') ?>">Tentang</a>
            </li>
            <li class="nav-item">
                <a class="aroma-nav-link nav-link" href="<?= base_url('booking'); ?>">Pemesanan</a>
            </li>
            <li class="nav-item">

                <?php if ($this->session->has_userdata('login')) :  ?>

                    <div class="dropdown show">
                        <a class="text-light btn aroma-nav-link dropdown-toggle"
                            href="#"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            Hi, <?= $this->session->userdata('name'); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('booking/history'); ?>">Booking History</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a>
                        </div>
                    </div>

                <?php else : ?>

                    <a class="aroma-nav-link nav-link" href="<?= base_url('/login') ?>">Login</a>

                <?php endif ?>
            </li>
        </ul>
    </div>
</nav>