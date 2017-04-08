<style media="screen">
  .config{
    background-color: red;
    color:#FFF;
    padding: 5px;
    border-radius:3px;
  }

  .config-blue{
    background-color: green;
    color:#FFF;
    padding: 5px;
    border-radius:3px;
  }

  .config-dark{
    background-color: #ddd;
    color:#FFF;
    padding: 5px;
    border-radius:3px;
  }

  .config i{
    color:#FFF;
  }
  .table-jadwal thead tr th{
    text-align: center;
  }
  .table-jadwal tbody tr td{
    text-align: center;
  }
</style>
<table class="table-jadwal <?php echo $table_class?>">
  <thead>
    <tr>
      <th width=20>No</th>
      <th width=50>Jam</th>
      <th width=30>Kode Jadwal</th>
      <th width=30>Kendaraan</th>
      <th width=30>Sopir</th>
      <th width=20>Kursi</th>
      <th width=50>Status</th>
      <th width=20>Remark</th>
       </tr>
     <tr>
  </thead>
  <tbody>
    <?php if ($jadwal == TRUE): ?>
      <?php $no=1;foreach ($jadwal as $j): ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $j->jam.":".$j->menit; ?></td>
          <td><?php echo $j->kode_atr; ?></td>
          <td>
            <?php echo ChekRowsJadwal($j->kode_jadwal,"mobil"); ?>
            <span class="config-dark"><a  onclick="return set_mobil('<?php echo $j->kode_jadwal?>','<?php echo $j->kode_atr?>')" class="clicked"><i class="fa fa-car"></i></a></span>
          </td>
          <td>
            <?php echo ChekRowsJadwal($j->kode_jadwal,"sopir"); ?>
            <span class="config-dark"><a onclick="return set_sopir('<?php echo $j->kode_jadwal?>','<?php echo $j->kode_atr?>')" class="clicked"><i class="fa fa-user"></i></a></span>
          </td>
          <td><?php echo $j->jumlah_kursi.' Kursi'; ?></td>
          <td><?php echo $j->tipe_status ?></td>
          <td></td>
        </tr>
      <?php $no++; endforeach; ?>
      <?php else: ?>
        <tr>
          <td style="text-align:center; background:orange; color:#FFF;" colspan="8">
            Mohon Tentukan Cabang Asal dan Cabang Tujuan !
          </td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>
