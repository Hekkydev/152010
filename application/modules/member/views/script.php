<script type="text/javascript">
  function search(){
    var query = $('#query-search').val();
    $.ajax({
      url:"<?php echo site_url('customers/member/search_data')?>",
      type:"POST",
      cache:false,
      data:{data:query},
      success:function(data){
        $('.table-member').html(data);
      }
    });

  }

  function validasi()
  {
    var nama_depan = document.forms['form-member']['nama_depan'].value;
    var email = document.forms['form-member']['email'].value;

    if(nama_depan == null || nama_depan == "")
    {
      popup("Silahkan isi nama depan terlebih dahulu");
      return false;
    }
    if(email == null || email == "")
    {
      popup("Silahkan isi nama email terlebih dahulu");
      return false;
    }

  }

  // $.ajax({
  //   url:"<?php echo site_url('customers/member/search_data')?>",
  //   type:"GET",
  //   cache:false,
  //   data:{data:q},
  //   success:function(data){
  //     $('.table-member').hide();
  //     $('.table-member').html(data);
  //   }
  // });
  $(function(){
    var data = 1;
    $.ajax({
      url:"<?php echo site_url('customers/member/list_data')?>",
      type:"GET",
      cache:false,
      data:{data:data},
      success:function(data){
        $('.table-member').html(data);
      }
    });
  });


</script>
