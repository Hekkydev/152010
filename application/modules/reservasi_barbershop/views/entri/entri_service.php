<style media="screen">
  #tanggal_transaksi{
    position: absolute;
    z-index: 10000;
    width: 90%;
  }
</style>
<div class="panel" style="margin-top:-15px;">
  <div class="panel-body" >
    <div class="col-lg-12">
      <div class="form-horizontal" style="margin-bottom:-15px;">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">SERVICE</div>
            <select class="form-control input-md" name="service_layanan">

            </select>
            <div class="input-group-addon click" onclick="simpan_ke_cart()"><i class="fa fa-edit"></i> ADD</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="panel" style="margin-top:-15px;">
  <div class="panel-body">
    <div class="postlist" id="postList">

    </div>
  </div>
</div>
<div class="panel" style="margin-top:-15px;">
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group form-group-sm">
          <label for="">Tanggal Transaksi : </label>
          <input id="tanggal_transaksi" class="form-control input-md">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group form-group-sm">
          <label for="">Tukang : </label>
          <select class="form-control input-md" name="pegawai_service">

          </select>
        </div>
      </div>
    </div>
  </div>
</div>
