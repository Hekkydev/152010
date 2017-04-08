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
  <hr>
  <div id="form-change" class="table-jadwal-keberangkatan">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td width="5" style="text-align:center">No</td>
          <td>Jam</td>
          <td>Kode</td>
          <td>Informasi</td>
          <td width=100>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php if ($jadwal_keberangkatan  == TRUE): ?>
          <?php
            $no=1;
            foreach ($jadwal_keberangkatan as $jk):

            $waktu = $jk->jam.':'.$jk->menit;
            $waktu_skr = date('H');
            $push = "'".$tgl_berangkat."','".$point."','".$tujuan."','".$waktu."','".$jk->kode_atr."','".$jk->kode_jadwal."'";

            ?>
            <?php if ($waktu < $waktu_skr): ?>
                <tr bgcolor="#fe5050" class="parent parent-hide">
                <td style="color:#FFF;text-align:center;"><?php echo $no; ?></td>
                <td style="color:#FFF"><?php echo $waktu ?></td>
                <td style="color:#FFF"><?php echo $jk->kode_atr ?></td>
                <td></td>
                <td><a class="click" style="color:#FFF" onclick="detail_jadwal(<?php  echo $push ?>)"><i class="fa fa-list"></i> DETAIL</a></td>
              </tr>
             <?php else: ?>
               <tr bgcolor="#fffff">
               <td style="text-align:center;"><?php echo $no; ?></td>
               <td><?php echo $waktu ?></td>
               <td><?php echo $jk->kode_atr ?></td>

               <td></td>
               <td><a class="click" onclick="detail_jadwal(<?php  echo $push ?>)"><i class="fa fa-list"></i> DETAIL</a></td>
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
