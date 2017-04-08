<?php echo $css_menu; ?>
<?php echo $loading; ?>
<?php echo style_loading(); ?>

<!-- ///////////////////MENU/////////////////////////////////////////////////// -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-body">
      <?php $this->load->view('menu/operasional_menu/page'); ?>
    </div>
  </div>
</div>

<!-- ////////////////////ENDMENU/////////////////////////////////////////////// -->



<!-- ///////////////////PAGE SHEET /////////////////////////////////////////// -->
<div class="row" >
      <div class="col-lg-3">
            <?php include 'jurusan/jurusan.php'; ?>
      </div>
      <div class="col-lg-6">
            <?php include 'jadwal/jadwal.php'; ?>
      </div>
      <div class="col-lg-3">
            <?php include 'checkout/checkout.php'; ?>
      </div>
</div>
<!-- ///////////////////PAGE SHEET /////////////////////////////////////////// -->





<!-- CETAK-TIKET  -->
<?php include 'checkout/modal-cetak-tiket.php';?>
<?php include 'jadwal/manifest_cetak.php'; ?>

<!-- SCRIPT LOAD -->
<?php
include 'inc_script/script_page.php';
include 'inc_script/script_reservasi.php';
?>

<!-- SCRIPT LOAD -->
