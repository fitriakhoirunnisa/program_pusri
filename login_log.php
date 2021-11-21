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

require 'functions.php';
// Pagination
	$jumlahDataPerHalaman = 9;
	$jumlahData = count(query("SELECT * FROM login_log ORDER BY id_login"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
	
// ambil data login log
$data2 = query("SELECT * FROM login_log ORDER BY id_login DESC LIMIT $awalData, $jumlahDataPerHalaman");


require 'navbar_admin.php'; 
?>
<div class="d-flex justify-content-center">
 	<div class="col-md-10 m-auto">
 		 <div class="card">
 		 	<div class="card-header">
					<h2 align="center">Login Log</h2>
 		 	</div> 
  			 <div class="card-body">

	<form action="" method="post" align="right">	
		<a href="login_log.php"><b>Tampilan Awal</b></a><br><br>	
		<label for="keyword">Cari: </label>	
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian.." autocomplete="off" id="keyword">
	<img src="img/loader.gif" class="loader">
	</form>
<br><br><!-- =================Login Log=================== -->
	<div id="container">

<table align="center" class="table table-hover">

	<tr>
		<th>No</th>
		<th>Badge</th>
		<th>Tanggal Login</th>
		<th>Waktu Login</th>
	</tr>
	<?php $i=$awalData+1; ?>
	<?php foreach ($data2 as $row) : ?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $row["badge"]; ?></td>
		<td><?= $row["tgl_login"]; ?></td>
		<td><?= $row["waktu_login"]; ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
	</table>	<?php require'navpag.php'; ?>
	</div>

	<script src="js/login_log.js"></script>
</div></div></div></div>
<?php require 'footer.php'; ?>