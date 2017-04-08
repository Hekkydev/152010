<hr>
<h4>DATA CUSTOMER</h4>
<br>
<div class="form-customers-shuttle_open">
  <div id="cloning-customer">
      <div class="form-group form-group-sm form-kode-member">
        <label for="">Kode Member</label>
        <input type="text" name="kode_member" id="kode_member" value="" class="form-control input-sm">
        <p id="kode_member_message" style="color:#CC0000;"></p>
      </div>
      <div class="form-group form-group-sm form-telephone">
        <label for="">Telphone</label>
        <input type="text" name="" value="" class="form-control input-sm" id="no_handphone">
        <p id="nomor_telp_message" style="color:#006600;"></p>
      </div>
      <div class="form-group form-group-sm form-nama-penumpang">
        <label for="">Nama Lengkap</label>
        <input type="text" name="" value="" class="form-control input-sm" id="nama_depan">
      </div>

      <div class="form-group form-group-sm" style="margin-bottom:20px;">
        <label for="">Jenis Penumpang</label>
        <select class="form-control input-sm" name="" id="jenis_penumpang_harga">
          <?php
          foreach($harga_tiket as $k => $h)
          {
            if($h > 0){
              if($jenis_penumpang == $k):
                echo "<option value='".$k."-".$h."' selected=''>".ucfirst($k)." - ".rupiah($h)."</option>";
              else:
                echo "<option value='".$k."-".$h."'>".ucfirst($k)." - ".rupiah($h)."</option>";
              endif;
            }
          }
           ?>
        </select>
      </div>

        <div class="form-group form-group-sm">
          <label for="">Keterangan</label>
          <textarea id="keterangan_penumpang" rows="5" cols="80" class="form-control input-sm"></textarea>
        </div>
  </div>

    <div class="form-group">
      <button type="button" name="button" class="btn btn-md bg-purple btn-block btn-outline" onclick="return booking()">BOOKING</button>
    </div>
    <div class="form-group">
      <button type="button" name="button" class="btn btn-md  btn-block bg-purple" onclick="return go_show()">GO SHOW</button>
    </div>
</div>
<?php $this->load->view('script/script_layout_new_customers'); ?>
