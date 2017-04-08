<script type="text/javascript">

$(document).ready(function() {
            $("div#info_jadwal").hide();

});

$(".icon-bangku").each(function() {

            $(this).click(function() {

                    var i             = $(this).attr('data-id');
                    var b             = $(this).attr('data-blocking');
                    var kode_tiket    = $(this).attr('data-penumpang');
                    var kode_booking  = $(this).attr('data-booking');
                    var nomor_kursi   = $(this).text();

                    if (i == "1") {

                        if(b == "1"){
                              alert("Tidak bisa memilih kursi yang sudah di isi!");
                        }else {
                               customer_detail(kode_tiket,nomor_kursi);
                               $('.icon-bangku[data-booking]').removeClass('icon-bangku-check-mark-booking');
                               $('.icon-bangku[data-booking]').removeClass('icon-bangku-check-mark-go-show');
                               $('.icon-bangku[data-booking="'+kode_booking+'"]').addClass('icon-bangku-check-mark-booking');
                        }

                    }else if(i == "2"){
                          if(b == "2"){
                                alert("Tidak bisa memilih kursi yang sudah di isi!");
                          }else {
                                customer_detail(kode_tiket,nomor_kursi);
                                $('.icon-bangku[data-booking]').removeClass('icon-bangku-check-mark-booking');
                                $('.icon-bangku[data-booking]').removeClass('icon-bangku-check-mark-go-show');
                                $('.icon-bangku[data-booking="'+kode_booking+'"]').addClass('icon-bangku-check-mark-go-show');
                          }
                    }else {
                      if (i == "0") {

                        $(this).attr('class','icon-bangku icon-bangku-klik');
                        $(this).attr('data-id','3');
                        Tambah();

                      }else if(i == "3"){

                        $(this).attr('class','icon-bangku icon-bangku-kosong');
                        $(this).attr('data-id','0');
                        Tambah();

                      }
                    }
            });
});



function Tambah()
{
            var string = [],item;
            $.each($('div[data-id="3"]'),function(index, value) {
                        item = $(this).text();
                        string.push(item);
            });

            var seleksi    = string.join(',');
            var to_element = item;

            WriteCookie('selection_seat',seleksi,1);
            WriteSeleksiSeat(to_element);
            WriteTotalSeat(to_element);
}

function WriteCookie(name,value,days)
{
            var date, expires;
            if (days) {
                    date = new Date();
                    date.setTime(date.getTime()+(days*24*60*60*1000));
                    expires = "; expires=" + date.toGMTString();
            }else{
                    expires = "";
            }
            document.cookie = name + "=" + value + expires + "; path=/";
}

// PROSES SENDING COOKIE CHECKING

function WriteSeleksiSeat(item) {
                    $.ajax({
                      url: url_control+'/reservasi_shuttle/read_cookies',
                      type: 'POST',
                      dataType: 'html',
                      cache:false,
                      data: {no_kursi: item},
                      success:function(result)
                      {
                          $("#bangku_pilihan").html(result);
                      }
                    });
}

function WriteTotalSeat(item){
                    $.ajax({
                      url: url_control+'/reservasi_shuttle/read_cookies_total',
                      type: 'POST',
                      dataType: 'html',
                      cache:false,
                      data: {no_kursi: item},
                      success:function(result)
                      {
                          $("#button_reservasi").html(result);
                      }
                    });

}


function refresh_layout() {
            var tgl_berangkat         = tanggal_keberangkatan.val();
            var kode_jadwal           = $('input[id=kode_jadwal]').val();
            var asal_keberangkatan    = $('input[id=point_berangkat]').val();
            var tujuan_keberangkatan  = $('input[id=tujuan_berangkat]').val();
            var waktu                 = $("input[id=jam]").val();
            var kode                  = $("input[id=kode_atr]").val();
            var button_reservasi      = $("#button_reservasi").html("");

            var customer_detail       = $("#customer_detail").html("");
            var customer_add          = $("#customer_add").show();
            var bangku_pilihan        = $("#bangku_pilihan").html("KOSONG");
            var slash_nomor_kursi     = $("#slash_nomor_kursi").show();
            detail_jadwal(tgl_berangkat,asal_keberangkatan,tujuan_keberangkatan,waktu,kode,kode_jadwal);
}

function customer_detail(kode_tiket,nomor_kursi)
{

            var asal_keberangkatan    = $('input[id=point_berangkat]').val();
            var tujuan_keberangkatan  = $('input[id=tujuan_berangkat]').val();
            var send = {
              kode_tiket:kode_tiket,
              nomor_kursi:nomor_kursi,
              kode_atribut:$("input[id=kode_atr]").val(),
              jam_keberangkatan:$("input[id=jam]").val(),
              jenis_kursi:$("#jenis_kursi").val(),
              point_berangkat:asal_keberangkatan,
              tujuan_berangkat:tujuan_keberangkatan,
            }
            $.ajax({
              url: url_control+'/reservasi_shuttle/detail_customers/',
              type: 'POST',
              dataType: 'html',
              cache:false,
              data:send,
              success:function(result)
              {
                    $("#customer_detail").html(result);
                    $("#customer_add").hide();
                    $("#bangku_pilihan").hide();
                    $("#slash_nomor_kursi").hide();
              }
            }).done(function(){

                  $("p[for=tgl_pemesanan_tiket]").css('font-size', '11px');
                  $("p[for=status_tiket_detail").css("font-weight","bold");
                  $("h3[id=jadwal_detail").css("font-weight","bold");
                  $("div.penumpang-kosong").addClass('icon-bangku-block');
                  $("div.icon-bangku-kosong").attr('title','silahkan tutup layout customer jika ingin memilih kembali');
                  $("div.icon-bangku-klik").attr('title','silahkan tutup layout customer jika ingin memilih kembali');
                  $("div.icon-bangku-kosong").attr('class','icon-bangku icon-bangku-kosong icon-bangku-block');
                  $("div.icon-bangku-klik").attr('class','icon-bangku icon-bangku-kosong icon-bangku-block');
                  $("div.icon-bangku-kosong").attr('data-id', '7');
            });

}




function tutup_informasi() {
        $("#customer_detail").html("");
        $("#customer_add").show();
        $("#bangku_pilihan").show();
        $("#slash_nomor_kursi").show();
        $("#button_reservasi").html("");
        // -------------------------------------------//

        $("div.penumpang-kosong").removeClass('icon-bangku-block');
        $("div.icon-bangku-kosong").attr('class','icon-bangku icon-bangku-kosong');
        $("div.icon-bangku-kosong").attr('data-id', '0');
        $("div.icon-bangku-kosong").removeAttr('title');
        $("div.icon-bangku-klik").removeAttr('title');
        $('.icon-bangku[data-booking]').removeClass('icon-bangku-check-mark-booking');
        $('.icon-bangku[data-booking]').removeClass('icon-bangku-check-mark-go-show');
}


function update_penumpang_detail()
{
                  var nomor_kursi = $("span#kursi_detail").text();
                  var kode_booking = $("span#kode_booking_detail").text();
                  var no_tiket = $("span#no_tiket_detail").text();
                  var kode_member  = $("#kode_member_detail").val();
                  var no_handphone = $("#no_handphone_penumpang_detail").val();
                  var nama_penumpang = $("#nama_penumpang_detail").val();
                  var jenis_penumpang_harga  = $("#jenis_penumpang_harga_detail").val();
                  var keterangan_penumpang = $("#keterangan_penumpang_detail").val();
                  swal({
                          title: "Data Customer",
                          text: "Klik confirm jika ingin melakukan edit data dan click cancel jika tidak!",
                          imageUrl: "<?php echo base_url()?>assets/icons/icon-edit-user.svg",
                          showCancelButton: true,
                          confirmButtonColor: "#FF9900",
                          confirmButtonText: "Confirm",
                          closeOnConfirm: false
                          },
                          function(){

                               $.ajax({
                                 url: url_control+'/reservasi_shuttle/update_data_customers',
                                 type: 'POST',
                                 cache:false,
                                 data: {
                                   nomor_kursi:nomor_kursi,
                                   kode_booking:kode_booking,
                                   no_tiket:no_tiket,
                                   kode_member:kode_member,
                                   no_handphone:no_handphone,
                                   nama_penumpang:nama_penumpang,
                                   jenis_penumpang_harga:jenis_penumpang_harga,
                                   keterangan_penumpang:keterangan_penumpang
                                 },
                                 success:function(result)
                                 {
                                    if(result != "error")
                                    {
                                      popup("Data Penumpang Berhasil di Update");
                                      refresh_layout();
                                      customer_detail(result,nomor_kursi);
                                    }else {
                                      alert("error");
                                      return false;
                                    }
                                 }
                               });

                          });
}


function mutasi()
{

              var kode_tiket  = $("span#no_tiket_detail").text();
              swal({
              title: "Aktifkan Mode Mutasi?",
              text: "ketika memilih kursi maka seca default kursi lama akan di alihkan ke kursi yang baru!",
              imageUrl: "<?php echo base_url()?>assets/icons/icon-mutasi.svg",
              showCancelButton: true,
              confirmButtonColor: "#FF9900",
              confirmButtonText: "Confirm",
              closeOnConfirm: false
              },
              function(){
                      swal("Aktif!", "Mode mutasi di aktifkan.", "success");
                      mutasi_pilih_kursi(kode_tiket);
              });
}

function mutasi_pilih_kursi(kode_tiket)
{

              $("div[data-id=1]").attr("data-blocking","1"); // tidak bisa memindahkan ke nomor yang sudah diisi
              $("div[data-id=2]").attr("data-blocking","2");
              $("div.icon-bangku-kosong").removeAttr("data-id","7");
              $("div.icon-bangku-kosong").attr("data-id","8");
              $("div.icon-bangku-kosong").removeClass("icon-bangku-block");
              $("div.penumpang-kosong").removeClass("icon-bangku-block");
              $("div.icon-bangku-booking").addClass("icon-bangku-block");
              $("div.penumpang-booking").addClass("icon-bangku-block");

              $('.icon-bangku-kosong').each(function() {

                var i = $(this).attr("data-id");
                var no_kursi = $(this).text();
                $(this).click(function() {
                    if(i == "8"){
                      var kode_tiket = $("span#no_tiket_detail").text();
                      mutasi_proses(kode_tiket,no_kursi);
                    }
                });
              });

}

function mutasi_proses(kode_tiket,no_kursi)
{

            var kode_tiket = kode_tiket;
            var no_kursi = no_kursi;


            $.ajax({
              url:url_control+"/reservasi_shuttle/mutasi_penumpang",
              type:"POST",
              cache:false,
              data:{kode_tiket:kode_tiket,no_kursi:no_kursi},
              success:function(result){
                  if(result == "success"){
                    $("div[data-id=1]").removeAttr("data-blocking","1"); // tidak bisa memindahkan ke nomor yang sudah diisi
                    $("div[data-id=2]").removeAttr("data-blocking","2");

                    refresh_layout();
                  }else{
                    refresh_layout();
                  }
              }
            });
}



function batalkan_tiket()
{
                var kode_tiket = $("span#no_tiket_detail").text();
                swal({
                title: "Batalkan Tiket",
                text: "Apakah anda yakin ingin membatalkan tiket ini? \n "+kode_tiket+"",
                imageUrl: "<?php echo base_url()?>assets/icons/icon-pembatalan-tiket.svg",
                showCancelButton: true,
                confirmButtonColor: "#FF9900",
                confirmButtonText: "Confirm",
                closeOnConfirm: false
                },
                function(){
                  swal("Dibatalkan!", "Kode tiket berhasil di batalkan", "success");
                  batalkan_tiket_proses(kode_tiket);
                });
}

function batalkan_tiket_proses(kode_tiket)
{
              var kode_tiket = kode_tiket;
              $.ajax({
                url:url_control+"/reservasi_shuttle/pembatalan_tiket",
                type:"POST",
                cache:false,
                data:{kode_tiket:kode_tiket},
                success:function(result){
                  if(result == "success"){
                    refresh_layout();
                  }else{
                    refresh_layout();
                  }
                }
              });
}

function change_to_go_show() {
        $.ajax({
          url: url_control+'/reservasi_shuttle/module_pembayaran',
          type: 'POST',
          dataType: 'html',
          success:function(result)
          {
              $("#metode_pembayaran").show();
              $("#metode_pembayaran").html(result);
              $("#modal-metode-pembayaran").modal("show");
          }
        });
}

function remove_metode_pembayaran()
{
      $("#modal-metode-pembayaran").modal("hide");
      $("#metode_pembayaran").hide();
}


function update_to_go(metode_pembayaran)
{

                // HEADER JADWAL//
                var cso                   = $("#uuid_cso").val();
                var metode_pembayaran     = metode_pembayaran;
                // DATA CUSTOMER//
                var kode_booking          = $("span[id=kode_booking_detail]").text();

                var send = {
                  kode_cso:cso,
                  kode_booking:kode_booking,
                  metode_pembayaran:metode_pembayaran
                };

                if(send != null){
                  $.ajax({
                    url: url_control+'/reservasi_booking/update_to_go_show',
                    type: 'POST',
                    cache:false,
                    data: send,
                    success:function(result)
                    {
                        if (result == "success") {
                          remove_metode_pembayaran();
                          refresh_layout();
                        }else{
                          remove_metode_pembayaran();

                        }
                    }
                  });
                }



}





</script>
