<?php echo $css_menu; ?>
<?php echo $loading; ?>
<?php echo style_loading(); ?>

<!-- ///////////////////MENU/////////////////////////////////////////////////// -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-body">
      <?php $this->load->view('menu/operasional_menu/page'); ?>
    </div>
  </div>
</div>

<!-- ////////////////////ENDMENU/////////////////////////////////////////////// -->





<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-body">
    <?php
        $this->load->view('manifest/options/atribut.php');
        $this->load->view('manifest/script/script.php');
        echo $loading;
        echo style_loading();
        ?>
     <div class="table table-daftar-manifest">
   
        </div>

    </div>
  </div>
</div>