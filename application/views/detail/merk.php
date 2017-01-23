<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">

    <title>Data Karyawan</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url('assets/css/bootstrap-theme.css'); ?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url('assets/css/elegant-icons-style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('assets/js/html5shiv.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/lte-ie7.js'); ?>"></script>
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
                  <li>
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
                  <li class="sub-menu active">
                      <a href="javascript:;" class="">
                          <i class="icon-truck"></i>
                          <span>Data Kendaraan</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo base_url(''); ?>./kendaraan">List Kendaraan</a></li>
                          <li class="active"><a class="" href="<?php echo base_url(''); ?>./merk">Merk Kendaraan</a></li>
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
                	<section class="panel">
                    	<?php foreach ($detail as $data): ?>
                      	<header class="panel-heading">
                        	Detail Type <?php echo $data['NmMerk']; ?>
                        </header>
                    <div style="padding: 10px; padding-top: 15px; padding-bottom: 15px;">
                        <table>
                        	<tr>
                            	<td>ID Type</td>
                                <td><?php echo $data['KodeMerk']; ?></td>
                            </tr>
                        	<tr>
                            	<td>Nama Type</td>
                                <td><?php echo $data['NmMerk']; ?></td>
                            </tr>
                        	<tr>
                            	<td colspan="2"><div class="btn-group">
                  <a class="btn btn-success" href="<?php echo base_url().'merk/change_merk/'.$data['id']; ?>"><i class="icon_pencil-edit"></i>Update Data Merk</a>
                  <a class="btn btn-success" href="<?php echo base_url().'type/add_type/'.$data['id']; ?>"><i class="icon_pencil-edit"></i>Add Type</a>
                                </div></td>
                            </tr>
                        </table>
                    	<?php endforeach; ?>
                      <table class="table table-striped table-advance table-hover border-top" id="sample_2">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Type</th>
            <th>Nama Type</th>
            <th><i class="icon_cogs"></i> Action</th>
          </tr>
        </thead>
                <tbody>
                  <?php $no=0; foreach ($type as $data): ?>
            <tr>
              <td><?php echo ++$no; ?></td>
              <td><?php echo $data['IDType']; ?></td>
              <td><?php echo $data['NmType']; ?></td>
              <td><div class="btn-group">
                <a class="btn btn-success" href="<?php echo base_url().'type/change_type/'.$data['id']; ?>"><i class="icon_pencil-edit"></i></a>
                <a class="btn btn-danger" href="<?php echo base_url().'type/delete_type/'.$data['id']; ?>"><i class="icon_close_alt2"></i></a>
              </div></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        </table>
                    </div>
                  </section>
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
	  <!-- data tables js -->
    <script type="text/javascript" src="<?php echo base_url('assets/assets/data-tables/jquery.dataTables.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/assets/data-tables/DT_bootstrap.js')?>"></script>
    <!-- dynamic table cuatom script for this page only-->
    <script src="<?php echo base_url('assets/js/dynamic-table.js')?>"></script>
    <!--custome script for all page-->
    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
  </body>
</html>
