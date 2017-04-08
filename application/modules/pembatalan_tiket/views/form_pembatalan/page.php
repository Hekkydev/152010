<div class="form-pembatalan-tickets">

      <form class="form-horizontal" action="<?php echo site_url('pembatalan_tiket/pembatalan_tiket/proses')?>" method="post">
        <div class="form-group">
          <label class="control-label col-xs-3">Nomor / Kode Tiket</label>
          <div class="col-xs-9">
            <input type="text" name="nomor_tiket" class="form-control">
          </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
            <button type="submit" name="proses" value="ok" class="btn btn-md bg-purple"> BATALKAN TIKET</button>
          </div>
        </div>


      </form>
</div>
