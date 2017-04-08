<script src="<?php echo base_url()?>assets/js/app.min.js"></script>
<script src="<?php echo base_url()?>assets/js/custom.js"></script>
<script type="text/javascript">
$(":input").inputmask();

// ----------------------------------------------------------------
function validation()
{
    var kode_atr = $("input[name=kode_atr]").val();
    var asal_keberangkatan = $("select[name=asal_keberangkatan]").val();
    var tujuan_keberangkatan = $("select[name=tujuan_keberangkatan]").val();

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

    


}

</script>
