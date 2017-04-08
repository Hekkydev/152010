<div class="panel" id="form-jurusan">
  <div class="panel-heading bg-purple" align="center">
    <h3 class="panel-title">JURUSAN</h3>
  </div>
  <div class="panel-body" align="center">

        <!-- TANGGAL KEBERANGKATAN -->
        <div class="form-group">
          <label> TANGGAL KEBERANGKATAN</label>
          <div id="tanggal_keberangkatan"></div>
        </div>

        <hr>

        <!-- KOTA KEBERANGKATAN -->
        <div class="form-group">
          <label>KOTA KEBERANGKATAN</label>
          <select class="form-control" id="kota_keberangkatan">
              <?php foreach ($kota as $kota): ?>
                <?php if ($kota->uuid_kota == $usersLog->uuid_kota): ?>
                  <option value="<?php echo $kota->uuid_kota ?>" selected=""><?php echo strtoupper($kota->nama_kota)?></option>
                  <?php else: ?>
                  <option value="<?php echo $kota->uuid_kota ?>"><?php echo $kota->nama_kota ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
          </select>
        </div>


        <!-- POINT KEBERANGKATAN -->
        <div class="form-group">
          <label>ASAL KEBERANGKATAN</label>
          <select class="form-control" id="asal_keberangkatan"></select>
        </div>


        <!-- TUJUAN KEBERANGKATAN -->
        <div class="form-group">
          <label>TUJUAN KEBERANGKATAN</label>
          <select class="form-control" id="tujuan_keberangkatan"></select>
        </div>

        <hr>


        <!-- PROSES JADWAL -->
        <div class="form-group">
          <button type="button" name="button" class="btn btn-md bg-purple btn-block" onclick="search_jadwal()"><i class="fa fa-search"></i>  CARI JADWAL</button>
        </div>

        <hr>
        <?php $this->load->view('reservasi_shuttle/layout_seat/info_seat'); ?>
  </div>
</div>
