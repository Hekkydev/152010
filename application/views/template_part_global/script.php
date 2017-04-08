<!-- /////////////////////////////// Scripts /////////////////////////////// -->

<!--<script src="<?php echo base_url()?>assets/js/app.min.js"></script>
<script src="<?php echo base_url()?>assets/js/custom.js"></script> -->
<script src="<?php echo base_url()?>assets/note/summernote.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $('#summernote').summernote();
</script>

<script src="<?php echo base_url()?>assets/js/sweetalert-dev.js" charset="utf-8"></script>
<?php echo $this->session->flashdata('info'); ?>
<script>
//--------------------1. Menu user Open------------------------------------

document.querySelector('a.dropdown-toggle').onclick= function(){
	$(".dropdown-menu").toggle();
}

// ------------------- 3. Menu Open/Close Button -------------------

$("#menu-toggle").click(
  function(e) {
  e.preventDefault();
  $("#navigation-panel").toggleClass("shut");
  $("#content-panel").toggleClass("resize");
  $(".navbar-brand").toggleClass("short");
  $("#menu-toggle").toggleClass("shut");
}).ready(
	function(e){
	$("#navigation-panel").toggleClass("shut");
	$("#content-panel").toggleClass("resize");
	//$(".navbar-brand").toggleClass("short");
	$("#menu-toggle").toggleClass("shut");
	}
);

// ------------------- 4. Mobile Menu Open/Close Button -------------------
$("#mobile-menu-toggle").click(function(e) {
e.preventDefault();
  $("#navigation-panel").toggleClass("navbar-mobile-size");
  $("#mobile-menu-toggle").toggleClass("shut");
  $("#content-panel").toggleClass("bg-active");
});



document.querySelector('a.btn-log').onclick= function(){
	swal({
		title: "Keluar dari sistem ini ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#731b89',
		confirmButtonText: 'Ya',
		cancelButtonText: "Tidak",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
    if (isConfirm){
      window.location.href = '<?php echo site_url('logout') ?>';
    } else {
      swal("Kembali", "logout di batalkan ", "success");
    }
	});
};


function popup(txt)
{
	swal({
		title:'Informasi',
		text: txt,
		timer: 3000,
		showConfirmButton: false,
	});
}

$(function(){
	$('#datepicker').datepicker({
    dateFormat: 'yy-mm-dd'
  });
});
</script>
