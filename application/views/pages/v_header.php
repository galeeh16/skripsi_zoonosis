<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/linearicons/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/chartist/css/chartist-custom.css') ?>">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/img/favicon.png') ?>">

  <!-- MYCSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/mycss.css'); ?>">

  <!-- Javascript -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/chartist/js/chartist.min.js'); ?>"></script>
  <script src="<?= base_url('assets/scripts/klorofil-common.js'); ?>"></script>

 
  <style>
   *{
      font-family: 'Lato';
    }

    #navbar-menu .nav.navbar-nav li {
      padding-right: 0px !important;
      margin-right: 0px !important;
    }
    #navbar-menu .nav .navbar-link {
      text-transform: uppercase;
    }
    #navbar-menu .nav .navbar-link a.active {
      text-transform: uppercase;
      border-bottom: 2px solid #4C9ED7;
      background-color: #fff !important ;
      padding-bottom: 15px;
      margin-bottom: 10px;
    }

    div.navbar-btn a.btn-sign-in {
      color: #1AADA8 !important;
      background-color: #ffffff;
      padding: 5px 30px;
      border: 2px solid #1AADA8 !important;
      border-radius: 50px;
      display: inline-block;
      margin: 0px;
        -webkit-transition: background-color 0.4s ease-in;
        -moz-transition: background-color 0.4s ease-in;
        -o-transition: background-color 0.4s ease-in;
      transition: background-color 0.4s ease-in;
    }

    div.navbar-btn a.btn-sign-in:hover {
      color: #fff !important;
      background-color: #1AADA8;
    }

  </style>
</head>

<body> 