<div id="panel_check_out">
    <div class="panel">
      <div class="panel-heading" style="background:#731b89; border-bottom:1px solid #DDD;">
        <h3 style="text-align:center; color:white;">CHECK OUT</h3>
      </div>
      <div class="panel-body">
      <p style="margin-bottom:10px;text-align:center;"><strong>Pemesanan Kursi</strong></p>
      <div id="bagian_customer_shuttle"  style="display:none; margin-top:20px;">
        <h4 style="text-align:center; margin-bottom:10px;">DATA CUSTOMERS</h4>
        <?php //$this->load->view("reservasi_reguler/customer/detail_customers"); ?>
      </div>
        <div class="form-customers-shuttle" id="form-customers-shuttle">

          <div class="list_pilihan">
            <div class="" align="center">
                <span class="btn bg-orange btn-sm nonclick">Daftar Kursi yang di pilih</span>
                <div id="myUL" style="margin-top:10px; margin-bottom:20px;" class="row">

                </div>
              </div>
            </div>
            <hr>
            <div class="" align="center" id="total_seat">
              <div class="form-group">
                <label for="" class="control-label">
                  <span >Jumlah Kursi yang di pesan : 0</span>
                </label>
              </div>
            </div>

          <div id="customer_add" style="display:none; margin-top:20px;"></div>
        </div>
        <div id="detail_customers"></div>

        </div>
        <div class="panel-footer"></div>
      </div>

    </div>
