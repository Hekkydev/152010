<div class="panel">
  <div class="panel-heading bg-purple" align="center">
    <h3 class="title ">OUTLET</h3>
  </div>
  <div class="panel-body" >
    <br>
    <div class="form-group" align="center">
      <div id="datepicker"></div>
    </div>
    <hr>
    <br>
    <div class="form-group" align="center">
      <label for="" class="control-label">UNIT CABANG</label>
        <select class="form-control" name="unit_cabang">
          <?php foreach ($cabang as $c): ?>
            <?php if ($c->uuid_cabang == $usersLog->uuid_cabang): ?>
              <option value="<?php echo $c->uuid_cabang ?>" selected=""><strong><?php echo $c->kode_cabang." - ".strtoupper($c->nama_cabang) ?></strong></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
    </div>
    <hr>
    <div class="form-group">
      <div class="col-lg-12">
        <button type="button" name="button" class="btn btn-md bg-purple btn-block">PROSES</button>
      </div>
    </div>
  </div>
  <div class="panel-footer">

  </div>
</div>

<?php $this->load->view('reservasi_barbershop/script/script_page'); ?>
