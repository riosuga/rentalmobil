<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">

    <title>Data Pemilik Kendaraan</title>

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
                      <a href="<?php echo base_url(); ?>" class="">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo base_url(); ?>./karyawan" class="">
                          <i class="icon_id-2"></i>
                          <span>Data Karyawan</span>
                      </a>
                  </li>
                  <li class="active">
                      <a href="<?php echo base_url(); ?>./pemilik" class="">
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
                	<section class="panel">
                    	<?php foreach ($detail as $data): ?>
                      	<header class="panel-heading">
                        	Detail <?php echo $data['NmPemilik']; ?>
                        </header>
                        <table>
                        	<tr>
                            	<td>Kode Pemilik</td>
                                <td><?php echo $data['KodePemilik']; ?></td>
                            </tr>
                        	<tr>
                            	<td>Nama Lengkap</td>
                                <td><?php echo $data['NmPemilik']; ?></td>
                            </tr>
                        	<tr>
                            	<td>Alamat</td>
                                <td><?php echo $data['AlmtPemilik']; ?></td>
                            </tr>
                        	<tr>
                            	<td>Nomor Telepon</td>
                                <td><?php echo $data['TelpPemilik']; ?></td>
                            </tr>
                        	<tr>
                            	<td colspan="2"><div class="btn-group">
									<a class="btn btn-success" href="<?php echo base_url().'pemilik/change_pemilik/'.$data['id']; ?>"><i class="icon_pencil-edit"></i>&nbsp;Update Data Pemilik</a>
                  <a class="btn btn-success" href="<?php echo base_url().'kendaraan/add_kendaraan/'.$data['id']; ?>"><i class="icon-plus-sign"></i>&nbsp;Buat Data Kendaraan</a>
                  <a class="btn btn-success" href="<?php echo base_url().'setoran/add_setoran/'.$data['id']; ?>"><i class="icon-plus-sign"></i>&nbsp;Buat Data Setoran</a>
                                </div></td>
                            </tr>
                        </table>
                    	<?php endforeach; ?>

                      <header class="panel-heading tab-bg-primary">
                  <ul class="nav nav-tabs">
                      <li class="active">
                          <a data-toggle="tab" href="#kendaraan">
                              <i class="icon-truck"></i>
                                &nbsp;Kendaraan
                            </a>
                        </li>
                        <li>
                          <a data-toggle="tab" href="#setoran">
                              <i class="icon-money"></i>
                                &nbsp;Setoran
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                  <div class="tab-content">
                      <div id="kendaraan" class="tab-pane active">
                          <table class="table table-striped table-advance table-hover border-top" id="sample_3">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Plat</th>
            <th>Tahun</th>
            <th>Tarif per Jam</th>
            <th>Status Rental</th>
            <th>ID Type</th>
            <th>ID Pemilik</th>
            <th><i class="icon_cogs"></i> Action</th>
          </tr>
        </thead>
                <tbody>
                  <?php $no=0; foreach ($kendaraan as $data): ?>
            <tr>
              <td><?php echo ++$no; ?></td>
              <td><?php echo $data['NoPlat']; ?></td>
              <td><?php echo $data['Tahun']; ?></td>
              <td><?php echo $data['TarifperJam']; ?></td>
              <td><?php echo $data['StatusRental']; ?></td>
              <td><?php echo $data['IDType']; ?></td>
              <td><?php echo $data['IDPemilik']; ?></td>
              <td><div class="btn-group">
                <a class="btn btn-success" href="<?php echo base_url().'kendaraan/detail_kendaraan/'.$data['id']; ?>"><i class="icon_pencil-edit"></i></a>
                <a class="btn btn-danger" href="<?php echo base_url().'kendaraan/delete_kendaraan/'.$data['id']; ?>"><i class="icon_close_alt2"></i></a>
              </div></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        </table>
                        </div>
                        <div id="setoran" class="tab-pane">
                          <table class="table table-striped table-advance table-hover border-top" id="sample_2">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Setoran</th>
            <th>Tanggal Setoran</th>
            <th>Jumlah</th>
            <th>ID Pemilik</th>
            <th>ID Karyawan</th>
            <th><i class="icon_cogs"></i> Action</th>
          </tr>
        </thead>
                <tbody>
                  <?php $no=0; foreach ($setoran as $data): ?>
            <tr>
              <td><?php echo ++$no; ?></td>
              <td><?php echo $data['NoSetoran']; ?></td>
              <td><?php echo $data['TglSetoran']; ?></td>
              <td><?php echo $data['Jumlah']; ?></td>
              <td><?php echo $data['IDPemilik']; ?></td>
              <td><?php echo $data['IDKaryawan']; ?></td>
              <td><div class="btn-group">
                <a class="btn btn-success" href="<?php echo base_url().'setoran/change_setoran/'.$data['id']; ?>"><i class="icon_pencil-edit"></i></a>
                <a class="btn btn-danger" href="<?php echo base_url().'setoran/delete_setoran/'.$data['id']; ?>"><i class="icon_close_alt2"></i></a>
              </div></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        </table>
                        </div>
                    </div>
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
