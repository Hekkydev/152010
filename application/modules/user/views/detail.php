<?php
$form = array('class'=>'form-horizontal');
$IDhidden = array('name'=>'id_user','type'=>'hidden','value'=>$users->uuid_user);
$kode_user = array('name'=>'kode_user','type'=>'hidden','value'=>$users->kode_user);
?>

<div class="form-user" style="padding:20px;">
<?php
echo form_open('user/entri',$form);
echo form_input($IDhidden);
echo form_input($kode_user);
?>
<div class="row">
  <!-- //////////////////////////////////////////////////////////////// -->
  <div class="col-lg-6">
      <legend>Data Karyawan</legend>

      <div class="form-group">
            <label for="" class="control-label col-xs-5">No.Reg Karyawan</label>
            <div class="col-xs-7">
              <input type="text" name="no_reg" value="<?php echo $users->no_reg; ?>" class="form-control input-sm" readonly="">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">No.KTP</label>
            <div class="col-xs-7">
              <input type="text" name="no_ktp" value="<?php echo $users->no_ktp ?>" class="form-control input-sm" readonly="">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Nama Lengkap</label>
            <div class="col-xs-7">
              <input type="text" name="nama_lengkap" value="<?php echo $users->nama_lengkap ?>" class="form-control input-sm" readonly="">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Alamat</label>
            <div class="col-xs-7">
              <textarea name="alamat_user" class="form-control input-sm" readonly=""><?php echo $users->alamat_user; ?></textarea>
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">No. Handphone</label>
            <div class="col-xs-7">
              <input type="text" name="no_hp" value="<?php echo $users->no_telp ?>" class="form-control input-sm" readonly="">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Email</label>
            <div class="col-xs-7">
              <input type="email" name="email" value="<?php echo $users->email ?>" class="form-control input-sm" readonly="">
            </div>
      </div>

  </div>
  <div class="col-lg-6">
      <legend>Data Login</legend>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Username</label>
            <div class="col-xs-7">
              <input type="text" name="username" value="<?php echo $users->username ?>" class="form-control input-sm" readonly="">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Password</label>
            <div class="col-xs-7">
              <input type="password" name="password" value="" class="form-control input-sm" readonly="">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Konfirmasi Password</label>
            <div class="col-xs-7">
              <input type="password" name="konfirmasi_password" value="" class="form-control input-sm" readonly="">
            </div>
      </div>
      <div class="form-group">
            <label for="" class="control-label col-xs-5">Cabang</label>
            <div class="col-xs-7">
              <select class="form-control input-sm" name="id_cabang" readonly="">
                <?php foreach ($cabang as $cb): ?>
                  <?php if ($cb->id_cabang == $users->id_cabang): ?>
                    <option  selected="" value="<?php echo $cb->id_cabang?>"><?php echo $cb->nama_kota.' - '.$cb->nama_cabang.' ('.$cb->kode_cabang.')'?></option>
                    <?php else: ?>
                      <option value="<?php echo $cb->id_cabang?>"><?php echo $cb->nama_kota.' - '.$cb->nama_cabang.' ('.$cb->kode_cabang.')'?></option>
                  <?php endif; ?>
                    <?php endforeach; ?>
              </select>
            </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label col-xs-5">Level Orotitas</label>
        <div class="col-xs-7">
            <select class="form-control input-sm" name="id_user_group" readonly="">
                <?php foreach ($otoritas as $ot): ?>
                    <?php if ($ot->id_user_group == $users->id_user_group): ?>
                      <option value="<?php echo $ot->id_user_group; ?>" selected=""><?php echo $ot->tipe_group; ?></option>
                      <?php else: ?>
                        <option value="<?php echo $ot->id_user_group; ?>"><?php echo $ot->tipe_group; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label col-xs-5">Status</label>
        <div class="col-xs-7">
          <select class="form-control input-sm" name="id_status">
              <?php foreach ($status as $st): ?>
                  <?php if ($st->id_status == $users->id_status): ?>
                    <option value="<?php echo $st->id_status?>" selected=""><?php echo $st->tipe_status?></option>
                    <?php else: ?>
                      <option value="<?php echo $st->id_status?>"><?php echo $st->tipe_status?></option>
                  <?php endif; ?>
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
              <a href="<?php echo site_url('user/');?>" class="btn btn-outline bg-purple btn-sm btn-block">Kembali</a>
        </div>
        <div class="col-lg-6">
                <a href="<?php echo site_url('user/edit?sid='.$users->uuid_user.'');?>" class="btn  bg-purple btn-sm btn-block">Edit</a>
        </div>

    </div>
  </div>
</div>
<?php echo form_close(); ?>
</div>
