
<div class="col-lg-12">

    <div class="panel">
      <div class="panel-heading bg-purple">
        <h3 class="panel-title">DAFTAR KEBERANGKATAN</h3>
      </div>
      <div class="panel-body">
        <table class="<?php echo $table_class;?>">
          <thead >
            <tr>
              <td style="width:200px;">Tanggal Berangkat</td>
              <td style="width:200px;">Manifest</td>
              <td style="width:200px;">Point Keberangkatan</td>
              <td style="width:200px;">Tujuan Keberangkatan</td>
              <td>Pemesan Tiket</td>
              <td>Nomor Kursi</td>
              <td>Status</td>
            </tr>
          </thead>
          <tbody>
          <?php if ($pencarian_nomor == TRUE): ?>
            <?php foreach ($pencarian_nomor as $pn): ?>
                <tr>
                  <td><?php echo tgl_indo($pn->tanggal_reservasi)." - ".$pn->jam_reservasi.":".$pn->menit_reservasi; ?></td>
                  <td><?php echo $pn->kode_manifest; ;?></td>
                  <td><?php echo cabang_nama($pn->asal_keberangkatan);?></td>
                  <td><?php echo cabang_nama($pn->tujuan_keberangkatan);?></td>
                  <td><?php echo $pn->nama_penumpang; ?></td>
                  <td><?php echo $pn->nomor_kursi ?></td>
                  <td><?php echo strtoupper($pn->tipe_shuttle);?></td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" style="text-align:center">Tidak ada jadwal keberangkatan !</td>
              </tr>
          <?php endif; ?>
          </tbody>
        </table>

      </div>
    </div>

</div>
