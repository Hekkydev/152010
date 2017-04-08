<?php
$form = array('onClick'=>'searchData()','id'=>'form-search','method'=>'get');
echo form_open('penjadwalan_kendaran/search',$form);
?>

<div class="row" style="margin-bottom:30px;">
  <div class="col-lg-3">
    <div class="form-group">
      <label for="">Tanggal</label>
      <input type="text" name="tgl_setup" value="<?php echo date('Y-m-d')?>" class="form-control" id="datepicker" placeholder="<?php echo date('d/m/Y')?>" readonly="">
    </div>
  </div>
  <div class="col-lg-3">
    <div class="form-group">
      <label for="">Cabang Asal</label>
      <select class="form-control" name="asal_cabang">
        <option value="" selected="" disabled="">Pilih Asal</option>
        <?php foreach ($kota as $kt): ?>
            <optgroup label="<?php echo $kt->nama_kota?>">
                <?php foreach (Cabang_helper($kt->uuid_kota)->result() as $cb): ?>
                    <option value="<?php echo $cb->uuid_cabang?>"><?php echo $cb->nama_cabang; ?></option>
                <?php endforeach; ?>
            </optgroup>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="form-group">
      <label for="">Cabang Tujuan</label>
      <select class="form-control" name="tujuan_cabang">

      </select>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="form-group">
      <label for="">&nbsp;</label>
    <button class="<?php echo $button?> btn-block" type="button"><i class="fa fa-search"></i> CARI DATA</button>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
