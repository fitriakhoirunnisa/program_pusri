<?php 
session_start();
// cek session
if ( !isset($_SESSION["login"]) ) {

	header("Location: login.php");
	exit;
}
//cek user
if ($_COOKIE["akses"] !== 'Admin') {
 	header("Location: content.php");
	exit;
} 

require 'functions.php';

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	// menjalankan fungsi hapus file dan mengecek keberhasilan penghapusan
	if ( hapus($id) > 0 ){
		echo "
				<script>
					alert('berita berhasil di-hapus');
					 document.location.href = 'delete_news.php';
				</script>
			";

	} else{
		echo "
				<script>
					alert('data gagal di-hapus');
					document.location.href = 'delete_news.php';
				</script>
			";
	}	
}
 

// Pagination
	$jumlahDataPerHalaman = 5;
	$jumlahData = count(query("SELECT * FROM berita"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
 	$berita=query("SELECT * FROM berita ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");	

require 'navbar_admin.php';?>

<div class="d-flex justify-content-center">
 	<div class="col-md-10 m-auto">
 		 <div class="card">
 		 	<div class="card-header">
				<h2 align="center">Daftar Berita</h2>
 		 	</div> 
  			 <div class="card-body">

	<form action="" method="post" align="right">	
		<a href="delete_news.php"><b>Tampilan Awal</b></a><br><br>	
		<label for="keyword"><b>Cari: </b></label>
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian.." autocomplete="off" id="keyword">
	<img src="img/loader.gif" class="loader">
	</form>
<br><br>


<div id="container">

<table align="center" class="table table-hover">
	<tr>
		<th>No.</th>
		<th>Tanggal Update</th>
		<th>Text</th>
		<th>Aksi</th>
	</tr>

<?php $i=1; ?>
<?php foreach ( $berita as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["tgl_update"] ?></td>
		<td><?= $row["text"] ?></td>
		<td><a href="delete_news.php?id=<?=$row["id"];?>_berita" class="btn btn-warning" onclick=" return confirm('Hapus File?');">Hapus</a></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table><?php require'navpag.php'; ?>
</div></div></div></div></div>

<script src="js/berita.js"></script>
<?php require 'footer.php'; ?>