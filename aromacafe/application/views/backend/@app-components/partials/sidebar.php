<?php
$nav = array(
    0 => array(
        'title' => 'dashboard',
        'icon' => 'design_app'
    ),
    1 => array(
        'title' => 'makanan',
        'icon' => 'education_agenda-bookmark'
    ),
    2 => array(
        'title' => 'paket',
        'icon' => 'design_bullet-list-67'
    ),
    3 => array(
        'title' => 'tempat',
        'icon' => 'location_pin'
    ),
    4 => array(
        'title' => 'booking',
        'icon' => 'ui-1_calendar-60'
    ),
    5 => array(
        'title' => 'customer',
        'icon' => 'users_circle-08'
    ),
    6 => array(
        'title' => 'logout',
        'icon' => 'sport_user-run'
    ),
);

$uri = $this->uri->segment_array();
?>

<div class="sidebar" data-color="brown">
    <!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
    <div class="logo">
        <a href="<?= base_url('admin') ?>" class="simple-text logo-normal font-weight-bold">
            Aroma Cafe
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <?php foreach ($nav as $n) { ?>
                <li class="<?php if ($n['title'] == $uri[2]) echo "active" ?>">
                    <a href="<?= base_url('admin/' . $n['title'])  ?>">
                        <i class="now-ui-icons <?= $n['icon'] ?>"></i>
                        <p><?= $n['title'] ?></p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<script>
    $(function() {
        $('.nav a').click(function() {
            $(this).parent().addClass('active').siblings().removeClass('active')
        })
    })
</script>