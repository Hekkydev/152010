<?php include 'header_jadwal.php'; ?>
<style media="screen">
  tr.parent{

  }

  tr.parent-hide{
      display: none;
  }
</style>
<script type="text/javascript">
    $(".time_show").click(function() {
      var $this = $(this);
      $this.toggleClass('time_show');
      if($this.hasClass('time_show')){
        $this.text('Tampilkan Keseluruhan Jam');
        $("tr.parent").addClass("parent-hide");
      } else {
        $this.text('Hanya Jam Yang Aktif');
        $("tr.parent").removeClass("parent-hide");
      }

    });


</script>
<div class="form-group" align="center">
  <a class="time_show click  btn bg-purple btn-sm">Tampilkan Keseluruhan Jam</a>
</div>
<!-- TABLE JADWAL -->
<div id="form-change" class="table-jadwal-keberangkatan">
    <table class="table table-responsive">
      <thead>
        <tr>
          <td width="5" style="text-align:center">No</td>
          <td>JAM</td>
          <td>KODE</td>
          <td>KURSI</td>
          <td>TERSEDIA</td>
          <td>BOOKING</td>
          <td>GO SHOW</td>
          <td>ACTION</td>
        </tr>
      </thead>
      <tbody>
        <?php if ($jadwal_keberangkatan  == TRUE): ?>
          <?php $no=1;foreach ($jadwal_keberangkatan as $jk):
            $waktu = $jk->jam.':'.$jk->menit;
            $waktu_skr = date('H');

            ?>
            <?php if ($waktu < $waktu_skr): ?>
                <tr bgcolor="#FF7272"  class="parent parent-hide">
                <td style="color:#FFF;text-align:center;"><?php echo $no; ?></td>
                <td style="color:#FFF"><?php echo $waktu ?></td>
                <td style="color:#FFF"><?php echo $jk->kode_atr ?></td>
                <td style="color:#FFF">
                  <p style="color:yellow"><?php echo $jk->tipe_jenis_kursi; ?></p>
                  <p style="color:#FFF"><?php echo $jk->jumlah_kursi." Kursi"; ?></p>
                </td>
                <td style="color:#FFF;text-align:center;">
                  <?php
                  $booking = info_aktif_seat($jk->kode_jadwal,$jadwal_post->tgl_berangkat,"booking");
                  $sold = info_aktif_seat($jk->kode_jadwal,$jadwal_post->tgl_berangkat,"soldout");
                  $total = $booking + $sold;
                  echo $jk->jumlah_kursi - $total;
                  ?>
                </td>
                <td style="color:#FFF;text-align:center;"><?php echo info_aktif_seat($jk->kode_jadwal,$jadwal_post->tgl_berangkat,"booking"); ?></td>
                <td style="color:#FFF;text-align:center;"><?php echo info_aktif_seat($jk->kode_jadwal,$jadwal_post->tgl_berangkat,"soldout"); ?></td>
                <td ><a class="click" style="color:#FFF" onclick="detail_jadwal('<?php echo $jadwal_post->tgl_berangkat?>','<?php echo $jadwal_post->asal_keberangkatan?>','<?php echo $jadwal_post->tujuan_keberangkatan?>','<?php echo $waktu?>','<?php echo $jk->kode_atr?>','<?php echo $jk->kode_jadwal?>')"><i class="fa fa-list"></i> DETAIL</a></td>
              </tr>
             <?php else: ?>
               <tr bgcolor="#fffff">
               <td style="text-align:center;"><?php echo $no; ?></td>
               <td><?php echo $waktu ?></td>
               <td><?php echo $jk->kode_atr ?></td>
               <td>
                 <p style="color:red"><?php echo $jk->tipe_jenis_kursi; ?></p>
                 <p><?php echo $jk->jumlah_kursi." Kursi"; ?></p>
               </td>
               <td style="text-align:center;">
                 <?php
                 $booking = info_aktif_seat($jk->kode_jadwal,$jadwal_post->tgl_berangkat,"booking");
                 $sold = info_aktif_seat($jk->kode_jadwal,$jadwal_post->tgl_berangkat,"soldout");
                 $total = $booking + $sold;
                 echo $jk->jumlah_kursi - $total;
                 ?>
               </td>
               <td style="text-align:center;"><?php echo  $booking = info_aktif_seat($jk->kode_jadwal,$jadwal_post->tgl_berangkat,"booking"); ?></td>
               <td style="text-align:center;"><?php echo $sold = info_aktif_seat($jk->kode_jadwal,$jadwal_post->tgl_berangkat,"soldout");?></td>
               <td><a class="click" onclick="detail_jadwal('<?php echo $jadwal_post->tgl_berangkat?>','<?php echo $jadwal_post->asal_keberangkatan?>','<?php echo $jadwal_post->tujuan_keberangkatan?>','<?php echo $waktu?>','<?php echo $jk->kode_atr?>','<?php echo $jk->kode_jadwal?>')"><i class="fa fa-list"></i> DETAIL</a></td>
             </tr>
            <?php endif; ?>
          <?php $no++;endforeach; ?>
          <?php else: ?>
            <tr>
              <td style="text-align:center; background:#f5f5f5;" colspan="9">
                <div class="warning_jadwal" style="margin-top:100px; margin-bottom:100px;">
                    <h1 style="color:orange;">JADWAL BELUM TERSEDIA </h1>
                </div>
              </td>
            </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
