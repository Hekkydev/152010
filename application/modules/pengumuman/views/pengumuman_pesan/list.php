<table class="<?php echo $table_class?>">
  <thead>
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Pembuat</th>
      <th>Judul</th>
      <th>Keterangan</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($pengumuman == TRUE): ?>
      <?php $no=1; foreach ($pengumuman as $p): ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $p->created_date; ?></td>
          <td><strong><?php echo ucfirst($p->nama_lengkap); ?></strong></td>
          <td><?php echo ucfirst($p->judul_pengumuman) ?></td>
          <td><?php echo substr(strip_tags($p->ket_pengumuman),0,30);?></td>
          <td>
            <a href="#" onclick="Start('<?php echo base_url().'pengumuman/pengumuman_pesan/detail_source?sid='.$p->uuid_pengumuman.'' ?>');">Detail</a>
          </td>
        </tr>
      <?php $no++; endforeach; ?>
      <?php else: ?>
        <tr>
          <td style="text-align:center;" colspan="6">Data Tidak di Temukan!</td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
