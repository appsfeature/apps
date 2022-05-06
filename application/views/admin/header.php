<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AppsFeature</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/plugins/toast/build/toastr.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url()?>public/admin/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          Welcome, <strong><?php echo getPersonName();?></strong>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url().'admin/login/logout' ?>" class="dropdown-item">
             Logout
          </a>

        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url()?>public/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><strong><?php echo getAppName(); ?></strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block"><?php echo getPersonName(); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="<?php echo base_url().'admin/home';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='dashboard') ? 'active' : ''; ?>">
             <i class="far fa-circle nav-icon"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>


       <!-- BizWiz section start -->
       <?php if(isVisibleSideMenu('HomeItems') == true) {?>
       <!-- Content section start -->
       <li class="nav-item has-treeview <?php echo (!empty($mainModule) && $mainModule =='homeItem') ? 'menu-open' : ''; ?>">
         <a href="#" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='homeItem') ? 'active' : ''; ?>">
           <i class="nav-icon fas fa-tachometer-alt"></i>
           <p> Home Slider <i class="right fas fa-angle-left"></i> </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="<?php echo base_url().'admin/bizwiz';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='homeItem' && !empty($subModule) && $subModule =='viewHomeItem') ? 'active' : ''; ?>">
               <i class="far fa-circle nav-icon"></i>
               <p> List </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="<?php echo base_url().'admin/bizwiz/create';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='homeItem' && !empty($subModule) && $subModule =='createHomeItem') ? 'active' : ''; ?>">
               <i class="far fa-circle nav-icon"></i>
               <p> Add </p>
             </a>
           </li>
         </ul>
       </li>
       <?php } ?>
       <!-- BizWiz section end -->

       <!-- Category section start -->
       <?php if(isVisibleSideMenu('Categories') == true) {?>
          <li class="nav-item has-treeview <?php echo (!empty($mainModule) && $mainModule =='category') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='category') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Categories <i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/category/list';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='category' && !empty($subModule) && $subModule =='viewCategory') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> List </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/category/create';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='category' && !empty($subModule) && $subModule =='createCategory') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/category/listmaster';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='category' && !empty($subModule) && $subModule =='listmaster') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Master </p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <!-- Category section end -->

          <!-- Content section start -->
          <?php if(isVisibleSideMenu('Contents') == true) {?>
          <li class="nav-item has-treeview <?php echo (!empty($mainModule) && $mainModule =='content') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='content') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Contents <i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/content/list';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='content' && !empty($subModule) && $subModule =='viewContent') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> List </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/content/create';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='content' && !empty($subModule) && $subModule =='createContent') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Add </p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <!-- Content section end -->

          <div class="border-top my-3"></div>

          <li class="nav-item">
            <a href="<?php echo base_url().'admin/itemtype/master';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='itemtypemaster') ? 'active' : ''; ?>">
              <i class="far fa-circle nav-icon"></i>
              <p> ItemType </p>
            </a>
          </li>

          <?php if(isVisibleSideMenu('OneSignal') == true) {?>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Notification <i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="https://app.onesignal.com/apps/656370d9-dc90-47a4-9823-132fcbebcf3a/campaigns" target="_blank" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Campaigns </p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="https://app.onesignal.com/apps/656370d9-dc90-47a4-9823-132fcbebcf3a/notifications/new?template_id=a3a363f6-b609-4237-af61-a80b7bfaca4b" target="_blank" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> New Message </p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <!-- JSONData section start -->
          <?php if(isVisibleSideMenu('JsonData') == true) {?>
          <li class="nav-item has-treeview <?php echo (!empty($mainModule) && $mainModule =='item') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='item') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Json data <i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/json';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='item' && !empty($subModule) && $subModule =='viewItem') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> List </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/json/create';?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule =='item' && !empty($subModule) && $subModule =='createItem') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Add </p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <!-- JSONData section end -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
