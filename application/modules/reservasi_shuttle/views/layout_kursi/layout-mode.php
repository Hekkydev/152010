<?php 
$jumlah_block = $jadwal_keberangkatan->jumlah_block;
$kode_j = $jadwal_keberangkatan->kode_jadwal;
$tgl_req = $jadwal_post->tgl_berangkat;
?>
<div class="col-lg-offset-1 col-lg-11" style="margin-bottom:20px;padding-left:70px;">
<div class="row">
<?php
for($i = 1 ; $i <= $jumlah_block ; $i++){
$cek_block = $this->general->cek_block($jadwal_keberangkatan->id_jml_kursi,$i);
if($cek_block == TRUE):
?>
<?php if($cek_block->nomor_kursi != 0):?>
            <!--PENUMPANG-->
            <div class="penumpang <?php echo cek_penumpang_info($kode_j,$tgl_req,$cek_block->nomor_kursi);?>">
                <div class="col-lg-3 passengger1" align="center" style="padding:10px  0 20px 0; margin:3px;">
                    <div class="icon-bangku <?php echo cek_penumpang_status($kode_j,$tgl_req,$cek_block->nomor_kursi);?>" <?php echo cek_penumpang_data($kode_j,$tgl_req,$cek_block->nomor_kursi);?>><span class="infoSeat <?php echo cek_penumpang_seat($kode_j,$tgl_req,$cek_block->nomor_kursi);?>"><?php print_r($cek_block->nomor_kursi);?></span></div>
                    <button class="btn-bangku btn btn-xs <?php echo cek_penumpang_button($kode_j,$tgl_req,$cek_block->nomor_kursi);?>"><?php echo cek_penumpang_nama($kode_j,$tgl_req,$cek_block->nomor_kursi)?></button>
                    </div>
            </div>


        <?php else:?>

         <!-- //////////////////////////////////////////SOPIR////////////////////////////////////////////////////// -->
            <div class="col-lg-3" align="center" style="padding:10px  0 20px 0; margin:3px;">
                <div class="icon-bangku-sopir"></div>
                <button class="btn btn-xs bg-green" ><?php echo ChekRowsJadwal($jadwal_keberangkatan->kode_jadwal,"sopir"); ?></button>
            </div>

         <?php endif;?>
<?php else:?>

<div class="col-lg-3"  style="padding:10px  0 20px 0; margin:3px;">
      <!-- KOSONG -->
</div>
<?php
endif;
}
?>

</div>
</div>
