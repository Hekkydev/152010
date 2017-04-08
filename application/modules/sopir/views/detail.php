<?php $form = array('class'=>'form-horizontal') ?>
<div class="form-user">
<?php echo form_open('sopir/insert',$form); ?>
<?php
$IDhidden = array(
  'name'=>'id_sopir',
  'type'=>'hidden',
  'value'=>$sopir->id_sopir,

);
echo form_input($IDhidden);
?>

      <div class="row">
        <!-- /////////////////////////////////////////////////////////////////////////////// -->
        <div class="col-lg-12">
          <div class="form-group">
            <label for="" class="col-xs-3 control-label">Kode Sopir</label>
            <div class="col-xs-9">
              <input type="text" name="kode_sopir" value="<?php echo $sopir->kode_sopir ?>" class="form-control" readonly="">
            </div>
          </div>
          <div class="form-group">
            <label for=""  class="col-xs-3 control-label">Nama Sopir</label>
            <div class="col-xs-9">
                <input type="text" name="nama_sopir" value="<?php echo $sopir->nama_lengkap ?>" class="form-control" readonly="" placeholder="masukan nama lengkap">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-xs-3 control-label">No. Handphone</label>
            <div class="col-xs-9">
                <input type="text" name="no_hp" value="<?php echo $sopir->no_hp ?>" class="form-control" readonly="">
            </div>
          </div>


         <div class="form-group">
           <label for="" class="col-xs-3 control-label">No. KTP</label>
           <div class="col-xs-9">
             <input type="text" name="no_ktp" value="<?php echo $sopir->no_ktp ?>" class="form-control" readonly="" placeholder="masukan no KTP">
           </div>
         </div>
         <div class="form-group">
           <label for="" class="col-xs-3 control-label">No.SIM</label>
           <div class="col-xs-9">
             <input type="text" name="no_sim" value="<?php echo $sopir->no_sim ?>" class="form-control" readonly="">
           </div>
         </div>

        <div class="form-group">
          <label for="" class="col-xs-3 control-label">Alamat</label>
            <div class="col-xs-9">
                <textarea name="alamat_sopir" class="form-control" readonly="" placeholder="masukan alamat lengkap"><?php echo $sopir->alamat_sopir ?></textarea>
            </div>
        </div>


        <div class="form-group">
          <label for="" class="col-xs-3 control-label">Status</label>
          <div class="col-xs-9">
          <select class="form-control" name="id_status">
              <?php foreach ($status as $st): ?>
                  <?php if ($st->id_status == $sopir->id_status): ?>
                    <option value="<?php echo $sopir->id_status?>" selected=""><?php echo $sopir->tipe_status?></option>
                    <?php else: ?>
                    <option value="<?php echo $st->id_status?>"><?php echo $st->tipe_status?></option>
                  <?php endif; ?>
              <?php endforeach; ?>
          </select>
          </div>
        </div>

        <div class="col-sm-offset-3 col-sm-8 no-padding">
          <a   href="<?php echo site_url('sopir/')?>" class="btn bg-purple btn-outline btn-xs">KEMBALI</a>
          <a   href="<?php echo site_url('sopir/edit')."?sid=".$sopir->uuid_sopir; ?>" class="btn bg-purple  btn-xs">EDIT</a>
        </div> <!-- /col -->
      </div>

       <!-- /////////////////////////////////////////////////////////////////////////////// -->



      </div>
  <?php echo form_close(); ?>
</div>
