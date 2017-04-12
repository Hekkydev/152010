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

.modal-manifest{
  width: 500px;
  height: 600px;
  top: 50px;
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

<div class="modal fade in" id="slide-bottom-popup" data-keyboard="false" data-backdrop="static">
  <div >
    <div class="modal-content">
      <div class="modal-body modal-manifest"  style="background-color:#FFF;">
      <div style="margin-bottom:20px;" >
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span><span class="sr-only">Close</span></button>
        <h4>MANIFEST TRIP</h4>
        <hr>
        <form class="form-horizontal"  method="post">

          <div class="form-group" style="text-align:left">
            <label class="control-label col-xs-4" >UNIT MOBIL</label>
            <div class="col-lg-8">
              <select class="form-control input-sm" name="unit_mobil">
                <option value="" selected="" disabled>Pilih Unit</option>
                <?php foreach ($mobil as $m): ?>
                  <option value=""><?php echo $m->kode_unit." - ".$m->no_stnk ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group" style="text-align:left">
            <label class="control-label col-xs-4" >SOPIR</label>
            <div class="col-lg-8">
              <select class="form-control input-sm" name="data_sopir">
              <option value="" selected="" disabled>Pilih Sopir</option>
                <?php foreach ($sopir as $s): ?>
                  <option value=""><?php echo $s->kode_sopir." - ".$s->nama_lengkap ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <br>
          <div id="trip-data"></div>

      

          <div class="form-group">
            <div class="col-xs-offset-6 col-lg-6">
              <button type="button" onclick="setup_mobil_insert('')" name="button" class="btn  bg-purple btn-sm"><i class="fa fa-save"></i> SIMPAN</button>
              <button type="button" onclick="setup_mobil_insert('')" name="button" class="btn  bg-purple btn-sm"><i class="fa fa-save"></i> SIMPAN & CETAK</button>
            </div>
          </div>
        </form>
      </div>
      </div><!-- /.modal-body -->
    </div>
  </div>
</div><!-- /.modal -->
<?php //include 'script/script_manifest.php';?>
