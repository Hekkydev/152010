<!-- HEADER JADWAL -->
<div class="data-jadwal" align="center">
  <h4>
    <span class="btn btn-md bg-purple nonclick" style="background:#7a299f;">POINT : <?php echo strtoupper(cabang_nama($jadwal_post->asal_keberangkatan)) ?></span>
    <span class="btn btn-md bg-purple nonclick" style="background:#7a299f;">TUJUAN : <?php echo strtoupper(cabang_nama($jadwal_post->tujuan_keberangkatan)) ?></span>
  </h4>
  <br>
  <h4>
  <?php
  if($jadwal_post->tgl_berangkat == date('Y-m-d')){
    echo strtoupper("tgl keberangkatan :  HARI INI - ".tgl_indo($jadwal_post->tgl_berangkat));
  }else{
    echo strtoupper("tgl keberangkatan : ".tgl_indo($jadwal_post->tgl_berangkat));
  }
  ?>
  </h4>
</div>


<hr>
