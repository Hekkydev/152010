<div class="row">
  <div class="col-lg-12">
    <div class="form-kota">
      <form class="" action="<?php echo site_url().'kota/input'?>" method="post">
        <div class="row">
          <!-- /////////////////////////////////////////////////// -->
            <div class="col-lg-12">
              <div class=" form-group">
                <label for="">Kode Kota</label>
                <input type="text" name="kode_kota" value="" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="">Nama Kota</label>
                <input type="text" name="nama_kota" value="" class="form-control" required="">
              </div>
              <div class="form-group">
                <a   href="<?php echo site_url('kota/')?>" class="btn bg-purple btn-outline btn-xs">KEMBALI</a>
                <button type="submit" name="simpan" class="btn bg-purple  btn-xs">SIMPAN</button>
              </div>
            </div>
          <!-- /////////////////////////////////////////////////// -->
        </div>
      </form>
    </div>
  </div>
</div>
