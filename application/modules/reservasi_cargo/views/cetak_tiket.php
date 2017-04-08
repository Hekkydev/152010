<style>

.modal {
    display: none;
    overflow: hidden;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    background: rgba(0, 0, 0, 0.15) !important;
}
.modal-body {
    position: absolute;

}

.modal-cetak-tiket{
  width: 500px;
  height: 300px;
  top: 350px;
  left:10px;
  bottom:0;
}
.close {
    margin-top: -8px;
    text-shadow: 0 1px 0 #ffffff;
    color:purple;
}
</style>
<!-- //////////////////////////////////////////////////// Varying Modal -->

<div class="modal fade in" id="modal-cetak-tiket" data-keyboard="false" data-backdrop="static">
  <div >
    <div class="modal-content">
      <div class="modal-body modal-cetak-tiket"  style="background-color:#FFF;">
      <div style="margin-bottom:20px;" >
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span><span class="sr-only">Close</span></button>
        <h4><img src="<?php echo base_url()?>assets/icons/icon-print.svg" style="width:20px;">  METODE PEMBAYARAN</h4>
        <hr>
        <div align="center">
          <strong style="text-align:center;">Pilih Jenis Pembayaran</strong>
        </div>
        <div class="col-xs-offset-2 col-xs-8" style="margin-top:10px;">
          <table class="table">
            <tr>
              <td>
                <img src="<?php echo base_url()?>assets/icons/icon-funds.svg" style="width:50px;" class="click" onclick="booking_pengiriman_barang('TUNAI')">
                <strong>Tunai</strong>
              </td>
              <td>
                <img src="<?php echo base_url()?>assets/icons/icon-debit-card.svg" style="width:50px;" class="click" onclick="booking_pengiriman_barang('DEBIT')">
                <strong>Debit</strong>
              </td>
            </tr>
            <tr>
              <td>
                <img src="<?php echo base_url()?>assets/icons/icon-credit-card.svg" style="width:50px;" class="click" onclick="booking_pengiriman_barang('KREDIT')">
                <strong>Kredit</strong>
              </td>
              <td>
              
              </td>
            </tr>
          </table>
        </div>

      </div>
      </div><!-- /.modal-body -->
    </div>
  </div>
</div><!-- /.modal -->
