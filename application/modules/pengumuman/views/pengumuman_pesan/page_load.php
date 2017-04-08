<?php
echo style_pagination_loading();
echo $loading;
?>
<div class="atr">
  <div class="row">

      <div class="col-lg-4">

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
<div class="form-pengumuman post-list" id="postList">

</div>
