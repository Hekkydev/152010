<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}
thead{
  border-bottom: 1px solid #ddd;
}
th, td {
    border: none;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<?php
$j = isset($jadwal->kode_jadwal) ? $jadwal->kode_jadwal : 0;
$rute = rute_jadwal($j);
if($rute == TRUE):
?>
<div id="rute_jadwal">
  <h4 style="text-align:center; font-weight:bold; margin:20px;">Detail Rute</h4>
  <table class="<?php //echo $table_class;?>">
    <thead>
      <tr>
        <td>Jam</td>
        <td>Transit</td>
        <td>Jadwal</td>
      </tr>
    </thead>
    <tbody>
      <?php //print("<pre>");print_r(rute_jadwal($jadwal->kode_jadwal));print("</pre>"); ?>
      <?php foreach ($rute as $rute_jadwal): ?>
        <?php $waktu = $rute_jadwal->jam.":".$rute_jadwal->menit   ?>
        <tr>
          <td><?php echo $waktu?></td>
          <td><?php echo cabang_nama($rute_jadwal->transit_keberangkatan) ?></td>
          <td><?php echo $rute_jadwal->kode_atr ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php endif; ?>
