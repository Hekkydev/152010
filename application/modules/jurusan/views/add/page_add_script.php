<script src="<?php echo base_url()?>assets/js/app.min.js"></script>
<script src="<?php echo base_url()?>assets/js/custom.js"></script>
<script type="text/javascript">
$(":input").inputmask();
$(document).ready(function() {
  $('div#harga-tiket input').attr('readonly', 'true');
  $('div#harga-bop input').attr('readonly', 'true');
  $('div#harga-non-bop input').attr('readonly', 'true');
  $('div#harga-pengiriman-paket input').attr('readonly', 'true');
});
// ---------------------------------------------------------------
$("input[name=kode_atr]").on('keyup',function(event) {
    event.preventDefault();
    var kode_atr = $(this).val();
    $.ajax({
      url: '<?php echo base_url(); ?>jurusan/cek_kode',
      type: 'POST',
      dataType: 'HTML',
      data: {kode_atr:kode_atr},
      success:function(result)
      {
        if(result == "true"){
          $("input[name=kode_atr_cek]").val("true");
          $("p#infokode").hide();
        }else{
          var info = "sudah pernah di inputkan";
          $("p#infokode").show();
          $("p#infokode").html(info).css('color', 'red');
          $("input[name=kode_atr_cek]").val("false");
        }
      }
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

});

// ----------------------------------------------------------------
function validation()
{
    var kode_atr = $("input[name=kode_atr]").val();
    var asal_keberangkatan = $("select[name=asal_keberangkatan]").val();
    var tujuan_keberangkatan = $("select[name=tujuan_keberangkatan]").val();
    var kode_atr_cek = $("input[name=kode_atr_cek]").val();

    if(kode_atr == null || kode_atr == ""){
      popup("Lengkapi Kode Jurusan");
      return false;
    }

    if(asal_keberangkatan == null || asal_keberangkatan == "")
    {
      popup("Silahkan Pilih Asal Keberangkatan");
      return false;
    }

    if(tujuan_keberangkatan == null || tujuan_keberangkatan == "")
    {
      popup("Silahkan Pilih Tujuan Keberangkatan");
      return false;
    }

    if(asal_keberangkatan == tujuan_keberangkatan )
    {
      popup("Keberangkatan tidak relevan");
      return false;
    }

    if(kode_atr_cek == "false" || kode_atr_cek == "")
    {
      popup("Tidak bisa menyimpan kode yang sama");
      return false;
    }


}

</script>
