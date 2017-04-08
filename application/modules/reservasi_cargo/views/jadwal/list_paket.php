<div class="col-lg-12" style="border-bottom:1px solid #ddd; margin-bottom:20px;">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>RESI</th>
        <th colspan="2" style="text-align:center;">PELANGGAN</th>
        <th style="text-align:center;">BIAYA</th>
        <th style="text-align:center;">STATUS</th>
      </tr>
    </thead>
    <tbody>
    <?php if ($paket == TRUE): ?>
      <?php foreach ($paket as $paket): ?>
        <tr class="click" onclick="detail_paket('<?php echo $paket->nomor_resi_paket?>')" >
          <td>
            <h5 ><?php echo $paket->nomor_resi_paket ?></h5>
            <br>
            <p><?php echo strtoupper($paket->tipe_jenis_pengiriman_paket); ?></p>
            <p class="small-text">Koli : <?php echo  $paket->jumlah_koli_paket?> Paket </p>
            <p class="small-text">Layanan : <?php echo $paket->jenis_layanan_paket ?></p>
          </td>
          <td style="text-align:center;">
            <strong>PENGIRIM</strong>
            <p><?php echo strtoupper($paket->nama_pengirim); ?></p>
          </td>
          <td style="text-align:center;">
            <strong>PENERIMA</strong>
            <p><?php echo strtoupper($paket->nama_penerima); ?></p>
          </td>
          <td style="text-align:center;">
            <p><?php echo $paket->berat_kg ?>/Kg</p>
            <p>Rp. <?php echo rupiah($paket->harga_total) ?></p>
          </td>
          <td style="text-align:center; padding:10px;">
            <?php if ($paket->id_status_pengiriman_paket ==1): ?>
              <span class="bg-red btn btn-sm">
                <?php echo strtoupper($paket->tipe_status_pengiriman_paket) ?>
              </span>
              <?php else: ?>
              <span class="bg-green btn btn-sm">
                <?php echo strtoupper($paket->tipe_status_pengiriman_paket) ?>
              </span>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" style="text-align:center;padding:20px;">
            <img src="<?php echo base_url()?>assets/icons/icon-box-kosong.svg" style="width:50px;height:70px;margin-bottom:20px">
            <h3>DATA PAKET KOSONG !</h3>

          </td>
        </tr>
    <?php endif; ?>
    </tbody>
  </table>

</div>
