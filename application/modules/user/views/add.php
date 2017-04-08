<?php
$this->load->view('User/script_insert');
$form = array('class'=>'form-horizontal','id'=>'form-user','onSubmit'=>'return validasi()');
$IDhidden = array('name'=>'id_user','type'=>'hidden','value'=>'');
?>

<div class="form-user" style="padding:20px;">
<?php
echo form_open('user/entri',$form);
echo form_input($IDhidden);
?>
<div class="row">
  <!-- //////////////////////////////////////////////////////////////// -->
  <div class="col-lg-6">
      <legend>Data Karyawan</legend>
      <input type="hidden" name="kode_user" value="<?php echo $kode_user?>" class="form-control input-sm" readonly="">

      <div class="form-group">
            <label for="" class="control-label col-xs-5">No.Reg Karyawan</label>
            <div class="col-xs-7">
              <input type="text" name="no_reg"  class="form-control input-sm" >
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">No.KTP</label>
            <div class="col-xs-7">
              <input type="text" name="no_ktp" value="" class="form-control input-sm">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Nama Lengkap</label>
            <div class="col-xs-7">
              <input type="text" name="nama_lengkap" value="" class="form-control input-sm" >
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Alamat</label>
            <div class="col-xs-7">
              <textarea name="alamat_user" class="form-control input-sm"></textarea>
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">No. Handphone</label>
            <div class="col-xs-7">
              <input type="text" name="no_hp" value="" class="form-control input-sm">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Email</label>
            <div class="col-xs-7">
              <input type="email" name="email" value="" class="form-control input-sm" >
            </div>
      </div>

  </div>
  <div class="col-lg-6">
      <legend>Data Login</legend>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Username</label>
            <div class="col-xs-7">
              <input type="text" name="username" value="" class="form-control input-sm">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Password</label>
            <div class="col-xs-7">
              <input type="password" name="password" value="" class="form-control input-sm">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Konfirmasi Password</label>
            <div class="col-xs-7">
              <input type="password" name="konfirmasi_password" value="" class="form-control input-sm">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Cabang</label>
            <div class="col-xs-7">
              <select class="form-control input-sm" name="id_cabang">
                <?php foreach ($cabang as $cb): ?>
                  <option value="<?php echo $cb->id_cabang?>"><?php echo $cb->nama_kota.' - '.$cb->nama_cabang.' ('.$cb->kode_cabang.')'?></option>
                <?php endforeach; ?>
              </select>
            </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label col-xs-5">Level Orotitas</label>
        <div class="col-xs-7">
            <select class="form-control input-sm" name="id_user_group">
                <?php foreach ($otoritas as $ot): ?>
                    <option value="<?php echo $ot->id_user_group; ?>"><?php echo $ot->tipe_group; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label col-xs-5">Status</label>
        <div class="col-xs-7">
          <select class="form-control input-sm" name="id_status">
              <?php foreach ($status as $st): ?>
                  <option value="<?php echo $st->id_status?>"><?php echo $st->tipe_status?></option>
              <?php endforeach; ?>
          </select>
        </div>
      </div>

  </div>
  <!-- /////////////////////////////////////////////////////////////// -->
  <div class="col-sm-offset-2 col-lg-8 no-padding col-center">
    <hr>
    <div class="row">
        <div class="col-lg-6">
              <a href="#" class="btn btn-outline bg-purple btn-sm btn-block">Kembali</a>
        </div>
        <div class="col-lg-6">
              <button type="submit" name="simpan" value="OK" class="btn btn-sm bg-purple btn-block">Simpan</button>
        </div>

    </div>
  </div>
</div>
<?php echo form_close(); ?>
</div>
