<script type="text/javascript">
var url_control = "<?php echo site_url('reservasi_barbershop')?>";
$(document).ready(function() {
      $("#tanggal_transaksi").datepicker({'dateFormat':'yy-mm-dd'});
      get_service_cabang();
      get_barber_cabang();
      cart_destroy();

});
function get_service_cabang() {
    var cabang = $("select[name=unit_cabang]").val();
    $.ajax({
      url: url_control+'/reservasi_barbershop/get_service_cabang',
      type: 'POST',
      dataType: 'html',
      data: {uuid_cabang: cabang}
    })
    .done(function(result) {
      $('select[name=service_layanan]').html(result);
    });

}

function simpan_ke_cart()
{
      var kode_service = $('select[name=service_layanan]').val();
      $.ajax({
        url: url_control+'/reservasi_barbershop/simpan_ke_cart',
        type: 'POST',
        dataType: 'html',
        data: {kode_service: kode_service}
      })
      .done(function() {
            load_cart();
      });
}

function load_cart()
{
      $.ajax({
        url: url_control+'/reservasi_barbershop/load_cart',
        type: 'POST',
        dataType: 'html',
        success:function(html)
        {
            $("#postList").html(html);
        }
      });
}

function cart_destroy()
{
      $.ajax({
        url: url_control+'/reservasi_barbershop/cart_destroy',
        type: 'POST',
        dataType: 'html',
        success:function(html)
        {
            load_cart();
        }
      });
}

function remove_cart(rowid)
{
        $.ajax({
          url: url_control+'/reservasi_barbershop/remove_cart',
          type: 'POST',
          dataType: 'html',
          data:{rowid:rowid},
          success:function(html)
          {
              load_cart();
          }
        });
}

function get_barber_cabang() {

        var cabang = $("select[name=unit_cabang]").val();
        $.ajax({
          url: url_control+'/reservasi_barbershop/get_barber_cabang',
          type: 'POST',
          dataType: 'html',
          data: {uuid_cabang: cabang}
        })
        .done(function(result) {
          $('select[name=pegawai_service]').html(result);
        });
}
</script>
