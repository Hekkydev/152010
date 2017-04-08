<table class="<?php echo $table_class;?>">
  <thead>
    <tr>
      <td>No</td>
      <td>Ip Address</td>
      <td>Date Time</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($sess as $s): ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $s->ip_address; ?></td>
        <td><?php echo $s->timestamp; ?></td>
        <td>
          <?php echo anchor('segments', 'Delete', $atr = array('')); ?>
        </td>
      </tr>
    <?php $no++; endforeach; ?>
  </tbody>
</table>
