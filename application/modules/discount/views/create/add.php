<script src="<?php echo base_url()?>assets/js/app.min.js"></script>
<script src="<?php echo base_url()?>assets/js/custom.js"></script>
<?php
$form = array(
  'id'=>'form-add-diskon',
  'class'=>'form-horizontal',
);

echo form_open('discount/entri',$form);
?>

<div class="form-group">
  <label for="" class="control-label col-xs-4">Tarif Discount</label>
  <div class="col-xs-6">
      <input type="text" name="tarif" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" class="form-control">
  </div>
</div>

<div class="form-group">
  <label for="" class="control-label col-xs-4">Informasi Discount</label>
  <div class="col-xs-6">
      <input type="text" name="informasi"  placeholder="keterangan" class="form-control" required="">
  </div>
</div>

<div class="form-group">
  <label for="" class="control-label col-xs-4">Jenis Operasional</label>
  <div class="col-xs-6">
    <select class="form-control" name="jenis">
      <option value="" selected="" disabled="">Pilih Jenis Operasional</option>
      <option value="shuttle">Shuttle</option>
      <option value="paket">Paket</option>
      <option value="carter">Carter</option>
      <option value="pangkas-rambut">Pangkas Rambut</option>
    </select>
  </div>
</div>
<div class="form-group">
  <div class="col-xs-offset-2 col-xs-8">
    <br><br>
    <hr>
    <div class="row">
      <div class="col-xs-6">
        <button type="button" name="simpan" value="OK" class="btn btn-md bg-purple btn-block" onclick="simpan_tarif()">SIMPAN</button>
      </div>
      <div class="col-xs-6">
        <a href="<?php echo site_url('operasional/discount')?>" class="btn btn-md bg-purple btn-block btn-outline">KEMBALI</a>
      </div>
    </div>
  </div>
</div>

<?php echo form_close(); ?>

<?php $this->load->view('discount/script/script_add') ?>
