<script type="text/javascript">
var url_control = "<?php echo site_url()?>pencarian_nomor_tiket/";
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#pencarian_nomor_telephone").keyup(function () {
      var nomor = $(this).val();
      if(nomor == null || nomor == "" ){
        $(".input-pencarian").attr("class","input-group input-pencarian  has-error");
        $("#pencarian_nomor_telephone").attr("placeholder","masukan nomor telp atau kode booking");
      }else {
        $(".input-pencarian").attr("class","input-group input-pencarian");
          pencarian_nomor();
      }

   });
});

function pencarian_nomor()
{
      var nomor = $("#pencarian_nomor_telephone").val();

      $.ajax({
        url: url_control+'/listData',
        type: 'POST',
        cache:false,
        data: {nomor: nomor},
        success:function(data){
          $(".loading").hide();
          $(".input-pencarian").removeClass('has-error');
          $("div#data_nomor_tiket").html(data);
        }
      });

}

</script>
