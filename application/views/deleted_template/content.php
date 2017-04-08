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
    <div class="col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3><?php echo $title ?></h3>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
                <?php echo $content ?>
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

</div> <!-- /container-fluid -->
</div> <!-- /content-panel -->



<?php echo $script; ?>
</body>

</html>
