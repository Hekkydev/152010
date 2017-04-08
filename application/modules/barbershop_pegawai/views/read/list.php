<table class="<?php echo $table_class?>">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Pegawai</th>
      <th>No Telp</th>
      <th>Nama Pegawai</th>
      <th>Unit Cabang</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($list == TRUE): ?>
      <?php $no=1; foreach ($list as $l): ?>
        <tr>
          <td><?php echo $no ?></td>
          <td><?php echo $l->kode_pegawai ?></td>
          <td><?php echo $l->telp_pegawai ?></td>
          <td><?php echo strtoupper($l->nama_pegawai) ?></td>
          <td><?php echo cabang_nama($l->uuid_cabang); ?></td>
          <td width=80>
            <a class="btn btn-xs bg-yellow" onclick="change_status('<?php echo $l->id_barbershop_pegawai?>','<?php echo $l->id_status?>')"><?php echo $l->tipe_status ?></a>
          </td>
          <td width=120>
            <a class="btn btn-xs bg-purple btn-outline" href="<?php echo site_url('barbershop_pegawai/edit?sid='.$l->kode_pegawai.'')?>">Edit</a>
            <a class="btn btn-xs bg-red" onclick="remove_service('<?php echo $l->id_barbershop_pegawai?>')">Hapus</a>
          </td>
        </tr>
      <?php $no++; endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>

<?php echo $this->ajax_pagination->create_links(); ?>
