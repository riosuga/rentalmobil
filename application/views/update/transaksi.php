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


<script type="text/javascript">
/*$(function () {

	$("#data_form").submit( function() {    
		$.ajax( {  
			type :"post",  
			url : "<?php echo base_url() . '/transaksisewa/change_transaksi' ?>",
			cache :false,  
			data :$(this).serialize(),
			success : function(data) {  
				$(".sukses").html(data);   
				setTimeout(function(){$('.sukses').html('');window.location = "<?php echo base_url() . '/transaksisewa' ?>";},1500);
			},  
			error : function() {  
				alert("Data gagal dimasukkan.");  
			}  
		});
		return false;                          
	});   

});

function hitung_denda(){
	var a = $("#tgl_r").val().substr(8);
	var b = $("#tgl_k").val().substr(8);
	var c = $("#jam_r").val().substr(0,2);
	var d = $("#jam_k").val().substr(0,2);
	hasil_denda = ((((b-a)*24) + (d-c)) * 10000);
	$("#denda").val(hasil_denda);
}

function hitung_bbm(){
	var e = $("#bbm_p").val();
	var f = $("#bbm_k").val();
	if (f>=e) {
		hasil_bbm = 0;
	} else {
		hasil_bbm = ((e-f) * 7100);
	}
	$("#bbm_b").val(hasil_bbm);
}

function hitung_total(){
	var biaya_kerusakan = parseInt($("#biaya_kerusakan").val());
	var biaya_bbm 		= parseInt($("#biaya_bbm").val());
	var denda			= parseInt($("#denda").val());

	hasil_akhir = biaya_kerusakan+biaya_bbm;
	hasil_akhir2 = hasil_akhir+denda+250000;
	$("#total_biaya").val(hasil_akhir2);
	}*/
</script>

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
														 Update Transaksi Sewa Kendaraan
													</header>
													<div class="panel-body">
															<?php foreach ($change as $data):
															echo form_open(base_url('transaksisewa/update_transaksi'), 'class="form-horizontal" id="data_form" name="data_form"'); 
															var_dump($data['TarifperJam']);
															var_dump($data['trf']);
															?>
																	<input name="id" type="hidden" id="id" value="<?php echo $data['id']; ?>">
																	<input name="tgl_p" type="hidden" id="tgl_r" value="<?php echo $data['TglPinjam']; ?>">
																	<input name="jam_p" type="hidden" id="jam_r" value="<?php echo $data['JamPinjam']; ?>">
																	<input name="tgl_r" type="hidden" id="tgl_r" value="<?php echo $data['TglKembaliRencana']; ?>">
																	<input name="jam_r" type="hidden" id="jam_r" value="<?php echo $data['JamKembaliRencana']; ?>">
																	<input name="bbm_p" type="hidden" id="bbm_p" value="<?php echo $data['BBMPinjam']; ?>">
																	<input name="h_sop" type="hidden" id="bbm_p" value="<?php echo $data['TarifperJam']; ?>">
																	<input name="h_ken" type="hidden" id="bbm_p" value="<?php echo $data['trf']; ?>">
																	<div class="form-group">
																			<label class="col-sm-2 control-label">No Transaksi</label>
																			<div class="col-sm-10">
																					<input name="no" type="text" class="form-control" id="no" disabled value="<?php echo $data['NoTransaksi']; ?>">
																					<span class="help-block"><?php echo form_error('no'); ?></span>
																			</div>
																	</div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Tanggal Pengembalian</label>
                                      <div class="col-sm-10">
                                          <input name="tgl_k" type="date" required class="form-control" id="tgl_k" value="<?php echo $data['TglKembaliRealisasi']; ?>">
                                          <span class="help-block"><?php echo form_error('tgl_k'); ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Jam Pengembalian</label>
                                      <div class="col-sm-10">
                                          <input name="jam_k" type="time" required class="form-control" id="jam_k" value="<?php echo $data['JamKembaliReal']; ?>">
                                          <span class="help-block"><?php echo form_error('jam_k'); ?></span>
                                      </div>
                                  </div>
																	<div class="form-group">
																			<label class="col-sm-2 control-label">KM Pengembalian</label>
																			<div class="col-sm-10">
																					<input name="km_k" type="text" required="required" class="form-control" id="km_k" maxlength="10" value="<?php echo $data['KilometerKembali']; ?>">
																					<span class="help-block"><?php echo form_error('km_k'); ?></span>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-2 control-label">BBM Pengembalian</label>
																			<div class="col-sm-10">
																					<input name="bbm_k" type="text" required="required" class="form-control" id="bbm_k" maxlength="10" value="<?php echo $data['BBMKembali']; ?>">
																					<span class="help-block"><?php echo form_error('bbm_k'); ?></span>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-2 control-label">Kondisi Mobil Pengembalian</label>
																			<div class="col-sm-10">
                                      	  <textarea name="kondisi_k" required id="kondisi_k" class="form-control" style="resize: none;"><?php echo $data['KondisiMobilKembali']; ?></textarea>
																					<span class="help-block"><?php echo form_error('kondisi_k'); ?></span>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-2 control-label">Kerusakan</label>
																			<div class="col-sm-10">
                                      	  <textarea name="kerusakan" required id="kerusakan" class="form-control" style="resize: none;"><?php echo $data['Kerusakan']; ?></textarea>
																					<span class="help-block"><?php echo form_error('kerusakan'); ?></span>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-2 control-label">Biaya Kerusakan</label>
																			<div class="col-sm-10">
																					<input name="kerusakan_b" type="text" required="required" class="form-control" id="kerusakan_b" maxlength="11" value="<?php echo $data['BiayaKerusakan']; ?>">
																					<span class="help-block"><?php echo form_error('kerusakan_b'); ?></span>
																			</div>
																	</div><!-- 
																	<div class="form-group">
																			<label class="col-sm-2 control-label">Biaya BBM</label>
																			<div class="col-sm-10">
																					<input name="bbm_b" type="text" required="required" class="form-control" id="bbm_b" disabled value="<?php echo $data['BiayaBBM']; ?>">
																					<span class="help-block"><?php echo form_error('bbm_b'); ?></span>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-2 control-label">Denda</label>
																			<div class="col-sm-10">
																					<input name="denda" type="text" required="required" class="form-control" id="denda" disabled value="<?php echo $data['Denda']; ?>">
																					<span class="help-block"><?php echo form_error('denda'); ?></span>
																			</div>
																	</div> -->
																	<?php echo form_submit(array('id' => 'submit', 'class' => 'btn btn-primary btn-lg btn-block', 'value' => 'Simpan')); ?>
															<?php echo form_close(); 
															endforeach; ?>
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
