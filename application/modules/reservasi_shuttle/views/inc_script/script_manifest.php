<script>
    function save_manifest_data()
    {
                  var tanggal_reservasi   = tanggal_keberangkatan.val();
                  var kode_manifest       = $('input[id=kode_manifest]').val();
                  var uuid_sopir          = $('select[name=data_sopir]').val();
                  var uuid_mobil_unit     = $('select[name=unit_mobil]').val();
                  var kode_jadwal         = $('input[id=kode_jadwal]').val();
                  var uuid_user           = "<?php echo $usersLog->uuid_user?>";
                  var jumlah_penumpang    = "<?php echo $jumlah_penumpang?>";
                  <?php if($manifest_kode == TRUE):?>
                  var biaya_sopir         = "<?php echo $manifest_kode->biaya_sopir;?>";
                  var biaya_tol           = "<?php echo $manifest_kode->biaya_tol; ?>";
                  var biaya_bbm           = "<?php echo $manifest_kode->biaya_bbm?>";
                  var biaya_perpal        = "<?php echo $manifest_kode->biaya_perpal; ?>";
                  <?php else:?>
                  var biaya_sopir         = "<?php echo $manifest->biaya_sopir;?>";
                  var biaya_tol           = "<?php echo $manifest->biaya_tol; ?>";
                  var biaya_bbm           = "<?php echo $manifest->biaya_bbm?>";
                  var biaya_perpal        = "<?php echo $manifest->biaya_perpal; ?>";
                  <?php endif;?>
                  sending = {
                        kode_manifest:kode_manifest,
                        uuid_sopir:uuid_sopir,
                        uuid_mobil_unit:uuid_mobil_unit,
                        kode_jadwal:kode_jadwal,
                        uuid_user:uuid_user,
                        biaya_sopir:biaya_sopir,
                        biaya_bbm:biaya_bbm,
                        biaya_tol:biaya_tol,
                        biaya_perpal:biaya_perpal,
                        jumlah_penumpang:jumlah_penumpang,
                        tanggal_reservasi:tanggal_reservasi,

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
