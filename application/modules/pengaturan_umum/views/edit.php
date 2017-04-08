<?php
  $form = array('method'=>'post');
  $UUID = array('type'=>'hidden','value'=>$comp->ID_company,'name'=>'ID');
 ?>
<div class="form">
  <?php echo form_open('pengaturan/pengaturanumum/update',$form) ?>
    <?php echo form_input($UUID); ?>
      <div class="row">
        <!-- /////////////////////////////////////////////////////////////////////////////// -->
        <div class="col-lg-6">
          <div class="form-group">
            <label for="">Nama Perusahaan</label>
            <input type="text" name="nama_company" value="<?php echo $comp->nama_company?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Alamat Perusahaan</label>
            <textarea name="alamat_company" class="form-control"><?php echo $comp->alamat_company?></textarea>
          </div>
          <div class="form-group">
            <label for="">Telp. Perusahaan</label>
            <input type="text" name="telp_company" value="<?php echo $comp->telp_company?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Email Perusahaan</label>
            <input type="text" name="email_company" value="<?php echo $comp->email_company?>" class="form-control">
          </div>
       </div>
       <div class="col-lg-6">
         <div class="form-group">
           <label for="">Fax</label>
           <input type="text" name="fax_company" value="<?php echo $comp->fax_company?>" class="form-control">
         </div>

         <div class="form-group">
           <label for="">Website Perusahaan</label>
           <input type="text" name="web_company" value="<?php echo $comp->web_company?>" class="form-control">
         </div>
      </div>
      <div class="clearfix"></div>
      <hr>
       <!-- /////////////////////////////////////////////////////////////////////////////// -->
       <div class="col-xs-offset-3 col-lg-6">
          <button type="submit" name="update" value="OK" class="btn btn-md btn-block bg-purple">Simpan</button>
       </div>
      </div>
  <?php echo form_close(); ?>
</div>
