<?php $form = array('class'=>'form-horizontal') ?>
<div class="form-cabang">
<?php echo form_open('cabang/update',$form) ?>
<?php
$IDhidden = array(
        'type'  => 'hidden',
        'name'  => 'id_cabang',
        'value' => $cabang->uuid_cabang
);
echo form_input($IDhidden);?>

    <div class="row">
      <div class="col-lg-12">
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Kode Cabang</label>
            <div class="col-sm-9">
              <input type="text" name="kode_cabang" value="<?php echo $cabang->kode_cabang;?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Nama Cabang</label>
            <div class="col-sm-9">
              <input type="text" name="nama_cabang" value="<?php echo $cabang->nama_cabang;?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Alamat Cabang</label>
            <div class="col-sm-9">
              <textarea name="alamat_cabang"  class="form-control"><?php echo $cabang->alamat_cabang;?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Kota</label>
            <div class="col-sm-9">
              <select class="form-control" name="kota">

                  <?php foreach ($kota as $k): ?>
                      <?php if ($k->uuid_kota == $cabang->uuid_kota): ?>
                      <option value="<?php echo $cabang->uuid_kota?>" selected=""><?php echo $cabang->nama_kota ?></option>
                      <?php else: ?>
                        <option value="<?php echo $k->uuid_kota?>"><?php echo $k->nama_kota ?></option>
                      <?php endif; ?>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">No. Telephone</label>
            <div class="col-sm-9">
              <input type="text" name="no_telp_cabang" value="<?php echo $cabang->no_telp_cabang;?>" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Fax </label>
            <div class="col-sm-9">
              <input type="text" name="fax_cabang" value="<?php echo $cabang->fax_cabang;?>" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Tipe Cabang</label>
            <div class="col-sm-9">
              <select class="form-control" name="tipe_cabang">
                <?php foreach ($cabang_tipe as $ct): ?>
                  <?php if ($ct->id_cabang_tipe == $cabang->id_cabang_tipe): ?>
                      <option value="<?php echo $cabang->id_cabang_tipe;?>" selected=""><?php echo $cabang->tipe_cabang;?></option>
                    <?php else: ?>
                      <option value="<?php echo $ct->id_cabang_tipe;?>"><?php echo $ct->tipe_cabang;?></option>
                    <?php endif; ?>
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
