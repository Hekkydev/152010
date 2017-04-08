<script type="text/javascript">
  var  url_control = "<?php echo site_url('barbershop_pegawai')?>";
  $(document).ready(function() {
    $.ajax({
  		type:"GET",
  			url: url_control+'/barbershop_pegawai/listData/',
  			beforeSend:function()
  			{
  				$('.loading').show();
  			},
  			success: function(html){
  				$('#postList').html(html);
  				$('.loading').fadeOut('slow');
  			}
  	});
  });

  function searchFilter(page_num) {
  	page_num = page_num?page_num:0;
  	var keywords = $('#keywords').val();
  	var sortBy = $('#sortBy').val();
  	$.ajax({
  		type: 'POST',
  		url: url_control+'/barbershop_pegawai/ajaxPaginationData/'+page_num,
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

  function remove_service(a) {
          $.ajax({
        		  type:"POST",
        			url: url_control+'/barbershop_pegawai/remove_service/',
        			cache:false,
              data:{id_barbershop_pegawai:a},
              success: function(result){
                if(result == "success"){
                  searchFilter(0);
                }
        			},
        	});
  }

  function change_status(a,i) {
          $.ajax({
        		  type:"POST",
        			url: url_control+'/barbershop_pegawai/change_status/',
        			cache:false,
              data:{id_barbershop_pegawai:a,id_status:i},
              success: function(result){
                if(result == "success"){
                  searchFilter(0);
                }
        			},
        	});
  }
</script>
