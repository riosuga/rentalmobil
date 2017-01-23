<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://192.168.1.73/rentalmobil/assets/img/favicon.png">

    <title>Aplikasi Rental Mobil</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url()."assets/"?>css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url()."assets/"?>css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url()."assets/"?>css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url()."assets/"?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url()."assets/"?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()."assets/"?>css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="http://192.168.1.73/rentalmobil/assets/js/html5shiv.js"></script>
      <script src="http://192.168.1.73/rentalmobil/assets/js/respond.min.js"></script>
      <script src="http://192.168.1.73/rentalmobil/assets/js/lte-ie7.js"></script>
    <![endif]-->
  </head>


  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="<?php echo base_url(); ?>" class="logo">Aplikasi&nbsp;<span>Rental Mobil</span></a>
            <!--logo end-->
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a href="<?php echo base_url(''); ?>" class="">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo base_url(''); ?>./karyawan" class="">
                          <i class="icon_id-2"></i>
                          <span>Data Karyawan</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo base_url(''); ?>./pemilik" class="">
                          <i class="icon-user"></i>
                          <span>Pemilik Kendaraan</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-truck"></i>
                          <span>Data Kendaraan</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo base_url(''); ?>./kendaraan">List Kendaraan</a></li>
                          <li><a class="" href="<?php echo base_url(''); ?>./merk">Merk Kendaraan</a></li>
                          <li><a class="" href="<?php echo base_url(''); ?>./jenisservice">Jenis Service</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="<?php echo base_url(''); ?>./sopir" class="">
                          <i class="icon-user"></i>
                          <span>Data Sopir</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo base_url(''); ?>./pelanggan" class="">
                          <i class="icon-user"></i>
                          <span>Data Pelanggan</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo base_url(''); ?>./transaksisewa" class="">
                          <i class="icon-money"></i>
                          <span>Transaksi Sewa</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo base_url('sys_e/logout'); ?>" class="">
                          <i class="icon-signout"></i>
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
            <!-- page start-->
			<div class="row">
                  <div class="col-lg-12">
                      WOOOOO
                  </div>
              </div>
			<!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- nice scroll -->
    <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
	<!--custome script for all page-->
    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
  </body>
</html>
