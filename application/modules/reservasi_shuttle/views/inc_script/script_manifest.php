<script>
    function save_manifest_data()
{
                  var kode_manifest       = $('input[id=kode_manifest]').val();
                  var uuid_sopir          = $('select[name=data_sopir]').val();
                  var uuid_mobil_unit     = $('select[name=unit_mobil]').val();
                  var kode_jadwal         = $('input[id=kode_jadwal]').val();

                  sending = {
                        kode_manifest:kode_manifest,
                        uuid_sopir:uuid_sopir,
                        uuid_mobil_unit:uuid_mobil_unit,
                        kode_jadwal:kode_jadwal,
                  };

                  $.ajax({
                        url:url_control+'/reservasi_shuttle/save_manifest_data',
                        type:'POST',
                        cache:false,
                        data:sending,
                        success:function(result)
                        {
                            if(result == 'success')
                            {
                                    $("#slide-bottom-popup").modal("hide");
                                    $(".manifest").hide();
                                    refresh_layout();
                            }else{
                                    $("#slide-bottom-popup").modal("hide");
                                    $(".manifest").hide();
                                    refresh_layout();
                            }  
                        }
                  })
}
</script>