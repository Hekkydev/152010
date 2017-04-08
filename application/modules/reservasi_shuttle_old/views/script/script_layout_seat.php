<script type="text/javascript">
$('.icon-bangku').each(function() {
                    $(this).click(function() {
                      var i = $(this).attr("data-id");
                      var b = $(this).attr("data-blocking");
                      var kode_tiket = $(this).attr("data-penumpang");
                      var nomor_kursi = $(this).text();
                      if(i == "1" || i == "2")
                      {
                        if(b == "1"){
                          alert("tidak bisa memilih kursi yang sudah di isi");
                        }else{
                          //alert(nomor_kursi);
                          customer_detail(kode_tiket,nomor_kursi);
                        }
                      }else{
                        if(i=="0")
                        {
                          $(this).attr('class','icon-bangku icon-bangku-klik');
                          $(this).attr('data-id','3');
                          Tambah();
                        }else if(i=="3"){
                          $(this).attr('class','icon-bangku icon-bangku-kosong');
                          $(this).attr('data-id','0');
                          Tambah();
                        }
                      }
                    });
});

function Tambah() {
                    var total = $('div[data-id="3"]').length;
                    var str = [], item;
                    $.each($('div[data-id="3"]'), function (index, value) {
                            item = $(this).text();
                            str.push(item);
                    });
                    var selek=str.join(',');
                    var to_element = item;
                    writeCookie('total_seat',total,1);
                    writeCookie('selection_seat',selek,1);
                    newElement(to_element);
                    totalElement(to_element);
}
function writeCookie(name,value,days) {
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
function newElement(item) {
                    $.ajax({
                      url: url_control+'/read_cookies',
                      type: 'POST',
                      dataType: 'html',
                      cache:false,
                      data: {no_kursi: item},
                      success:function()
                      {
                            $("#customer_add").show();
                            $("#myUL").show();
                            $("#total_seat").show();
                      }
                    })
                    .done(function(data) {
                            $("#myUL").html(data);
                            $("#customer_add").html("");
                    })
                    .fail(function(data) {
                      console.log("error"+data);
                    })
                    .always(function(data) {
                      console.log("success"+data);
                    });
}

function totalElement(item){
                    $.ajax({
                      url: url_control+'/read_cookies_total',
                      type: 'POST',
                      dataType: 'html',
                      cache:false,
                      data: {no_kursi: item},
                      success:function(data)
                      {
                          $("#total_seat").html(data);
                      }
                    })
                    .done(function(data) {
                      console.log("success" + data);
                    })
                    .fail(function() {
                      console.log("error");
                    })
                    .always(function() {
                      console.log("complete");
                    });

}
function customer_add()
{
                    var jenis_kursi = $("#jenis_kursi").val();
                    var point_berangkat = $("#point_berangkat").val();
                    var tujuan_berangkat = $("#tujuan_berangkat").val();
                    $.ajax({
                      url: url_control+'/new_customer_form',
                      type: 'POST',
                      dataType: 'html',
                      data: {jenis_kursi:jenis_kursi,point_berangkat:point_berangkat,tujuan_berangkat:tujuan_berangkat},
                      success:function(data)
                      {
                        $("#customer_add").show();
                        $("#customer_add").html(data);
                      }
                    });
}
function customer_detail(kode_tiket,nomor_kursi)
{
                  var kode_booking = kode_tiket;
                  var nomor_kursi = nomor_kursi;
                  var kode_atr = $("#kode_atr").val();
                  var jam = $("#jam").val();
                  var jenis_kursi = $("#jenis_kursi").val();
                  var point_berangkat = $("#point_berangkat").val();
                  var tujuan_berangkat = $("#tujuan_berangkat").val();

                  $.ajax({
                    url: url_control+'/detail_customers',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                      kode_booking: kode_booking,
                      jam:jam,
                      kode_atr:kode_atr,
                      jenis_kursi:jenis_kursi,
                      point_berangkat:point_berangkat,
                      tujuan_berangkat:tujuan_berangkat,
                      nomor_kursi:nomor_kursi,
                    },
                    beforeSend:function(){
                        $(".loading").show();
                    },
                    success:function(data)
                    {
                        $("div#detail_customers").show();
                        $("div#detail_customers").html(data);
                    }
                  }).done(function(){
                        // layout /////////////////////////////////////////////////////////////
                        $(".loading").hide();
                        $("#form-customers-shuttle").hide();
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
function tutup_informasi()
{
                  $("#form-customers-shuttle").show();
                  $("#detail_customers").html("");
                  $("#customer_add").hide();
                  $("#myUL").hide();
                  $("#total_seat").hide();

                  //

                  $("div.penumpang-kosong").removeClass('icon-bangku-block');
                  $("div.icon-bangku-kosong").attr('class','icon-bangku icon-bangku-kosong');
                  $("div.icon-bangku-kosong").attr('data-id', '0');
                  $("div.icon-bangku-kosong").removeAttr('title');
                  $("div.icon-bangku-klik").removeAttr('title');
}
function cetak_manifest()
{

                  $(".manifest").show();
                  $("#slide-bottom-popup").modal("show");
}

function refresh_layout() {

                  var tgl_berangkat = $("#datepicker").val();
                  var kode_jadwal = $("#kode_jadwal").val();
                  var point_berangkat = $("#point_berangkat").val();
                  var tujuan_berangkat = $("#tujuan_berangkat").val();
                  var kode_atr = $("#kode_atr").val();
                  var waktu = $("#jam").val();
                  $("#form-customers-shuttle").show();
                  $("#detail_customers").html("");
                  $("#customer_add").hide();
                  $("#myUL").hide();
                  $("#total_seat").hide();
                  return detail_jadwal(tgl_berangkat,point_berangkat,tujuan_berangkat,waktu,kode_atr,kode_jadwal);
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
                                 url: url_control+'/update_data_customers',
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
                url:url_control+"/pembatalan_tiket",
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
              url:url_control+"/mutasi_penumpang",
              type:"POST",
              cache:false,
              data:{kode_tiket:kode_tiket,no_kursi:no_kursi},
              success:function(result){
                  if(result == "success"){
                    $("div[data-id=1]").removeAttr("data-blocking","1"); // tidak bisa memindahkan ke nomor yang sudah diisi
                    refresh_layout();
                  }else{
                    refresh_layout();
                  }
              }
            });
}

function  booking()
{
              var cso = $("#uuid_cso").val();
              var kode_manifest = $("#kode_manifest").val();
              var kode_jadwal  = $("#kode_jadwal").val();
              var tanggal_req  = $("div.tglRequest").val();
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
                                        data: {
                                            kode_manifest:kode_manifest,
                                            kode_jadwal:kode_jadwal,
                                            tanggal_req:tanggal_req,
                                            nama_penumpang:nama_penumpang,
                                            kode_member:kode_member,
                                            no_handphone:no_handphone,
                                            jenis_penumpang_harga:jenis_penumpang_harga,
                                            keterangan:keterangan,
                                            total_seat:total,
                                            nomor_kursi:nomor_kursi,
                                            kode_cso:cso,
                                          },
                                        success:function(data)
                                        {
                                          popup("Berhasil Melakukan Booking");
                                          refresh_layout();
                                        }
                                      });
                      });
              }
}

function go_show()
{

              var cso = $("#uuid_cso").val();
              var kode_manifest = $("#kode_manifest").val();
              var kode_jadwal  = $("#kode_jadwal").val();
              var tanggal_req  = $("div.tglRequest").val();
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

function go_show_proses()
{

                var cso = $("#uuid_cso").val();
                var kode_manifest = $("#kode_manifest").val();
                var kode_jadwal  = $("#kode_jadwal").val();
                var tanggal_req  = $("div.tglRequest").val();
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

                $.ajax({
                  url: url_control+'/reservasi_go_show/booking_add',
                  type: 'POST',
                  dataType: 'html',
                  cache:false,
                  data: {
                      kode_manifest:kode_manifest,
                      kode_jadwal:kode_jadwal,
                      tanggal_req:tanggal_req,
                      nama_penumpang:nama_penumpang,
                      kode_member:kode_member,
                      no_handphone:no_handphone,
                      jenis_penumpang_harga:jenis_penumpang_harga,
                      keterangan:keterangan,
                      total_seat:total,
                      nomor_kursi:nomor_kursi,
                      kode_cso:cso,
                    },
                  success:function(data) {
                    non_popup_method_pembayaran();
                    popup("Success");
                    refresh_layout();
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



}

function popup_metode_pembayaran() {

              $(".cetak_tiket").show();
              $("#modal-cetak-tiket").modal("show");
}

function non_popup_method_pembayaran(){

              $(".cetak_tiket").hide();
              $("#modal-cetak-tiket").modal("hide");
}



function cetak_tiket() {
              popup_metode_pembayaran();
}
</script>
