<?php echo $css_menu; ?>
<?php echo $loading; ?>
<?php echo style_loading(); ?>
<div class="row" >
  <div class="col-lg-12">
    <div class="panel panel-body">
      <?php $this->load->view('menu/operasional_menu/page'); ?>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<!-- /////////////////////////////////////////////////////////////////// -->



<div class="row">
  <div class="col-lg-3">
    <?php include 'jurusan.php'; ?>
  </div>
  <div class="col-lg-6">
    <?php include 'jadwal.php'; ?>
  </div>
  <div class="col-lg-3">
    <?php include 'checkout.php'; ?>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-lg-12 manifest">
    <?php include 'manifest.php'; ?>
  </div>
  <div class="col-lg-12 cetak_tiket">
    <?php include 'cetak_tiket.php'; ?>
  </div>
</div>
<?php include 'script/script_page.php'; ?>
