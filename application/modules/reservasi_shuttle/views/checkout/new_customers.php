<hr>
<h4>DATA PENUMPANG</h4>
<br>
<div class="form-customers-shuttle_open">
  <div id="cloning-customer">
      <!-- KODE MEMBER -->
      <div class="form-group form-group-sm form-kode-member">
        <label for="">Kode Member</label>
        <input type="text" name="kode_member" id="kode_member" value="" class="form-control input-sm">
        <p id="kode_member_message"></p>
      </div>
      <!-- TELEPHONE -->
      <div class="form-group form-group-sm form-telephone">
        <label for="">Telphone</label>
        <input type="text" name="" value="" class="form-control input-sm" id="no_handphone">
        <p id="nomor_telp_message" style="color:#006600;"></p>
      </div>

      <!-- NAMA PELANGGAN -->
      <div class="form-group form-group-sm form-nama-penumpang">
        <label for="">Nama Lengkap</label>
        <input type="text" name="" value="" class="form-control input-sm" id="nama_depan">
      </div>

      <!-- HARGA PENUMPANG -->
      <div class="form-group form-group-sm" style="margin-bottom:20px;" id="form-penumpang-harga"></div>

      <!-- DISKON PENUMPANG -->
      <div class="form-group form-group-sm form-diskkon-penumpang">
        <label for="">Diskon Penumpang </label>
        <?php if ($diskon == TRUE): ?>
          <p><small>Pilih diskon jika digunakan</small></p>
          <select class="form-control" name="diskon_penumpang" id="diskon_penumpang">
              <option value="" selected="">PILIH DISKON</option>
              <?php foreach ($diskon as $diskon): ?>
                <option value="<?php echo $diskon->jumlah_tarif_diskon;?>"><?php echo $diskon->informasi_diskon.' - '.rupiah($diskon->jumlah_tarif_diskon) ?></option>
              <?php endforeach; ?>
          </select>
          <?php else: ?>
            <p><small>Tidak ada diskon</small></p>
            <select class="form-control" name="diskon_penumpang" id="diskon_penumpang" readonly></select>
        <?php endif; ?>
      </div>

      <!-- KETERANGAN PENUMPANG -->
      <div class="form-group form-group-sm">
        <label for="">Keterangan</label>
        <textarea id="keterangan_penumpang" rows="5" cols="80" class="form-control input-sm"></textarea>
      </div>


  </div>

  <!-- BUTTON RESERVASI -->
  <div id=button_reservasi></div>

</div>
<?php
$this->load->view('reservasi_shuttle/inc_script/script_new_customers');
?>
