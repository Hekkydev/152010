<?php
$form = array('class'=>'form-horizontal','id'=>'form-jadwal','onSubmit'=>'return validasi()');
$IDjadwal = array(
  'id'=>'kode_jadwal',
  'name'=>'kode_jadwal',
  'type'=>'hidden',
  'value'=>$kode_jadwal,
  'readonly'=>TRUE,
  'class'=>'form-control'
);

$uuid_user = array(
	'type'=>'hidden',
	'name'=>'uuid_user',
	'value'=>$usersLog->uuid_user,
);
echo style_loading();
echo $loading;
?>
<div class="">
  <?php
  echo form_open('jadwal/insert',$form);
  echo form_input($IDjadwal);
  echo form_input($uuid_user);

  ?>
    <div class="row">
      <div class="col-xs-offset-2 col-lg-7">

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Kode jadwal</label>
            <div class="col-sm-9">
              <input type="text" name="kode_atr" value="" class="form-control" placeholder="Buat Kode jadwal">
            </div>
          </div>
		  <div class="form-group">
			<label class="col-sm-3 control-label">Tipe Jadwal</label>
			<div class="col-sm-9">
			<div class="radio radio-red">
                <input id="reguler" type="radio" name="tipe" value="1">
                <label for="reguler"><span>REGULER</span></label>
            </div> <!-- /radio -->

            <div class="radio radio-blue">
                <input id="extra" type="radio" name="tipe" value="0">
                <label for="extra"><span>EXTRA</span></label>
            </div> <!-- /radio -->
			</div>
		  </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Asal</label>
            <div class="col-sm-9">
              <select class="form-control" name="asal_keberangkatan" id="asal_keberangkatan">
                <option value="" selected="" disabled="">Pilih Keberangkatan</option>
                  <?php foreach ($kota as $k): ?>
                    <optgroup label="<?php echo $k->nama_kota?>">
                      <?php foreach (Cabang_helper($k->uuid_kota)->result() as $cb): ?>
                          <option value="<?php echo $cb->uuid_cabang?>"><?php echo $cb->nama_cabang; ?></option>
                      <?php endforeach; ?>
                    </optgroup>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Tujuan</label>
            <div class="col-sm-9" >
              <select class="form-control " name="tujuan_keberangkatan" id="tujuan_keberangkatan">
                  <option value="" selected="" disabled="">Pilih Tujuan</option>
              </select>
            </div>
          </div>


          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Waktu</label>
            <div class="col-sm-5">
              <div class="row">
                <div class="col-lg-6">
                  <select class="<?php echo $form_control?>" name="jam_keberangkatan">
                  <?php foreach ($opt_jam as $key => $value): ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-6">
                  <select class="<?php echo $form_control?>" name="menit_keberangkatan">
                  <?php foreach ($opt_menit as $key => $value): ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Jumlah Kursi</label>
            <div class="col-sm-9">
              <select class="<?php echo $form_control?>" name="id_jml_kursi">
                  <?php foreach ($jmlKursi as $jk): ?>
                      <option value="<?php echo $jk->id_jml_kursi; ?>"><?php echo $jk->jumlah_kursi; ?> (<?php echo $jk->jumlah_kursi; ?> Kursi)</option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
              <select class="form-control"  name="id_status">
                  <?php foreach ($status as $s): ?>
                    <option value="<?php echo $s->id_status; ?>"><?php echo $s->tipe_status; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Jenis Jadwal</label>
            <div class="col-sm-9">
              <select class="form-control"  name="id_jenis_jadwal" id="id_jenis_jadwal">
                <?php foreach ($jenis_jadwal as $jj): ?>
                    <option value="<?php echo $jj->id_jenis_jadwal?>"><?php echo $jj->tipe_jenis_jadwal ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
		      <div id="transit_jadwal"> <?php $this->load->view('Jadwal/options/transit'); ?></div>
          <?php $this->load->view('Jadwal/options/rute_jadwal') ?>

          <div class="col-sm-offset-3 col-sm-8 no-padding">
              <hr>
              <div class="row">
                <div class="col-lg-6">
                  <a   href="<?php echo site_url('jadwal/')?>" class="btn bg-purple btn-block btn-outline btn-sm">KEMBALI</a>
                </div>
                <div class="col-lg-6">
                  <button type="submit" name="simpan" class="btn bg-purple btn-block  btn-sm"  value="OK">SIMPAN</button>
                </div>
              </div>
          </div> <!-- /col -->


      </div>
    </div>

<?php echo form_close(); ?>
</div>
<?php $this->load->view('Jadwal/options/script_jadwal'); ?>
