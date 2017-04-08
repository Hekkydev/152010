<?php $form = array('class'=>'form-horizontal') ?>
<div class="form-cabang">
  <?php echo form_open('cabang/insert',$form) ?>
    <div class="row">
      <div class="col-lg-12">
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Kode Cabang</label>
            <div class="col-sm-9">
              <input type="text" name="kode_cabang" value="" class="form-control" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Nama Cabang</label>
            <div class="col-sm-9">
              <input type="text" name="nama_cabang"  class="form-control" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Alamat Cabang</label>
            <div class="col-sm-9">
              <textarea name="alamat_cabang"  class="form-control" required=""></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Kota</label>
            <div class="col-sm-9">
              <select class="form-control" required="" name="kota">
                  <option value="0" selected="" disabled="">Pilih kota</option>
                  <?php foreach ($kota as $k): ?>
                      <option value="<?php echo $k->uuid_kota?>"><?php echo $k->nama_kota ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">No. Telephone</label>
            <div class="col-sm-9">
              <input type="text" name="no_telp_cabang" value="" class="form-control" required="">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Fax </label>
            <div class="col-sm-9">
              <input type="text" name="fax_cabang" value="" class="form-control" required="">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Tipe Cabang</label>
            <div class="col-sm-9">
              <select class="form-control" required="" name="tipe_cabang">
                <?php foreach ($cabang_tipe as $ct): ?>
                  <option value="<?php echo $ct->id_cabang_tipe;?>"><?php echo $ct->tipe_cabang;?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-sm-offset-3 col-sm-8 no-padding">
            <a   href="<?php echo site_url('cabang/')?>" class="btn bg-purple btn-outline btn-xs">KEMBALI</a>
            <button type="submit" name="simpan" class="btn bg-purple  btn-xs" value="OK">SIMPAN</button>
          </div> <!-- /col -->
      </div>
    </div>

<?php echo form_close(); ?>
</div>
