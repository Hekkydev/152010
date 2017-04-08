<!--<?php 
echo "<pre>";
print_r($manifest);
echo "</pre>";?>-->
 <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="120px;">Jadwal</th>
                    <th>Kode Jadwal</th>
                    <th width="120px">Keberangkatan</th>
                    <th>Delay</th>
                    <th width="200px">Manifest</th>
                    <th>Sopir</th>
                    <th>Mobil</th>
                    <th>Pnp</th>
                    <th>Pkt</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($manifest as $m):?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo tgl_indo($m->tanggal_reservasi).' '.$m->jam.':'.$m->menit?></td>
                        <td><?php echo $m->kode_atr;?></td>
                        <td><?php echo tgl_indo($m->tanggal_reservasi).' '.$m->jam.':'.$m->menit?></td>
                        <td></td>
                        <td><?php echo $m->kode_manifest?></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $m->jumlah_penumpang?></td>
                        <td><?php echo $m->jumlah_paket?></td>
                        <td></td>
                    </tr>
                <?php $no++; endforeach;?>    
            </tbody>
    </table>


    <?php echo $this->ajax_pagination->create_links()?>