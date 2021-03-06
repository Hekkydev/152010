<script type="text/javascript">
$("input#kode_member").keyup(function(){
      if ($(this).val() == null || $(this).val() == "") {
        reset_checking();
      }else {
        cek_kode_member($(this).val());
      }
});



$("#no_handphone").keyup(function(){

    if (/\D/g.test(this.value))
    {
      this.value = this.value.replace(/\D/g, '');
    }else{
      if ($(this).val() == null || $(this).val() == "") {
          reset_checking();
      }else {
          cek_nomor_handphone($(this).val());
      }
    }


});



function cek_kode_member(e)
{
      var key = {kode_member:e};
      $.ajax({
        url: url_control+'/reservasi_member_checking/get_kode_member_cheking',
        type: 'POST',
        dataType: 'html',
        data: key,
        success:function(result)
        {
          if (result > 0) {
              $("p[id=kode_member_message]").text("Terdaftar").attr('style', 'color:green');
          }else{
              $("p[id=kode_member_message]").text("Tidak Terdaftar").attr('style', 'color:#CC0000');
              $("input[id=nama_depan]").val("").removeAttr('readonly','true');
              $("#no_handphone").val("").removeAttr('readonly','true');
          }
        }
      })
      .done(function(result) {
        if (result > 0) {
          cek_kode_member_display(e);
        }
      });

}


function cek_kode_member_display(e)
{

        var key = {kode_member:e};
        $.ajax({
          url: url_control+'/reservasi_member_checking/get_kode_member_cheking_display',
          type: 'POST',
          dataType: 'html',
          data: key,
        })
        .done(function(result) {
          var customer = JSON.parse(result);
          if(customer.nama_depan != 0 ){
             $("input[id=nama_depan]").val(customer.nama_depan).attr('readonly','true');
             $("#no_handphone").val(customer.no_handphone).attr('readonly','true');
          }

        });


}


function cek_nomor_handphone(e)
{

        var key = {no_handphone:e};
        $.ajax({
          url: url_control+'/reservasi_member_checking/get_notelp_cheking',
          type: 'POST',
          dataType: 'html',
          data: key,
          success:function(result)
          {
            var customers = jQuery.parseJSON(result);
            var nama_customers = customers.nama_customers;

            if (nama_customers != undefined) {
              $("input[id=nama_depan]").val(nama_customers);
            }else{
              $("input[id=nama_depan]").val("");
            }

          },
        });


}


function reset_checking()
{
  $("p[id=kode_member_message]").text("").removeAttr('style');
  $("input[id=nama_depan]").val("");
}
</script>
