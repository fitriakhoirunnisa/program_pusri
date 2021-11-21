<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Halaman User</title>
  <!-- Bootstrap core CSS-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <?php require "paviqon.html" ?>
  <style>
    .loader{
      width: 80px;
      display: none;
    }
  </style>
</head>

<body class="fixed-nav sticky-footer" id="page-top">

  <!-- ==============================Navigation================================== -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    
    <a class="navbar-brand"><img src="img/logopusri2.png" width="250" height="50" class="d-inline-block align-top"></a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text"><font color="white">Menu</font></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="content.php?pg=rjp"><font color="white">RJP</font></a>
            </li>
            <li>
              <a href="content.php?pg=rkap"><font color="white">RKAP</font></a>
            </li>
            <li>
              <a href="content.php?pg=kpi"><font color="white">KPI</font></a>
            </li>
            <li>
              <a href="content.php?pg=daks"><font color="white">DATA EKSTERNAL</font></a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="ubah_psswd.php?pg=psswd">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text"><font color="white">Ubah Password</font></span>
          </a>
        </li>

      </ul>

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i><font color="white">Logout</font></a>
        </li>
      </ul>

    </div>
  </nav>

  <!-- ============================== end Navigation================================== -->

  <br>
   <div class="content-wrapper">
    <div class="container-fluid">
<!-- =====================menu================================ -->
<?php if (isset($_GET["pg"])):?>
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">

        <li class="breadcrumb-item">
          <a href="content.php">Home</a>
        </li>
<?php $pg = $_GET["pg"];
    if ($pg !='psswd'): ?>
        <!-- <li class="breadcrumb-item active">Welcome</li> -->
        <li class="breadcrumb-item active">
<a href="
    <?php if ($pg == 'rjp'):?>
      content.php?pg=<?=$pg; ?>">RJP</a> &raquo
    <?php elseif ($pg == 'rkap') :?>
      content.php?pg=<?=$pg; ?>">RKAP</a> &raquo
    <?php elseif ($pg == 'kpi'):?>
      content.php?pg=<?=$pg; ?>">KPI</a> &raquo
    <?php elseif ($pg == 'daks'):?>
      content.php?pg=<?=$pg; ?>">Data Eksternal</a> &raquo
    <?php endif; ?> 
  <?php else: ?>
    &raquo<a href="#">Ubah Password</a> &raquo
  <?php endif; ?>
  </li>

      </ol>
<?php endif; ?>
<!-- ==============================end menu============================= -->

    
<?php if (isset($_GET["id2"])): ?>
   <!-- Breadcrumbs-->
      <ol class="breadcrumb">

        <li class="breadcrumb-item">
          <a href="content.php">Home</a>
        </li>
  
  <?php $id2=$_GET["id2"];
        if( $id2=='kurs' || $id2=='inflasi' || $id2=='bunga' || $id2=='gas' || $id2=='urea' || $id2=='amon' ){
          $pg ='daks';
        }else{
          $id22 = explode('_', $id2);
          $pg = $id22[0];
          $id2 = end($id22);
        }
        ?>
        <li class="breadcrumb-item">
    <a href="
    <?php if ($pg == 'rjp'):?>
      content.php?pg=<?=$pg; ?>">RJP</a>
    <?php elseif ($pg == 'rkap') :?>
      content.php?pg=<?=$pg; ?>">RKAP</a>
    <?php elseif ($pg == 'kpi'):?>
      content.php?pg=<?=$pg; ?>">KPI</a>
    <?php elseif ($pg == 'daks'):?>
      content.php?pg=<?=$pg; ?>">Data Eksternal</a>
    <?php endif; ?>
  </li>
  <li class="breadcrumb-item active">
    <a href="
    <?php if ($id2=='proceed'):?>
        ">Proceeding</a> &raquo
    <?php elseif ($id2=='buku') :?>
        ">Buku</a> &raquo
    <?php elseif ($id2=='eval'):?>
        ">Evaluasi</a> &raquo
    <?php elseif($id2=='kurs'): ?>
        ">Kurs Rupiah</a> &raquo
    <?php elseif($id2=='inflasi'): ?>
        ">Inflasi</a> &raquo
    <?php elseif($id2=='bunga'): ?>
        ">Suku Bunga</a> &raquo
    <?php elseif($id2=='gas'): ?>
        ">Harga Gas</a> &raquo
    <?php elseif($id2=='urea'): ?>
        ">Harga Urea</a> &raquo
    <?php elseif($id2=='amon'): ?>
        ">Harga Amonia</a> &raquo
    <?php endif; ?>
    </li>
</ol>
<?php endif; ?>
      <hr>