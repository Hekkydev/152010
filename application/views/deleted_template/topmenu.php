
<!-- //////////////////////////////////////////////////// Header-Panel div -->
<div id="header-panel">
<nav class="navbar navbar-fixed-top">
<div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="navbar-header">

      <a class="navbar-brand" >
          <span class="logo-img"><img src="<?php echo base_url()?>assets/img/logo-mini.png" alt="" style="width:35px;  margin-top:-10px; margin-left:-10px;"></span>
          <span class="logo-text hidden-xs hidden-sm"><img src="<?php echo base_url()?>assets/img/logo-inverses.png" alt="" style="width:133px;  margin-top:-10px;"></span>
      </a> <!-- /navbar-brand -->

    <ul class="nav navbar-nav">

    <!-- menu open/close button -->
    <li class="btn-menu hidden-xs hidden-sm"> <a id="menu-toggle"  class="toggle"></a> </li>
    <li class="btn-menu hidden-md hidden-lg"> <a id="mobile-menu-toggle"  class="toggle"></a> </li>

      </ul> <!-- /navbar-nav -->



        <ul class="nav navbar-nav navbar-right">

        <li class="dropdown user-menu">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- <img src="<?php echo base_url()?>assets/img/admin.jpg" alt="" class="profile-img img-circle img-resposnive pull-left"> -->
        <span class="hidden-xs"><i class="fa fa-user"></i> USER ID: <?php //echo $usersLog->kode_user.' - '.$usersLog->nama_lengkap; ?></span> <span class="caret"></span></a>

        <ul class="dropdown-menu pull-right">
            <li><a href="<?php echo site_url('user/profile')?>"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
            <li><a href="<?php echo site_url('user/profile/akses')?>"><i class="fa fa-key" aria-hidden="true"></i>Password</a></li>
            <li><a href="<?php echo site_url('user/dashboard')?>"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a></li>
            <li><a href="<?php echo site_url('user/message')?>"><i class="fa fa-envelope" aria-hidden="true"></i>Pesan</a> <span class="badge">3</span></li>
			<li class="divider"></li>

        </ul> <!-- /dropdown-menu -->
        </li> <!-- /dropdwon -->
        <li class="btn-menu"><a class="btn-log"><i class="fa fa-sign-out" ></i>Log out</a></li>
      </ul> <!-- /navbar-right -->

    </div><!-- /navbar-collapse -->
  </div><!-- /container-fluid -->
</nav>
</div> <!-- /header-panel -->
