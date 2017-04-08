<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>No</th>
            <th>Telp Customer</th>
            <th>Nama Customer</th>
        </tr>
    </thead>
    <tbody>

     <?php if($customer == TRUE):?>
     <?php $nomor = $no; foreach($customer as $c):?>
            <tr>

                <td><?php echo $nomor;?></td>
                <td><?php echo $c->telp_customers;?></td>
                <td><?php echo $c->nama_customers;?></td>
            </tr>
        <?php $nomor++; endforeach;?>
     <?php else:?>
     <tr>
         <td colspan="3" style="text-align:center">Data tidak ditemukan !</td>
     </tr>
     <?php endif;?>
    </tbody>
</table>

<?php
echo $this->ajax_pagination->create_links();
?>