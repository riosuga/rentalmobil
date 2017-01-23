<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png')?>">

    <title>Login</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url('assets/css/bootstrap-theme.css')?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url('assets/css/elegant-icons-style.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css')?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('assets/js/html5shiv.js')?>"></script>
    <script src="<?php echo base_url('assets/js/respond.min.js')?>"></script>
    <![endif]-->
</head>

  <body class="login-img2-body">

    <div class="container">

      <?php echo form_open(base_url('sys_e/login_process'), 'class="login-form"'); ?>
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <p><?php
				if($this->session->flashdata('error_message') != NULL){
					echo $this->session->flashdata('error_message');
				}
			?></p>
            <div class="input-group">
				<span class="input-group-addon"><i class="icon_profile"></i></span>
				<input name="username" type="text" autofocus class="form-control" id="username" placeholder="Username">
            </div>
				<span class="help-block"><?php echo form_error('username'); ?></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>
				<span class="help-block"><?php echo form_error('password'); ?></span>
            <?php echo form_submit(array('id' => 'submit', 'class' => 'btn btn-primary btn-lg btn-block', 'value' => 'Login')); ?>
        </div>
      <?php echo form_close(); ?>
    </div>
  </body>
</html>
