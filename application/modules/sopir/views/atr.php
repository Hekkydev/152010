<div class="atr">
  <div class="row">

      <div class="col-lg-4">
          <div class="form-group">
            <a href="<?php echo site_url('sopir/add')?>" class="btn btn-xs btn-outline bg-purple">Tambah Data</a>
            <span class="btn btn-xs  bg-purple">Jumlah Record : <?php  echo $record;?></span>
          </div>
      </div>
      <div class="col-lg-6 pull-right">
        <div class="post-search-panel">

        <div class="row">

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
      </div>

  </div>
</div>
