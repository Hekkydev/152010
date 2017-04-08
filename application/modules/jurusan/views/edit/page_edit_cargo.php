<div class="panel" id="harga-pengiriman-paket">
  <div class="panel-heading">
    <h3 class="panel-title">HARGA PENGIRIMAN BARANG / PAKET</h3>
  </div>

    <div class="panel-body">



      <form class="form-horizontal" action="<?php echo site_url('jurusan/update_cargo');?>" method="post">
        <input type="hidden" name="sid" value="<?php echo $jurusan->uuid_master_jurusan?>">
        <input type="hidden" name="kode_jurusan" value="<?php echo $jurusan->kode_jurusan?>">

        <h3 class="col-sm-offset-1 col-sm-10"><i class="fa fa-price"></i> Dokument</h3>
        <div class="form-group form-group-sm">
            <label for="" class=" col-xs-4 control-label">Harga /KG Pertama (Rp)</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="harga_dokument_kg_pertama" value="<?php echo $jurusan->harga_dokument_kg_pertama?>" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="" class=" col-xs-4 control-label">Harga /KG Selanjutnya (Rp)</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="harga_dokument_kg_selanjutnya" value="<?php echo $jurusan->harga_dokument_kg_selanjutnya?>" class="form-control input-sm">
            </div>
        </div>
        <br>
        <h3 class="col-sm-offset-1 col-sm-10"><i class="fa fa-price"></i> Barang</h3>
        <div class="form-group form-group-sm">
            <label for="" class=" col-xs-4 control-label small-label">Harga /KG Pertama (Rp)</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="harga_barang_kg_pertama" value="<?php echo $jurusan->harga_barang_kg_pertama?>" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="" class=" col-xs-4 control-label">Harga /KG Selanjutnya (Rp)</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="harga_barang_kg_selanjutnya" value="<?php echo $jurusan->harga_barang_kg_selanjutnya?>" class="form-control input-sm">
            </div>
        </div>
        <br>
        <h3 class="col-sm-offset-1 col-sm-10"><i class="fa fa-price"></i> Charger Bagasi</h3>
        <div class="form-group form-group-sm">
            <label for="" class=" col-xs-4 control-label">Harga /KG Pertama (Rp)</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="harga_charge_bagasi_kg_pertama" value="<?php echo $jurusan->harga_charge_bagasi_kg_pertama?>" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="" class=" col-xs-4 control-label">Harga /KG Selanjutnya (Rp)</label>
            <div class=" col-xs-8">
                <input type="text" maxlength="10" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'autoGroup': true" placeholder="0" name="harga_charge_bagasi_kg_selanjutnya" value="<?php echo $jurusan->harga_charge_bagasi_kg_selanjutnya?>" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group form-group-sm pull-right" style="margin-right:1px;">
          <button type="submit" name="simpan_cargo" value="OK" class="btn bg-purple btn-sm">SIMPAN</button>
        </div>

      </form>








    </div>
</div>
