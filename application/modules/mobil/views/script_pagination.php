<script>
function searchFilter(page_num) {
	page_num = page_num?page_num:0;
	var keywords = $('#keywords').val();
	var sortBy = $('#sortBy').val();
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url(); ?>mobil/ajaxPaginationData/'+page_num,
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

$(function(){
	$.ajax({
		type:"GET",
			url: '<?php echo base_url(); ?>mobil/listData/',
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
</script>
