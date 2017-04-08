<script type="text/javascript">
$("input#kode_member").keyup(function()
{

                      $("div.form-telephone").removeClass("has-error");
                      $("div.form-nama-penumpang").removeClass("has-error");
                      //get the kode member
                      var kode_member = $(this).val();
                      $.ajax({
                        async: true,
                        url:url_control+"/get_kode_member_cheking",
                        type:"POST",
                        cache:false,
                        data:{kode_member:kode_member},
                        success:function(result){
                              if(result != 0)
                              {
                                $("#kode_member_message").html('<span style="color:#006600;">Terdaftar</span>');
                                $("div.form-kode-member").addClass("has-success");
                                $("div.form-telephone").addClass("has-success");
                                $("div.form-nama-penumpang").addClass("has-success");

                                var informasi = $("p#nomor_telp_message").html("");
                                set_this_name_by_kode(kode_member);
                              }else{
                                $("#kode_member_message").html('<span style="color:#CC0000;">Tidak Terdaftar</span>');
                                $("div.form-kode-member").removeClass("has-success");
                                $("div.form-telephone").removeClass("has-success");
                                $("div.form-nama-penumpang").removeClass("has-success");
                                var informasi = $("p#nomor_telp_message").html("");
                                var nama_penumpang = $("#nama_depan").val("");
                                var nama_penumpang_input = $("#nama_depan").removeAttr("readonly","true");

                                var telp_penumpang = $("#no_handphone").val("");
                                var telp_penumpang_input = $("#no_handphone").removeAttr("readonly","true");
                              }
                        }
                      });

                      function set_this_name_by_kode(kode_member) {
                                var kode_member = kode_member;
                                $.ajax({
                                  async: true,
                                  url:url_control+"/get_kode_member_cheking_display",
                                  type:"POST",
                                  cache:false,
                                  data:{kode_member:kode_member},
                                  success:function(result){
                                    var object = jQuery.parseJSON(result);

                                      try {
                                        if(object.nama_depan != undefined )
                                        {
                                          var nama_penumpang = $("#nama_depan").val(object.nama_depan+' '+object.nama_belakang);
                                          var nama_penumpang_read = $("#nama_depan").attr("readonly","true");
                                          var telp_penumpang = $("#no_handphone").val(object.no_handphone);
                                          var telp_penumpang_read = $("#no_handphone").attr("readonly","true");

                                        }else{
                                          var nama_penumpang = $("#nama_depan").val("");
                                          var nama_penumpang_input = $("#nama_depan").removeAttr("readonly","true");
                                          var telp_penumpang = $("#no_handphone").val("");
                                          var telp_penumpang_input = $("#no_handphone").removeAttr("readonly","true");

                                        }
                                      } catch (e) {

                                          alert(e);
                                      }
                                  }
                                });
                              }

});
$("#no_handphone").keyup(function(){

                    var no_handphone = $(this).val();
                    $("div.form-telephone").removeClass("has-error");
                    $("div.form-nama-penumpang").removeClass("has-error");
                    $.ajax({
                      async: true,
                      url:url_control+"/get_notelp_cheking",
                      type:"POST",
                      cache:false,
                      data:{no_handphone:no_handphone},
                      success:function(result){
                        // result adalah array dari url tersebut
                        try {

                            var object = jQuery.parseJSON(result);
                            if(object.nama_depan != undefined){
                              var nama_penumpang = $("#nama_depan").val(object.nama_depan+' '+object.nama_belakang);
                              var nama_penumpang_read = $("#nama_depan").attr("readonly","true");
                              var informasi = $("p#nomor_telp_message").html("No telp sudah terdaftar");
                              $("div.form-telephone").addClass("has-success");
                              $("div.form-nama-penumpang").addClass("has-success");
                            }else{
                              var informasi = $("p#nomor_telp_message").html("");
                              var nama_penumpang = $("#nama_depan").val("");
                              var nama_penumpang_input = $("#nama_depan").removeAttr("readonly","true");
                              $("div.form-telephone").removeClass("has-success");
                              $("div.form-nama-penumpang").removeClass("has-success");
                            }
                        } catch (e) {
                            alert(e);
                        }

                      }
                    });
});
</script>
