<?php 
session_start();
// cek session
if ( !isset($_SESSION["login"]) ) {

	header("Location: login.php");
	exit;
}
// cek user
if ($_COOKIE["akses"] !== 'Admin') {
 	header("Location: content.php");
	exit;
 } 

require 'navbar_admin.php';
?>

<br><br>
<div class="d-flex justify-content">
	 	<div class="col-md-6 m-auto">
	 		<div class="card">
	  			<div class="card-body">
	  			 <form action="" method="post">
	  			 	<h2 align="center">Sistem Informasi <br> Departemen Perencanaan Perusahaan & Sisman</h2>
	  			 </form>
	  			</div>
	  		</div>
	  	</div>
	</div>
<!-- <br><br><br><br><br><br> -->
  <?php require 'footer.php'; ?>