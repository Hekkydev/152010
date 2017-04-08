<?php echo $css_menu ?>
<div class="row" >
  <div class="col-lg-12">
    <div class="panel panel-body">
      <?php $this->load->view('menu/operasional_menu/page'); ?>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">

  <div class="col-lg-12">
    <div class="panel panel-body">
      <?php $this->load->view("pengumuman_pesan/page_load") ?>
    </div>
  </div>

</div>

<?php $this->load->view('pengumuman_pesan/script'); ?>
