<!-- <footer class="main-footer">
	<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.5
  </div>
</footer> -->

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