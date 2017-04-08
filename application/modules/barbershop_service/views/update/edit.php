<script src="<?php echo base_url()?>assets/js/app.min.js"></script>
<script src="<?php echo base_url()?>assets/js/custom.js"></script>
<?php
$form = array(
  'id'=>'form-add',
  'class'=>"form-horizontal",
  'method'=>'post',
);
  echo form_open('',$form);
?>

  <div class="form-group">
    <label for="" class="col-xs-4 control-label">Kode Service :</label>
    <div class="col-xs-5">
      <input type="text" name="kode_product" value="<?php echo $service->kode_service?>" readonly="" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-xs-4 control-label">Nama Pelayanan :</label>
    <div class="col-xs-5">
      <input type="text" name="name_service" class="form-control" value="<?php echo $service->name_service?>">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-xs-4 control-label">Biaya Pelayanan :</label>
    <div class="col-xs-5">
      <input type="text" name="price_service" class="form-control" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" value="<?php echo $service->harga_service?>">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-xs-4 control-label">Unit Cabang :</label>
    <div class="col-xs-5">
    <select class="form-control" name="unit_cabang">
      <option value="" selected="" disabled="">Pilih Cabang</option>
      <?php foreach ($cabang as $c): ?>
        <?php if ($service->uuid_cabang == $c->uuid_cabang): ?>
          <option value="<?php echo $c->uuid_cabang?>" selected=""> <?php echo strtoupper($c->nama_cabang) ?></option>
          <?php else: ?>
            <option value="<?php echo $c->uuid_cabang?>"> <?php echo strtoupper($c->nama_cabang) ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <label for="" class="col-xs-4 control-label">Status Aktif :</label>
    <div class="col-xs-5">
    <select class="form-control" name="status">
      <?php foreach ($status as $s): ?>
        <?php if ($s->id_status == $service->id_status): ?>
          <option value="<?php echo $s->id_status ?>" selected=""><?php echo $s->tipe_status ?></option>
          <?php else: ?>
            <option value="<?php echo $s->id_status ?>"><?php echo $s->tipe_status ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="col-xs-offset-4 col-xs-5">
    <hr>
    <div class="row">
      <div class="col-lg-6">
        <button type="button" name="simpan" onclick="simpan_service()" class="btn btn-md bg-purple btn-block">SIMPAN</button>
      </div>
      <div class="col-lg-6">
        <a href="<?php echo site_url('barbershop_service'); ?>" class="btn btn-md bg-purple btn-block btn-outline">KEMBALI</a>
      </div>
    </div>
  </div>
<?php echo form_close(); ?>

<?php $this->load->view('barbershop_service/script/script_edit'); ?>
