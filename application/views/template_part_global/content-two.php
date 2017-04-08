<?php
echo $header;
echo $topmenu;
echo $sidemenu;;
?>

<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">


<!-- //////////////////////////////////////////////////// Blank Page -->
<div class="row">
    <div class="col-xs-offset-1 col-lg-10">
        <div class="panel">
            <div class="panel-heading bg-purple" align="center">
                <h3 style="color:#FFF; font-weight:bold;"><?php echo $title ?></h3>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
              <br>
                <?php echo $content ?>
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

</div> <!-- /container-fluid -->
</div> <!-- /content-panel -->
<?php //echo $conversation;?>


<?php echo $script; ?>
</body>

</html>
