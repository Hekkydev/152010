<?php $form = array('class'=>'form-horizontal'); ?>
<div class="form-mobil" style="padding:30px;">
<?php echo form_open('mobil/update',$form); ?>
<?php
  $IDhidden = array(
    'name'=>'id_mobil_unit',
    'type'=> 'hidden',
    'value'=>$mobil->uuid_mobil_unit,
  );

  echo form_input($IDhidden);
?>
      <div class="row">
          <div class="col-lg-6">
            <legend>Data Umum Kendaraan</legend>

            <div class="form-group">
              <label for="" class="col-xs-5 control-label">Kode Unit</label>
              <div class="col-xs-7">
                <input type="text" name="kode_unit" value="<?php echo $mobil->kode_unit;?>" class="form-control input-sm">
              </div>
            </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">No.Plat Kendaraan</label>
                <div class="col-xs-7">
                  <input type="text" name="no_plat" value="<?php echo $mobil->no_plat; ?>" class="form-control input-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">No. Polisi</label>
                <div class="col-xs-7">
                  <input type="text" name="no_polisi" value="<?php echo $mobil->no_polisi;?>" class="form-control input-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">Jenis</label>
                <div class="col-xs-7">
                  <input type="text" name="jenis" value="<?php echo $mobil->jenis; ?>" class="form-control input-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">Merek</label>
                <div class="col-xs-7">
                  <input type="text" name="merek" value="<?php echo $mobil->merek; ?>" class="form-control input-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">Tahun Pembuatan</label>
                <div class="col-xs-7">
                  <input type="text" name="tahun_pembuatan" value="<?php echo $mobil->tahun_pembuatan; ?>" class="form-control input-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">Warna</label>
                <div class="col-xs-7">
                  <input type="text" name="warna" value="<?php echo $mobil->warna; ?>" class="form-control input-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">Jumlah Kursi</label>
                <div class="col-xs-7">
                  <select class="form-control input-sm" name="id_jml_kursi">
                      <?php foreach ($kursi_mobil as $km): ?>
                        <?php if ($mobil->id_jml_kursi== $km->id_jml_kursi): ?>
                          <option value="<?php echo $km->id_jml_kursi?>" selected=""><?php echo $km->jumlah_kursi?></option>
                          <?php else: ?>
                            <option value="<?php echo $km->id_jml_kursi?>"><?php echo $km->jumlah_kursi?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">Sopir 1</label>
                <div class="col-xs-7">
                  <select class="form-control input-sm" name="id_sopir_1">
                      <option value="" selected="" disabled="">Pilih Sopir</option>
                      <?php foreach ($sopir as $so): ?>
                      <?php if ($so->id_sopir == $mobil->id_sopir_1): ?>
                              <option value="<?php echo $so->id_sopir?>" selected=""><?php echo $so->nama_lengkap.' ('.$so->kode_sopir.')'?></option>
                          <?php else: ?>
                              <option value="<?php echo $so->id_sopir?>"><?php echo $so->nama_lengkap.' ('.$so->kode_sopir.')'?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">Sopir 2</label>
                <div class="col-xs-7">
                  <select class="form-control input-sm" name="id_sopir_2">
                      <option value="" selected="" disabled="">Pilih Sopir</option>
                    <?php foreach ($sopir as $so): ?>
                      <?php if ($so->id_sopir == $mobil->id_sopir_2): ?>
                              <option value="<?php echo $so->id_sopir?>" selected=""><?php echo $so->nama_lengkap.' ('.$so->kode_sopir.')'?></option>
                          <?php else: ?>
                              <option value="<?php echo $so->id_sopir?>"><?php echo $so->nama_lengkap.' ('.$so->kode_sopir.')'?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
                <br>
              <legend>Data Surat Kendaraan</legend>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">Nomor STNK</label>
                <div class="col-xs-7">
                  <input type="text" name="no_stnk" value="<?php echo $mobil->no_stnk;?>" class="form-control input-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">Nomor Mesin</label>
                <div class="col-xs-7">
                  <input type="text" name="no_mesin" value="<?php echo $mobil->no_mesin;?>" class="form-control input-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">No Rangka</label>
                <div class="col-xs-7">
                  <input type="text" name="no_rangka"  value="<?php echo $mobil->no_rangka;?>" class="form-control input-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-xs-5 control-label">No BPKB</label>
                <div class="col-xs-7">
                  <input type="text" name="no_bpkb" value="<?php echo $mobil->no_bpkb; ?>" class="form-control input-sm">
                </div>
              </div>

          </div>
          <div class="col-lg-6">
            <legend>Data Operasional</legend>

            <div class="form-group">
              <label for="" class="col-xs-5 control-label">KM Terakhir</label>
              <div class="col-xs-7">
                <input type="text" name="kilometer_terakhir" value="<?php echo $mobil->kilometer_terakhir; ?>" class="form-control input-sm">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-xs-5 control-label">Cabang Kepemilikan</label>
              <div class="col-xs-7">
                <select class="form-control input-sm" name="id_cabang">
                    <option value="" selected="" disabled="">Pilih Cabang</option>
                    <?php foreach ($cabang as $cb): ?>
                      <?php if ($cb->uuid_cabang == $mobil->uuid_cabang): ?>
                        <option value="<?php echo $cb->uuid_cabang?>" selected=""><?php echo $cb->nama_kota.' - '.$cb->nama_cabang.' ('.$cb->kode_cabang.')'?></option>
                        <?php else: ?>
                        <option value="<?php echo $cb->uuid_cabang?>"><?php echo $cb->nama_kota.' - '.$cb->nama_cabang.' ('.$cb->kode_cabang.')'?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-xs-5 control-label">Status Aktif</label>
              <div class="col-xs-7">
                <select class="form-control input-sm" name="id_status">
                    <?php foreach ($status as $st): ?>
                      <?php if ($st->id_status == $mobil->id_status): ?>
                            <option value="<?php echo $mobil->id_status?>" selected=""><?php echo $mobil->tipe_status?></option>
                        <?php else: ?>
                            <option value="<?php echo $st->id_status?>"><?php echo $st->tipe_status?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                </select>
              </div>
            </div>

          </div>
          <div class="col-sm-offset-2 col-sm-8 no-padding" style="margin-top:20px; margin-bottom:30px;">
            <hr>
            <div class="row">
              <div class="col-lg-6">
                  <a href="<?php echo site_url('mobil')?>" class="btn btn-md btn-block btn-outline bg-purple">Kembali</a>
              </div>
              <div class="col-lg-6">
                  <button type="submit" class="btn btn-md btn-block  bg-purple" name="simpan" value="OK">Simpan</button>
              </div>
            </div>
          </div>
      </div>
  <?php echo form_close(); ?>
</div>
