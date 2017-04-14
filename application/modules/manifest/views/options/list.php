<style media="screen">
  .table{
      font-size: 11px;
  }
</style>

 <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="120px;">Jadwal</th>
                    <th width="120px;">Kode Jadwal</th>
                    <th width="150px">Keberangkatan</th>
                    <th>Delay</th>
                    <th width="200px">Manifest</th>
                    <th>Sopir</th>
                    <th>Mobil</th>
                    <th>Pnp</th>
                    <th>Pkt</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($manifest_data as $m):?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $m->tanggal_reservasi.' '. $m->jam.':'.$m->menit?></td>
                      <td><?php echo $m->kode_jadwal; ?></td>
                      <td><?php echo "$m->created_date";?></td>
                      <td><?php  ?></td>
                      <td><?php echo $m->kode_manifest; ?></td>
                      <td><?php echo $this->general->cek_uuid_sopir($m->uuid_sopir) ?></td>
                      <td><?php echo $this->general->cek_uuid_mobil($m->uuid_mobil_unit) ?></td>
                      <td><?php echo $this->general->cek_jumlah_penumpang_trip($m->kode_manifest) ?></td>
                      <td><?php echo $this->general->cek_paket_trip($m->kode_manifest); ?></td>
                      <td>
                        <?php
                        if($this->general->cek_jumlah_penumpang_trip($m->kode_manifest) > 0 ):
                          echo "Berangkat";
                        else:
                          echo "Tidak Berangkat";
                        endif;
                         ?></td>
                      <td>
                        <button type="button" name="button" class="btn btn-xs bg-purple"><i class="fa fa-search"></i></button>
                        <button type="button" name="button" class="btn btn-xs bg-purple"><i class="fa fa-print"></i></button>
                      </td>
                    </tr>
                <?php $no++; endforeach;?>
            </tbody>
    </table>


    <?php echo $this->ajax_pagination->create_links()?>
