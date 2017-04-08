<div class="table-otoritas">

  <table class="<?php echo $table_class;?>">
    <thead>
      <tr>
        <th>No</th>
        <th>Level Otoritas</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($otoritas as $oto): ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $oto->tipe_group ?></td>
        </tr>
      <?php $no++; endforeach; ?>
    </tbody>
  </table>


</div>
