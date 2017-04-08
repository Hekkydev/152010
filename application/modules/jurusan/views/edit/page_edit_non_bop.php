<div class="panel" id="harga-non-bop">
  <div class="panel-heading">
    <h3 class="panel-title">BIAYA NON OPERASIONAL</h3>
  </div>

    <div class="panel-body">

      <form class="form-horizontal" action="<?php echo site_url('jurusan/update_non_bop');?>" method="post">
        <input type="hidden" name="sid" value="<?php echo $jurusan->uuid_master_jurusan?>">
        <input type="hidden" name="kode_jurusan" value="<?php echo $jurusan->kode_jurusan?>">

        <div class="form-group form-group-sm">
            <label for="" class=" col-xs-4 control-label">Biaya Parkir</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="biaya_parkir" value="<?php echo $jurusan->biaya_parkir?>" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group form-gorup-sm pull-right" style="margin-right:1px;">
          <button type="submit" value="OK" name="simpan_non_bop" class="btn btn-sm bg-purple">SIMPAN</button>
        </div>

      </div>


    </form>
</div>
