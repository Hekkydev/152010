<?php
$form = array(
  'id'=>'form-pengumuman',
);
$user = array(
  'name'=>'uuid_user',
  'type'=>'hidden',
  'value'=>$usersLog->uuid_user,
);
$uuid_pengumuman = array(
  'name'=>'uuid_pengumuman',
  'type'=>'hidden',
  'value'=>$pengumuman->uuid_pengumuman,
);
echo form_open('pengumuman/update',$form);
echo form_input($user);
echo form_input($uuid_pengumuman);
 ?>
<div class="form-group">
  <label for="">Judul Pengumuman :</label>
  <input type="text" name="judul_pengumuman" value="<?php echo $pengumuman->judul_pengumuman?>" class="form-control "  placeholder="maksimal 200 kata">
</div>

<div class="form-group">
  <label for="">Informasi Pengumuman :</label>
  <textarea rows="8" id="summernote" cols="80" name="ket_pengumuman"  class="form-control " ><?php echo $pengumuman->ket_pengumuman ?></textarea>
</div>
<div class="form-group">
<label for="">Dibuat Oleh : <?php echo $pengumuman->nama_lengkap ?></label>
<br>
<?php if ($pengumuman->last_change_date == TRUE): ?>
<label for="">Terakhir di edit : <?php echo $pengumuman->last_change_date ?></label>
<?php endif; ?>
</div>
<hr>
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
