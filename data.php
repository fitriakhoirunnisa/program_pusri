<?php 
session_start();
// cek session
if (!isset($_SESSION["login"])){

	header("Location: login.php");
	exit;
}
// cek user
if ($_COOKIE["akses"] !== 'Admin') {
 	header("Location: content.php");
	exit;
 } 

require 'functions.php';
//jika tombol hapus diklik
	if (isset($_GET["badge"])) {
		$badge = $_GET["badge"];
		if ( non($badge) > 0 ) {//menonaktifkan user
			echo "
			<script>
				alert('User Berhasil dihapus');
				document.location.href = 'data.php';
			</script>
			";
		}	
		// jika tombol reset diklik
	}elseif (isset($_GET["badge2"])) {
		$badge = $_GET["badge2"];
		if (resetPasssword($badge) > 0 ) {//mereset password
			echo "
			<script>
				alert('Password berhasil di-reset');
				document.location.href = 'data.php';
			</script>
			";
		}
	}
// Pagination
	$jumlahDataPerHalaman = 10;
	$jumlahData = count(query("SELECT * FROM user WHERE status= 'Aktif' AND jabatan != 'Admin'"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
	
// ambil data karyawan aktif
$daftarkaryawan = query("SELECT * FROM user WHERE status= 'Aktif' AND jabatan != 'Admin' LIMIT $awalData, $jumlahDataPerHalaman");
// jika tombol cari diklik
// if(isset($_POST["cari"]))
// {
// 	$daftarkaryawan=cari($_POST["keyword"]);
// }

require 'navbar_admin.php';
?>

<div class="d-flex justify-content-center">
 	<div class="col-md-10 m-auto">
 		 <div class="card">
 		 	<div class="card-header">
				<h2 align="center">Daftar Pegawai PT. Pupuk Sriwidjaja Palembang</h2>
 		 	</div> 
  			 <div class="card-body">

	<form action="" method="post" align="right">
		<a href="data.php"><b>Tampilan Awal</b></a><br><br>
		<label for="keyword">Cari: </label>	
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian.." autocomplete="off" id="keyword">
	
	<img src="img/loader.gif" class="loader">
	</form>
<br><br>


<div id="container">

<table align="center" class="table table-hover">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Badge</th>
		<th>Jabatan</th>
		<th>Status</th>
		<th>Aksi</th>
	</tr>

<?php $i=$awalData + 1 ; ?>
<?php foreach ( $daftarkaryawan as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["nama"] ?></td>
		<td><?= $row["badge"] ?></td>
		<td><?= $row["jabatan"] ?></td>
		<td><?= $row["status"] ?></td>
		<td>
			<a href="ubah.php?badge=<?= $row["badge"]?>" class="btn btn-primary">Ubah</a> |
			<a href="data.php?badge=<?= $row["badge"]?>" class="btn btn-danger" onclick="return confirm('Hapus?')">Hapus</a>|
			<a href="data.php?badge2=<?= $row["badge"]?>" class="btn btn-warning" onclick="return confirm('Reset Password?')">Reset Password</a>
		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>
	<?php require'navpag.php'; ?>
</div>
<br>
			</div>
		</div>
	</div>
</div>

<script src="js/script.js"></script>

 <?php require 'footer.php'; ?>