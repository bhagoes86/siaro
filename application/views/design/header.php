<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Siaro | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/font-awesome-4.4.0/css/font-awesome.min.css')?>" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/ionicons-2.0.1/css/ionicons.min.css')?>">
    <!-- DATA TABLES -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.css')?>" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url('assets/dist/css/skins/_all-skins.min.css');?>" />
    <!-- validation engine -->
    <!--
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/formvalidate/validationEngine.jquery.css">
    -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
    <!-- Bootstrap 3.3.5 JS -->
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- DataTables -->
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/plugins/fastclick/fastclick.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/dist/js/app.min.js')?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/dist/js/demo.js')?>"></script>

  </head>

  <body class="hold-transition skin-blue sidebar-mini fixed">
    <noscript>
      <center>This page needs JavaScript activated to work.</center>
      <style>div { display:none; }</style>
    </noscript>
    <div class="wrapper">

<!-- END TOP -->

<!-- HEADER -->
<header class="main-header" style="border-bottom:1px solid white;">
  <!-- Logo -->
    <a href="<?=base_url()?>home" class="logo" style="background-color: rgb(236,240,245);">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="color: #000000;">
        <img src="<?=base_url()?>assets/images/main-logo.png" alt="image"/>
      </span>
        <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color: #000000;">
        <img src="<?=base_url()?>assets/images/main-logo.png" alt="image"/>
      </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">

      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">

          <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?=base_url()?>assets/images/users/<?=users_info('foto')?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?=$this->session->userdata('user_profile_name')?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header"><img src="<?=base_url()?>assets/images/users/<?=users_info('foto')?>" class="img-circle" alt="User Image">
                  <p>
                    <?php echo users_info('full_name')?>
                    <small>Member since <?php echo users_info('created_on') ?></small>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?=base_url()?>profile" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?=base_url()?>auth/logout" class="btn btn-default btn-flat">Log out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>

      </div>
  </nav>
</header>
<!-- END HEADER -->
