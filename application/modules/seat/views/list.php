<table class="<?php echo $table_class;?>">
      <thead>
        <tr>
          <td width=20>No</td>
          <td>Tipe Kelas</td>
          <td>Jumlah Seat</td>
          <td width=220>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php $no = $no; foreach ($kursi as $k): ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $k->tipe_jenis_kursi ?></td>
            <td><?php echo $k->jumlah_kursi ?> - Kursi</td>
            <td>
              <a href="<?php echo site_url('seat/edit?sid='.$k->id_jml_kursi.'');?>" class="btn btn-xs bg-purple btn-outline">Edit</a>
              <a href="<?php echo site_url('seat/layout?sid='.$k->id_jml_kursi.'');?>" class="btn btn-xs bg-green">Layout</a>
              <a href="<?php echo site_url('seat/status?sid='.$k->id_jml_kursi.'');?>" class="btn btn-xs bg-red">NONAKTIFKAN</a>
            </td>
          </tr>
        <?php $no++; endforeach; ?>
      </tbody>
    </table>
<?php echo $this->ajax_pagination->create_links();?>