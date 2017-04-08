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
<div class="row">
  <div class="col-lg-4">
    <?php include 'entri\entri.php'; ?>
  </div>
  <div class="col-lg-4">
    <?php include 'entri\entri.php'; ?>
  </div>
  <div class="col-lg-4">
    <?php include 'entri\entri.php'; ?>
  </div>
</div>
