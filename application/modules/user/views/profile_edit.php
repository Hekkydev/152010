<style media="screen">
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
  background-color: #fff;
  opacity: 1;
}
</style>
<div class="form-profile" style="margin-top:10px;margin-bottom:50px;">
  <form class="form-horizontal">
      <div class="row">
        <div class="col-lg-12">
          <legend >Data Informasi Profile</legend>
          <div class="form-group">
                <label for="" class="control-label col-xs-3">Kode User </label>
                <div class="col-xs-8">
                  <input type="text" name="" value="<?php echo $usersLog->kode_user;?>" class="form-control input-sm"   >
                </div>
          </div>
          <div class="form-group">
                <label for="" class="control-label col-xs-3">Nama Lengkap </label>
                <div class="col-xs-8">
                  <input type="text" name="" value="<?php echo $usersLog->nama_lengkap;?>" class="form-control input-sm"   >
                </div>
          </div>
          <div class="form-group">
                <label for="" class="control-label col-xs-3">No.Reg Karyawan </label>
                <div class="col-xs-8">
                  <input type="text" name="" value="<?php echo $usersLog->no_reg;?>" class="form-control input-sm"   >
                </div>
          </div>
          <div class="form-group">
                <label for="" class="control-label col-xs-3">No.KTP </label>
                <div class="col-xs-8">
                  <input type="text" name="" value="<?php echo $usersLog->no_ktp;?>" class="form-control input-sm"   >
                </div>
          </div>
          <div class="form-group">
                <label for="" class="control-label col-xs-3">No.Handphone </label>
                <div class="col-xs-8">
                  <input type="text" name="" value="<?php echo $usersLog->no_ktp;?>" class="form-control input-sm"   >
                </div>
          </div>
          <div class="form-group">
                <label for="" class="control-label col-xs-3">Email </label>
                <div class="col-xs-8">
                  <input type="text" name="" value="<?php echo $usersLog->email;?>" class="form-control input-sm"   >
                </div>
          </div>
          <div class="form-group">
                <label for="" class="control-label col-xs-3">Alamat </label>
                <div class="col-xs-8">
                  <textarea class="form-control input-sm"    style="height:100px;"><?php echo $usersLog->alamat_user;?></textarea>
                </div>
          </div>
          <div class="form-group">
                <label for="" class="control-label col-xs-3">Cabang Login: </label>
                <div class="col-xs-8">
                  <select class="form-control input-sm"    name="">
                    <option value="<?php echo $usersLog->id_cabang; ?>"><?php echo $usersLog->nama_cabang; ?></option>
                  </select>
                </div>
          </div>

          <div class="form-group">
                <label for="" class="control-label col-xs-3">Level Otoritas: </label>
                <div class="col-xs-8">
                  <select class="form-control input-sm"    name="">
                    <option value="<?php echo $usersLog->id_user_group; ?>"><?php echo $usersLog->tipe_group; ?></option>
                  </select>
                </div>
          </div>

          <div class="form-group">
                <label for="" class="control-label col-xs-3">Status aktif: </label>
                <div class="col-xs-8">
                  <select class="form-control input-sm"    name="">
                    <option value="<?php echo $usersLog->id_status; ?>"><?php echo $usersLog->tipe_status; ?></option>
                  </select>
                </div>
          </div>
          <hr>
          <div class="col-xs-offset-2 col-lg-8">
            <button type="submit" class="btn btn-block bg-purple btn-md">Simpan</button>
          </div>
        </div>

      </div>
  </form>
</div>
