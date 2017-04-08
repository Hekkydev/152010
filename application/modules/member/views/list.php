<table class="<?php echo $table_class;?>">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Lengkap</th>
      <th>Email</th>
      <th>No KTP</th>
      <th>No Telp</th>
      <th>Tanggal terdaftar</th>
      <th>Status</th>
      <th width="200">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($member == TRUE): ?>
    <?php $nomor = $no; foreach ($member as $m): ?>
      <tr>
         <td><?php echo $nomor; ?></td>
         <td><?php echo $m->nama_depan.' '.$m->nama_belakang ?></td>
         <td><?php echo $m->email_member ?></td>
         <td><?php echo $m->no_ktp; ?></td>
         <td><?php echo $m->no_handphone; ?></td>
         <td><?php echo $m->tanggal_terdaftar; ?></td>
        
         <td><?php echo $m->tipe_status; ?></td>
         <td>
           <?php
              $atribut_1 = array(
                'class'=>'btn btn-xs bg-purple');
              $atribut_2 = array(
                'class'=>'btn btn-xs bg-red');
              $atribut_3 = array(
                'class'=>'btn btn-xs bg-green');

              echo anchor('member/edit?sid='.$m->uuid_member, 'Edit',$atribut_1);
              echo "&nbsp;";
              echo anchor('member/delete?sid='.$m->uuid_member, 'Hapus', $atribut_2);
              echo "&nbsp;";
              echo anchor('member/track?sid='.$m->uuid_member, 'Track Record', $atribut_3);
              
            ?>
         </td>
      </tr>
    <?php $nomor++; endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="9" style="text-align:center">Data Tidak di Temukan</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
