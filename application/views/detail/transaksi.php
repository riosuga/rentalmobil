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
                  <li class="active">
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
                        	<div class="btn-group">
                  <a class="btn btn-success" href="<?php echo base_url().'transaksisewa/change_transaksi/'.$data['id']; ?>"><i class="icon_pencil-edit"></i>&nbsp;Update Data Transaksi</a>
                  <a class="btn btn-danger" href="<?php echo base_url().'transaksisewa/delete_transaksi/'.$data['id']; ?>"><i class="icon_close_alt2"></i>&nbsp;Hapus Data Transaksi</a>
                                </div>
                        </header>
                    <div style="padding: 10px; padding-top: 15px; padding-bottom: 15px;">
                        <table cellpadding="5">
                        	<tr>
                            	<td>Nomor Transaksi</td>
                                <td><?php echo $data['NoTransaksi']; ?></td>
                            </tr>
                          <tr>
                              <td>Nama Peminjam</td>
                                <td><?php echo $data['NamaPel']; ?></td>
                            </tr>
                          <tr>
                              <td>No Plat Kendaraan</td>
                                <td><?php echo $data['NoPlat']; ?></td>
                            </tr>
                          <tr>
                              <td>Sopir</td>
                                <td><?php echo $data['NmSopir']; ?></td>
                            </tr>
                          <tr>
                              <td colspan="2"><hr /></td>
                            </tr>
                          <tr>
                              <td>Tanggal Pemesanan</td>
                                <td><?php echo $data['TglPesan']; ?></td>
                            </tr>
                          <tr>
                              <td>Tanggal Peminjaman</td>
                                <td><?php echo $data['TglPinjam']; ?></td>
                            </tr>
                          <tr>
                              <td>Jam Peminjaman</td>
                                <td><?php echo $data['JamPinjam']; ?></td>
                            </tr>
                          <tr>
                              <td colspan="2"><hr /></td>
                            </tr>
                          <tr>
                              <td>Rencana Tanggal Pengembalian</td>
                                <td><?php echo $data['TglKembaliRencana']; ?></td>
                            </tr>
                          <tr>
                              <td>Rencana Jam Pengembalian</td>
                                <td><?php echo $data['JamKembaliRencana']; ?></td>
                            </tr>
                          <tr>
                              <td colspan="2"><hr /></td>
                            </tr>
                          <tr>
                              <td>Tanggal Pengembalian Kendaraan</td>
                                <td><?php echo $data['TglKembaliRealisasi']; ?></td>
                            </tr>
                          <tr>
                              <td>Jam Pengembalian Kendaraan</td>
                                <td><?php echo $data['JamKembaliReal']; ?></td>
                            </tr>
                          <tr>
                              <td colspan="2"><hr /></td>
                            </tr>
                          <tr>
                              <td>KM Kendaraan saat Peminjaman</td>
                                <td><?php echo $data['KilometerPinjam']; ?></td>
                            </tr>
                          <tr>
                              <td>KM Kendaraan saat Pengembalian</td>
                                <td><?php echo $data['KilometerKembali']; ?></td>
                            </tr>
                          <tr>
                              <td>BBM saat Peminjaman</td>
                                <td><?php echo $data['BBMPinjam']; ?></td>
                            </tr>
                          <tr>
                              <td>BBM saat Pengembalian</td>
                                <td><?php echo $data['BBMKembali']; ?></td>
                            </tr>
                          <tr>
                              <td colspan="2"><hr /></td>
                            </tr>
                          <tr>
                              <td>Kondisi Mobil saat Peminjaman</td>
                                <td><?php echo $data['KondisiMobilPinjam']; ?></td>
                            </tr>
                          <tr>
                              <td>Kondisi Mobil saat Pengembalian</td>
                                <td><?php echo $data['KondisiMobilKembali']; ?></td>
                            </tr>
                          <tr>
                              <td>Kerusakan</td>
                                <td><?php echo $data['Kerusakan']; ?></td>
                            </tr>
                          <tr>
                              <td colspan="2"><hr /></td>
                            </tr>
                          <tr>
                              <td>Denda</td>
                                <td><?php echo $data['Denda']; ?></td>
                            </tr>
                          <tr>
                              <td>Biaya Kerusakan</td>
                                <td><?php echo $data['BiayaKerusakan']; ?></td>
                            </tr>
                          <tr>
                              <td>Biaya BBM</td>
                                <td><?php echo $data['BiayaBBM']; ?></td>
                            </tr>
                          <tr>
                              <td>Total Harga</td>
                                <td><?php echo $data['total']; ?></td>
                            </tr>
                        </table>
                    	<?php endforeach; ?>
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
