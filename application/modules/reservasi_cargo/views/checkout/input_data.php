<strong>PENGIRIMAN PAKET</strong>
<hr>
<h3>DATA PENGIRIM</h3>
<a data-toggle="collapse" data-parent="#accordion" href="#form-data-pengirim" class="pull-right" style="margin-top:-20px;">
  <i class="fa fa-minus"></i>
</a>
<br>
<!-- collapse in = open panel || collapse  = hide panel -->
<div id="form-data-pengirim" class="panel-collapse collapse ">
  <div class="form-group">
    <label class="small-text-bold">Telp. Pengirim</label>
    <input type="text" id="telp_pengirim"  class="form-control input-sm">
  </div>
  <div class="form-group">
    <label class="small-text-bold">Nama Pengirim</label>
    <input type="text" id="nama_pengirim"  class="form-control input-sm">
  </div>
  <div class="form-group">
    <label class="small-text-bold">Alamat Pengirim</label>
    <textarea id="alamat_pengirim" class="form-control input-sm"></textarea>
  </div>
</div>



<!-- //////////////////////BATAS-/////////////////////////////////////////////////////////////////////// -->
<hr>
<h3 >DATA PENERIMA</h3>
<a data-toggle="collapse" data-parent="#accordion" href="#form-data-penerima" class="pull-right" style="margin-top:-20px;">
  <i class="fa fa-minus"></i>
</a>
<br>
<div id="form-data-penerima" class="panel-collapse collapse ">

  <div class="form-group">
    <label class="small-text-bold">Telp. Penerima</label>
    <input type="text" id="telp_penerima" value="" class="form-control input-sm">
  </div>
  <div class="form-group">
    <label class="small-text-bold">Nama Penerima</label>
    <input type="text" id="nama_penerima" value="" class="form-control input-sm">
  </div>
  <div class="form-group">
    <label class="small-text-bold">Alamat Penerima</label>
    <textarea id="alamat_penerima" class="form-control input-sm"></textarea>
  </div>
</div>



<!-- //////////////////////BATAS-/////////////////////////////////////////////////////////////////////// -->
<hr>
<h3>DATA BARANG</h3>
<a data-toggle="collapse" data-parent="#accordion" href="#form-data-barang" class="pull-right" style="margin-top:-20px;" id="toggle-barang">
  <i id="toggle-barang-fa" class="fa fa-minus"></i>
</a>
<br><br>
<div id="form-data-barang" class="panel-collapse collapse ">
  <div class="form-horizontal">

    <!-- JENISPAKET -->
    <div class="form-group" id="jenis_paket_barang">
      <label for="" class="control-label col-xs-5 small-text-bold">Jenis Paket :</label>
      <div class="col-xs-7">
        <select class="form-control input-sm" id="jenis_barang">
          <option value="" selected="" disabled="">Pilih</option>
          <?php foreach ($jenis_pengiriman as $j): ?>
              <option value="<?php echo $j->id_jenis_pengiriman_paket ?>"><?php echo $j->tipe_jenis_pengiriman_paket ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <!-- /JENISPAKET -->

    <!-- JUMLAHKOLI  -->
    <div class="form-group">
      <label for="" class="control-label col-xs-5 small-text-bold">Jumlah / Koli :</label>
      <div class="col-xs-7">
        <div class="input-group">
          <input type="number" min="1" class="form-control input-sm" aria-describedby="basic-addon3" placeholder="0" id="jumlah_koli">
          <span class="input-group-addon input-sm" id="basic-addon3">Pax</span>
        </div>
      </div>
    </div>
    <!-- /JUMLAHKOLI -->


      <!-- PERHITUNGAN -->
      <div class="form-group" id="form-perhitungan">
        <label for="" class="control-label col-xs-5 small-text-bold">Perhitungan :</label>
        <div class="col-xs-7">
              <div class="radio radio-purple">
                  <input id="weight_count" type="radio" name="tipe_count" value="weight_count" >
                  <label for="weight_count"><span class="small-text">Weight</span></label>
              </div> <!-- /radio -->

              <div class="radio radio-purple">
                  <input id="volume_count" type="radio" name="tipe_count" value="volume_count">
                  <label for="volume_count"><span class="small-text">Volume</span></label>
              </div> <!-- /radio -->
        </div>
      </div>
      <!-- /PERHITUNGAN -->


      <!-- VOLUME FORM -->

      <div class="form-group" id="form-hitung-volume">
        <label for="" class="control-label col-xs-5 small-text-bold">Volumetrix -</label>
        <div class="col-xs-7">
          <form id="hitung_kilogram" onkeyup="return hitung_kilogram()" autocomplete="off">
            <div class="input-group">
              <input type="text" min="0" class="form-control input-sm" placeholder="0" style="weight:50%" value="0" id="volume_panjang">
                <span class="input-group-addon input-sm">P /cm</span>
            </div>
            <br>
            <div class="input-group">
              <input type="text" min="0" class="form-control input-sm" placeholder="0" style="weight:50%" value="0" id="volume_lebar">
                <span class="input-group-addon input-sm">L /cm</span>
            </div>
            <br>
            <div class="input-group">
              <input type="text" min="0" class="form-control input-sm" placeholder="0" style="weight:50%" value="0" id="volume_tinggi">
                <span class="input-group-addon input-sm">T /cm</span>
            </div>
          </form>
        </div>
      </div>
      <!-- /VOLUME FORM -->

      <!-- BERAT KILO -->
        <div class="form-group" id="form-berat-kilogram">
          <label for="" class="control-label col-xs-5 small-text-bold">Berat :</label>
          <div class="col-xs-7">
              <div class="input-group">
                <input type="number" min="1" class="form-control input-sm" aria-describedby="basic-addon3" placeholder="0" id="berat_kilogram" min="0">
                <span class="input-group-addon input-sm">Kg</span>
              </div>
          </div>
        </div>
      <!-- / BERAT KILO -->

      <!-- BIAYA -->
      <div class="form-group" id="form-result-biaya">
        <label for="" class="control-label col-xs-5 small-text-bold">Biaya /KG :</label>
        <div class="col-xs-7">
          <input type="text" class="form-control input-sm" readonly="" style="background:#f5f5f5;cursor:help;" id="info_biaya">
        </div>
      </div>
      <!-- BIAYA -->

      <!-- BIAYA -->
      <div class="form-group" id="form-result-biaya">
        <label for="" class="control-label col-xs-5 small-text-bold">Selanjutnya</label>
        <div class="col-xs-7">
          <input type="text" class="form-control input-sm" readonly="" style="background:#f5f5f5;cursor:help;" id="info_biaya_selanjutnya">
        </div>
      </div>
      <!-- BIAYA -->

      <!-- BIAYA -->
      <div class="form-group" id="form-result-biaya">
        <label for="" class="control-label col-xs-5 small-text-bold">Total Biaya :</label>
        <div class="col-xs-7">
          <input type="text" class="form-control input-sm" readonly="" style="background:#FFF;cursor:help;" id="total_biaya">
        </div>
      </div>
      <!-- BIAYA -->

      <?php if ($discount == TRUE): ?>
      <div class="form-group" id="discount">
        <label for="" class="control-label col-xs-5 small-text-bold">Discount :</label>
        <div class="col-xs-7">
          <select class="form-control input-sm" name="discount" id="discount">
            <option value="0"> Pilih Discount</option>
            <?php foreach ($discount as $discount): ?>
              <option value="<?php echo $discount->jumlah_tarif_diskon?>"><?php echo $discount->informasi_diskon." - ".rupiah($discount->jumlah_tarif_diskon);?></option>
            <?php endforeach; ?>
          </select>
        </div>
        </div>
        <?php endif; ?>
      <!-- UKURAN BARANG -->
      <div class="form-group">
        <label for="" class="control-label col-xs-5 small-text-bold">Ukuran Paket:</label>
        <div class="col-xs-7">
          <select class="form-control input-sm" id="ukuran_berat">
              <option value="kecil">Kecil</option>
              <option value="sedang">Sedang</option>
              <option value="besar">Besar</option>
          </select>
        </div>
      </div>
      <!-- /UKURAN BARANG -->



      <!-- JENISLAYANAN -->
      <div class="form-group">
        <label for="" class="control-label col-xs-5 small-text-bold">Layanan :</label>
        <div class="col-xs-7">
          <select class="form-control input-sm" id="jenis_layanan">
              <option value="port-to-port">Port to Port</option>
              <option value="port-to-door">Port to Door</option>
          </select>
        </div>
      </div>
      <!-- /JENISLAYANAN -->

      <!-- PEMBAYARAN -->
      <div class="form-group">
        <label for="" class="control-label col-xs-5 small-text-bold">Pembayaran :</label>
        <div class="col-xs-7">
          <select class="form-control input-sm" id="metode_pembayaran">
              <option value="langsung">Langsung</option>
          </select>
        </div>
      </div>
      <!-- /PEMBAYARAN -->

      <!-- KETERANGAN -->

      <div class="form-group" style="padding:18px;">
        <label for="" class="control-label small-text-bold">Keterangan Lanjut : </label>
        <textarea name="name" class="form-control input-sm" id="keterangan_pengiriman"></textarea>
      </div>
      <!-- /KETERANGAN -->

  </div>
</div>


<div class="form-group" id="simpan_form">
  <hr>
  <div class="input-sm2">
    <div class="row">
      <div class="col-lg-6">
        <button type="button" name="button" class="btn btn-block btn-md bg-purple" onclick="booking()">SIMPAN</button>
      </div>
      <div class="col-lg-6">
        <button type="button" name="button" class="btn btn-block btn-md bg-purple btn-outline">BATAL</button>
      </div>
    </div>
  </div>
</div>
