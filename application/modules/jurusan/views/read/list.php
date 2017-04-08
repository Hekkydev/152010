
 <table class="<?php echo $table_class?> table-hover sticky-header floatTHead-table">
    <thead>
      <tr>
        <th style="text-align:center;">NO</th>
        <th>JURUSAN</th>
        <th>POINT</th>
        <th>TUJUAN</th>
        <th colspan="2" style="text-align:center;">SHUTTLE TIKET</th>
        <th style="text-align:center;">TARIF CARGO</th>
        <th>BOP</th>
        <th style="text-align:center;">STATUS</th>

        <th style="width:150px;text-align:center;">ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php if($jurusan == TRUE):?>
	  <?php $no=1;foreach ($jurusan as $j): ?>
          <tr>
            <td style="text-align:center;"><?php echo $no; ?></td>
            <td style="font-weight:bold;"><?php echo $j->kode_atr; ?></td>
            <td>
              <strong style="color:orange;"><?php echo strtoupper(cabang($j->asal_keberangkatan)->nama_kota); ?></strong><br>
              <?php echo strtoupper(cabang_nama($j->asal_keberangkatan)); ?>
            </td>
            <td >
              <strong style="color:green;"><?php echo strtoupper(cabang($j->tujuan_keberangkatan)->nama_kota); ?></strong><br>
              <?php echo strtoupper(cabang_nama($j->tujuan_keberangkatan)); ?>
            </td>
            <td style="text-align:center;">
              <strong>UMUM</strong>
              <?php echo harga_tiket_reg_jurusan_umum($j->kode_jurusan); ?><br>

            </td>
            <td style="text-align:center;">
              <strong>MAHASISWA</strong>
              <?php echo harga_tiket_reg_jurusan_mahasiswa($j->kode_jurusan); ?>
            </td>
            <td style="text-align:center;">
              <strong>DOKUMEN</strong>
              <?php echo harga_tiket_kirim_dok($j->kode_jurusan); ?><br>
              <strong>BARANG</strong>
              <?php echo harga_tiket_kirim_barang($j->kode_jurusan); ?>
            </td>
            <td><?php echo harga_bpo($j->kode_jurusan); ?></td>
            <td style="text-align:center;"><?php echo $j->tipe_status ?></td>
            <td style="width:150px;text-align:center;">
              <?php echo anchor('jurusan/edit?sid='.$j->uuid_master_jurusan.'', '<i class="fa fa-pencil"></i> EDIT', $attribs=array("")); ?>
              |
              <?php echo anchor('jurusan/hapus?sid='.$j->uuid_master_jurusan.'', '<i class="fa fa-trash"></i> HAPUS', $attribs=array("")); ?>
            </td>
          </tr>
      <?php $no++; endforeach; ?>
	  <?php else:?>
		<tr>
			<td style="text-align:center;" colspan="10">Data Tidak di Temukan!</td>
		</tr>
	  <?php endif;?>
    </tbody>
  </table>
  <?php echo $this->ajax_pagination->create_links();?>
