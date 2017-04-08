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
    background: rgba(0, 0, 0, 0.85) !important;
}
.modal-body {
    position: absolute;
    bottom: 10px;
    left:10px;
    padding: 15px;
    width: 600px;
    height: 300px;
    background-color: #FFF;
	  border:2px solid purple;
    border-radius: 2px 2px 0 0;
    //-webkit-transition: bottom 0.1s ease-out;
    //-moz-transition: bottom 0.1s ease-out;
    //-o-transition: bottom 0.1s ease-out;
    //transition: bottom 0.1s ease-out;

}
.close {
    margin-top: -10px;
    text-shadow: 0 1px 0 #ffffff;
}
</style>
<!-- //////////////////////////////////////////////////// Varying Modal -->

<div class="modal fade" id="slide-bottom-popup" data-keyboard="false" data-backdrop="false">
	  <div class="modal-body" >
    <div style="margin-bottom:20px;">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span><span class="sr-only">Close</span></button>
  		<h3>DAFTAR SOPIR</h3>
  		<hr>
  		<form class="form-horizontal"  method="post">
        <div class="form-group" align="left">
          <label for="" class="col-xs-offset-1 col-lg-10"><h4>UNIQID JADWAL : <?php echo $kode_jadwal ?></h4></label>
        </div>
        <div class="form-group" align="left">
          <label for="" class="col-xs-offset-1 col-lg-10"><h4>KODE JADWAL : <?php echo $kode_atr ?></h4></label>
        </div>
        <div class="form-group" style="text-align:left">
    			<label class="control-label col-xs-4" >PILIH SOPIR</label>
    			<div class="col-lg-8">
            <select class="form-control input-sm" id="uuid_sopir">
              <?php foreach ($sopir as $s): ?>
                <option value="<?php echo $s->uuid_sopir ?>"><?php echo $s->kode_sopir." - ".$s->nama_lengkap ?></option>
              <?php endforeach; ?>
      			</select>
    			</div>
    		</div>
        <div class="form-group">
    			<div class="col-xs-offset-9 col-lg-3">
    			  <button type="button" onclick="setup_sopir_insert('<?php echo $kode_jadwal ?>')" name="button" class="btn btn-block  bg-purple btn-sm"><i class="fa fa-save"></i> SIMPAN</button>
    			</div>
    		</div>
  		</form>
    </div>
    </div><!-- /.modal-body -->
</div><!-- /.modal -->
