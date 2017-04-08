<?php echo $css_menu; ?>
<?php echo $loading; ?>
<?php echo style_loading(); ?>
<div class="row">
  <div class="col-lg-12">
      <div class="panel panel-body">
        <?php $this->load->view('menu/operasional_menu/page'); ?>
      </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-lg-3">
  <?php include 'entri/entri_outlet.php'; ?>
  </div>
  <div class="col-lg-5">
    <?php //include 'entri/entri_service.php'; ?>
  </div>
  <div class="col-lg-4">
    <?php include 'entri/entri_customer.php'; ?>
    <?php include 'entri/entri_service.php'; ?>
    <?php include 'entri/entri_bill.php'; ?>

  </div>
</div>
