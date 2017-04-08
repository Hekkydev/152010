<?php
$form = array(
  'id'=>'form-member',
  'onSubmit'=>'return validasi()',
  'class'=>'form-horizontal',
);

$ID = array(
    'name'=>'kode_member',
    'type'=>'text',
    'value'=>$member->kode_member,
    'class'=>'form-control input-sm',
    'readonly'=>TRUE,

);

$sid = array(
  'name' =>'sid',
  'type'=>'hidden',
  'value'=>$member->uuid_member,
  );
?>

<div class="member">
  <?php echo form_open('member/insert',$form); ?>
  <?php echo form_input($sid);?>
    <div class="row">
      <div class="col-xs-offset-2 col-lg-7">
        <div class="form-group">
          <label for="" class="control-label col-xs-4">Kode Member</label>
          <div class="col-xs-8">
            <?php echo form_input($ID); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">Nama Depan</label>
          <div class="col-xs-8">
            <input type="text" name="nama_depan" value="<?php echo $member->nama_depan; ?>" class="form-control input-sm">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">Nama Belakang</label>
          <div class="col-xs-8">
            <input type="text" name="nama_belakang" value="<?php echo $member->nama_belakang;?>" class="form-control input-sm">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">Tempat Lahir</label>
          <div class="col-xs-8">
            <input type="text" name="tempat_lahir" value="<?php echo $member->tempat_lahir;?>" class="form-control input-sm">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">Tanggal Lahir</label>
          <div class="col-xs-8">
            <input type="text" name="tanggal_lahir" value="<?php echo $member->tanggal_lahir;?>"  class="form-control input-sm datepicker" id="datepicker">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">Email</label>
          <div class="col-xs-8">
            <input type="text" name="email" value="<?php echo $member->email_member;?>"  class="form-control input-sm">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">Jenis Kelamin</label>
          <div class="col-xs-8">
            <select class="form-control input-sm" name="jenis_kelamin">
              <?php foreach ($jenis_kelamin as $key => $val): ?>
                  <?php if($member->id_jenis_kelamin == $key):?>
                  <option value="<?php echo $key?>" selected=""><?php echo $val; ?></option>
                  <?php else:?>
                  <option value="<?php echo $key?>"><?php echo $val; ?></option>
                  <?php endif;?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">Alamat</label>
          <div class="col-xs-8">
              <textarea name="alamat" class="form-control input-sm"><?php echo $member->alamat?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">No. KTP</label>
          <div class="col-xs-8">
            <input type="text" name="no_ktp" value="<?php echo $member->no_ktp?>" class="form-control input-sm ">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">No. Telp</label>
          <div class="col-xs-8">
            <input type="text" name="no_telp" value="<?php echo $member->no_handphone?>" class="form-control input-sm ">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">No. Telp Referensi</label>
          <div class="col-xs-8">
            <input type="text" name="no_telp_referensi" value="<?php echo $member->no_referensi;?>" class="form-control input-sm ">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">Jenis Member</label>
          <div class="col-xs-8">
            <select class="form-control input-sm" name="jenis_member">
              <?php foreach ($jenis_member as $jm): ?>
                <?php if($member->id_member_golongan == $jm->id_member_golongan):?>
                     <option value="<?php echo $jm->id_member_golongan; ?>" selected=""><?php echo $jm->tipe_member_golongan; ?></option>
                    <?php else:?>
                     <option value="<?php echo $jm->id_member_golongan; ?>"><?php echo $jm->tipe_member_golongan; ?></option>
                <?php endif;?>
               <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-xs-4">Tgl. Daftar</label>
          <div class="col-xs-8">
            <input type="text" name="tgl_daftar" value="<?php echo $member->tanggal_terdaftar;?>" class="form-control input-sm " readonly="">
          </div>
        </div>
        

        <div class="form-group">
        <label for="" class="control-label col-xs-4">Cabang Pendaftaran</label>
          <div class="col-xs-8">
            <select class="form-control input-sm" name="cabang_daftar" readonly="readonly">
             <?php foreach($cabang as $cabang):?>
             <?php if($member->id_cabang == $cabang->id_cabang):?>
              <option value="<?php echo $member->id_cabang; ?>"><?php echo $cabang->nama_cabang?></option>
             <?php else:?>
              <option value="<?php echo $cabang->id_cabang;?>"><?php echo $cabang->nama_cabang?></option>
             <?php endif;?>
             <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="form-group">
           <div class="col-xs-8">
            <input type="hidden" name="password" value="<?php echo $member->password; ?>" class="form-control input-sm " readonly="">
          </div>
        </div>
      </div>
      <div class="col-xs-offset-3 col-lg-7">
        <hr>
        <div class="row">
          <div class="col-lg-6">
            <?php echo anchor('customers/member', 'KEMBALI',$atr = array('class'=>'btn btn-block btn-md btn-outline bg-purple')); ?>
          </div>
          <div class="col-lg-6">
            <button type="submit" name="simpan" value="OK" class="btn btn-block btn-md bg-purple">SIMPAN</button>
          </div>
        </div>
      </div>
    </div>
  <?php echo form_close(); ?>
</div>
<?php $this->load->view('Member/script'); ?>
