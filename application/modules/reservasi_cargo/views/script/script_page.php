<script type="text/javascript">
var url_control = "<?php echo site_url('reservasi_cargo/')?>";
$(function() { //onload | on ready
              $("#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
                close_input();
              $("#datepicker" ).change(function(){
                resfresh_jadwal();
                tutup_informasi();
                close_input();
              })
});
// EVENT USING SELECTOR
$("#kota_berangkat").ready(function(){
                var kota_keberangkatan = $("#kota_berangkat").val();
                $.ajax({
                  url: url_control+'/point_keberangkatan',
                  type:'POST',
                  cache:false,
                  data:{kota:kota_keberangkatan},
                  success:function(data)
                  {
                       var select_asal_keberangkatan = $("select#asal_keberangkatan").html(data);
                       var asal_keberangkatan = $("select#asal_keberangkatan").val();
                       tujuan_keberangkatan(kota_keberangkatan,asal_keberangkatan);

                  }
               });
}).change(function() {
                var kota_keberangkatan = $("#kota_berangkat").val();
                $.ajax({
                  url: url_control+'/point_keberangkatan',
                  type:'POST',
                  cache:false,
                  data:{kota:kota_keberangkatan},
                  success:function(data)
                  {
                       var select_asal_keberangkatan = $("select#asal_keberangkatan").html(data);
                       var asal_keberangkatan = $("select#asal_keberangkatan").val();
                       tujuan_keberangkatan(kota_keberangkatan,asal_keberangkatan);
                  }
               });
});

// FUNCTION ON EVENT
function point_keberangkatan(kota_keberangkatan)
{
              /* Mencari asal Keberangkatan berdasarkan change */

               $.ajax({
                 url: url_control+'/point_keberangkatan',
                 type:'POST',
                 cache:false,
                 data:{kota:kota_keberangkatan},
                 success:function(data)
                 {
                      $("select#asal_keberangkatan").html(data);
                 }
              });
 }

 function tujuan_keberangkatan(kota_keberangkatan,asal_keberangkatan)
 {

             /* Mencari Tujuan Keberangkatan Berdasarkan change */

             $.ajax({
                url: url_control+'/tujuan_keberangkatan',
                type:'POST',
                cache:false,
                data:{kota:kota_keberangkatan,asal:asal_keberangkatan},
                success:function(data)
                {
                     $("#tujuan_keberangkatan").html(data);
                }
             });
 }

 function cari_jadwal()
 {
              var tgl_berangkat         = $('#datepicker').val();
              var kota_berangkat        = $('#kota_berangkat').val();
              var asal_keberangkatan    = $('#asal_keberangkatan').val();
              var tujuan_keberangkatan  = $('#tujuan_keberangkatan').val();

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

function proses_pencarian_jadwal(tgl_berangkat,asal_keberangkatan,tujuan_keberangkatan)
{
              $.ajax({
                 url: url_control+'/search_jadwal',
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
                      var reset = close_input();
                      var panel_input = $("div#panel-input-paket").show();
                      var panel_detail = $("div#panel-detail-paket").hide();
                      var kondisi_waktu  = $('#cek-waktu-jadwal').show();
              });
}

function detail_jadwal(tgl_berangkat,asal,tujuan,waktu,kode_atr,kode_jadwal)
{

                  var jadwal_detail = {
                        tgl_berangkat:tgl_berangkat,
                        asal_keberangkatan:asal,
                        tujuan_keberangkatan:tujuan,
                        jam:waktu,
                        kode:kode_atr,
                        kode_jadwal:kode_jadwal,
                    };

                  $.ajax({
                    url: url_control+'/detail_jadwal',
                    type:'POST',
                    cache:false,
                    data:jadwal_detail,
                    beforeSend:function(){
                      $(".loading").show();
                    },
                    success:function(data)
                    {
                      $("#form-change").html(data);
                    }
                    }).done(function(){
                        $(".loading").hide();
                        var reset = open_input();
                        $('#cek-waktu-jadwal').hide();
                    });
}

function refresh_layout() {

                  var tgl_berangkat = $("#datepicker").val();
                  var kode_jadwal = $("#kode_jadwal").val();
                  var point_berangkat = $("#point_berangkat").val();
                  var tujuan_berangkat = $("#tujuan_berangkat").val();
                  var kode_atr = $("#kode_atr").val();
                  var waktu = $("#jam").val();
                  detail_jadwal(tgl_berangkat,point_berangkat,tujuan_berangkat,waktu,kode_atr,kode_jadwal);
                  tutup_informasi();
}

function resfresh_jadwal() {
                  var jadwal_keberangkatan = $("#jadwal_keberangkatan").html("");
                  var info_proses = $("#info_proses").show();
}
</script>
