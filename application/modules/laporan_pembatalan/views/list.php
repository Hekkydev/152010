<table class="table table-responsive table-striped table-pembatalan">
  <thead>
    <tr>
      <th style="text-align:center;">NO</th>
      <th style="text-align:center;">TANGGAL PEMBATALAN</th>
      <th style="text-align:center;">RESERVASI</th>
      <th style="text-align:center;">KODE BOOKING</th>
      <th style="text-align:center;">KODE TIKET</th>
      <th style="text-align:center;">PEMESAN</th>
      <th style="text-align:center;">TELP PENUMPANG</th>
      <th style="text-align:center;">KURSI</th>
      <th style="text-align:center;">STATUS</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $no = is_numeric($first_number) ? $first_number : 1;
     if ($pembatalan_tiket == TRUE): ?>
      <?php foreach ($pembatalan_tiket as $p): ?>
        <tr>
          <td style="text-align:center;"><?php echo $no; ?></td>
          <td style="text-align:center;"><?php echo $p->deleted_date; ?></td>
          <td style="text-align:center;"><?php echo $p->kode_manifest; ?></td>
          <td style="text-align:center;"><?php echo $p->kode_booking; ?></td>
          <td style="text-align:center;"><?php echo $p->kode_tiket; ?></td>
          <td style="text-align:center;"><?php echo $p->nama_penumpang; ?></td>
          <td style="text-align:center;"><?php echo $p->telp_penumpang; ?></td>
          <td style="text-align:center;"><?php echo $p->nomor_kursi; ?></td>
          <td style="text-align:center;">

            <?php if ($p->id_reservasi_shuttle_tipe == 1): ?>
              <font color="blue"><?php echo strtoupper($p->tipe_shuttle); ?></font>
              <?php else: ?>
              <font color="red"><?php echo strtoupper($p->tipe_shuttle); ?></font>
            <?php endif; ?>
          </td>
        </tr>
      <?php $no++; endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
