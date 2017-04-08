<?php
echo $header;
echo $topmenu;
?>

<div id="content-form" style="margin-top:50px;">
  <div class="container-fluid">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body m-t-0">
                    <?php echo $content ?>
                </div> <!-- /panel-body -->
            </div> <!-- /panel-->
        </div> <!-- /col -->
      <div class="col-xs-2"></div>
    </div> <!-- /row -->
    <!-- ////////////////////////////////////////////////////  -->
    <?php echo $footer; ?>
  </div>


</div>
<?php echo $script; ?>
