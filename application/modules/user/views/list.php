<table class="<?php echo $table_class?>">
    <thead>
      <tr>
        <th>Nama</th>
        <th>NRP</th>
        <th>Cabang</th>
        <th>Level Otoritas</th>
        <th>No HP</th>
        <th>Status</th>
        <th class="col-xs-2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($users == TRUE): ?>
        <?php $no=1; foreach ($users as $u): ?>
              <tr>
                <td><?php  echo $u->nama_lengkap; ?></td>
                <td><?php echo $u->no_reg; ?></td>
                <td><?php echo $u->nama_cabang; ?></td>
                <td><?php echo $u->tipe_group; ?></td>
                <td><?php echo $u->no_telp; ?></td>
                <td><?php echo $u->tipe_status ?></td>
                <td>
                    <a href="<?php echo site_url('user/detail?sid='.$u->uuid_user.'')?>" class="btn btn-xs bg-yellow ">Detail</a>
                    <a href="<?php echo site_url('user/edit?sid='.$u->uuid_user.'')?>" class="btn btn-xs bg-purple">Edit</a>
                    <a href="<?php echo site_url('user/hapus?sid='.$u->uuid_user.'')?>" class="btn btn-xs bg-red btn-outline ">Hapus</a>
                </td>
              </tr>
        <?php $no++; endforeach; ?>
        <?php else: ?>
          <tr>
            <td style="text-align:center" colspan="7">Data Tidak di Temukan !</td>
          </tr>
      <?php endif; ?>
    </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
