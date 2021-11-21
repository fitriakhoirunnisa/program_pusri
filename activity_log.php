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
	$jumlahDataPerHalaman = 8;
	$jumlahData = count(query("SELECT * FROM download_log ORDER BY id_dwnld"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
	
// ambil data karyawan aktif
$data = query("SELECT * FROM download_log ORDER BY id_dwnld DESC LIMIT $awalData, $jumlahDataPerHalaman");
require 'navbar_admin.php'; 
?>
<div class="d-flex justify-content-center">
 	<div class="col-md-10 m-auto">
 		 <div class="card">
 		 	<div class="card-header">
					<h2 align="center">Download Log</h2>
 		 	</div> 
  			 <div class="card-body">

	<form action="" method="post" align="right">	
		<a href="activity_log.php"><b>Tampilan Awal</b></a><br><br>
		<label for="keyword">Cari: </label>
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian.." autocomplete="off" id="keyword">

	<img src="img/loader.gif" class="loader">
	</form>
<br><br>

<!-- ======================download log================================ -->
	<div id="container">

<table align="center" class="table table-hover">

	<tr>
		<th>No</th>
		<th>Badge</th>
		<th>Nama File</th>
		<th>Folder</th>
		<th>Jenis File</th>
		<th>Tanggal Download</th>
		<th>Waktu Download</th>
	</tr>
	<?php $i=$awalData+1; ?>
	<?php foreach ($data as $row) : ?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $row["badge"]; ?></td>
		<td><?= $row["nama_file"]; ?></td>
		<td><?= $row["folder"]; ?></td>
		<td><?= $row["jenis_file"]; ?></td>
		<td><?= $row["tgl_download"]; ?></td>
		<td><?= $row["waktu_download"]; ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
	</table>	<?php require'navpag.php'; ?>
</div>
</div></div></div></div>
	<br><br><br>
	<script src="js/download_log.js"></script>
<?php require 'footer.php'; ?>