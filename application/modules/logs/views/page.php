<?php

$dir = APPPATH."logs/";

$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {

    $files[] = $filename;

}

?>
<div class="col-lg-12">

<table class="<?php echo $table_class;?>">
	<thead>
		<tr>
			<td>No </td>
			<td>Nama files</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($files  as $key => $f):?>
			<?php if($key != 0 && $key != 1 && $f != '.' ):?>
			<tr>
				<td><?php echo $no-2;?></td>
				<td><?php echo $f?></td>
				<td>
				<a href="<?php echo site_url('logs/read?sid='.$f.'');?>">Read</a>
				<a href="<?php echo site_urL('logs/delete?sid='.$f.'');?>">Delete</a>

				</td>
		   </tr>
			<?php endif;?>
		<?php $no++; endforeach;?>
	</tbody>


</table>
</div>
