<?php
$form = array(
  'id'=>'form-pengumuman',
);
$user = array(
  'name'=>'uuid_user',
  'type'=>'hidden',
  'value'=>$usersLog->uuid_user,
);
echo form_open('pengumuman/entri',$form);
echo form_input($user);
 ?>
<div class="form-group">
  <label for="">Judul Pengumuman :</label>
  <input type="text" name="judul_pengumuman" value="" class="form-control " placeholder="maksimal 200 kata">
</div>

<div class="form-group">
  <label for="">Informasi Pengumuman :</label>
  <textarea rows="8" id="summernote" cols="80" name="ket_pengumuman"  class="form-control "></textarea>
</div>

<div class="col-xs-offset-2 col-lg-8">
  <div class="row">
    <div class="col-lg-6">
      <a href="<?php echo site_url('pengumuman');?>" class="<?php echo $button_outline?> btn-block">KEMBALI</a>
    </div>
    <div class="col-lg-6">
      <button type="submit" name="simpan" value="OK" class="<?php echo $button?> btn-block">SIMPAN</button>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
