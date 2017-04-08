<?php
echo $header;
?>


<div id="content-form">
  <div class="container-fluid">

    <!-- ////////////////////////////////////////////////////  -->
    <div class="row" style="margin-bottom:20px;">
        <div class="col-xs-12">
            <!-- <div class="row" style="background:#F5f5f5;">
              <div class="col-lg-6">
                <div class="panel panel-default panel-heading">
                  <?php echo $breadcrumbs; ?>
                </div>

              </div>
              <div class="col-lg-6" >
                <div class="panel panel-default panel-heading" style="padding-top:17px; padding-bottom:17px;">
                  <h2 style="color:#222;"><i class="fa fa-desktop"></i> <?php echo $title ?></h2>
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-lg-12">
                <?php echo $content ?>
              </div>
            </div>
        </div> <!-- /col -->
    </div> <!-- /row -->
    <!-- ////////////////////////////////////////////////////  -->
    <?php echo $footer; ?>
  </div>


</div>

<?php echo $script; ?>
