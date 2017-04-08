<hr>
  <div class="form-customers-shuttle_open" style="border-bottom:3px dotted #731b89; margin-bottom:50px;">
    <div class="form-group" align="center">
      <h3  style="text-align:center;" id="jadwal_detail"><?php echo $jadwal_detail; ?></h3>
      <br>

      <span id="kursi_detail" class="btn bg-purple circle-md noclick"><?php echo $penumpang_info->nomor_kursi; ?></span>
    </div>

    <!-- INFORMASI PENUMPANG -->
    <div class="informasi-penumpang">

        <hr>
        <div class="form-group">
          <h3>DATA PENUMPANG</h3>
        </div>
        <div class="form-group form-group-sm">
          <div class="row">
            <p for="" class="col-lg-12 small-text-bold">Kode Booking</p>
            <span id="kode_booking_detail" class="col-lg-12 pull-left" style="font-size:20px;"><?php echo $penumpang->kode_booking; ?></span>
          </div>
          <br>
          <div class="row">
            <p for="" class="col-lg-12 small-text-bold">Kode Tiket</p>
            <span id="no_tiket_detail" class="col-lg-12 pull-left small-text" style="font-size:20px;"><?php echo $penumpang->kode_tiket; ?></span>
          </div>
        </div>
        <hr>
        <div class="form-group form-group-sm">
          <div class="row">
            <p for="" class="col-lg-6 small-text-bold">Kode Member</p>
            <p class="col-lg-6 pull-right small-text" >: <?php echo $penumpang->kode_member; ?></p>
          </div>
          <div class="row ">
              <p for="" class="col-lg-6 small-text-bold">Telephone</p>
              <p  class="col-lg-6 pull-right small-text" >: <?php echo $penumpang->telp_penumpang; ?></p>
            </div>
          <div class="row">
              <p for="" class="col-lg-6 small-text-bold">Nama Penumpang</p>
              <p  class="col-lg-6 pull-right small-text">: <?php echo $penumpang->nama_penumpang ?></p>
            </div>
          <div class="row">
              <p for="" class="col-lg-6 small-text-bold">Jenis Penumpang</p>
              <p  class="col-lg-6 pull-right small-text">: <?php echo strtoupper($penumpang->jenis_penumpang) ?></p>
          </div>
          <div class="row">
              <p for="" class="col-lg-6 small-text-bold">Keterangan</p>
              <p  class="col-lg-6 pull-right small-text">: <?php echo $penumpang->keterangan_penumpang ?></p>
            </div>
        </div>

    </div>
    <!-- INFORMASI PENUMPANG -->

    <!-- TARIF PENUMPANG -->
    <hr>
    <div class="form-group">
      <h3>TARIF</h3>
    </div>
    <div class="form-group form-group-sm">
      <div class="row">
        <p for="" class="col-lg-6 small-text-bold">Harga Tiket</p>
        <label for="harga_tiket_detail" class="col-lg-6 small-text pull-right " style="text-align:right;">Rp. <?php echo rupiah($penumpang->tarif_penumpang) ?></label>
      </div>
      <div class="row ">
          <p for="" class="col-lg-6 small-text-bold">Diskon</p>
          <label for="harga_tiket_diskon" class="col-lg-6 small-text pull-right" style="text-align:right;">Rp. <?php echo rupiah($penumpang->tarif_diskon) ?></label>
        </div>
      <div class="row">
          <p for="" class="col-lg-6 small-text-bold">Total</p>
          <label for="harga_total_tiket_detail" class="col-lg-6 small-text-bold pull-right" style="text-align:right;">Rp. <?php echo rupiah($penumpang->tarif_penumpang - $penumpang->tarif_diskon); ?></label>
        </div>
    </div>



    <!-- /TARIF PENUMPANG -->
    <?php if ($jumlah_penumpang > 1): ?>
      <hr>
      <div class="form-group">
        <h3>KESELURUHAN TARIF</h3>
      </div>
      <div class="form-group form-group-sm">
        <div class="row">
          <label for="" class="col-lg-6 small-text-bold">Total Tiket</label>
          <label for="harga_tiket_detail" class="col-lg-6 small-text pull-right" style="text-align:right;"><?php echo $jumlah_penumpang ?></label>
        </div>
        <div class="row">
          <label for="" class="col-lg-6 small-text-bold">Sub Total</label>
          <label for="harga_tiket_detail" class="col-lg-6  small-text pull-right" style="text-align:right;">Rp. <?php echo rupiah($total_tarif_penumpang); ?></label>
        </div>
        <div class="row ">
            <label for="" class="col-lg-6 small-text-bold">Diskon</label>
            <label for="harga_tiket_diskon" class="col-lg-6 small-text pull-right" style="text-align:right;">Rp. <?php echo rupiah($total_tarif_diskon) ?></label>
          </div>
        <div class="row">
            <label for="" class="col-lg-6 control-label small-text-bold">Grand Total</label>
            <label for="harga_total_tiket_detail" class="col-lg-6 small-text-bold pull-right" style="text-align:right; font-size:18px;color:red;">Rp. <?php echo rupiah($total_tarif_penumpang - $total_tarif_diskon); ?></label>
          </div>
      </div>
    <?php endif; ?>

    <!-- INFORMASI PEMESANAN -->
    <hr>
    <div class="form-group">
      <h3>INFORMASI</h3>
    </div>
    <div class="form-group form-group-sm">
      <div class="row" >
        <label for="" class="col-lg-6 small-text-bold">CSO pemesan</label>
        <p for="cso_pemesan" class="col-lg-6  small-text pull-right">: <?php echo $penumpang->nama_lengkap ?></p>
      </div>
      <div class="row">
          <label for="" class="col-lg-6 small-text-bold">Waktu pesanan</label>
          <p for="tgl_pemesanan_tiket" class="col-lg-6 small-text pull-right">: <?php echo $penumpang->tanggal_pemesanan_tiket ?></p>
        </div>
      <div class="row">
          <label for="" class="col-lg-6 small-text-bold">Status pemesanan</label>
          <p for="status_tiket_detail" class="col-lg-6 small-text pull-right">: <?php echo strtoupper($penumpang->tipe_status_pemesanan) ?></p>
        </div>
      <div class="row">
          <label for="" class="col-lg-6 small-text-bold">Waktu Pembayaran</label>
          <p for="status_tiket_detail" class="col-lg-6 small-text pull-right">: <?php echo strtoupper($penumpang->tanggal_pembayaran_tiket) ?></p>
        </div>
        <div class="row">
            <label for="" class="col-lg-6 small-text-bold">Metode Pembayaran</label>
            <p for="status_tiket_detail" class="col-lg-6 small-text pull-right">: <?php echo strtoupper($penumpang->metode_pembayaran_tiket) ?></p>
          </div>
      <div class="row">
          <label for="" class="col-lg-6 small-text-bold">Cetak Tiket</label>
          <p for="status_tiket_detail" class="col-lg-6 small-text pull-right">: <?php //echo strtoupper($penumpang->tipe_status_pemesanan) ?></p>
        </div>
    </div>
    <br>
    <!-- /INFORMASI PEMESANAN -->

    <!-- BUTTON RESERVASI -->
    <hr>
    <div class="form-group" align="center">
      <div class="row">
        <div class="col-lg-2 koreksi-diskon" align="center" style="padding:10px  0 20px 0; margin:10px;">
              <div class="icon-operasional icon-koreksi-diskon" onclick="koreksi_harga()"></div>
              <span class="title_icon">Koreksi Harga</span>
        </div>
        <div class="col-lg-2" align="center" style="padding:10px  0 20px 0; margin:10px;">
              <div class="icon-operasional icon-mutasi" onclick="mutasi()" ></div>
              <span class="title_icon">Mutasi Penumpang</span>
        </div>
        <div class="col-lg-2" align="center" style="padding:10px  0 20px 0; margin:10px;">
              <div class="icon-operasional icon-pembatalan-tiket" onclick="batalkan_tiket()"></div>
              <span class="title_icon">Batalkan Tiket</span>
        </div>
        <div class="col-lg-2" align="center" style="padding:10px  0 20px 0; margin:10px;">
              <div class="icon-operasional icon-print" onclick="cetak_tiket_pembayaran()"></div>
              <span class="title_icon">Cetak Ulang Tiket</span>
        </div>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <button type="button"  name="tutup_informasi" onclick="tutup_informasi()" class="btn bg-orange btn-sm btn-block">Tutup Informasi</button>
    </div>
    <!-- /BUTTON RESERVASI -->
