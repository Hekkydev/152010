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
                <p class="control-label"><strong>Kode Booking :</strong></p>
                <span id="kode_booking_detail" style="font-size:20px;"><?php echo $penumpang->kode_booking ?></span>
              </div>
              <div class="form-group">
                <p class="control-label"><strong>Kode Tiket :</strong></p>
                  <span id="no_tiket_detail" style="font-size:20px;"><?php echo $penumpang->kode_tiket ?></span>
              </div>
              <div class="form-group form-group-sm">
                <label for="">Kode Member :</label>
                  <input id="kode_member_detail" class="form-control input-sm" type="text" value="<?php echo $penumpang->kode_member?>">

              </div>
              <div class="form-group form-group-sm">
                <label for="">Telphone</label>
                <input type="text" id="no_handphone_penumpang_detail" value="<?php echo $penumpang->telp_penumpang?>" class="form-control input-sm" >
              </div>
              <div class="form-group form-group-sm">
                <label for="">Nama Lengkap</label>
                <input type="text" id="nama_penumpang_detail" value="<?php echo $penumpang->nama_penumpang;?>" class="form-control input-sm">
              </div>

              <div class="form-group form-group-sm" style="margin-bottom:20px;">
                <label for="">Jenis Penumpang</label>
                <select class="form-control input-sm" id="jenis_penumpang_harga_detail">
                  <?php
                  foreach($harga_tiket as $k => $h)
                  {
                    if($h > 0){
                      if($jenis_penumpang == $k):
                        echo "<option value='".$k."-".$h."' selected=''>".strtoupper($k)." - ".rupiah($h)."</option>";
                      else:
                        echo "<option value='".$k."-".$h."'>".strtoupper($k)." - ".rupiah($h)."</option>";
                      endif;
                    }
                  }
                   ?>
                </select>
              </div>

                <div class="form-group form-group-sm">
                  <label for="">Keterangan</label>
                  <textarea id="keterangan_penumpang_detail" class="form-control input-sm"><?php echo $penumpang->keterangan_penumpang ?></textarea>
                </div>
                <div class="form-group"  style="margin-bottom:10px;">
                  <button type="button" onclick="update_penumpang_detail()" class="btn btn-sm bg-purple pull-right">SIMPAN</button>
                </div>
                <br><br>

  </div>



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
          <label for="harga_total_tiket_detail" class="col-lg-6 small-text-bold pull-right" style="text-align:right;">Rp.
            <?php
            echo rupiah($sub_total = $penumpang->tarif_penumpang - $penumpang->tarif_diskon);
            ?>
        </label>
        </div>
    </div>


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
    </div>
    <br>
    <hr>
    <div class="form-group" align="center">
      <div class="col-lg-offset-2 col-lg-11">
        <div class="row">
          <div class="col-lg-2" align="center" style="padding:10px  0 20px 0; margin:10px;">
                <div class="icon-operasional icon-mutasi" onclick="mutasi()" ></div>
                <span class="title_icon">Mutasi Penumpang</span>
          </div>
          <div class="col-lg-2" align="center" style="padding:10px  0 20px 0; margin:10px;">
                <div class="icon-operasional icon-pembatalan-tiket" onclick="batalkan_tiket()"></div>
                <span class="title_icon">Batalkan Tiket</span>
          </div>
          <?php if ($jumlah_penumpang > 1): ?>
            <div class="col-lg-2" align="center" style="padding:10px  0 20px 0; margin:10px;">
                  <div class="icon-operasional icon-print" onclick="change_to_go_show();"></div>
                  <span class="title_icon">Cetak Semua Tiket</span>
            </div>
          <?php else: ?>
            <div class="col-lg-2" align="center" style="padding:10px  0 20px 0; margin:10px;">
                  <div class="icon-operasional icon-print" onclick="change_to_go_show();"></div>
                  <span class="title_icon">Cetak Tiket</span>
            </div>
        <?php endif; ?>
        </div>
      </div>
    </div>
    <hr>
  <div class="form-group">
    <button type="button"  name="tutup_informasi" onclick="tutup_informasi()" class="btn bg-orange btn-sm btn-block">Tutup Informasi</button>
  </div>
</div>
