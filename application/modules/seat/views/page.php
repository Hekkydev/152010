<?php include 'atr/atr.php'; ?>
<div class="page-seat">
  <div class="">
    <table class="<?php echo $table_class;?>">
      <thead>
        <tr>
          <td width=20>No</td>
          <td>Tipe Kelas</td>
          <td>Jumlah Seat</td>
          <td width=120>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($kursi as $k): ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $k->tipe_jenis_kursi ?></td>
            <td><?php echo $k->jumlah_kursi ?> - Kursi</td>
            <td>
              <a href="#" class="btn btn-sm bg-purple btn-outline">Edit</a>
              <a href="#" class="btn btn-sm bg-red">Hapus</a>
            </td>
          </tr>
        <?php $no++; endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
