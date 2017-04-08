<div class="data-jadwal" align="center">
  <h4>
    <span class="btn btn-md bg-purple nonclick" style="background:#7a299f;">POINT : <?php echo strtoupper(cabang_nama($point)) ?></span>
    <span class="btn btn-md bg-purple nonclick" style="background:#7a299f;">TUJUAN : <?php echo strtoupper(cabang_nama($tujuan)) ?></span>
  </h4>
  <br>
  <h4>
  <?php
  if($tgl_berangkat == date('Y-m-d')){
    echo strtoupper("tgl keberangkatan :  HARI INI - ".tgl_indo($tgl_berangkat));
  }else{
    echo strtoupper("tgl keberangkatan : ".tgl_indo($tgl_berangkat));
  }
  ?>
  </h4>
</div>
  <hr>
  <div id="form-change" class="table-jadwal-keberangkatan">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td width="5" style="text-align:center">No</td>
          <td>Jam</td>
          <td>Kode</td>
          <td>Kursi</td>
          <td>Tersedia</td>
          <td>Booking</td>
          <td>Sold Out</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php if ($jadwal_keberangkatan  == TRUE): ?>
          <?php $no=1;foreach ($jadwal_keberangkatan as $jk):
            $waktu = $jk->jam.':'.$jk->menit;
            $waktu_skr = date('H');

            ?>
            <?php if ($waktu < $waktu_skr): ?>
                <tr bgcolor="#fe5050" >
                <td style="color:#FFF;text-align:center;"><?php echo $no; ?></td>
                <td style="color:#FFF"><?php echo $waktu ?></td>
                <td style="color:#FFF"><?php echo $jk->kode_atr ?></td>
                <td style="color:#FFF">
                  <p style="color:yellow"><?php echo $jk->tipe_jenis_kursi; ?></p>
                  <p style="color:#FFF"><?php echo $jk->jumlah_kursi." Kursi"; ?></p>
                </td>
                <td style="color:#FFF"></td>
                <td style="color:#FFF"></td>
                <td style="color:#FFF"></td>
                <td ><a class="click" style="color:#FFF" onclick="detail_jadwal('<?php echo $tgl_berangkat?>','<?php echo $point?>','<?php echo $tujuan?>','<?php echo $waktu?>','<?php echo $jk->kode_atr?>','<?php echo $jk->kode_jadwal?>')"><i class="fa fa-list"></i> DETAIL</a></td>
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
               <td></td>
               <td></td>
               <td></td>
               <td><a class="click" onclick="detail_jadwal('<?php echo $tgl_berangkat?>','<?php echo $point?>','<?php echo $tujuan?>','<?php echo $waktu?>','<?php echo $jk->kode_atr?>','<?php echo $jk->kode_jadwal?>')"><i class="fa fa-list"></i> DETAIL</a></td>
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
