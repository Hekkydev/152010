<table class="<?php echo $table_class?>">
  <thead>
    <tr>
      <th>Kode Unit</th>
      <th>No Kendaraan</th>
      <th>Merek & Jenis</th>
      <th>Jumlah Kursi</th>
      <th>Sopir</th>
      <th class="col-lg-2">Action</th>

    </tr>
  </thead>
  <tbody>
      <?php if ($mobil == TRUE): ?>
        <?php $no = 1; foreach ($mobil as $m): ?>
              <tr>
                <td><?php echo $m->kode_unit; ?></td>
                <td><?php echo $m->no_stnk ?></td>
                <td><?php echo $m->merek.' - '.$m->jenis; ?></td>
                <td><?php echo $m->jumlah_kursi ?></td>
                <td><?php echo $m->nama_lengkap ?></td>
                <td>
                  <a href="<?php echo site_url('mobil/detail?sid='.$m->uuid_mobil_unit.'')?>" class="btn btn-sm bg-yellow">Detail</a>
                  <a href="<?php echo site_url('mobil/edit?sid='.$m->uuid_mobil_unit.'')?>" class="btn btn-sm bg-purple">Edit</a>
                  <a href="<?php echo site_url('mobil/delete?sid='.$m->uuid_mobil_unit.'')?>" class="btn btn-sm bg-red btn-outline">Hapus</a>
                </td>
              </tr>
        <?php $no++; endforeach; ?>
        <?php else: ?>
          <tr>
            <td style="text-align:center" colspan="6"> Data Tidak di Temukan!</td>
          </tr>
      <?php endif; ?>
  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
