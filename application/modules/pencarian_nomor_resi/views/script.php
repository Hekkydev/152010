<script type="text/javascript">
var url_control = "<?php echo site_url()?>pencarian_nomor_resi/";
$(function(){
  $("input[id=pencarian_nomor_resi]").keyup(function(e) {
    var nomor_resi = $(this).val();


    if(nomor_resi == null || nomor_resi == ""){
      $(".input-pencarian").attr("class","input-group input-pencarian  has-error");

    }else{
        $(".input-pencarian").attr("class","input-group input-pencarian");
        pencarian_nomor();
    }

  });
});

function pencarian_nomor() {

    var nomor_resi = $("input[id=pencarian_nomor_resi]").val();

    if (nomor_resi == null || nomor_resi == "") {
        $(".input-pencarian").attr("class","input-group input-pencarian  has-error");
    }else{
            $.ajax({
              url: url_control+'/listData',
              type: 'POST',
              dataType: 'html',
              cache:false,
              data: {nomor_resi: nomor_resi}
            })
            .done(function(data) {
              $(".input-pencarian").attr("class","input-group input-pencarian");
              $("#data_nomor_resi").html(data);
            });
    }
}

function ambil_paket(nomor_resi_paket)
{
            swal({
            title: "AMBIL PAKET",
            text: "Mengambil paket dengan nomor resi : \n "+nomor_resi_paket+"",
            imageUrl: "<?php echo base_url()?>assets/icons/icon-ambil-paket.svg",
            showCancelButton: true,
            confirmButtonColor: "#731b89",
            confirmButtonText: "Proses",
            closeOnConfirm: false
            },
            function(){
              //batalkan_tiket_proses(nomor_resi_paket);
            });
}

</script>
