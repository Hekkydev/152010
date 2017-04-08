<table class="table table-responsive table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Kode Cabang</th>
      <th>Nama Cabang</th>
      <th>Lokasi di Kota</th>
      <th>Alamat</th>
      <th>No Telp</th>
      <th class="col-lg-2">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php if ($cabang == TRUE): ?>
      <?php $no=1; foreach ($cabang as $c): ?>
        <tr>
            <td><?php echo $c->kode_cabang ?></td>
          <td><?php echo $c->nama_cabang ?></td>
          <td><?php echo $c->nama_kota; ?></td>
          <td><?php echo $c->alamat_cabang ?></td>
          <td><?php echo $c->no_telp_cabang ?></td>
          <td>
            <a href="<?php echo site_url().'cabang/detail?sid='.$c->uuid_cabang?>" class="btn btn-sm bg-yellow">Detail</a>
            <a href="<?php echo site_url().'cabang/edit?sid='.$c->uuid_cabang?>" class="btn btn-sm bg-purple">Edit</a>
            <a href="<?php echo site_url().'cabang/delete?sid='.$c->uuid_cabang?>" class="btn btn-sm bg-red btn-outline">Hapus</a>
          </td>
        </tr>
      <?php $no++; endforeach; ?>
      <?php else: ?>
        <tr>
          <td style="text-align:center;" colspan="6">Data Tidak di Temukan</td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
