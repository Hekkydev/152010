<?php
$id_jadwal = $jadwal_keberangkatan->id_jadwal;
$kode_jadwal = $jadwal_keberangkatan->kode_jadwal;
$kursi = $jadwal_keberangkatan->id_jml_kursi;
$asal = $jadwal_keberangkatan->asal_keberangkatan;
$tujuan = $jadwal_keberangkatan->tujuan_keberangkatan;
$tanggal_keberangkatan = isset($jadwal_post->tgl_berangkat) ? $jadwal_post->tgl_berangkat :"";
?>
<input type="hidden" id="kode_manifest" value="<?php echo $kode_manifest;?>">
<input type="hidden" id="kode_jadwal" value="<?php echo $kode_jadwal?>">
<input type="hidden" id="jenis_kursi" value="<?php echo $kursi?>">
<input type="hidden" id="point_berangkat" value="<?php echo $asal?>">
<input type="hidden" id="tujuan_berangkat" value="<?php echo $tujuan?>">
<input type="hidden" id="kode_atr"  value="<?php echo $kode;?>">
<input type="hidden" id="jam" value="<?php echo $jam?>">
<input type="hidden" id="uuid_cso"  value="<?php echo $usersLog->uuid_user?>">
<input type="hidden" id="tanggal_keberangkatan" value="<?php echo $tanggal_keberangkatan;?>">

<input type="hidden" id="kode_jurusan" value="<?php echo $biaya->kode_jurusan;?>">
<input type="hidden" id="harga_dokument_kg_pertama" value="<?php echo $biaya->harga_dokument_kg_pertama * 1;?>">
<input type="hidden" id="harga_dokument_kg_selanjutnya" value="<?php echo $biaya->harga_dokument_kg_selanjutnya * 1;?>">
<input type="hidden" id="harga_barang_kg_pertama" value="<?php echo $biaya->harga_barang_kg_pertama * 1;?>">
<input type="hidden" id="harga_barang_kg_selanjutnya" value="<?php echo $biaya->harga_barang_kg_pertama * 1;?>">
<input type="hidden" id="harga_charge_bagasi_kg_pertama" value="<?php echo $biaya->harga_barang_kg_pertama * 1;?>">
<input type="hidden" id="harga_charge_bagasi_kg_selanjutnya" value="<?php echo $biaya->harga_barang_kg_pertama * 1;?>">

<div class="header-title">

  <h4 style="text-align:center;">
    <span class="btn btn-xs bg-purple btn-back"> <a class="click" onclick="proses_pencarian_jadwal('<?php echo $tgl_berangkat?>','<?php echo $point?>','<?php echo $tujuan?>')"><i class="fa fa-chevron-left"></i> Daftar Jadwal</a> </span>
    <strong><?php echo $jadwal_post->kode ?></strong> / <?php echo $jadwal_post->jam;  ?>
    <span class="btn btn-xs bg-purple btn-next"> <a class="click" onclick="info_detail()"><i class="fa fa-info"></i> Info Jadwal</a> </span>
  </h4>

</div>
<hr>
<div class="clearfix"></div>

<?php  include 'info_jadwal.php';?>

<div class="clearfix"><br></div>
<div class="col-lg-12" style="border-bottom:1px solid #ddd; margin-bottom:20px;">

  <div class="form-group">
    <div class="row">
      <div class="col-lg-3" align="center">
        <div class="icon-operasional icon-cetak-manifest" onclick="return cetak_manifest()"></div>
        <span class="title_icon">Cetak Manifest</span>
      </div>
      <div class="col-lg-6" align="center">
        <div style="height:20px;"></div>
        <h4 ><strong>LIST PAKET</strong></h4>
      </div>
      <div class="col-lg-3" align="center">
        <div class="icon-operasional icon-refresh" onclick="refresh_layout()"></div>
        <span class="title_icon">Refresh Layout</span>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"><br></div>
<?php include 'list_paket.php'; ?>
