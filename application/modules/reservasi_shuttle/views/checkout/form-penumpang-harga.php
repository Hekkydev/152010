<label for="">Jenis Penumpang</label>
<select class="form-control input-sm" name="" id="jenis_penumpang_harga">
  <?php
  foreach($harga_tiket as $k => $h)
  {
    if($h > 0){
      if($jenis_penumpang == $k):
        echo "<option value='".$k."-".$h."' selected=''>".strtoupper($k)." - ".rupiah($h)."</option>";
      else:
        echo "<option value='".$k."-".$h."'>".strtoupper($k)." - ".rupiah($h)."</option>";
      endif;
    }
  }
   ?>
</select>
