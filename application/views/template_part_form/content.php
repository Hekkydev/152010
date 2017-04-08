<?php
echo $header;
?>
<link rel="stylesheet" href="<?php echo base_url('')?>assets/css/mybreadcrumbs.css">
<style media="screen">
#content-form{
  margin-top: 80px;
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
    <?php echo $breadcrumbs; ?>
    <!-- ////////////////////////////////////////////////////  -->
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Manajement : <?php echo $title ?></h3>
                </div> <!-- /panel-heading -->
                <div class="panel-body m-t-0">
                    <?php echo $content ?>
                </div> <!-- /panel-body -->
            </div> <!-- /panel-->
        </div> <!-- /col -->
    </div> <!-- /row -->
    <!-- ////////////////////////////////////////////////////  -->
    <?php echo $footer; ?>
  </div>


</div>

<?php echo $script; ?>
