<!-- //////////////////////////////////////////////////// Login div -->
<?php
$form = array('data-toggle'=>'validator','onSubmit'>'return validator()','autocomplete'=>'off');
$username = array(
  'class'=>'form-control',
  'id'=>'inputUsername',
  'placeholder'=>'Masukan Username',
  'type'=>'username',
  'name'=>'username',
  'data-error'=>'silahkan isi username dengan benar',
  'required'=>''
);

$password = array(
  'class'=>'form-control',
  'id'=>'inputPassword',
  'data-minlength'=>6,
  'placeholder'=>'Masukan Password',
  'type'=>'password',
  'name'=>'password',
  'data-error'=>'silahkan isi password dengan benar',
  'required'=>'',

);
?>
<!-- ////////////////////////////////////////////////////////////////////// -->
<div id="login" class="image-bg">
<div class="container">
<div class="row">
    <div class="col-xs-12 content">
    <div class="panel login-form" style="border:1px solid #731b89;">
        <div class="panel-heading" style="background: white;text-align:center; padding:20px;">
            <img src="<?php echo base_url()?>assets/img/logo-min-new.png" style="width:150px; margin-top:10px;" alt="pasteurtrans">
        </div> <!-- /panel-heading -->
        <div class="panel-body m-t-0">

        <?php echo form_open('autentikasi',$form); ?>

                <div class="form-group form-group-sm">
                    <div class="input-group">
                        <span class="input-group-addon bg" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i> Username</span>
                        <?php echo form_input($username) ?>
                    </div> <!-- /input-group -->
                    <div class="help-block with-errors"></div>
                </div> <!-- /form-group -->

                <div class="form-group form-group-sm">

                <div class="input-group">
                    <span class="input-group-addon bg" id="basic-addon2"><i class="fa fa-key" aria-hidden="true"></i> Password</span>
                    <?php echo form_input($password); ?>
                </div> <!-- /input-group -->
                <div class="help-block with-errors"></div>
                </div> <!-- /form-group -->
                <div class="form-group form-group-sm">
                  <label for="">Cabang Login</label>
                  <div class="input-group">
                      <span class="input-group-addon bg" id="basic-addon2"><i class="fa fa-home" aria-hidden="true"></i></span>
                    <select class="form-control" name="cabang">
                      <?php foreach ($cabang as $c): ?>
                            <option value="<?php echo $this->encrypt->encode($c->id_cabang); ?>"><?php echo $c->nama_cabang.' <i>'.$c->nama_kota.' ('.$c->kode_cabang.')</i>'; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div> <!-- /input-group -->
                </div>

                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-md bg btn-block" name="LoginSubmit" value="OK"><span>Login</span></button>
                </div> <!-- /form-group -->

            <?php echo form_close(); ?>

        </div> <!-- /panel-body -->
    </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->
</div> <!-- /container -->
</div> <!-- /login -->
