<script type="text/javascript">

  $("#postList").ready(function(){
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(""); ?>pengumuman/pengumuman_pesan/listData',
      data:{},
      beforeSend: function () {
        $('.loading').show();
      },
      success: function (html) {
        $('#postList').html(html);
        $('.loading').fadeOut("slow");
      }
    }).error(function(e){
      console.error(e);
    });
  });

  function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(""); ?>pengumuman/pengumuman_pesan/ajaxPaginationData/'+page_num,
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

function Start(page) {
OpenWin = this.open(page, "CtrlWindow", "toolbar=no,menubar=yes,location=yes,scrollbars=yes,resizable=yes,width=1000,height=650");
this.resizeTo(250, 250);
}
</script>
