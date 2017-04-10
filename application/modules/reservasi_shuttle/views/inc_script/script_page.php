<script type="text/javascript">
var url_control = "<?php echo site_url('reservasi_shuttle')?>";
var tanggal_keberangkatan = $("div[id=tanggal_keberangkatan]").datepicker(
  {'dateFormat':'yy-mm-dd'}
);
$(document).ready(function() {
  $(".form-diskkon-penumpang").hide();
});
// get_point_keberangkatan
$("select[id=kota_keberangkatan]").ready(function(){
      var point_keberangkatan = read_kota_point_keberangkatan();
}).change(function(){
      var point_keberangkatan = read_kota_point_keberangkatan();
});

$("select#asal_keberangkatan").change(function(){
              var kota_keberangkatan = $("select[id=kota_keberangkatan]").val();
              var asal_keberangkatan = $("select[id=asal_keberangkatan]").val();
              tujuan_keberangkatan(kota_keberangkatan,asal_keberangkatan);
              reset_jadwal();
});
$("select#tujuan_keberangkatan").change(function(){
              reset_jadwal();
});

$("div[id=tanggal_keberangkatan]").change(function(){
              reset_jadwal();
});



function reset_jadwal()
{
              var info_proses = $("#info_proses").show();
              var jadwal_keberangkatan = $("#jadwal_keberangkatan").html("");
              var diskon_penumpang      = $(".form-diskkon-penumpang").hide();
              var harga_penumpang = $("#form-penumpang-harga").html("");

              var bangku_pilihan        = $("#bangku_pilihan").html("KOSONG");
              var button_reservasi      = $("#button_reservasi").html("");

              var customer_detail       = $("#customer_detail").html("");
              var customer_add          = $("#customer_add").show();
              var bangku_pilihan        = $("#bangku_pilihan").show().text("KOSONG");
              var slash_nomor_kursi     = $("#slash_nomor_kursi").show();


}

function resert_to_insert()
{


            var button_reservasi      = $("#button_reservasi").html("");
            var diskon_penumpang      = $(".form-diskkon-penumpang").hide();
            var harga_penumpang       = $("#form-penumpang-harga").html("");

            var customer_detail       = $("#customer_detail").html("");
            var customer_add          = $("#customer_add").show();
            var slash_nomor_kursi     = $("#slash_nomor_kursi").show();
            var bangku_pilihan        = $("#bangku_pilihan").show().text("KOSONG");


}

// kota to point_keberangkatan
function read_kota_point_keberangkatan()
{
                      var kota_keberangkatan = $("select[id=kota_keberangkatan]").val();
                      $.ajax({
                        url: url_control+'/reservasi_shuttle/point_keberangkatan',
                        type:'POST',
                        cache:false,
                        data:{kota:kota_keberangkatan},
                        success:function(data)
                        {
                             var select_asal_keberangkatan = $("select[id=asal_keberangkatan]").html(data);
                             var asal_keberangkatan        = $("select[id=asal_keberangkatan]").val();
                             tujuan_keberangkatan(kota_keberangkatan,asal_keberangkatan);

                        }
                     }).done(function(){
                             //reset_jadwal();
                     });
}

// get_point_keberangkatan
function point_keberangkatan(kota_keberangkatan)
{
                    /* Mencari asal Keberangkatan berdasarkan change */

                     $.ajax({
                       url: url_control+'/reservasi_shuttle/point_keberangkatan',
                       type:'POST',
                       cache:false,
                       data:{kota:kota_keberangkatan},
                       success:function(data)
                       {
                            $("select[id=asal_keberangkatan]").html(data);
                       }
                    });
 }

// get tujuan_keberangkatan
function tujuan_keberangkatan(kota_keberangkatan,asal_keberangkatan)
{
                     /* Mencari Tujuan Keberangkatan Berdasarkan change */
                     $.ajax({
                        url: url_control+'/reservasi_shuttle/tujuan_keberangkatan',
                        type:'POST',
                        cache:false,
                        data:{kota:kota_keberangkatan,asal:asal_keberangkatan},
                        success:function(data)
                        {
                              $("select[id=tujuan_keberangkatan]").html(data);
                        }
                     });
 }

// get_search_jadwal
function search_jadwal() {
                    var tgl_berangkat         = tanggal_keberangkatan.val();
                    var kota_berangkat        = $('select[id=kota_keberangkatan]').val();
                    var asal_keberangkatan    = $('select[id=asal_keberangkatan]').val();
                    var tujuan_keberangkatan  = $('select[id=tujuan_keberangkatan]').val();

                    if(tujuan_keberangkatan == null || tujuan_keberangkatan == '')
                    {
                          popup("Belum memilih tujuan keberangkatan");
                    }
                    else if(asal_keberangkatan == null || asal_keberangkatan == '')
                    {
                          popup("Belum memilih asal keberangkatan");
                    }
                    else
                    {
                          proses_pencarian_jadwal(tgl_berangkat,asal_keberangkatan,tujuan_keberangkatan);
                    }
}
// get_proses_pencarian_jadwal
function proses_pencarian_jadwal(tgl_berangkat,asal_keberangkatan,tujuan_keberangkatan)
{
                  $.ajax({
                     url: url_control+'/reservasi_shuttle/search_jadwal',
                     type:'POST',
                     cache:false,
                     dataType:"html",
                     data:{tgl_berangkat:tgl_berangkat,asal_keberangkatan:asal_keberangkatan,tujuan_keberangkatan:tujuan_keberangkatan},
                     beforeSend:function(){
                            $(".loading").show();
                     },
                     success:function(data)
                     {
                            var jadwal_keberangkatan = $("#jadwal_keberangkatan").html(data);
                     }
                  }).done(function(){
                          var loading = $(".loading").hide();
                          var info_proses = $("#info_proses").hide();
                          var harga_penumpang = $("#form-penumpang-harga").html("");
                          $(".form-diskkon-penumpang").hide();
                          resert_to_insert();
                  });
}





// get_detail_jadwal
function detail_jadwal(tgl_berangkat,asal_keberangkatan,tujuan_keberangkatan,waktu,kode,kode_jadwal)
{
              $.ajax({
                url: url_control+'/reservasi_shuttle/detail_jadwal',
                type:'POST',
                cache:false,
                data:{tgl_berangkat:tgl_berangkat,asal_keberangkatan:asal_keberangkatan,tujuan_keberangkatan:tujuan_keberangkatan,jam:waktu,kode:kode,kode_jadwal:kode_jadwal},
                beforeSend:function(){
                      $(".loading").show();
                },
                success:function(data)
                {
                      $("#jadwal_keberangkatan").html(data);
                }
              }).done(function(){
                      $(".loading").hide();
                      $(".form-diskkon-penumpang").show();
                      get_penumpang_harga();
              });

}

function get_penumpang_harga() {
              var jenis_kursi       = $("input[id=jenis_kursi]").val();
              var point_berangkat   = $("input[id=point_berangkat]").val();
              var tujuan_berangkat  = $("input[id=tujuan_berangkat]").val();
              var send = {
                jenis_kursi:jenis_kursi,
                point_berangkat:point_berangkat,
                tujuan_berangkat:tujuan_berangkat,
              };
              $.ajax({
                url: url_control+'/reservasi_shuttle/get_penumpang_harga',
                type:'POST',
                cache:false,
                data: send,
                success:function(data)
                {
                      $("#form-penumpang-harga").html(data);
                }
              });
}
function info_detail()
{
              $("div#info_jadwal").toggle();
}

function cetak_manifest()
{
                  var asal_keberangkatan    = $('select[id=asal_keberangkatan]').val();
                  var tujuan_keberangkatan  = $('select[id=tujuan_keberangkatan]').val();
                  send = {
                        asal:asal_keberangkatan,
                        tujuan:tujuan_keberangkatan,     
                  };
                  //$(".manifest").show();
                  //$("#slide-bottom-popup").modal("show");
                  //$('#trip-data').html(result);
                  $.ajax({
                        url:url_control+'/reservasi_shuttle/manifest_trip',
                        type:'POST',
                        cache:false,
                        data:send,
                        success:function(result)
                        {
                              console.log(result);
                        }
                  });
}












</script>
