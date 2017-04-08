<script type="text/javascript">

  function validation(e,text)
  {

            if(e == null || e == "")
            {
                popup(''+text+'');
                return die();
            }else {
                return e;
            }

  }


  function booking()
  {
              // HEADER JADWAL//
              var cso                   = $("#uuid_cso").val();
              var kode_manifest         = $("#kode_manifest").val();
              var kode_jadwal           = $("#kode_jadwal").val();
              var tanggal_keberangkatan = $("div[id=tanggal_keberangkatan]").val();

              // DATA CUSTOMER//
              var nama_penumpang        = $("#nama_depan").val();
              var kode_member           = $("#kode_member").val();
              var no_handphone          = $("#no_handphone").val();
              var jenis_penumpang_harga = $("#jenis_penumpang_harga").val();
              var diskon_penumpang      = $("#diskon_penumpang").val();
              var keterangan            = $("#keterangan_penumpang").val();


              var total = $('div[data-id="3"]').length;
              var str = [], item;
                $.each($('div[data-id="3"]'), function (index, value) {
                        item = $(this).text();
                        str.push(item);
                });
              var nomor_kursi = str.join(',');


              var cso_valid                   = validation(cso,'Mohon di Refresh');
              var kode_manifest_valid         = validation(kode_manifest,'Mohon di Refresh');
              var kode_jadwal_valid           = validation(kode_jadwal,'Mohon di Refresh');
              var tanggal_keberangkatan_valid = validation(tanggal_keberangkatan,'Mohon di Refresh');

              var kode_member_valid           = kode_member;
              var no_handphone_valid          = validation(no_handphone,'No Telp Penumpang Harap di isi!');
              var nama_penumpang_valid        = validation(nama_penumpang,'Nama Penumpang Harap di isi !');
              var jenis_penumpang_harga_valid = validation(jenis_penumpang_harga,"Pilih Jenis Penumpang!");
              var diskon_penumpang_valid      = diskon_penumpang;
              var keterangan_valid            = keterangan;

              var send = {

                   kode_manifest:kode_manifest_valid,
                   kode_jadwal:kode_jadwal_valid,
                   tanggal_keberangkatan:tanggal_keberangkatan_valid,
                   kode_cso:cso_valid,
                   kode_member:kode_member_valid,
                   no_handphone:no_handphone_valid,
                   nama_penumpang:nama_penumpang_valid,
                   jenis_penumpang_harga:jenis_penumpang_harga_valid,
                   diskon_penumpang:diskon_penumpang_valid,
                   keterangan:keterangan_valid,
                   total_seat:total,
                   nomor_kursi:nomor_kursi,

              };

              swal({
                        title: "Booking",
                        text: "Simpan data jika benar melakukan booking!",
                        imageUrl: "<?php echo base_url()?>assets/icons/icon-booking.svg",
                        showCancelButton: true,
                        confirmButtonColor: "#FF9900",
                        confirmButtonText: "Confirm",
                        closeOnConfirm: false
                        },
                        function(){
                                      $.ajax({
                                        url: url_control+'/reservasi_booking/booking_add',
                                        type: 'POST',
                                        cache:false,
                                        data: send,
                                        success:function(data)
                                        {
                                          popup("Berhasil Melakukan Booking");
                                          refresh_layout();
                                        }
                                      });
              });




  }


  function go_show()
{

              var cso = $("#uuid_cso").val();
              var kode_manifest = $("#kode_manifest").val();
              var kode_jadwal  = $("#kode_jadwal").val();
              var tanggal_req  = $("div[id=tanggal_keberangkatan]").val();
              var nama_penumpang = $("#nama_depan").val();
              var kode_member = $("#kode_member").val();
              var no_handphone = $("#no_handphone").val();
              var jenis_penumpang_harga = $("#jenis_penumpang_harga").val();
              var keterangan = $("#keterangan_penumpang").val();

              var total = $('div[data-id="3"]').length;
              var str = [], item;
              $.each($('div[data-id="3"]'), function (index, value) {
                      item = $(this).text();
                      str.push(item);
              });
              var nomor_kursi = str.join(',');


              if(no_handphone == null || no_handphone == ""){
                 $("div.form-telephone").addClass("has-error");
                 $("div.form-nama-penumpang").addClass("has-error");
                 return false;
              }else if( nama_penumpang == null || nama_penumpang == ""){
                 $("div.form-telephone").addClass("has-error");
                 $("div.form-nama-penumpang").addClass("has-error");
                 return false;
              }else{

                      popup_metode_pembayaran();
              }
}


function popup_metode_pembayaran() {

              $(".cetak_tiket").show();
              $("#modal-cetak-tiket").modal("show");
}

function non_popup_metode_pembayaran() {

              $(".cetak_tiket").hide();
              $("#modal-cetak-tiket").modal("hide");
}

function go_show_pembayaran(metode_pembayaran)
{

                // HEADER JADWAL//
                var cso                   = $("#uuid_cso").val();
                var kode_manifest         = $("#kode_manifest").val();
                var kode_jadwal           = $("#kode_jadwal").val();
                var tanggal_keberangkatan = $("div[id=tanggal_keberangkatan]").val();

                // DATA CUSTOMER//
                var nama_penumpang        = $("#nama_depan").val();
                var kode_member           = $("#kode_member").val();
                var no_handphone          = $("#no_handphone").val();
                var jenis_penumpang_harga = $("#jenis_penumpang_harga").val();
                var diskon_penumpang      = $("#diskon_penumpang").val();
                var keterangan            = $("#keterangan_penumpang").val();


                var total = $('div[data-id="3"]').length;
                var str = [], item;
                  $.each($('div[data-id="3"]'), function (index, value) {
                          item = $(this).text();
                          str.push(item);
                  });
                var nomor_kursi = str.join(',');


                var cso_valid                   = validation(cso,'Mohon di Refresh');
                var kode_manifest_valid         = validation(kode_manifest,'Mohon di Refresh');
                var kode_jadwal_valid           = validation(kode_jadwal,'Mohon di Refresh');
                var tanggal_keberangkatan_valid = validation(tanggal_keberangkatan,'Mohon di Refresh');

                var kode_member_valid           = kode_member;
                var no_handphone_valid          = validation(no_handphone,'No Telp Penumpang Harap di isi!');
                var nama_penumpang_valid        = validation(nama_penumpang,'Nama Penumpang Harap di isi !');
                var jenis_penumpang_harga_valid = validation(jenis_penumpang_harga,"Pilih Jenis Penumpang!");
                var diskon_penumpang_valid      = diskon_penumpang;
                var keterangan_valid            = keterangan;

                var send = {

                     kode_manifest:kode_manifest_valid,
                     kode_jadwal:kode_jadwal_valid,
                     tanggal_keberangkatan:tanggal_keberangkatan_valid,
                     kode_cso:cso_valid,
                     kode_member:kode_member_valid,
                     no_handphone:no_handphone_valid,
                     nama_penumpang:nama_penumpang_valid,
                     jenis_penumpang_harga:jenis_penumpang_harga_valid,
                     diskon_penumpang:diskon_penumpang_valid,
                     keterangan:keterangan_valid,
                     total_seat:total,
                     nomor_kursi:nomor_kursi,
                     metode_pembayaran:metode_pembayaran,

                };

                if(send != null){
                  $.ajax({
                    url: url_control+'/reservasi_go_show/booking_add',
                    type: 'POST',
                    cache:false,
                    data: send,
                    success:function(data)
                    {
                      popup("Berhasil Melakukan Reservasi");
                      refresh_layout();
                      non_popup_metode_pembayaran();
                    }
                  });
                }



}

function cetak_tiket()
{
  swal({
            title: "CETAK TIKET",
            text: "Apakah anda ingin mencetak tiket ? klik confirm jika ya dan cancel jika tidak!",
            imageUrl: "<?php echo base_url()?>assets/icons/icon-print.svg",
            showCancelButton: true,
            confirmButtonColor: "#FF9900",
            confirmButtonText: "Confirm",
            closeOnConfirm: false
            },
            function(){
                          // $.ajax({
                          //   url: url_control+'/reservasi_booking/booking_add',
                          //   type: 'POST',
                          //   cache:false,
                          //   data: send,
                          //   success:function(data)
                          //   {
                          //     popup("Berhasil Melakukan Booking");
                          //     refresh_layout();
                          //   }
                          // });
  });
}


function koreksi_harga()
{
      var kode_tiket  = $("span#no_tiket_detail").text();
      var nomor_kursi =  $("span#kursi_detail").text();
      var kode_tiket_valid = validation(kode_tiket,'Error');
      var nomor_kursi_valid = validation(nomor_kursi,'Error');

      var asal_keberangkatan    = $('input[id=point_berangkat]').val();
      var tujuan_keberangkatan  = $('input[id=tujuan_berangkat]').val();
      var send = {
        kode_tiket:kode_tiket_valid,
        nomor_kursi:nomor_kursi_valid,
        kode_atribut:$("input[id=kode_atr]").val(),
        jam_keberangkatan:$("input[id=jam]").val(),
        jenis_kursi:$("#jenis_kursi").val(),
        point_berangkat:asal_keberangkatan,
        tujuan_berangkat:tujuan_keberangkatan,
      }



      $.ajax({
        url: url_control+'/reservasi_shuttle/koreksi_harga',
        type: 'POST',
        data: send,
        success:function(result)
        {
          $("div#koreksi_biaya").show();
          $("div#koreksi_biaya").html(result);
        }
      }).done(function(){
          $("#modal-koreksi-biaya").modal("show");
      });
}


function koreksi_harga_proses()
{
      var dialog_simpan_koreksi = $("#dialog_simpan_koreksi").val();
      if (dialog_simpan_koreksi == "update_harga") {
        var koreksi_disc_username = $("#korek_disc_username").val();
        var koreksi_disc_password = $("#korek_disc_password").val();
        if (koreksi_disc_username == null || koreksi_disc_username == "") {
            alert("Username tidak boleh kosong");
        }else if (koreksi_disc_password == null || koreksi_disc_password == "") {
            alert("Password tidak boleh kosong");
        }else{

              var koreksi_kode_tiket = $("#koreksi_kode_tiket").val();
              var jenis_koreksi_harga = $("#jenis_koreksi_harga").val();
              var koreksi_diskon_penumpang = $("#koreksi_diskon_penumpang").val();
              var send = {
                k_update_username:koreksi_disc_username,
                k_update_password:koreksi_disc_password,
                kode_tiket:koreksi_kode_tiket,
                jenis_penumpang_harga:jenis_koreksi_harga,
                diskon_penumpang:koreksi_diskon_penumpang,
              };


              $.ajax({
                url: url_control+'/reservasi_shuttle/koreksi_harga_proses',
                type: 'POST',
                cache:false,
                data: send,
                success:function(result)
                {
                  if (result == "success") {
                    $("div#koreksi_biaya").hide();
                    $("#modal-koreksi-biaya").modal("hide");
                    refresh_layout();

                  }else{

                      $("#info_perubahan").html("Not success");
                      $("#info_perubahan").hide(2000);
                    return false;
                  }


                }
              });


        }

      }

}



</script>
