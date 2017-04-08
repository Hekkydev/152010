<table class="<?php echo $table_class?> table-hover">
    <thead>
      <tr>
        <th style="text-align:center;">No</th>
    		<th style="text-align:center;">Tipe</th>
    		<th style="text-align:center;">Kode Jadwal</th>
        <th style="text-align:center;">Asal</th>
        <th style="text-align:center;">Transit</th>
        <th style="text-align:center;">Tujuan</th>
        <th style="text-align:center;">Jam</th>
        <th style="text-align:center;">Kursi</th>
        <th style="text-align:center;">Jenis Jadwal</th>
        <th style="text-align:center;">Status</th>
    		<th style="text-align:center;">Online</th>
    		<th style="width:125px;" >Action</th>
      </tr>
    </thead>
    <tbody>
		<?php
     $no = (is_numeric($first_number) ? $first_number : 1);
     if($jadwal == TRUE):?>
			<?php foreach($jadwal as $j):?>
			<tr>

				<td style="text-align:center;"><?php echo $no;?></td>
				<td><?php if($j->tipe_jadwal == 1){echo 'REGULER';}else{ echo 'EXTRA';} ?></td>
				<td style="text-align:center;"><?php echo $j->kode_atr?></td>
				<td style="text-align:center;"><?php echo cabang_nama($j->asal_keberangkatan); ?></td>
        <td style="text-align:center;"><?php echo cabang_nama($j->transit_keberangkatan); ?></td>
				<td style="text-align:center;"><?php echo cabang_nama($j->tujuan_keberangkatan); ?></td>
				<td style="text-align:center; font-weight:bold;"><?php echo $j->jam.':'.$j->menit; ?></td>
				<td style="text-align:center; font-weight:bold;"><?php echo $j->jumlah_kursi; ?></td>
				<td style="text-align:center; font-weight:bold;"><?php echo $j->tipe_jenis_jadwal;?></td>
				<td style="text-align:center; font-weight:bold;"><?php echo $j->tipe_status; ?></td>
				<td style="text-align:center;"><?php echo $j->kondisi_jadwal?></td>
				<td >
				 <?php echo anchor('jadwal/edit?sid='.$j->uuid_jadwal.'', '<i class="fa fa-pencil"></i> EDIT', $attribs=array("")); ?>
				  |
				 <?php echo anchor('jadwal/hapus?sid='.$j->uuid_jadwal.'', '<i class="fa fa-trash"></i> HAPUS', $attribs=array("")); ?>
				</td>
			</tr>
			<?php $no++;endforeach;?>
		<?php else:?>
		<tr><td style="text-align:center;" colspan="12">Data Tidak di Temukan!</td></tr>
		<?php endif;?>
    </tbody>
  </table>

  <?php echo $this->ajax_pagination->create_links();?>
