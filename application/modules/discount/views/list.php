<table class="<?php echo $table_class;?>">
  <thead>
    <tr>
      <td width=50>No</td>
      <td>Jenis Operasional</td>
      <td>Keterangan</td>
      <td>Tarif Diskon</td>
      <td>Status</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <?php if ($discount == TRUE): ?>
      <?php $no=1; foreach ($discount as $d): ?>
        <?php if($d->id_status == 2):?>
          <tr style="background:#fe5050">
            <td style="color:#fff"><?php echo $no; ?></td>
            <td style="color:#fff"><?php echo strtoupper($d->jenis_operasional) ?></td>
            <td style="color:#fff"><?php echo $d->informasi_diskon ?></td>
            <td style="color:#fff">Rp. <?php echo rupiah($d->jumlah_tarif_diskon) ?></td>
            <td><a class="btn bg-yellow btn-xs" onclick="change_status('<?php echo $d->id_status?>','<?php echo $d->id_tarif_diskon;?>')"><?php echo $d->tipe_status ?></a></td>
            <td>
              <a  class="btn bg-yellow btn-xs" onclick="hapus_diskon('<?php echo $d->id_tarif_diskon?>')">Hapus</a>
            </td>
          </tr>
          <?php else: ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo strtoupper($d->jenis_operasional) ?></td>
              <td><?php echo $d->informasi_diskon ?></td>
              <td><?php echo rupiah($d->jumlah_tarif_diskon) ?></td>
              <td><a class="btn bg-yellow btn-xs" onclick="change_status('<?php echo $d->id_status?>','<?php echo $d->id_tarif_diskon;?>')"><?php echo $d->tipe_status ?></a></td>
              <td>
                <a  class="btn bg-red btn-xs btn-outline" onclick="hapus_diskon('<?php echo $d->id_tarif_diskon?>')">Hapus</a>
              </td>
            </tr>
         <?php endif; ?>
      <?php $no++; endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" style="text-align:center">Tidak Ada data!</td>
          </tr>
    <?php endif; ?>
  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
