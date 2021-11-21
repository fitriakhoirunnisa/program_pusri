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
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	// menjalankan fungsi hapus file dan mengecek keberhasilan penghapusan
	if ( hapus($id) > 0 ){
		echo "
				<script>
					alert('data berhasil dihapus');
					 document.location.href = 'hapus.php';
				</script>
			";

	} else{
		echo "
				<script>
					alert('data gagal dihapus');
					document.location.href = 'hapus.php';
				</script>
			";
	}	
}
// ambil data
if (!isset($_POST["cari"])) {
	$rjp = query("SELECT * FROM rjp ORDER BY id DESC");
	$rkap = query("SELECT * FROM rkap ORDER BY id DESC");
	$kpi = query("SELECT * FROM kpi ORDER BY id DESC");
	$daks = query("SELECT * FROM data_eksternal ORDER BY id DESC");
	// var_dump($rjp);
	// var_dump($rkap);
	// var_dump($kpi);
	// var_dump($daks); 
	// die;
}elseif (isset($_POST["cari"])) {
	// var_dump($_POST); die;
	$keyword = $_POST["keyword"];
	$rjp=query4('rjp', $keyword);
	$rkap=query4('rkap', $keyword);
	$kpi=query4('kpi', $keyword);
	$daks=query4('data_eksternal', $keyword);
}
	
require 'navbar_admin.php';
 ?>
<br><br><br>
<div class="d-flex justify-content-center">
 	<div class="col-md-10 m-auto">
 		 <div class="card">
 		 	<div class="card-header">
				<h2 align="center">File</h2><br>
 		 	</div> 
  			<div class="card-body">

  	<form action="" method="post" align="right">	
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian.." autocomplete="off" id="keyword" required="required">
		<button type="submit" name="cari">Cari</button>
	<img src="img/loader.gif" class="loader">
	</form>

<table align="center" class="table table-hover">

	<tr>
		<th>No.</th>
		<th>Nama File</th>
		<th>Folder</th>
		<th>Jenis File</th>
		<th>Judul File</th>
		<th>Deskripsi File</th>
		<th>Tanggal Upload</th>
		<th>Aksi</th>
	</tr>
	<?php $i=1; ?>
<?php for ($j=1; $j < 5; $j++):

		if ($j==1) {
			$data = $rjp;
			$tabel='rjp';
		}if ($j==2) {
			$data = $rkap;
			$tabel='rkap';
		}if ($j==3) {
			$data = $kpi;
			$tabel='kpi';
		}if ($j==4) {
			$data = $daks;
			$tabel='daks';
		}
		foreach ($data as $row) : ?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $row["nama_file"]; ?></td>
		<td><?= strtoupper($tabel); ?></td>
		<td><?= $row["keterangan"]; ?></td>
		<td><?= $row["judul"];?></td>
		<td><?= $row["deskripsi"];?></td>
		<td><?= $row["tgl_upload"]; ?></td>
		<td><a href="hapus.php?id=<?=$row["id"];?>_<?=$tabel;?>" class="btn btn-warning" onclick=" return confirm('Hapus File?');">Hapus</a></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
<?php endfor; ?>
	</table>
		</div>
	</div>
</div>
</div>
<?php require 'footer.php'; ?>