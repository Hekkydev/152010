<form class="form-horizontal"  method="post">

<?php if ($manifest_kode == TRUE): ?>
  <h3>DATA OPERASIONAL</h3>
  <br>
  <table class="table">
    <tr>
      <th>- Unit Mobil</th>
      <th>:</th>
      <th><?php echo $this->manifest->cek_uuid_mobil($manifest_kode->uuid_mobil_unit) ?></th>
    </tr>
    <tr>
      <th>- Sopir</th>
      <th>:</th>
      <th><?php echo $this->manifest->cek_uuid_sopir($manifest_kode->uuid_sopir) ?></th>
    </tr>
    <tr>
      <th>- Penumpang</th>
      <th>:</th>
      <th><?php echo $jumlah_penumpang; ?></th>
    </tr>

  </table>
<?php else: ?>
  <div class="form-group" style="text-align:left">
    <label class="control-label col-xs-4" >UNIT MOBIL</label>
    <div class="col-lg-8">
      <select class="form-control input-sm" name="unit_mobil">
        <option value="" selected="" disabled>Pilih Unit</option>
        <?php foreach ($mobil as $m): ?>
          <option value="<?php echo $m->uuid_mobil_unit;?>"><?php echo $m->kode_unit." - ".$m->no_stnk ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="form-group" style="text-align:left">
    <label class="control-label col-xs-4" >SOPIR</label>
    <div class="col-lg-8">
      <select class="form-control input-sm" name="data_sopir">
      <option value="" selected="" disabled>Pilih Sopir</option>
        <?php foreach ($sopir as $s): ?>
          <option value="<?php echo $s->uuid_sopir; ?>"><?php echo $s->kode_sopir." - ".$s->nama_lengkap ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <br>
  <?php endif; ?>
  <!-- MANIFEST DATA -->

  <h3>BIAYA OPERASIONAL</h3>
  <br>
  <table class="table">

<?php if ($manifest_kode == TRUE): ?>
        <?php if($jumlah_penumpang > 0):?>
        <tr>
            <th> - Biaya BBM</th>
            <th>:</th>
            <th style="text-align:right;"><?php echo rupiah($manifest_kode->biaya_bbm)?></th>
        </tr>
        <tr>
            <th> - Biaya Tol</th>
            <th>:</th>
            <th style="text-align:right;"><?php echo rupiah($manifest_kode->biaya_tol)?></th>
        </tr>
        <tr>
            <th> - Biaya Sopir</th>
            <th>:</th>
            <th style="text-align:right;"><?php echo rupiah($manifest_kode->biaya_sopir)?></th>
        </tr>
        <tr>
           <td colspan="3" height="30"></td>
        </tr>
        <?php else:?>
        <tr>
            <th> - Biaya Perpal</th>
            <th>:</th>
            <th style="text-align:right;"><?php echo rupiah($manifest_kode->biaya_perpal)?></th>
        </tr>
        <tr>
           <td colspan="3" height="30"></td>
        </tr>
        <?php endif;?>
  <?php else: ?>
          <?php if($jumlah_penumpang > 0):?>
          <tr>
              <th> - Biaya BBM</th>
              <th>:</th>
              <th style="text-align:right;"><?php echo rupiah($manifest->biaya_bbm)?></th>
          </tr>
          <tr>
              <th> - Biaya Tol</th>
              <th>:</th>
              <th style="text-align:right;"><?php echo rupiah($manifest->biaya_tol)?></th>
          </tr>
          <tr>
              <th> - Biaya Sopir</th>
              <th>:</th>
              <th style="text-align:right;"><?php echo rupiah($manifest->biaya_sopir)?></th>
          </tr>
          <tr>
             <td colspan="3" height="30"></td>
          </tr>
          <?php else:?>
          <tr>
              <th> - Biaya Perpal</th>
              <th>:</th>
              <th style="text-align:right;"><?php echo rupiah($manifest->biaya_perpal)?></th>
          </tr>
          <tr>
             <td colspan="3" height="30"></td>
          </tr>
          <?php endif;?>
  <?php endif;?>


          <tr>
              <th> - BIAYA TOTAL</th>
              <th>:</th>
              <th style="text-align:right;"><?php echo rupiah($biaya_trip); ?></th>
          </tr>
           <tr>
             <td colspan="3" height="30"></td>
          </tr>

  </table>

<?php if ($manifest_kode == TRUE): ?>
  <div class="form-group">
    <div class="col-lg-6">
      <p>Note:</p><small>Data manifest sudah tersimpan</small>
    </div>
    <div class=" col-lg-6">
      <button type="button" name="button" name="button" class="btn bg-purple btn-sm"><i class="fa fa-edit"></i> UPDATE</button>
      <button type="button" name="button" name="button" class="btn bg-purple btn-sm"><i class="fa fa-print"></i> CETAK ULANG</button>
    </div>
  </div>
<?php else: ?>
<!-- MANIFEST DATA -->
  <div class="form-group">
    <div class="col-lg-6">
      <p>Note:</p><small>Data manifest belum di simpan!</small>
    </div>
    <div class=" col-lg-6">
      <button type="button" onclick="save_manifest_data();" name="button" class="btn  bg-purple btn-sm"><i class="fa fa-save"></i> SIMPAN</button>
      <button type="button" onclick="save_manifest_data();" name="button" class="btn  bg-purple btn-sm"><i class="fa fa-save"></i> SIMPAN & CETAK</button>
    </div>
  </div>
<?php endif;?>

</form>

<?php $this->load->view('reservasi_shuttle/inc_script/script_manifest');?>
