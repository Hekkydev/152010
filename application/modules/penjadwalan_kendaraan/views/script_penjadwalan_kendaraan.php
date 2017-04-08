<script type="text/javascript">
  $("select[name=asal_cabang]").change(
    function()
    {
      var asal_cabang = $("select[name=asal_cabang]").val();
      $.ajax({
        url:"<?php echo site_url('penjadwalan_kendaraan/form_asal_to_tujuan');?>",
        type:"POST",
        cache:false,
        async:true,
        data:{asal_keberangkatan:asal_cabang},
        beforeSend:function()
        {
          $(".loading").show();
        },
        success:function(data)
        {
          $("select[name=tujuan_cabang]").html(data);
          $(".loading").hide();
        }
      });
    }
  );

  $(function(){
    var asal = $("select[name=asal_cabang]").val();
    var tujuan = $("select[name=tujuan_cabang]").val();
    $.ajax({
      url:"<?php echo site_url('penjadwalan_kendaraan/listData');?>",
      type:"POST",
      cache:false,
      data:{asal_keberangkatan:asal,tujuan_keberangkatan:tujuan},
      success:function(data)
      {
        $("#postList").html(data);
      },
    });
  });


  function searchData()
  {
    var asal = $("select[name=asal_cabang]").val();
    var tujuan = $("select[name=tujuan_cabang]").val();

    $.ajax({
      url:"<?php echo site_url('penjadwalan_kendaraan/listData');?>",
      type:"POST",
      cache:false,
      data:{asal_keberangkatan:asal,tujuan_keberangkatan:tujuan},
      success:function(data)
      {
        $("#postList").html(data);
      },
    });

  }


  function set_mobil(kode_jadwal,kode_atr)
  {
	   var tgl_setup = $("input[name=tgl_setup]").val();
     var kode_jadwal = kode_jadwal;

     $.ajax({
       url:"<?php echo site_url('penjadwalan_kendaraan/set_module_mobil');?>",
       type:"POST",
       cache:false,
       async:true,
       data:{tgl_setup:tgl_setup,kode_jadwal:kode_jadwal,kode_atr:kode_atr},
       beforeSend:function()
       {
         $(".loading").show();
       },
       success:function(data)
       {

         $("#setup_module").html(data);
         $(".loading").hide();
         $("#slide-bottom-popup").modal("show");

       }
     });
  }

  function setup_mobil_insert(kode_jadwal)
  {
    var uuid_mobil_unit = $("#uuid_mobil_unit").val();
    var kode_jadwal = kode_jadwal;
    var tgl_setup = $("#datepicker").val();

    $.ajax({
      url:"<?php echo site_url('penjadwalan_kendaraan/setup_mobil_insert')?>",
      type:"POST",
      cache:false,
      data:{kode_jadwal:kode_jadwal,uuid_mobil_unit:uuid_mobil_unit,tgl_setup:tgl_setup},
      beforeSend:function()
      {
          $(".loading").show();
      },
      success:function(data)
      {

          $("#slide-bottom-popup").modal("hide");
          $(".loading").hide();
          popup(data);

      }
    });
    searchData();
  }


  function set_sopir(kode_jadwal,kode_atr)
  {

	   var tgl_setup = $("input[name=tgl_setup]").val();
     var kode_jadwal = kode_jadwal;

     $.ajax({
       url:"<?php echo site_url('penjadwalan_kendaraan/set_module_sopir');?>",
       type:"POST",
       cache:false,
       async:true,
       data:{tgl_setup:tgl_setup,kode_jadwal:kode_jadwal,kode_atr:kode_atr},
       beforeSend:function()
       {
         $(".loading").show();
       },
       success:function(data)
       {

         $("#setup_module").html(data);
         $(".loading").hide();
         $("#slide-bottom-popup").modal("show");

       }
     });
  }

  function setup_sopir_insert(kode_jadwal)
  {
    var uuid_sopir = $("#uuid_sopir").val();
    var kode_jadwal = kode_jadwal;
    var tgl_setup = $("#datepicker").val();

    $.ajax({
      url:"<?php echo site_url('penjadwalan_kendaraan/setup_sopir_insert')?>",
      type:"POST",
      cache:false,
      data:{kode_jadwal:kode_jadwal,uuid_sopir:uuid_sopir,tgl_setup:tgl_setup},
      beforeSend:function()
      {
          $(".loading").show();
      },
      success:function(data)
      {

          $("#slide-bottom-popup").modal("hide");
          $(".loading").hide();
          popup(data);


      }
    });
    searchData();
  }


</script>
