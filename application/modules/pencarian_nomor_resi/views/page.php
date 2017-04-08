<?php echo $css_menu; ?>

<div class="row" >
  <div class="col-lg-12">
    <div class="panel panel-body">
      <?php $this->load->view('menu/operasional_menu/page'); ?>
    </div>
  </div>
</div>
<div class="clearfix"></div>

<div class="row" style="margin-top:-20px;">
  <div class="col-xs-offset-4 col-lg-4 col-xs-offset-4" align="center">
    <div class="input-group input-pencarian" style="padding-top: 35px; padding-bottom:33px;">
      <input type="text" class="form-control" id="pencarian_nomor_resi" placeholder="masukan telp pengirim / resi tiket">
        <div class="input-group-addon click" onclick="pencarian_nomor()"><i class="fa fa-search"></i></div>
    </div> <!-- /input-group -->
    <p>Cari Nomor Handphone /  Resi Tiket</p>
  </div>
</div>
<div class="row" id="data_nomor_resi">
</div>

<?php $this->load->view('script'); ?>
