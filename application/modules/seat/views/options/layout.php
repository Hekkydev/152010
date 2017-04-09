<div class="row">



</div>
<div class="row">
<div class="col-lg-8">
<br>
<div class="col-lg-offset-1 col-lg-9">
<div class="row" align="center;">
<?php 
$total_kursi =  $seat->jumlah_block;
for ($i=1; $i <= $total_kursi; $i++) { 
?>   
<?php 
$cek_block = $this->general->cek_block($seat->id_jml_kursi,$i);
if($cek_block == TRUE):?>
    <?php if($cek_block->nomor_kursi == 0):?>
     <div class="col-lg-3" data-event="kursi" data-id="2" data-number="<?php echo $i;?>" align="center" style="background:#FF9900; color:#FFF; margin:5px;height:100px;padding-top:40px;cursor:pointer;">
    Active : <?php print_r($cek_block->nomor_kursi);?>
    </div>
    <?php else:?>
    <div class="col-lg-3" data-event="kursi" data-layout="active" data-id="2" data-number="<?php echo $i;?>" align="center" style="background:#754dbf; color:#FFF; margin:5px;height:100px;padding-top:40px;cursor:pointer;">
    Active : <?php print_r($cek_block->nomor_kursi);?>
    </div>
    <?php endif;?>

<?php else:?>
<div class="layout col-lg-3" data-event="kursi" data-id="0" data-number="<?php echo $i;?>" align="center" style="background:#333; color:#FFF; margin:5px;height:100px;padding-top:40px;cursor:pointer;">
Block : null
</div>
<?php endif;?>

<?php } ?>
</div>
</div>
</div>
<div class="col-lg-4">
<br>
    <div id="setting"></div>
</div>

</div>

<script>
var url_control = "<?php echo site_url('seat')?>";
var primary_kursi = "<?php echo $seat->id_jml_kursi?>";
    $("div[data-event=kursi]").click(function(){
            $(this).each(function(){
               var status = $(this).attr('data-id');
               var number = $(this).attr('data-number');
                  if(status == 0){
                   reset();
                   $(this).attr('data-id','1');
                   $(this).attr('style','background:green; color:#FFF;margin:5px;height:100px;padding-top:40px;cursor:pointer;');
                   load_input(number);
                   }else if(status == 1){
                    reset();
                   }else if(status == 2){
                    $("#setting").html("");
                    load_update(number);   
                   }
                   function reset()
                   {
                     $('.layout').attr('data-id','0');
                     $('.layout').attr('style','background:#333; color:#FFF;margin:5px;height:100px;padding-top:40px;cursor:pointer;');
                     $("#setting").html("");
                   }

                   
            });
    });

    function load_input(number)
    {
        send = {
            id_jml_kursi: primary_kursi,
            nomor_pilihan:number,
        };
        $.ajax({
            url:url_control+'/load_setting_layout',
            type:'POST',
            data:send,
            success:function(result)
            {
                $("#setting").html(result);
            }
        });
    }

    function load_update(number)
    {
         send = {
            id_jml_kursi: primary_kursi,
            nomor_layout:number,
        };
           $.ajax({
            url:url_control+'/update_setting_layout',
            type:'POST',
            data:send,
            success:function(result)
            {
                $("#setting").html(result);
            }
        });
    }
</script>
