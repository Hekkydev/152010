<?php
  include 'header_jadwal.php';
  $id_jadwal = $jadwal_keberangkatan->id_jadwal;
  $kode_jadwal = $jadwal_keberangkatan->kode_jadwal;
  $kursi = $jadwal_keberangkatan->id_jml_kursi;
  $asal = $jadwal_keberangkatan->asal_keberangkatan;
  $tujuan = $jadwal_keberangkatan->tujuan_keberangkatan;
?>

<!-- METHOD NEXT POST -->
<input type="hidden" id="kode_manifest" value="<?php echo $kode_manifest?>">
<input type="hidden" id="kode_jadwal" value="<?php echo $kode_jadwal?>"/>
<input type="hidden" id="jenis_kursi" value="<?php echo $kursi?>"/>
<input type="hidden" id="point_berangkat" value="<?php echo $asal?>"/>
<input type="hidden" id="tujuan_berangkat" value="<?php echo $tujuan?>"/>
<input type="hidden" id="kode_atr"  value="<?php echo $jadwal_post->kode;?>">
<input type="hidden" id="jam" value="<?php echo $jadwal_post->jam?>">
<input type="hidden" id="uuid_cso"  value="<?php echo $usersLog->uuid_user?>">

<!-- HEADER SUB JADWAL  -->
<div class="header-title">
  <h4 style="text-align:center;">
    <span class="btn btn-xs bg-purple btn-back"> <a class="click" onclick="proses_pencarian_jadwal('<?php echo $jadwal_post->tgl_berangkat?>','<?php echo $jadwal_post->asal_keberangkatan?>','<?php echo $jadwal_post->tujuan_keberangkatan?>')"><i class="fa fa-chevron-left"></i> DAFTAR JADWAL</a> </span>
    <strong><?php echo $jadwal_post->kode?></strong> / <?php echo $jadwal_post->jam  ?>
    <span class="btn btn-xs bg-purple btn-next"> <a class="click" onclick="info_detail()" data-toggle="tooltip" data-placement="bottom" title="Informasi Jadwal"><i class="fa fa-info"></i> INFO JADWAL</a> </span>
  </h4>
</div>


<!-- INFOJADWAL -->
<div class="clearfix"><hr></div>
<?php include 'info_jadwal.php'; ?>

<!-- OPERASIONAL DETAIL JADWAL -->
<div class="clearfix"></div>
<div class="col-lg-12" style="border-bottom:1px solid #ddd; margin-bottom:20px;">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-3" align="center">
        <div class="icon-operasional icon-cetak-manifest" onclick="return cetak_manifest()"></div>
        <span class="title_icon">MANIFEST</span>
      </div>
      <div class="col-lg-6" align="center">
        <div style="height:20px;"></div>
        <h4 ><a href="#" ><strong>LAYOUT KURSI</strong></a></h4>
      </div>
      <div class="col-lg-3" align="center">
        <div class="icon-operasional icon-refresh" onclick="refresh_layout()"></div>
        <span class="title_icon">REFRESH</span>
      </div>
    </div>
  </div>
</div>


<!-- OPERASIONAL SEAT LAYOUT -->

<?php
//NEW VERSION SEATING
  $tipe_kursi = $jadwal_keberangkatan->jumlah_kursi;
  $this->load->view('reservasi_shuttle/layout_kursi/layout-mode');
  ?>

<?php  
// OLD VERSION SEATING
  //$tipe_kursi = $jadwal_keberangkatan->jumlah_kursi;
  // if($tipe_kursi == 8):
  //       $this->load->view('layout_seat/8_seat');
  // elseif($tipe_kursi == 10):
  //       $this->load->view('layout_seat/10_seat');
  // elseif($tipe_kursi == 12):
  //       $this->load->view('layout_seat/12_seat');
  // elseif($tipe_kursi == 14):
  //       $this->load->view('layout_seat/14_seat');
  // endif;
?>

<?php $this->load->view('reservasi_shuttle/inc_script/script_layout_seat.php'); ?>
