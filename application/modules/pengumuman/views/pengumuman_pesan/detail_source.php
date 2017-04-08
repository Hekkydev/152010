<div class="panel">
  <div class="panel-body">
    <?php
    $form = array(
      'id'=>'form-pengumuman',
      'style'=>'margin-top:20px;'
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
    echo form_open('#',$form);
    echo form_input($user);
    echo form_input($uuid_pengumuman);
     ?>
    <div class="form-group">
      <label for="">Judul Pengumuman :</label>
      <input type="text" name="judul_pengumuman" value="<?php echo $pengumuman->judul_pengumuman?>" class="form-control "  placeholder="maksimal 200 kata" readonly="" style="background:#FFF">
    </div>

    <div class="form-group">
      <label for="">Informasi Pengumuman :</label>
      <textarea rows="8" id="summernote" cols="80" name="ket_pengumuman"  class="form-control "  readonly=""><?php echo $pengumuman->ket_pengumuman ?></textarea>
    </div>
    <div class="form-group">
    <label for="">Dibuat Oleh : <?php echo $pengumuman->nama_lengkap ?></label>
    <br>
    <?php if ($pengumuman->last_change_date == TRUE): ?>
    <label for="">Tanggal di buat : <?php echo $pengumuman->created_date ?></label>
    <br>
    <label for="">Terakhir di edit : <?php echo $pengumuman->last_change_date ?></label>
    <?php endif; ?>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
