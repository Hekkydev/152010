<div class="col-lg-12" id="info_jadwal" style="border-bottom:1px solid #ddd; margin-bottom:20px;">
  <div  class="col-xs-offset-1 col-xs-10" >
    <table width="100%">

      <tr>
        <td width=200>
          <label for="">MANIFEST</label>
        </td>
        <td>:</td>
        <td>
          <strong><?php echo $kode_manifest; ?></strong>
        </td>
      </tr>
      <tr>
        <td width=200>
          <label for="">TANGGAL</label>
        </td>
        <td>:</td>
        <td>
          <?php echo strtoupper(tgl_indo($jadwal_post->tgl_berangkat)) ?>
        </td>
      </tr>
      <tr>
        <td width=200>
          <label for="">JADWAL KEBERANGKATAN</label>
        </td>
        <td>:</td>
        <td>
          <?php echo $jadwal_post->kode.' / '.$jadwal_post->jam; ?>
        </td>
      </tr>
      <tr>
        <td width=200>
          <label for="">JURUSAN KEBERANGKATAN</label>
        </td>
        <td>:</td>
        <td>
          <?php echo strtoupper(cabang_nama($asal)).' - '.strtoupper(cabang_nama($tujuan)) ?>
        </td>
      </tr>
      <tr>
        <td width=200>
          <label for="">KENDARAAN</label>
        </td>
        <td>:</td>
        <td>
          <?php echo ChekRowsJadwal($jadwal_keberangkatan->kode_jadwal,"mobil"); ?>
        </td>
      </tr>
      <tr>
        <td width=200>
          <label for="">SOPIR</label>
        </td>
        <td>:</td>
        <td>
          <?php echo ChekRowsJadwal($jadwal_keberangkatan->kode_jadwal,"sopir"); ?>
        </td>
      </tr>
      <tr>
        <td width=200>
          <label for="">WAKTU CETAK MANIFEST</label>
        </td>
        <td>:</td>
        <td>

        </td>
      </tr>
    </table>
    <br>
  </div>
</div>
