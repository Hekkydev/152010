<table class="<?php echo $table_class;?>">
  <thead>
    <tr>
      <th>Kode Kota</th>
      <th>Nama Kota</th>
      <th class="col-lg-2">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php if ($kota == TRUE): ?>
    <?php $no=1; foreach ($kota as $k): ?>
        <tr>
          <td><?php echo $k->kode_kota ?></td>
          <td><?php echo $k->nama_kota ?></td>
          <td>
            <a href="<?php echo site_url().'kota/edit?sid='.$k->uuid_kota;?>" class="btn btn-xs bg-purple"><i class="fa fa-pencil"></i> Edit</a>
            <a href="<?php echo site_url().'kota/delete?sid='.$k->uuid_kota;?>" class="btn btn-xs bg-red btn-outline"><i class="fa fa-trash"></i> Hapus</a>
          </td>
        </tr>
    <?php $no++; endforeach; ?>
  <?php else: ?>
    <tr>
      <td colspan="4" style="text-align:center">Data tidak ditemukan!</td>
    </tr>
  <?php endif; ?>

  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
