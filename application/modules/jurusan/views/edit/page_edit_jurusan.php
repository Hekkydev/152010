<div class="panel">
    <div class="panel-heading">
      <h3 class="panel-title">DATA JURUSAN</h3>
    </div>
    <div class="panel-body">
      <!--  OPEN FORM -->

      <?php $form  = array('id' =>'form-jurusan-add','class'=>'form-horizontal','onSubmit'=>'return validation()','autocomplete'=>'off'); ?>
      <?php echo form_open('jurusan/update_jurusan',$form); ?>
      <input type="hidden" name="sid" value="<?php echo $jurusan->uuid_master_jurusan?>">

      <input type="hidden" name="kode_atr_cek" >
        <div class="form-jurusan form-horizontal">

            <div class="form-group form-group-sm">
              <label for="" class="control-label col-xs-4">ID JURUSAN</label>
              <div class="col-xs-8">
                <input type="text" name="kode_jurusan" value="<?php echo $jurusan->kode_jurusan; ?>" class="form-control input-sm" readonly="">
              </div>
            </div>

              <div class="form-group form-group-sm">
                <label for="" class="control-label col-xs-4">KODE JURUSAN</label>
                <div class="col-xs-8">
                  <input type="text" name="kode_atr" value="<?php echo $jurusan->kode_atr;?>" class="form-control input-sm" placeholder="Buat kode jurusan">
                  <p id="infokode"></p>
                </div>
              </div>

              <div class="form-group form-group-sm">
                  <label for="" class="col-xs-4 control-label">ASAL KEBERANGKATAN</label>
                  <div class="col-xs-8">
                      <select class="form-control input-sm" name="asal_keberangkatan">
                          <option value="" selected="" disabled="">Pilih Asal Keberangkatan</option>
                          <?php foreach ($kota as $kt): ?>
                              <optgroup label="<?php echo $kt->nama_kota?>">
                                  <?php foreach (Cabang_helper($kt->uuid_kota)->result() as $cb): ?>
                                    <?php if ($jurusan->asal_keberangkatan == $cb->uuid_cabang): ?>
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
              <div class="form-group form-group-sm">
                  <label for="" class="col-xs-4 control-label">TUJUAN KEBERANGKATAN</label>
                  <div class="col-xs-8">
                      <select class="form-control input-sm" name="tujuan_keberangkatan">
                          <option value="" selected="" disabled="">Pilih Tujuan Keberangkatan</option>
                        <?php foreach ($kota as $kt): ?>
                            <optgroup label="<?php echo $kt->nama_kota?>">
                                <?php foreach (Cabang_helper($kt->uuid_kota)->result() as $cb): ?>
                                  <?php if ($jurusan->tujuan_keberangkatan == $cb->uuid_cabang): ?>
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
              <div class="form-group form-group-sm">
                  <label for="" class="col-xs-4 control-label">STATUS AKTIF</label>
                  <div class="col-xs-8">
                      <select class="form-control input-sm" name="id_status">
                        <?php foreach ($status as $st): ?>
                          <?php if ($jurusan->id_status == $st->id_status): ?>
                              <option value="<?php echo $st->id_status ?>" selected=""><?php echo $st->tipe_status ?></option>
                            <?php else: ?>
                                <option value="<?php echo $st->id_status ?>"><?php echo $st->tipe_status ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                  </div>
              </div>
              <div class="form-group form-group-sm">
                  <label for="" class="col-xs-4 control-label"></label>
                  <div class="col-xs-8">
                      <button type="submit" name="simpan" value="OK" class="btn btn-sm bg-purple ">SIMPAN</button>
                      <button type="button" onclick="window.location.href='/jurusan'" class="btn btn-sm bg-purple btn-outline ">KEMBALI</button>
                  </div>
              </div>

        </div>

        <?php echo form_close(); ?>





    <!-- CLOSE FORM  -->
    </div>
</div>
