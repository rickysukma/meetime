<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Agus Merdeko | agus.merdeko@gmail.com">
    <meta name="keyword" content="Dashboard, Admin">
    <link rel="shortcut icon" href="<?php echo site_url()?>assets/images/admin/favicon.png">

    <title>Dashboard Administrator</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo site_url()?>assets/stylesheets/admin/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo site_url()?>assets/stylesheets/admin/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo site_url()?>assets/javascripts/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo site_url()?>assets/stylesheets/admin/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo site_url()?>assets/stylesheets/admin/style.css" rel="stylesheet">
    <link href="<?php echo site_url()?>assets/stylesheets/admin/style-responsive.css" rel="stylesheet" />
    
    <!-- easyui -->
    <link href="<?php echo site_url()?>assets/jeasyui-free/themes/material/easyui.css" rel="stylesheet" />
    <link href="<?php echo site_url()?>assets/jeasyui-free/themes/icon.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo site_url()?>assets/javascripts/admin/html5shiv.js"></script>
      <script src="<?php echo site_url()?>assets/javascripts/admin/respond.min.js"></script>
    <![endif]-->

    <!-- jquery saya taruh atas -->
    <script src="<?php echo site_url()?>assets/javascripts/admin/jquery.js"></script>
    <script src="<?php echo site_url()?>assets/javascripts/admin/jquery-1.8.3.min.js"></script>
  </head>

  <body>
  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="<?php echo site_url()?>admin/home" class="logo">Admin Web</a>
            <!--logo end-->
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="<?php echo site_url()?>assets/images/admin/admin.jpg">
                            <span class="username"><?php echo $this->session->userdata('name')?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="<?php echo base_url()?>admin/user"><i class=" icon-suitcase"></i>Profil</a></li>
                            <li><a href="<?php echo base_url()?>admin/user/edit"><i class="icon-cog"></i> Ubah Profile</a></li>
                            <li><a href="<?php echo base_url()?>admin/user/password"><i class="icon-bell-alt"></i>Password</a></li>
                            <li><a href="<?php echo base_url()?>admin/home/do_logout"><i class="icon-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <!-- Dashboard -->
                  <li>
                      <a class="<?php if (!empty($main_menu)){ if ($main_menu=="dash") {echo "active";}}?>" href="<?php echo site_url()?>admin/home">
                          <i class="icon-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  
                  <!-- Berita -->
                  <?php if($this->session->userdata('typeaccount')==0){ ?>
                  <li class="sub-menu">
                      <a href="javascript:;" class="<?php if (!empty($main_menu)){ if ($main_menu=="news") {echo "active";}}?>">
                          <i class="icon-file-alt"></i>
                          <span>Kelola Berita</span>
                      </a>
                      <ul class="sub">
                          <li class="<?php if (!empty($menu)){ if ($menu=="news-all") {echo "active";}}?>"><a href="<?php echo site_url()?>admin/news">Lihat Semua</a></li>   
                          <li class="<?php if (!empty($menu)){ if ($menu=="news-add") {echo "active";}}?>"><a href="<?php echo site_url()?>admin/news/add">Tambah</a></li>
                      </ul>
                  </li>
                  <?php } ?>
                                    
                  <!-- Slide Show -->
                  <?php if($this->session->userdata('typeaccount')==0){ ?>
                  <li class="sub-menu">
                      <a href="javascript:;" class="<?php if (!empty($main_menu)){ if ($main_menu=="slideshow") {echo "active";}}?>">
                          <i class="icon-film"></i>
                          <span>Kelola Silde Show</span>
                      </a>
                      <ul class="sub">
                           <li class="<?php if (!empty($menu)){ if ($menu=="slideshow-all") {echo "active";}}?>"><a href="<?php echo site_url()?>admin/slideshow">Lihat Semua</a></li>   
                          <li class="<?php if (!empty($menu)){ if ($menu=="slideshow-add") {echo "active";}}?>"><a href="<?php echo site_url()?>admin/slideshow/add">Tambah</a></li>
                      </ul>
                  </li>
                  <?php } ?>
                                    
                  <!-- Page -->
				  <?php if($this->session->userdata('typeaccount')==0){ ?>
				  <li class="sub-menu">
                      <a href="<?php echo site_url()?>admin/pages" class="<?php if(!empty($main_menu)){if($main_menu=="pages"){echo "active";}}?>">
                          <i class="icon-columns"></i>
                          <span>Kelola Halaman</span>
                      </a>
                  </li>
				  <?php } ?>
                  <!-- MLM Sistem -->
                  <li class="sub-menu">
                      <a href="javascript:;" class="<?php if (!empty($main_menu)){ if ($main_menu=="me") {echo "active";}}?>">
                          <i class="icon-file"></i>
                          <span>Sistem Metime</span>
                      </a>
                      <ul class="sub">
						  <?php if($this->session->userdata('typeaccount')==0){ ?>
                          <li class="<?php if (!empty($menu)){ if ($menu=="me-kor") {echo "active";}}?>"><a href="<?php echo site_url()?>admin/meetime/kordinator">Data Koordinator Utama</a></li>   
                          <?php } if(($this->session->userdata('typeaccount')==0)||($this->session->userdata('typeaccount')==1)){ ?>
						  <li class="<?php if (!empty($menu)){ if ($menu=="me-korwil") {echo "active";}}?>"><a href="<?php echo site_url()?>admin/meetime/korwil">Data Koordinator Wilayah</a></li>   
                          <?php } if(($this->session->userdata('typeaccount')==0)||($this->session->userdata('typeaccount')==2)){ ?>
						  <li class="<?php if (!empty($menu)){ if ($menu=="me-res") {echo "active";}}?>"><a href="<?php echo site_url()?>admin/meetime/reseller">Data Reseller</a></li>   
                          <?php } ?>
                          <?php /*if($this->session->userdata('typeaccount')==3){ ?>
						  <li class="<?php if (!empty($menu)){ if ($menu=="me-poin") {echo "active";}}?>"><a href="<?php echo site_url()?>admin/meetime/poin">Data Poin</a></li>
						  <?php }*/ ?>
                          <li class="<?php if (!empty($menu)){ if ($menu=="me-roy") {echo "active";}}?>"><a href="<?php echo site_url()?>admin/meetime/royalti">Data Royalti</a></li>
						  <?php if(($this->session->userdata('typeaccount')==0)||$this->session->userdata('typeaccount')==3){ ?>
						  <li class="<?php if (!empty($menu)){ if ($menu=="me-ord") {echo "active";}}?>"><a href="<?php echo site_url()?>admin/meetime/order">Pesan / Belanja</a></li>
						  <?php } ?>
                      </ul>
                  </li>
				  <?php if($this->session->userdata('typeaccount')==0){ ?>
                  <li class="sub-menu">
                      <a href="<?php echo site_url()?>admin/general" class="<?php if(!empty($main_menu)){if($main_menu=="general"){echo "active";}}?>">
                          <i class="icon-rss-sign"></i>
                          <span>Setting Website</span>
                      </a>
                  </li>
				  <?php } ?>
                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>admin/home/do_logout">
                          <i class="icon-power-off"></i>
                          <span>Logout</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">