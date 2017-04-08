<div class="panel" id="harga-tiket">
  <div class="panel-heading">
    <h3 class="panel-title">HARGA TIKET</h3>
  </div>

    <div class="panel-body">



        <table class="table table-responsive table-bordered">
        <thead class="bg-purple thead-purple">
          <tr>
            <th>Kelas</th>
            <th>Tipe</th>
            <th>Umum</th>
            <th>Mahasiswa</th>
          <th>Promo</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($kursi_mobil as $km): ?>
            <tr>
          <td>
          <?php if($km->tipe_jenis_kursi == TRUE):?>
          <span class="btn btn-sm bg-purple btn-block" style="font-size:10px;"><?php echo $km->tipe_jenis_kursi ?></span>
          <?php else:?>
          <span class="btn btn-sm bg-red btn-block" style="font-size:10px;">&nbsp;</span>
          <?php endif;?>
          </td>
              <td><span class="btn btn-sm circle-sm bg-purple" style="font-size:10px;"><?php echo $km->jumlah_kursi ?></span></td>
              <td><input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="umum_<?php echo $km->id_jml_kursi;?>"  class="form-control input-sm"></td>
              <td><input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="mahasiswa_<?php echo $km->id_jml_kursi;?>"  class="form-control input-sm"></td>
              <td><input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="promo_<?php echo $km->id_jml_kursi;?>"  class="form-control input-sm"></td>

            </tr>
          <?php endforeach; ?>
        </tbody>
        </table>















    </div>
</div>
