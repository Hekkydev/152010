<table class="<?php echo $table_class?>">
  <thead>
    <tr>
      <td>No</td>
      <td>Nama Lengkap</td>
      <td>NRP</td>
      <td>Username</td>
      <td>Cabang</td>
      <td>Level</td>
      <td>Telp/No.Hp</td>
      <td>Login</td>
      <td>Logout</td>
      <td>Status</td>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($users as $u): ?>
      <?php if ($u->id_status_online == 2): ?>
      <tr  bgcolor="#fe5050">
        <td style="color:#FFF"><?php echo $no; ?></td>
        <td style="color:#FFF"><?php echo $u->nama_lengkap ?></td>
        <td style="color:#FFF"><?php echo $u->no_reg ?></td>
        <td style="color:#FFF"><?php echo $u->username; ?></td>
        <td style="color:#FFF"><?php echo $u->nama_cabang ?></td>
        <td style="color:#FFF"><?php echo $u->tipe_group ?></td>
        <td style="color:#FFF"><?php echo $u->no_telp ?></td>
        <td style="color:#FFF"><?php echo $u->login_date?></td>
        <td style="color:#FFF"><?php echo $u->logout_date ?></td>
        <td style="color:#FFF"><?php echo $u->tipe_status_online ?></td>
      </tr>
    <?php else: ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $u->nama_lengkap ?></td>
        <td><?php echo $u->no_reg ?></td>
        <td><?php echo $u->username; ?></td>
        <td><?php echo $u->nama_cabang ?></td>
        <td><?php echo $u->tipe_group ?></td>
        <td><?php echo $u->no_telp ?></td>
        <td><?php echo $u->login_date?></td>
        <td><?php echo $u->logout_date ?></td>
        <td><?php echo $u->tipe_status_online ?></td>
      </tr>
    <?php endif; ?>
    <?php $no++; endforeach; ?>
  </tbody>
</table>
