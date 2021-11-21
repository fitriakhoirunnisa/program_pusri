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

//ambil data yang dikirim di URL
$badge = $_GET["badge"];

//ambil data karyawan berdasarkan badge
$kry = query("SELECT * FROM user WHERE badge = '$badge'")[0];

//cek apakah tombol ubah ditekan
if ( isset( $_POST["ubah"]) ) {
	
	//jalankan fungsi ubah dan cek apakah data berhasil di ubah
	if ( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data Berhasil diubah');
				document.location.href = 'data.php';
			</script>
		";
	}else {
				echo "
			<script>
				alert('Data Gagal diubah');
				document.location.href = 'data.php';
			</script>
		";
	}
}
require 'navbar_admin.php'; 
?>
<div class="d-flex justify-content-center">
 	<div class="col-md-6 m-auto">
 		 <div class="card">
  			 <div class="card-body">

	<form action="" method="post">
		<label for="nama">nama :</label>
		<input type="text" name="nama" id="nama" class="form-control" required value="<?= $kry["nama"];?>">

		<label for="badge">badge :</label>
		<input type="text" name="badge" id="badge" class="form-control" required value="<?= $kry["badge"];?>">	

		<label for="jabatan">jabatan :</label>
		<select class="form-control" name="jabatan" id="jabatan">
			<?php if ($kry["jabatan"]=='Pimpinan'): ?>
				<option value="Pimpinan">Direksi/GM/Manager</option>
				<option value="Karyawan">Karyawan</option>
			<?php elseif($kry["jabatan"]=='Admin'):?>
				<option value="Admin">Admin</option>
			<?php else : ?>
				<option value="Karyawan">Karyawan</option>
				<option value="Pimpinan">Direksi/GM/Manager</option>
			<?php endif ?>	
			<input type="hidden" name="badgeLama" value="<?= $kry["badge"];?>" >
		</select>
		
		<br>
		<button type="reset" name="reset" class="btn btn-warning">Reset</button>
		<button type="submit" class="btn btn-success" name="ubah">Update</button>
	</form>
	</div></div></div></div>
<?php require 'footer.php'; ?>