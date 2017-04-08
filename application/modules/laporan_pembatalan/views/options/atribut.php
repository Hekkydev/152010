<div class="atr">
  <div class="row">

      <div class="col-lg-4">
          <div class="form-group">
              <span class="btn btn-xs  bg-purple">Jumlah Record : <?php  echo $record;?></span>
              <span class="btn btn-xs  bg-purple" id="search_full"><i class="fa fa-search "></i> Pencarian Lengkap</span>
          </div>
      </div>
      <div class="col-lg-6 pull-right">
        <div class="post-search-panel">

        <div class="row" id="search_normal">

          <div class="col-lg-6">
            <select id="sortBy" onchange="searchFilter()" class="form-control input-sm">
              <option value="">Sort By</option>
              <option value="asc">Ascending</option>
              <option value="desc">Descending</option>
            </select>
          </div>
          <div class="col-lg-6">
            <div class="input-group">
                <input type="text" id="keywords" placeholder="cari data" onkeyup="searchFilter()" class="form-control input-sm">
                <span class="input-group-addon bg"><i class="fa fa-search"></i></span>
            </div>
          </div>
        </div>


    		</div>
        <div class="form-group pull-right" id="tutup" style="display:none;">
            <a class="btn btn-xs  bg-red" id="search_full_close" href="<?php echo site_url('operasional/pembatalan')?>">Tutup Pencarian</a>
        </div>
      </div>

  </div>
</div>

<div class="row" id="search_form_full" style="display:none;">
<div class="form-horizontal">
    <div class="col-lg-12">
        <div class="form-group">
          <label for="" class=" control-label col-xs-2">PERIODE</label>
          <div class="col-xs-2">
            <input type="text" name="" value="" class="form-control" placeholder="tanggal awal">
          </div>
          <div class="col-xs-2">
            <input type="text" name="" value="" class="form-control" placeholder="tanggal akhir">
          </div>
          <div class="col-xs-2">
            <select class="form-control" name="">

            </select>
          </div>
          <div class="col-xs-2">
            <input type="text" name="" value="" class="form-control" placeholder="tahun">
          </div>
        </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <label for="" class=" control-label col-xs-2">KEBERANGKATAN</label>
        <div class="col-xs-2">
          <select class="form-control" name="">

          </select>
        </div>
        <div class="col-xs-2">
          <select class="form-control" name="">

          </select>
        </div>
        <div class="col-xs-2">
          <select class="form-control" name="">

          </select>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <label for="" class=" control-label col-xs-2">JAM</label>
        <div class="col-xs-2">
          <select class="form-control" name="">

          </select>
        </div>
        <label for="" class=" control-label col-xs-2">STATUS</label>
        <div class="col-xs-2">
          <select class="form-control" name="">

          </select>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <label for="" class=" control-label col-xs-2">LAINNNYA</label>
        <div class="col-xs-4">
          <input type="text" name="" value="" class="form-control">
        </div>
      </div>
    </div>


    <hr>
    <div class="col-lg-12">
      <div class="row">
        <div class="col-xs-offset-2 col-xs-8">
          <hr>
          <div class="form-group">
            <button type="button" name="button" class="btn btn-md bg-purple btn-block btn-outline">CARI KEBERANGKATAN</button>
          </div>
        </div>
      </div>
    <br>
    </div>

</div>
</div>
