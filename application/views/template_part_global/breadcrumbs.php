<?php
  $link = $this->uri->segments;
  $segment_awal = current($link);
  $segment_akhir = end($link);
 ?>
<div class="row">
<div class="col-lg-12">
  <ol class="breadcrumb breadcrumb-arrow">
  <li><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> HOME </a></li>
  <?php foreach ($link as $key=>$val): ?>
    <?php if ($val == $segment_akhir): ?>
      <li class="active"><span><?php echo strtoupper(str_replace('_',' ',$val)) ?></span></li>
      <?php else: ?>
        <?php if ($key == 2): ?>
              <li><a href="<?php echo site_url().$segment_awal.'/'.$val?>"><?php echo strtoupper(str_replace('_',' ',$val)) ?></a></li>
          <?php else: ?>
              <li><a href="<?php echo site_url().$segment_awal?>"><?php echo strtoupper(str_replace('_',' ',$val)) ?></a></li>
        <?php endif; ?>
    <?php endif; ?>
  <?php endforeach; ?>
 </ol>
</div>
</div>
