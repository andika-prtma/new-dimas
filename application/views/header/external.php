<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $title ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/template/adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/template/adminlte') ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= base_url('assets/template/adminlte') ?>/index3.html" class="navbar-brand">
        <img src="https://multifab.co.id/asset/images/logohd.png" alt="AdminLTE Logo" class="brand-image elevation-1" style="">
        <span class="brand-text font-weight-light"> - Dimas</span>
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
            <a href="<?= base_url('external/logout') ?>" class="btn btn-primary">Leave</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->