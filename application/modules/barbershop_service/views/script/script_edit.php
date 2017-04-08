<script type="text/javascript">
  var url_control = "<?php echo site_url('barbershop_service')?>";
  $(document).ready(function() {
    $(":input").inputmask();
  });
  function simpan_service() {
            var kode_service = $("input[name=kode_product]").val();
            var name_service =  $("input[name=name_service]").val();
            var biaya_service = $("input[name=price_service]").val();
            var uuid_cabang  = $("select[name=unit_cabang]").val();
            var status = $("select[name=status]").val();
            // ------------VALIDASI----------------------------

            var kode_service_valid = kode_service;
            var name_service_valid =  validasi_input(name_service);
            var biaya_service_valid =validasi_input(biaya_service);
            var uuid_cabang_valid  = validasi_input(uuid_cabang);
            var status_valid = validasi_input(status);



            var data = {
              kode_service:kode_service_valid,
              name_service:name_service_valid,
              biaya_service:biaya_service_valid,
              uuid_cabang:uuid_cabang_valid,
              status:status_valid
            }

            $.ajax({
              url: url_control+'/barbershop_service/edit_proses',
              type: 'POST',
              dataType: 'html',
              data: data,
              success:function(result) {
                  if (result == "success") {
                    popup("Berhasil Mengupdate Data");
                  }else{
                    popup("Error");
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
          popup("Lengkapi Sebelum Menyimpan");
          return die();
        }else{
          return e;
        }
  }


</script>
