<div id="transit"  style="border:2px dotted orange; padding:10px; margin-top:20px;">
<div class="form-group  form-group-sm">
        <label for="" class="col-sm-4 control-label">Asal Utama</label>
        <div class="col-sm-8">
          <select class="form-control" name="asal_utama" id="asal_utama">
            <option value="" selected="" disabled="">Pilih Keberangkatan</option>
              <?php foreach ($kota as $k): ?>
                <optgroup label="<?php echo $k->nama_kota?>">
                  <?php
                  if($jadwal->id_jenis_jadwal == 2){
                    $asal = $jadwal->asal_keberangkatan;
                  }else{
                    $asal = $jadwal->transit_keberangkatan;
                  }
                   ?>
                  <?php foreach (Cabang_helper($k->uuid_kota)->result() as $cb): ?>
                    <?php if ($asal == $cb->uuid_cabang ): ?>
                        <option value="<?php echo $cb->uuid_cabang?>" selected=""><?php echo $cb->nama_cabang; ?></option>
                      <?php else: ?>
                        <option value="<?php echo $cb->uuid_cabang?>"><?php echo $cb->nama_cabang; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </optgroup>
              <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="form-group  form-group-sm ">
        <label for="" class="col-sm-4 control-label">Tujuan Utama</label>
        <div class="col-sm-8" >
          <select class="form-control " name="tujuan_utama" id="tujuan_utama">
              <option value="" selected="" disabled="">Pilih Tujuan</option>
          </select>
        </div>
      </div>

  <div class="form-group  form-group-sm ">
        <label for="" class="col-sm-4 control-label">Jadwal</label>
        <div class="col-sm-8" >
          <select class="form-control " name="jadwal_utama" id="jadwal_utama">
              <option value="" selected="" disabled="">Pilih Jadwal</option>
          </select>
        </div>
      </div>
</div>
