<br><br>
<style media="screen">
  .panel-heading{
    border-bottom: 1px solid purple;
    background: #DDD;
    color:purple;
  }
</style>
<?php $this->load->view('template_part_global/breadcrumbs'); ?>

<div class="clearfix"></div>
<div class="row">
  <div class="col-lg-6">
    <?php include 'page_add_jurusan.php'; ?>
  </div>

  <div class="col-lg-6">
    <div class="row">
      <div class="col-lg-12">
        <?php include 'page_add_tiket.php'; ?>
      </div>
      <div class="col-lg-12">
        <?php include 'page_add_bop.php'; ?>
      </div>
      <div class="col-lg-12">
        <?php include 'page_add_non_bop.php'; ?>
      </div>
      <div class="col-lg-12">
        <?php include 'page_add_cargo.php'; ?>
      </div>

    </div>
  </div>
</div>
<?php include 'page_add_script.php'; ?>
