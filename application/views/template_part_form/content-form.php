<?php
echo $header;
?>
<link rel="stylesheet" href="<?php echo base_url('')?>assets/css/mybreadcrumbs.css">
<style media="screen">
#content-form{
  margin-top: 50px;
}
.atr{
  margin-bottom: 10px;
}
</style>
<?php
echo $topmenu;
?>

<div id="content-form">
  <div class="container-fluid">

    <!-- ////////////////////////////////////////////////////  -->
    <div class="row" style="margin-bottom:20px;">
        <div class="col-xs-12">
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
