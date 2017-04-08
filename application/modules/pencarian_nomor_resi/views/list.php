<div class="col-lg-12">

  <div class="panel">
    <div class="panel-heading bg-purple">
      <h3 class="panel-title">DAFTAR KEBERANGKATAN</h3>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-responsive table-striped">
            <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Resi Paket</th>
                    <th>Jenis</th>
                    <th>Pengirim</th>
                    <th>Penerima</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Biaya</th>
                    <th>Status</th>
                    <th>Ambil Paket</th>
                  </tr>
            </thead>
            <tbody>
              <?php $nomor = 1; foreach ($paket as $paket): ?>
                  <tr>
                    <td><?php echo $nomor ?></td>
                    <td><?php echo $paket->nomor_resi_paket ?></td>
                    <td><?php echo $paket->tipe_jenis_pengiriman_paket ?></td>
                    <td><?php echo $paket->nama_pengirim ?></td>
                    <td><?php echo $paket->nama_penerima ?></td>
                    <td><?php echo tgl_indo($paket->tanggal_keberangkatan) ?></td>
                    <td><?php echo rupiah($paket->harga_total); ?></td>
                    <td><?php echo $paket->tipe_status_pengiriman_paket ?></td>
                    <td>
                      <a class="btn btn-xs bg-orange" onclick="ambil_paket('<?php echo $paket->nomor_resi_paket;?>');">AMBIL PAKET</a>
                    </td>
                  </tr>
              <?php $nomor++; endforeach; ?>
            </tbody>
            </table>
      </div>
    </div>
  </div>
