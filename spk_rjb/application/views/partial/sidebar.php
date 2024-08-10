<?php

$nav = array(
  0 => array(
    'url'   => base_url('Dashboard'),
    'title' => 'Dashboard',
    'icon' => 'home',
  ),
  1 => array(
    'url'   => base_url('Keluarga'),
    'title' => 'Keluarga',
    'icon' => 'address-card',
  ),
  2 => array(
    'url'   => base_url('Kriteria'),
    'title' => 'Kriteria',
    'icon' => 'list-ol',
  ),
  3 => array(
    'url'   => base_url('Penilaian'),
    'title' => 'Penilaian',
    'icon' => 'calculator',
  ),
);
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a href="#" class="brand-link">
    <!-- <img src="<?= base_url() ?>assets/dist/img/favicon.jpg" alt="Logo D'Rizq" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">SPK RJB</span>
  </a>

  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
        foreach ($nav as $n) {
          echo '
            <li class="nav-item">
              <a href="' . $n['url'] . '" class="nav-link">
                <i class="nav-icon far fas fa-'. $n['icon'] .'"></i>
                <p> ' . $n['title'] . '</p>
              </a>
            </li>
          ';
        }
        ?>

      </ul>
    </nav>

  </div>

</aside>