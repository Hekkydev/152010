<script type="text/javascript">
var url_control = "<?php echo site_url('manifest')?>";
$(document).ready(function(){
    manifest();
});

function manifest()
{
    $.ajax({
        url:url_control+'/find_manifest',
        type:'POST',
        cache:false,
        success:function(result)
        {
            $(".table-daftar-manifest").html(result);
        }
    });
}
</script>