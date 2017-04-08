<?php
 $params = array(
   'kode_atr'=>'Kode Jadwal',
   'tipe'=>'Tipe Jadwal',
   'asal_keberangkatan'=>'Asal Keberangkatan',
   'tujuan_keberangkatan'=>'Tujuan Keberangkatan',
 );
echo js_validation('validasi','form-jadwal',$params);
?>
<script type="text/javascript">
  $(function()
  {
    var sid =  "<?php echo isset($jadwal->uuid_jadwal) ? $jadwal->uuid_jadwal : '' ;?>";
    if(sid == null || sid == '')
    {
      $('#rute_jadwal').hide();
    }else{
      $('#rute_jadwal').show();
    }

  });

  $('select[name=asal_keberangkatan]').ready(
    function(){

      //---------------------------------------------
      var asal_keberangkatan = $('#asal_keberangkatan').val();
      var sid = "<?php echo isset($jadwal->uuid_jadwal) ? $jadwal->uuid_jadwal : '' ;?>";
      $.ajax({
        url:"<?php echo site_url('jadwal/form_asal_to_tujuan')?>",
        type:"POST",
        cache:false,
        data:{asal_keberangkatan:asal_keberangkatan,sid:sid},
        beforeSend:function()
        {
          $('.loading').show();
        },
        success:function(data)
        {
            $("#tujuan_keberangkatan").html(data);
            $('.loading').fadeOut('slow');
        }
      });
      //--------------------------------------------

    }
  ).change(
    function()
    {
      //---------------------------------------------
      var asal_keberangkatan = $('#asal_keberangkatan').val();
      var sid = "<?php echo isset($jadwal->uuid_jadwal) ? $jadwal->uuid_jadwal : '' ;?>";
      $.ajax({
        url:"<?php echo site_url('jadwal/form_asal_to_tujuan')?>",
        type:"POST",
        cache:false,
        data:{asal_keberangkatan:asal_keberangkatan,sid:sid},
        beforeSend:function()
        {
          $('.loading').show();
        },
        success:function(data)
        {
            $("#tujuan_keberangkatan").html(data);
            $('.loading').fadeOut('slow');
        }
      });
      //--------------------------------------------
    }
  );

$('select[name=id_jenis_jadwal]').ready(
  function()
  {
    var id_jenis_jadwal = $('#id_jenis_jadwal').val();
    if(id_jenis_jadwal == 2 ){
        $('#transit_jadwal').show();
    }else{
        $('#transit_jadwal').hide();

    }
  }
).change(
    function()
    {
      var id_jenis_jadwal = $('#id_jenis_jadwal').val();
      if(id_jenis_jadwal == 2 ){
          $('#transit_jadwal').show();
          $('#rute_jadwal').hide();
      }else{
          $('#transit_jadwal').hide();
          $('#rute_jadwal').hide();
      }
    }
);

$('select[name=asal_utama]').ready(
  function()
  {
    //------------------------------------------------------------------
   var asal_utama = $("#asal_utama").val();
   var sid = "<?php echo isset($jadwal->uuid_jadwal) ? $jadwal->uuid_jadwal : '' ;?>";

   $.ajax({
     url : "<?php echo site_url('jadwal/form_asal_utama_to_tujuan_utama');?>",
     type: "POST",
     cache:false,
     data: {asal_utama:asal_utama,sid:sid},
     success:function(data){
         $("#tujuan_utama").html(data);
     }
   });
  //------------------------------------------------------------------
  }
).change(
  function()
  {
     //------------------------------------------------------------------
    var asal_utama = $("#asal_utama").val();
    var sid = "<?php echo isset($jadwal->uuid_jadwal) ? $jadwal->uuid_jadwal : '' ;?>";
    $.ajax({
      url : "<?php echo site_url('jadwal/form_asal_utama_to_tujuan_utama');?>",
      type: "POST",
      cache:false,
      data: {asal_utama:asal_utama,sid:sid},
      success:function(data){
          $("#tujuan_utama").html(data);
          $("#jadwal_utama").val("");
      }
    });
   //------------------------------------------------------------------
  }
);


$('select[name=tujuan_utama]').change(
  function()
  {
//------------------------------------------------------------------
    var asal_utama = $("#asal_utama").val();
    var tujuan_utama = $("#tujuan_utama").val();
    $.ajax({
     url : "<?php echo site_url('jadwal/jadwal_transit_form_asal_and_tujuan');?>",
     type: "POST",
     cache:false,
     data: {asal:asal_utama,tujuan:tujuan_utama},
     success:function(data){
     $("#jadwal_utama").html(data);
     }
   });
//------------------------------------------------------------------
  }
)

</script>
