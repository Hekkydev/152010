<style>

.modal {
    display: none;
    overflow: hidden;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    background: rgba(0, 0, 0, 0.15) !important;
}
.modal-body {
    position: absolute;

}

.modal-koreksi-biaya{
  width: 500px;
  height: 500px;
  top: 160px;
  left:10px;
  bottom:0;
}
.close {
    margin-top: -8px;
    text-shadow: 0 1px 0 #ffffff;
    color:purple;
}
</style>
<!-- //////////////////////////////////////////////////// Varying Modal -->

<div class="modal fade in" id="modal-koreksi-biaya" data-keyboard="false" data-backdrop="static">
  <div >
    <div class="modal-content">
      <div class="modal-body modal-koreksi-biaya"  style="background-color:#FFF;">
      <div style="margin-bottom:20px;" >
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span><span class="sr-only">Close</span></button>
        <h4><img src="<?php echo base_url()?>assets/icons/icon-koreksi-diskon.svg" style="width:20px;">  KOREKSI HARGA</h4>
        <hr>

        <div class="col-xs-12">
          <table class="table" style="background: white; width: 100%;">
            <tbody>
            <tr>
            	<td>
            		<h4 class="formHeader sectiontitle left" style="margin-top: 5px; margin-left: 10px;">Daftar Jenis Harga</h4>
            	</td>
            </tr>
            <tr><td class="pad10">
            	<table class="table" bgcolor="white" width="100%">
            		<tbody>
                  <tr height="30">
                    <td>Silahkan pilih harga tiket</td>
                    <td>
                      <input type="hidden" id="koreksi_kode_tiket" value="<?php echo $penumpang->kode_tiket; ?>">
                      <div id="rewrite_list_discount_dialog">
                        <select class="form-control input-sm" id="jenis_koreksi_harga">
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
                      </div>
                    </td>
                </tr>

                <tr height="30">
                  <td>Silahkan pilih harga diskon</td>
                  <td>
                    <div id="rewrite_list_discount_dialog">
                      <?php if ($diskon == TRUE): ?>
                        <p><small>Pilih diskon jika digunakan</small></p>
                        <select class="form-control input-sm" name="diskon_penumpang" id="koreksi_diskon_penumpang">
                            <option value="" selected="">PILIH DISKON</option>
                            <?php foreach ($diskon as $diskon): ?>
                              <option value="<?php echo $diskon->jumlah_tarif_diskon;?>"><?php echo $diskon->informasi_diskon.' - '.rupiah($diskon->jumlah_tarif_diskon) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php else: ?>
                          <select class="form-control input-sm" name="diskon_penumpang" id="koreksi_diskon_penumpang" readonly></select>
                          <p><small>Tidak ada diskon</small></p>

                      <?php endif; ?>
                    </div>
                  </td>
                </tr>

            		<tr height="30"><td colspan="2">Untuk melakukan proses ini, minimal akses anda haruslah supervisor, silahkan masukkan username dan password anda</td></tr>
            		<tr height="30"><td><i class="fa fa-user"></i> Username</td><td><input class="form-control input-sm" placeholder="Username" type="text" id="korek_disc_username"></td></tr>
            		<tr height="30"><td><i class="fa fa-key"></i> Password</td><td><input class="form-control input-sm" placeholder="Password" type="password" id="korek_disc_password"></td></tr>
            	</tbody></table>
            	<input class="btn btn-md bg-purple" style="width: 40%; padding: 10px; float: right;" type="button" onclick="koreksi_harga_proses()" id="dialog_simpan_koreksi" value="update_harga">
              <small id="info_perubahan"></small>
            </td></tr>
            </tbody>
          </table>
        </div>

      </div>
      </div><!-- /.modal-body -->
    </div>
  </div>
</div><!-- /.modal -->
