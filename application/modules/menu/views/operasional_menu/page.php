<table  style="padding:5px; margin-bottom:0px;" width="100%" >
  <!-- <tr>
    <td colspan="12" style="text-align:center"><a  class="btn click bg-purple btn-xs" onclick="go_beranda()" ><i class="fa fa-home"></i> Beranda</a></td>
  </tr> -->
  <tr>
    <td align="center" width="30px">
    <div style="margin-right:10px">
        <?php if($this->uri->segment(2) == "reservasi"):?>
        <div class="border-active">
        <?php else: ?>
          <div class="border">
      <?php endif;?>
          <div class="icon-operasional icon-bangku-shuttle" title="Posisi kursi ketika di klik" onclick="return go_home()"></div></div>
        <span class="title_icon">Shuttle</span>

    </div>
    </td>
    <td align="center" width="30px">
    <div style="margin-right:10px">
      <?php if($this->uri->segment(2) == "pencarian_nomor_tiket"):?>
      <div class="border-active">
      <?php else: ?>
        <div class="border">
    <?php endif;?>
          <div class="icon-operasional icon-cari-keberangkatan" title="Cari Jadwal Keberangkatan Penumpang" onclick="go_cari_keberangkatan()"></div></div>
        <span class="title_icon">Cari Keberangkatan</span>
    </div>
    </td>





    <td align="center" width="30px">
        <div style="margin-right:10px">
          <?php if($this->uri->segment(2) == "pencarian_nomor_resi"):?>
          <div class="border-active">
          <?php else: ?>
            <div class="border">
        <?php endif;?>
          <div class="icon-operasional icon-search" title="Posisi kursi ketika di klik" onclick="go_cari_nomor_resi()"></div></div>
            <span class="title_icon">No.Resi Tiket</span>
        </div>
    </td>
    <td align="center" width="30px">
        <div style="margin-right:10px">
          <?php if($this->uri->segment(2) == "reservasi_paket"):?>
          <div class="border-active">
          <?php else: ?>
            <div class="border">
          <?php endif;?><div class="icon-operasional icon-box" title="Reservasi Paket" onclick="go_cargo()"></div></div>
            <span class="title_icon">Paket</span>
        </div>
    </td>
    <td align="center" width="30px">
      <div style="margin-right:10px">
           <?php if($this->uri->segment(2) == "manifest"):?>
          <div class="border-active">
          <?php else: ?>
            <div class="border">
          <?php endif;?><div class="icon-operasional icon-bo-tambahan" title="Manifest" onclick="go_manifest();"></div></div>
          <span class="title_icon">Manifest</span>
      </div>

    </td>
    <td align="center" width="30px">
     <div style="margin-right: 20px">
         <div class="border"><div class="icon-operasional icon-driver" title="Posisi kursi ketika di klik"></div></div>
         <span class="title_icon">Jadwal Kendaraan</span>
     </div>
    </td>
    <td align="center" width="30px">
    <div style="margin-right:10px">
      <?php if($this->uri->segment(2) == "reservasi_carter"):?>
      <div class="border-active">
      <?php else: ?>
        <div class="border">
      <?php endif;?>
      <div class="icon-operasional icon-carter" title="Operasional Carter" onclick="go_carter()"></div></div>
        <span class="title_icon">Carter</span>
    </div>
    </td>
    <td align="center" width="30px">
    <div style="margin-right:10px">
      <?php if($this->uri->segment(2) == "reservasi_barbershop"):?>
      <div class="border-active">
      <?php else: ?>
        <div class="border">
      <?php endif;?>
      <div class="icon-operasional icon-barbershop" title="Operasional Barbershop" onclick="go_barbershop()"></div></div>
        <span class="title_icon">Pangkas Rambut</span>
    </div>
    </td>
    <td align="center" width="30px">
        <div style="margin-right: 10px">
          <?php if($this->uri->segment(1) == "operasional_laporan_keuangan"):?>
          <div class="border-active">
          <?php else: ?>
            <div class="border">
          <?php endif;?>
          <div class="icon-operasional icon-laporan-keuangan" title="operasional laporan keuangan" onclick="go_operasional_keuangan();"></div></div>
            <span class="title_icon">Laporan Keuangan</span>
        </div>
    </td>

      <td align="center" width="30px">
          <div style="margin-right: 20px">
              <div class="border"><div class="icon-operasional icon-laporan-penjualan" title="Posisi kursi ketika di klik"></div></div>
              <span class="title_icon">Laporan Penjualan</span>
          </div>
      </td>
      <td align="center" width="30px">
          <div style="margin-right: 20px">
            <?php if($this->uri->segment(2) == "pengumuman_pesan"):?>
            <div class="border-active">
            <?php else: ?>
              <div class="border">
          <?php endif;?>
              <div class="icon-operasional icon-email" title="Posisi kursi ketika di klik" onclick="go_pesan()"></div></div>
              <span class="title_icon">Perpesanan</span>
          </div>
      </td>
      <!--  -->

  </tr>
</table>

<script type="text/javascript">
//menu script
function go_home() {
  var link = window.location ="<?php echo base_url()?>operasional/reservasi";
}
function go_cari_keberangkatan()
{
  var link = window.location = "<?php echo base_url()?>operasional/pencarian_nomor_tiket";
}

function go_pesan()
{
  var link = window.location = "<?php echo base_url()?>operasional/pengumuman_pesan";
}

function go_cari_nomor_resi()
{
  var link = window.location = "<?php echo base_url()?>operasional/pencarian_nomor_resi";
}

function go_beranda()
{
  var link = window.location = "<?php echo base_url()?>operasional";
}

function go_cargo()
{
  var link = window.location = "<?php echo base_url()?>operasional/reservasi_paket";
}

function go_carter() {
  var link = window.location = "<?php echo base_url()?>operasional/reservasi_carter";
}

function go_barbershop() {
  var link = window.location = "<?php echo base_url()?>operasional/reservasi_barbershop";
}

function go_operasional_keuangan()
{
  var link = window.location = "<?php echo base_url()?>operasional_laporan_keuangan";
}

function go_manifest()
{
  var link = window.location = "<?php echo base_url()?>operasional_manifest";
}
</script>
