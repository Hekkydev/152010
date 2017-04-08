<?php
  $kode_j = $kode_jadwal;
  $tgl_req = $tgl_berangkat;
?>
<div class="col-lg-offset-0 col-lg-12" style="margin-bottom:20px;padding-left:120px;">
  <div class="row">
<!--???????????????????????????????????????BARISPERTAMA??????????????????????????????????????????????????????-->
  <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,1);?>">
      <div class="col-lg-3 passengger1" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,1);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,1);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,1);?>">1</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,1);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,1)?></button>
        </div>
    </div>

    <div class="col-lg-3"  style="padding:10px  0 20px 0; margin:3px;">
      <!-- KOSONG -->
    </div>
    <!-- //////////////////////////////////////////SOPIR////////////////////////////////////////////////////// -->
    <div class="col-lg-3" align="center" style="padding:10px  0 20px 0; margin:3px;">
          <div class="icon-bangku-sopir"></div>
          <button class="btn btn-xs bg-green" ><?php echo ChekRowsJadwal($jadwal_keberangkatan->kode_jadwal,"sopir"); ?></button>
    </div>
  </div>

  <!--???????????????????????????????????????BARISKEDUA??????????????????????????????????????????????????????-->
  <div class="row">

    <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,4);?>">
      <div class="col-lg-3 passengger4" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,4);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,4);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,4);?>">4</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,4);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,4)?></button>
        </div>
    </div>

    <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,3);?>">
      <div class="col-lg-3 passengger3" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,3);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,3);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,3);?>">3</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,3);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,3)?></button>
        </div>
    </div>

    <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,2);?>">
      <div class="col-lg-3 passengger2" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,2);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,2);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,2);?>">2</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,2);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,2)?></button>
        </div>
    </div>

  </div>
<!--???????????????????????????????????????BARISKETIGA??????????????????????????????????????????????????????-->
<div class="row">

 <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,7);?>">
      <div class="col-lg-3 passengger7" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,7);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,7);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,7);?>">7</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,7);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,7)?></button>
        </div>
    </div>

 <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,6);?>">
      <div class="col-lg-3 passengger6" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,6);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,6);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,6);?>">6</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,6);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,6)?></button>
        </div>
    </div>

  <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,5);?>">
      <div class="col-lg-3 passengger5" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,5);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,5);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,5);?>">5</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,5);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,5)?></button>
        </div>
    </div>

</div>
<!--???????????????????????????????????????BARISKEEMPAT??????????????????????????????????????????????????????-->
<div class="row">

  <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,10);?>">
      <div class="col-lg-3 passengger10" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,10);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,10);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,10);?>">10</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,10);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,10)?></button>
        </div>
    </div>

 <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,9);?>">
      <div class="col-lg-3 passengger9" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,9);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,9);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,9);?>">9</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,9);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,9)?></button>
        </div>
    </div>

 <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,8);?>">
      <div class="col-lg-3 passengger8" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,8);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,8);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,8);?>">8</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,8);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,8)?></button>
        </div>
    </div>

</div>
<div class="row">

 <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,12);?>">
      <div class="col-lg-3 passengger12" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,12);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,12);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,12);?>">12</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,12);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,12)?></button>
        </div>
    </div>

    <div class="col-lg-3 passengger-" align="center" style="padding:10px  0 20px 0; margin:3px;">

    </div>

    <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,11);?>">
      <div class="col-lg-3 passengger11" align="center" style="padding:10px  0 20px 0; margin:3px;">
        <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,11);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,11);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,11);?>">11</span></div>
          <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,11);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,11)?></button>
        </div>
    </div>

</div>


</div>
