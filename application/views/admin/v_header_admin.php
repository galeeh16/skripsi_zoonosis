<!doctype html>
<html lang="en">

<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/linearicons/style.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/chartist/css/chartist-custom.css')?>">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?= base_url('assets/css/demo.css')?>">
	<!-- GOOGLE FONTS -->
	<link href="<?php echo base_url('assets/vendor/font/lato.ttf') ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png')?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/img/favicon.png')?>">
	<!-- MYCSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/mycss.css'); ?>"> 

	<style>
		table thead tr th {
			text-align: center;
			vertical-align: middle !important;
		}
		@font-face {
			font-family: 'poppins';
			src: url(<?= base_url('assets/vendor/font/Poppins-Regular.ttf'); ?>);
		}
		* {
			font-family: 'Roboto', 'Source Sans Pro', sans-serif, 'Lato', 'Helvetica';
		}
		input[type="search"].form-control {
			margin: 5px;
			padding: 15px;
			width: 247px;
		}
	</style>
</head>

<body >
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top" id="nav">
			<div class="brand">
				<a href="<?= base_url('admin/user'); ?>"><img src="<?= base_url('assets/img/zoonosis.jpg') ?>" alt="Klorofil Logo" class="img-responsive logo" width="120"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				
				<!-- NAVBAR MENU -->
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('basic-use')?>">Basic Use</a></li>
								<li><a href="<?= base_url('working')?>">Working With Data</a></li>
								<li><a href="<?= base_url('security')?>">Security</a></li>
								<li><a href="<?= base_url('troubleshooting')?>">Troubleshooting</a></li>
							</ul>
						</li>
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/img/user/'.$user->photo); ?>" class="img-circle" alt="Avatar"> <span><?= $user->name; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?= base_url('admin/user/profile') ?>"><i class="lnr lnr-user"></i> <span>My Profile</span></a>
								</li>
								<li>
									<a href="<?= base_url('home/logout') ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a>
								</li>
							</ul>
						</li> -->
					</ul>
				</div>
				<!-- END NAVBAR MENU -->
			</div>
		</nav>
		<!-- END NAVBAR -->

		