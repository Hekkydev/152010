<script type="text/javascript">
  var url_control = "<?php echo site_url('barbershop_pegawai')?>";
  function simpan_service() {
            var kode_pegawai = $("input[name=kode_pegawai]").val();
            var nama_pegawai =  $("input[name=nama_pegawai]").val();
            var telp_pegawai = $("input[name=telp_pegawai]").val();
            var alamat_pegawai = $("textarea[name=alamat_pegawai]").val();
            var uuid_cabang  = $("select[name=unit_cabang]").val();
            var status = $("select[name=status]").val();
            // ------------VALIDASI----------------------------

            var kode_pegawai_valid = kode_pegawai;
            var nama_pegawai_valid =  validasi_input(nama_pegawai);
            var telp_pegawai_valid =validasi_input(telp_pegawai);
            var uuid_cabang_valid  = validasi_input(uuid_cabang);
            var status_valid = validasi_input(status);



            var data = {
              kode_pegawai:kode_pegawai_valid,
              nama_pegawai:nama_pegawai_valid,
              telp_pegawai:telp_pegawai_valid,
              alamat_pegawai:alamat_pegawai,
              uuid_cabang:uuid_cabang_valid,
              status:status_valid
            }

            $.ajax({
              url: url_control+'/barbershop_pegawai/add_proses',
              type: 'POST',
              dataType: 'html',
              data: data,
              success:function(result) {
                  if (result == "success") {
                    popup("Berhasil Menyimpan data");
                    reset_form();
                  }else{
                    popup("Error");
                    reset_form();
                  }
              }
            })
            .done(function(result) {
              console.log(result);
            });



  }

  function validasi_input(e) {
        if(e == null || e == "")
        {
          popup("Lengkapi Sebelum Menyimpan Data");
          return die();
        }else{
          return e;
        }
  }

  function reset_form() {

    var kode_pegawai = $("input[name=kode_pegawai]").val("");
    var nama_pegawai =  $("input[name=nama_pegawai]").val("");
    var telp_pegawai = $("input[name=telp_pegawai]").val("");
    var alamat_pegawai = $("textarea[name=alamat_pegawai]").val("");
    var uuid_cabang  = $("select[name=unit_cabang]").val("");
    var status = $("select[name=status]").val(1);

  }
</script>
