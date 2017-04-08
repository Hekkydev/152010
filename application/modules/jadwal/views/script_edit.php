<script type="text/javascript">
  $("#asal_keberangkatan").change(function(){

    var asal = document.forms['form-jadwal']['asal_keberangkatan'].value;
    $.ajax({
      url : "<?php echo site_url('jadwal/getTujuan_jurusan');?>",
      type: "GET",
      cache:false,
      data: {asal:asal},
      success:function(data){
        $("#tujuan_keberangkatan").html(data);
      }
    });

  });


  $(function(){
  var id_jenis_jadwal = document.forms['form-jadwal']['id_jenis_jadwal'].value;
  var kode_jadwal = "<?php echo $jadwal->kode_jadwal;?>";
  var sid = "<?php echo $jadwal->uuid_jadwal;?>";

 	 $.ajax({
       url : "<?php echo site_url('jadwal/editTransit');?>",
       type: "POST",
       cache:false,
       data: {jenis:id_jenis_jadwal,kode_jadwal:kode_jadwal,sid:sid},
       success:function(data){
         $('#transit_jadwal').html(data);
       }
     });
  });
</script>
