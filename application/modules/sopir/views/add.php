<?php $form = array('class'=>'form-horizontal') ?>
<div class="form-user">
  <?php echo form_open('sopir/insert',$form); ?>
      <div class="row">
        <!-- /////////////////////////////////////////////////////////////////////////////// -->
        <div class="col-lg-12">
          <div class="form-group">
            <label for="" class="col-xs-3 control-label">Kode Sopir</label>
            <div class="col-xs-9">
              <input type="text" name="kode_sopir" value="" class="form-control" required="">
            </div>
          </div>
          <div class="form-group">
            <label for=""  class="col-xs-3 control-label">Nama Sopir</label>
            <div class="col-xs-9">
                <input type="text" name="nama_sopir" value="" class="form-control" required="" placeholder="masukan nama lengkap">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-xs-3 control-label">No. Handphone</label>
            <div class="col-xs-9">
                <input type="text" name="no_hp" value="" class="form-control" required="">
            </div>
          </div>


         <div class="form-group">
           <label for="" class="col-xs-3 control-label">No. KTP</label>
           <div class="col-xs-9">
             <input type="text" name="no_ktp" value="" class="form-control" required="" placeholder="masukan no KTP">
           </div>
         </div>
         <div class="form-group">
           <label for="" class="col-xs-3 control-label">No.SIM</label>
           <div class="col-xs-9">
             <input type="text" name="no_sim" value="" class="form-control" required="">
           </div>
         </div>

        <div class="form-group">
          <label for="" class="col-xs-3 control-label">Alamat</label>
            <div class="col-xs-9">
                <textarea name="alamat_sopir" class="form-control" required="" placeholder="masukan alamat lengkap"></textarea>
            </div>
        </div>


        <div class="form-group">
          <label for="" class="col-xs-3 control-label">Status</label>
          <div class="col-xs-9">
          <select class="form-control" name="id_status">
              <?php foreach ($status as $st): ?>
                  <option value="<?php echo $st->id_status?>"><?php echo $st->tipe_status?></option>
              <?php endforeach; ?>
          </select>
          </div>
        </div>

        <div class="col-sm-offset-3 col-sm-8 no-padding">
          <a   href="<?php echo site_url('sopir/')?>" class="btn bg-purple btn-outline btn-xs">KEMBALI</a>
          <button type="submit" name="simpan" class="btn bg-purple  btn-xs" value="OK">SIMPAN</button>
        </div> <!-- /col -->
      </div>

       <!-- /////////////////////////////////////////////////////////////////////////////// -->



      </div>
  <?php echo form_close(); ?>
</div>
