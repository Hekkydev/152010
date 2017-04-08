<div class="well">
<?php
$dir = APPPATH."logs/";

echo "<pre>";
echo readfile($dir.$sid);
echo "</pre>";
?>
</div>

<a href="<?php echo site_url('logs')?>" class="<?php echo $button?>">Kembali</a>
