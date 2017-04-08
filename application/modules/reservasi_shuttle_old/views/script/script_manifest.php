<script type="text/javascript">

$("select[name=unit_mobil").change(function(){
    cek_bop();
});

$("select[name=data_sopir]").change(function(){
    cek_bop();
});


function cek_bop()
{
    var unit_mobil = $("select[name=unit_mobil").val();
    var data_sopir = $("select[name=data_sopir").val();
    if(unit_mobil != null && data_sopir != null )
    {
        alert("ok");
    }else{
        return false;
    }

}
</script>