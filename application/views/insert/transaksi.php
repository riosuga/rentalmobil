<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">

    <title>Data Pelanggan</title>

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
                          <header class="panel-heading">
                             Insert New Transaksi Sewa
                          </header>
                          <div class="panel-body">
                          	  <?php echo form_open(base_url('transaksisewa/create_transaksi'), 'class="form-horizontal "'); ?>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">No Transaksi</label>
                                      <div class="col-sm-10">
                                          <input name="no" type="text" autofocus required class="form-control" id="no" maxlength="20">
                                          <span class="help-block"><?php echo form_error('no'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Pelanggan</label>
                                      <div class="col-sm-10">
                                        <select name="pelanggan" required id="pelanggan" class="form-control m-bot15">
                                          <?php foreach ($pel as $lists) {
                                            echo '<option value="'.$lists['id'].'">'.$lists['NoKTP'].' -> '.$lists['NamaPel'].'</option>';
                                          } ?>
                                        </select>
                                          <span class="help-block"><?php echo form_error('pelanggan'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Type Kendaraan</label>
                                      <div class="col-sm-10">
                                        <select name="tipe" required class="form-control m-bot15" id="tipe">
                                          <?php foreach ($kend as $lists) {
                                            echo '<option value="'.$lists['id'].'">'.$lists['NmType'].' -> '.$lists['NmMerk'].' ('.$lists['NoPlat'].')</option>';
                                          } ?>
                                        </select>
                                          <span class="help-block"><?php echo form_error('tipe'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Sopir</label>
                                      <div class="col-sm-10">
                                        <select name="sopir" id="sopir" class="form-control m-bot15">
                                          <?php foreach ($sopir as $lists) {
                                            echo '<option value="'.$lists['id'].'">'.$lists['IDSopir'].' -> '.$lists['NmSopir'].'</option>';
                                          } ?>
                                        </select>
                                          <span class="help-block"><?php echo form_error('sopir'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Tanggal Pinjam</label>
                                      <div class="col-sm-10">
                                          <input name="tgl_pjm" type="date" required class="form-control" id="tgl_pjm">
                                          <span class="help-block"><?php echo form_error('tgl_pjm'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Jam Pinjam</label>
                                      <div class="col-sm-10">
                                          <input name="jam_pjm" type="time" required class="form-control" id="jam_pjm">
                                          <span class="help-block"><?php echo form_error('jam_pjm'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Rencana Tanggal Kembali</label>
                                      <div class="col-sm-10">
                                          <input name="tgl_kemb" type="date" required class="form-control" id="tgl_kemb">
                                          <span class="help-block"><?php echo form_error('tgl_kemb'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Rencana Jam Kembali</label>
                                      <div class="col-sm-10">
                                          <input name="jam_kemb" type="time" required class="form-control" id="jam_kemb">
                                          <span class="help-block"><?php echo form_error('jam_kemb'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Kilometer Pinjam</label>
                                      <div class="col-sm-10">
                                          <input name="km_pjm" type="text" class="form-control" id="km_pjm" maxlength="10">
                                          <span class="help-block"><?php echo form_error('km_pjm'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">BBM Pinjam</label>
                                      <div class="col-sm-10">
                                          <input name="bbm_pjm" type="text" class="form-control" id="bbm_pjm" maxlength="10">
                                          <span class="help-block"><?php echo form_error('bbm_pjm'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Kondisi Mobil</label>
                                      <div class="col-sm-10">
                                      	  <textarea name="kondisi" required id="kondisi" class="form-control" style="resize: none;"></textarea>
                                          <span class="help-block"><?php echo form_error('kondisi'); ?></span>
                                    </div>
                                  </div>
                                  <?php echo form_submit(array('id' => 'submit', 'class' => 'btn btn-primary btn-lg btn-block', 'value' => 'Simpan')); ?>
                              <?php echo form_close(); ?>
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
