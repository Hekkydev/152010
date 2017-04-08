<script type="text/javascript">
var url_control = "<?php echo site_url('customer')?>";
  $(function(){
    $.ajax({
  		type:"GET",
  			url: url_control+'/listData/',
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
  		url: url_control+'/ajaxPaginationData/'+page_num,
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

</script>
