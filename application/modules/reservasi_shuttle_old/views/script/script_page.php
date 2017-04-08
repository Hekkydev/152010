<script type="text/javascript">
var url_control = "<?php echo site_url('reservasi_shuttle_old/')?>";
$(function() { //onload | on ready
              $("#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
});

$("div#datepicker.tglRequest").change(function() {
                reset();
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
                       var info_proses = $("#info_proses").show();
                       $("#jadwal_keberangkatan").html("");
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
                       var info_proses = $("#info_proses").show();
                       $("#jadwal_keberangkatan").html("");
                       tujuan_keberangkatan(kota_keberangkatan,asal_keberangkatan);
                  }
               });
});
$("select#asal_keberangkatan").change(function(){
              var kota_keberangkatan = $("#kota_berangkat").val();
              var asal_keberangkatan = $("select#asal_keberangkatan").val();
              var info_proses = $("#info_proses").show();
              $("#jadwal_keberangkatan").html("");
              tujuan_keberangkatan(kota_keberangkatan,asal_keberangkatan);
});
$("select#tujuan_keberangkatan").change(function(){
              var info_proses = $("#info_proses").show();
              $("#jadwal_keberangkatan").html("");
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
                      $("#form-customers-shuttle").show();
                      $("#detail_customers").html("");
                      $("#customer_add").hide();
                      $("#myUL").hide();
                      $("#total_seat").hide();
              });
}
function detail_jadwal(tgl_berangkat,asal_keberangkatan,tujuan_keberangkatan,waktu,kode,kode_jadwal)
{
              $.ajax({
                url: url_control+'/detail_jadwal',
                type:'POST',
                cache:false,
                data:{tgl_berangkat:tgl_berangkat,asal_keberangkatan:asal_keberangkatan,tujuan_keberangkatan:tujuan_keberangkatan,jam:waktu,kode:kode,kode_jadwal:kode_jadwal},
                beforeSend:function(){
                  $(".loading").show();
                },
                success:function(data)
                {
                  $("#form-change").html(data);
                }
              }).done(function(){
                  $(".loading").hide();
              });

}
function info_detail()
{
              $("div#info_jadwal").toggle();
}
function reset()
{
              $("#jadwal_keberangkatan").html("");
              $("#info_proses").show();
              $("#customer_add").hide();
              $("#myUL").hide();
              $("#total_seat").hide();
              var form_reservasi = $("#form-customers-shuttle").show();
              var detail_customers = $("#detail_customers").hide();
}





</script>
