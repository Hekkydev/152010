
<div class="informasi-detail-paket" style="border-bottom:3px dotted #731b89; margin-bottom:50px;">
<div class="title" align="center">
  <strong>DETAIL PENGIRIMAN PAKET</strong>
  <br><br>
  <span class="btn bg-orange btn-md noclick"><?php echo $paket->nomor_resi_paket ?></span>
  <br><br>
  <h4>TUJUAN : <?php echo strtoupper(cabang_nama($paket->tujuan_keberangkatan)) ?></h4>
  <hr>
</div>
<h3>DATA PENGIRIM</h3>
<a data-toggle="collapse" data-parent="#accordion" href="#form-data-pengirim-detail" class="pull-right" style="margin-top:-20px;">
  <i class="fa fa-minus"></i>
</a>
<br>
<!-- collapse in = open panel || collapse  = hide panel -->
<div id="form-data-pengirim-detail" class="panel-collapse collapse in">
  <div class="form-group">
    <label class="">Telp. Pengirim :</label>
    <span class="">
      <?php echo $paket->telp_pengirim ?>
    </span>
  </div>
  <div class="form-group">
    <label class="">Nama Pengirim :</label>
    <span class="">
      <?php echo $paket->nama_pengirim ?>
    </span>
  </div>
  <div class="form-group">
    <label class="">Alamat  Pengirim :</label>
    <address class="">
      <?php echo $paket->alamat_pengirim ?>
    </address>
  </div>
</div>



<!-- //////////////////////BATAS-/////////////////////////////////////////////////////////////////////// -->
<hr>
<h3 >DATA PENERIMA</h3>
<a data-toggle="collapse" data-parent="#accordion" href="#form-data-penerima-detail" class="pull-right" style="margin-top:-20px;">
  <i class="fa fa-minus" id="collapse-font"></i>
</a>
<br>
<div id="form-data-penerima-detail" class="panel-collapse collapse in">
  <div class="form-group">
    <label class="">Telp. Penerima :</label>
    <span class="">
      <?php echo $paket->telp_penerima ?>
    </span>
  </div>
  <div class="form-group">
    <label class="">Nama Penerima :</label>
    <span class="">
      <?php echo $paket->nama_penerima ?>
    </span>
  </div>
  <div class="form-group">
    <label class="">Alamat  Penerima :</label>
    <address class="">
      <?php echo $paket->alamat_penerima ?>
    </address>
  </div>
</div>



<!-- //////////////////////BATAS-/////////////////////////////////////////////////////////////////////// -->
<hr>
<h3>DATA BARANG</h3>
<a data-toggle="collapse" data-parent="#accordion" href="#form-data-barang-detail" class="pull-right" style="margin-top:-20px;" id="toggle-barang">
  <i id="toggle-barang-fa" class="fa fa-minus"></i>
</a>
<br><br>
<div id="form-data-barang-detail" class="panel-collapse collapse in">
    <table width=100%>
      <tr>
        <td width=130>Asal Pengiriman</td>
        <td>:</td>
        <td>
          <?php echo cabang_nama($paket->asal_keberangkatan) ?>
        </td>
      </tr>
      <tr>
        <td width=130>Tujuan Pengiriman</td>
        <td>:</td>
        <td>
          <?php echo cabang_nama($paket->tujuan_keberangkatan) ?>
        </td>
      </tr>
      <tr>
        <td width=130>Jenis Paket</td>
        <td>:</td>
        <td>
          <?php echo $paket->tipe_jenis_pengiriman_paket ?>
        </td>
      </tr>
      <tr>
        <td width=130>Layanan</td>
        <td>:</td>
        <td>
          <?php echo $paket->jenis_layanan_paket ?>
        </td>
      </tr>
      <tr>
        <td width=130>Jumlah Koli</td>
        <td>:</td>
        <td>
          <?php echo $paket->jumlah_koli_paket." Paket" ?>
        </td>
      </tr>
      <tr>
        <td width=130>Perhitungan</td>
        <td>:</td>
        <td>

        </td>
      </tr>
      <tr>
        <td width=130>Berat</td>
        <td>:</td>
        <td>
            <?php echo $paket->berat_kg." Kg" ?>
        </td>
      </tr>
      <tr>
        <td width=130>Biaya Kirim</td>
        <td>:</td>
        <td>
          <?php echo "Rp, ". rupiah($paket->harga_total) ?>
        </td>
      </tr>
    </table>
</div>


<div class="form-group" id="simpan_form">
  <hr>
  <div class="button-operasional">
    <div class="row">
      <div class="col-lg-offset-2 col-lg-10">
          <div class="row">
          <div class="col-lg-2" align="center" style="padding:10px  0 20px 0; margin:10px;">
                  <div class="icon-operasional icon-mutasi" onclick="mutasi()" ></div>
                  <span class="title_icon">Mutasi Pengiriman</span>
            </div>
            <div class="col-lg-2" align="center" style="padding:10px  0 20px 0; margin:10px;">
                  <div class="icon-operasional icon-pembatalan-paket" onclick="batalkan_tiket('<?php echo $paket->nomor_resi_paket?>')"></div>
                  <span class="title_icon">Batalkan Paket</span>
            </div>
            <div class="col-lg-2" align="center" style="padding:10px  0 20px 0; margin:10px;">
                  <div class="icon-operasional icon-print" onclick="cetak_tiket()"></div>
                  <span class="title_icon">Cetak Tiket</span>
            </div>
          </div>
        </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">
        <button type="button" name="button" class="btn btn-block btn-md bg-purple" onclick="tutup_informasi()">TUTUP INFORMASI</button>
      </div
    </div>
  </div>
</div>
</div>
