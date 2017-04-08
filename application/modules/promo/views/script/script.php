<script type="text/javascript">
var url_control = "<?php echo base_url('promo');?>";

$(document).ready(function(){
    load_promo();
});

function load_promo()
{
    $.ajax({
        url:url_control+'/listData',
        type: 'POST',
        cache:false,
        beforeSend:function()
        {
            $('.loading').show();
        },
        success:function(result)
        {
            $('.loading').hide();
            $('.table-promo').html(result);
        }
    });
}
</script>