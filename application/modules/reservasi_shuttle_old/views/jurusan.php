<div class="panel">
  <div class="panel-heading" style="background:#731b89; border-bottom:1px solid #DDD;">
    <h3 style="text-align:center; color:white">JURUSAN</h3>
  </div>
  <div class="panel-body" align="center">
    <p style="margin-bottom:10px;"><strong>Tanggal Keberangkatan</strong></p>

    <div id="datepicker" class="tglRequest" style="margin-bottom:10px;"></div>
    <hr>
    <div class="form-group form-group-sm">
      <label for="">Kota Keberangkatan</label>
      <select class="form-control input-sm click" name="" id="kota_berangkat">
        <?php foreach ($kota as $kk): ?>
          <option value="<?php echo $kk->uuid_kota?>"> <?php echo $kk->nama_kota ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group form-group-sm">
      <label for="">Point Keberangkatan</label>
      <select class="form-control input-sm click" name="asal_keberangkatan" id="asal_keberangkatan">

      </select>
    </div>
    <div class="form-group form-group-sm">
      <label for="">Tujuan Keberangkatan</label>
      <select class="form-control input-sm click" name="tujuan_keberangkatan" id="tujuan_keberangkatan">

      </select>
    </div>
    <hr>
    <button type="button" name="button" onClick="cari_jadwal()" class="<?php echo $button?> btn-block"  >PROSES</button>
    <div class="">
      <?php $this->load->view("info_seat") ?>
    </div>
  </div>
  <div class="panel-footer"></div>
</div>
