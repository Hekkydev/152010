<script type="text/javascript">
  function validasi()
  {
    var kode_unit = document.forms['form-mobil']['kode_unit'].value;
    var id_sopir_1 = document.forms['form-mobil']['id_sopir_1'].value();
    if(kode_unit == null || kode_unit == "")
    {
      popup("Lengkapi Kode Unit");
      return false;
    }

    if(id_sopir_1 == null || id_sopir_1 == "")
    {
      popup("Pilih Sopir");
      return false;
    }
  }
</script>
