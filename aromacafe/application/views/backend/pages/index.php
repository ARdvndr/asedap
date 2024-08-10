<!-- This will load all view from master-layout -->
<?php $this->load->view('backend/@app-components/partials/master-layout', array(
    'title' => 'Dashboard'
)); ?>

<style>
    html {
        scroll-behavior: smooth;
    }

    section {
        min-height: 50vh;
    }
</style>

<!-- Must be initialize with id="renderContent" to send view into master-layout -->
<div id="renderContent">
    <div class="card">
        <div class="card-body">
            <section id="intro">
                <hr />
                <h5>Selamat Datang</h5>
                <hr />
            </section>

        </div>
    </div>
</div>