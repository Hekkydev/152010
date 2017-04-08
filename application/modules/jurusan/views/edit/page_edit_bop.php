<div class="panel" id="harga-bop">
  <div class="panel-heading">
    <h3 class="panel-title">BIAYA OPERASIONAL</h3>
  </div>

    <div class="panel-body">

      <form class="form-horizontal" action="<?php echo site_url('jurusan/update_bop')?>" method="post" >

        <input type="hidden" name="sid" value="<?php echo $jurusan->uuid_master_jurusan?>">
        <input type="hidden" name="kode_jurusan" value="<?php echo $jurusan->kode_jurusan?>">

        <div class="form-group form-group-sm ">
            <label for="" class=" col-xs-4 control-label">Biaya Tol</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="biaya_tol" value="<?php echo $jurusan->biaya_tol?>" class="form-control input-sm">
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label for="" class=" col-xs-4 control-label">Biaya Sopir</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="biaya_sopir" value="<?php echo $jurusan->biaya_sopir?>" class="form-control input-sm">
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label for="" class=" col-xs-4 control-label">Biaya BBM</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="biaya_bbm" value="<?php echo $jurusan->biaya_bbm?>" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="" class=" col-xs-4 control-label">Biaya Perpal</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="biaya_perpal" value="<?php echo $jurusan->biaya_perpal?>" class="form-control input-sm">
            </div>
        </div>

        <div class="form-group form-group-sm pull-right" style="margin-right:1px;">
          <button type="submit" name="simpan_bop" value="OK" class="btn btn-sm bg-purple">SIMPAN</button>
        </div>

      </form>


    </div>
</div>
