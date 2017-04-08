<div class="col-lg-12" id="info_jadwal" style="border-bottom:1px solid #ddd; margin-bottom:20px;">
  <div  class="col-xs-offset-1 col-xs-10" >
    <table width="100%">

      <tr>
        <td width=220>
          <label for="">MANIFEST</label>
        </td>
        <td>:</td>
        <td>
          <strong><?php echo $kode_manifest ?></strong>
        </td>
      </tr>
      <tr>
        <td width=220>
          <label for="">TANGGAL</label>
        </td>
        <td>:</td>
        <td>
          <?php echo strtoupper(tgl_indo($jadwal_post->tgl_berangkat)) ?>
        </td>
      </tr>
      <tr>
        <td width=220>
          <label for="">JADWAL KEBERANGKATAN</label>
        </td>
        <td>:</td>
        <td>
          <?php echo $jadwal_post->kode.' / '.$jadwal_post->jam; ?>
        </td>
      </tr>
      <tr>
        <td width=220>
          <label for="">JURUSAN KEBERANGKATAN</label>
        </td>
        <td>:</td>
        <td>
          <?php echo strtoupper(cabang_nama($asal)).' - '.strtoupper(cabang_nama($tujuan)) ?>
        </td>
      </tr>
      <tr>
        <td width=220>
          <label for="">KENDARAAN</label>
        </td>
        <td>:</td>
        <td>
          <?php echo ChekRowsJadwal($jadwal_keberangkatan->kode_jadwal,"mobil"); ?>
        </td>
      </tr>
      <tr>
        <td width=220>
          <label for="">SOPIR</label>
        </td>
        <td>:</td>
        <td>
          <?php echo ChekRowsJadwal($jadwal_keberangkatan->kode_jadwal,"sopir"); ?>
        </td>
      </tr>
      <tr>
        <td width=220>
          <label for="">WAKTU CETAK MANIFEST</label>
        </td>
        <td>:</td>
        <td>

        </td>
      </tr>
      <tr>
        <td width=220>
          <label for="">TIPE KELAS</label>
        </td>
        <td>:</td>
        <td>
          <strong><?php echo strtoupper($jadwal_keberangkatan->tipe_jenis_kursi); ?></strong>
        </td>
      </tr>
      <!-- HARGA TIKET -->
      <tr>
        <td width=220>
          <label for="">HARGA TIKET</label>
        </td>
        <td>:</td>
        <td>
          <p>UMUM / <?php echo rupiah(cek_harga_jadwal($kursi,$asal,$tujuan)->umum); ?></p>
        </td>
      </tr>
      <tr>
        <td width=220>
          <label for=""></label>
        </td>
        <td> </td>
        <td>
          <p>MAHASISWA / <?php echo rupiah(cek_harga_jadwal($kursi,$asal,$tujuan)->mahasiswa); ?></p>
        </td>
      </tr>
      <tr>
        <td width=220>
          <label for=""></label>
        </td>
        <td> </td>
        <td>
          <p>PROMO / <?php echo rupiah(cek_harga_jadwal($kursi,$asal,$tujuan)->promo); ?></p>
        </td>
      </tr>
      <!-- /HARGA TIKET -->


    </table>
    <br>
  </div>
</div>
