<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Halaman Admin</title>
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
   <!-- script cari dan pagination -->
  <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body class="fixed-nav sticky-footer" id="page-top">

<!-- ======================================Navigation=============================================-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand"><img src="img/logopusri2.png" width="250" height="50" class="d-inline-block align-top"></a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      
      <!-- ===========================================ul menu========================= -->
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="File"> 
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text"><font color="white">File</font></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="upload.php?pg=up"><font color="white">Upload File</font></a>
            </li>
            <li>
              <a href="hapus.php?pg=hapus"><font color="white">Delete File</font></a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text"><font color="white">User</font></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="tambah_user.php"><font color="white">Tambah Data User</font></a>
            </li>
            <li>
              <a href="data.php"><font color="white">View Data User</font></a>
            </li>
          </ul>
        </li>  

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="News">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text"><font color="white">News</font></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="uptodate.php"><font color="white">Update News</font></a>
            </li>
            <li>
              <a href="delete_news.php"><font color="white">View News</font></a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#activity" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text"><font color="white">Activity Log</font></span>
          </a>
          <ul class="sidenav-second-level collapse" id="activity">
            <li>
              <a href="activity_log.php"><font color="white">Download Log</font></a>
            </li>
            <li>
              <a href="login_log.php"><font color="white">Login Log</font></a>
            </li>
          </ul>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profil">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#profil" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text"><font color="white">Profil</font></span>
          </a>
          <ul class="sidenav-second-level collapse" id="profil">
            <li>
              <a href="ubah_psswd.php"><font color="white">Setting Password</font></a>
            </li>
          </ul>
        </li>

      </ul>
      <!-- ===========================================end ul menu========================= -->
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
<!-- ========================end navbar========================================= -->
<br><br>
   <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="Admin.php">Home</a>
        </li>
        <!-- <li class="breadcrumb-item active">Welcome</li> -->
      </ol>
      <hr>