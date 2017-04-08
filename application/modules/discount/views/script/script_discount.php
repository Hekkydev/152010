<script type="text/javascript">
url_control = "<?php echo site_url('discount')?>";
  $(function(){
    $.ajax({
  		type:"GET",
  			url: '<?php echo base_url(); ?>discount/listData/',
  			beforeSend:function()
  			{
  				$('.loading').show();
  			},
  			success: function(html){
  				$('#postList').html(html);
  				$('.loading').fadeOut('slow');
  			}
  	})
  });

  function searchFilter(page_num) {
  	page_num = page_num?page_num:0;
  	var keywords = $('#keywords').val();
  	var sortBy = $('#sortBy').val();
  	$.ajax({
  		type: 'POST',
  		url: '<?php echo base_url(); ?>discount/ajaxPaginationData/'+page_num,
  		data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
  		beforeSend: function () {
  			$('.loading').show();
  		},
  		success: function (html) {
  			$('#postList').html(html);
  			$('.loading').fadeOut("slow");
  		}
  	});
  }

  function hapus_diskon(id)
  {


      var id_tarif_diskon = id;
      $.ajax({
        url: url_control+'/discount/remove_discount',
        type: 'POST',
        dataType: 'html',
        cache:false,
        data: {id_tarif_diskon: id_tarif_diskon}
      })
      .done(function(result) {
        if (result == "success") {
              popup("Berhasil Menghapus Data");
              searchFilter(0);
        }
      });


  }

  function change_status(id_status,id)
  {


      var id_tarif_diskon = id;
      var id_status = id_status;
      $.ajax({
        url: url_control+'/discount/change_status',
        type: 'POST',
        dataType: 'html',
        cache:false,
        data: {id_tarif_diskon: id_tarif_diskon,id_status:id_status}
      })
      .done(function(result) {
        if (result == "success") {
              popup("Berhasil Merubah Status");
              searchFilter(0);
        }
      });


  }

</script>
