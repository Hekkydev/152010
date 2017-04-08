<table class="<?PHP ECHO $table_class?>">
  <thead>
    <tr>
      <th>Kode Supir</th>
      <th>Nama Lengkap</th>
      <th>No KTP</th>
      <th>Telp</th>
      <th>Status</th>
      <th class="col-lg-2">Action</th>

    </tr>
  </thead>
  <tbody>
      <?php if ($sopir == TRUE): ?>
        <?php $no=1; foreach ($sopir as $s): ?>
            <tr>

              <td><?php echo $s->kode_sopir; ?></td>
              <td><?php echo $s->nama_lengkap; ?></td>
              <td><?php echo $s->no_ktp; ?></td>
              <td><?php echo $s->no_hp; ?></td>
              <td><?php echo $s->tipe_status; ?></td>
              <td>
                <a href="<?php echo site_url().'sopir/detail?sid='.$s->uuid_sopir; ?>" class="btn btn-sm bg-yellow">Detail</a>
                <a href="<?php echo site_url().'sopir/edit?sid='.$s->uuid_sopir; ?>" class="btn btn-sm bg-purple">Edit</a>
                <a href="<?php echo site_url().'sopir/hapus?sid='.$s->uuid_sopir; ?>" class="btn btn-sm bg-red btn-outline">Hapus</a>
              </td>
            </tr>
        <?php $no++; endforeach; ?>
        <?php else: ?>
          <tr>
            <td style="text-align:center" colspan="6">Data Tidak di Temukan!</td>
          </tr>
      <?php endif; ?>
  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
