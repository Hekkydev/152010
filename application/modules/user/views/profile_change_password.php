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
          <legend >Akses Login</legend>
          <div class="form-group">
                <label for="" class="control-label col-xs-4">Username </label>
                <div class="col-xs-8">
                  <input type="text" name="username" value="<?php echo $usersLog->username;?>" class="form-control input-sm" >
                </div>
          </div>
          <div class="form-group">
                <label for="" class="control-label col-xs-4">Password</label>
                <div class="col-xs-8">
                  <input type="password" name="password"  class="form-control input-sm">
                </div>
          </div>
          <div class="form-group">
                <label for="" class="control-label col-xs-4">Konfirmasi Password </label>
                <div class="col-xs-8">
                  <input type="password" name="konfirmasi_password"  class="form-control input-sm">
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
