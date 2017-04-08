<script type="text/javascript">
url_control = "<?php echo site_url('discount')?>";
$(document).ready(function() {
  $(":input").inputmask();
});

function simpan_tarif() {


  var tarif = $("input[name=tarif]").val();
  var jenis_operasional = $("select[name=jenis]").val();
  var informasi = $("input[name=informasi]").val();

  if (tarif == null || tarif == "") {
    popup("Tentukan jumlah harga diskon !");
    return false;
  }else if (jenis_operasional == null || jenis_operasional == "") {
    popup("Pilih Jenis Operasional!");
    return false;
  }else if (informasi == null || informasi == "") {
    popup("Lengkapi data informasi diskon!");
    return false;
  }else{
    $.ajax({
      url: url_control + '/discount/entri/',
      type: 'POST',
      dataType: 'html',
      cache:false,
      data: {tarif:tarif,jenis_operasional:jenis_operasional,informasi:informasi},
      success:function(result)
      {
        if (result == "success") {
          popup("Berhasil Menyimpan diskon");
          reset();
        }else {
          popup("Gagal Menyimpan diskon");
        }
      },
    });

  }
}

function reset() {
  var tarif = $("input[name=tarif]").val("");
  var jenis_operasional = $("select[name=jenis]").val("");
  var informasi = $("input[name=informasi]").val("");

}
</script>
