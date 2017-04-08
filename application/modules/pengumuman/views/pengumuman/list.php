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
            <?php $attrib_button  = array( 'class' =>$button_outline); ?>
            <?php echo anchor('pengumuman/edit?sid='.$p->uuid_pengumuman.'', 'Detail',$attrib_button); ?>
            <?php echo anchor('pengumuman/hapus?sid='.$p->uuid_pengumuman.'', 'Hapus',$attrib_button); ?>
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
