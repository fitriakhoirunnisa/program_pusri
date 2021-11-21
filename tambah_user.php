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
// cek apakah tombol tambah sudah ditekan
if(isset($_POST["tambah"])){
	// jalankan fungsi tambah_user dan mengecek apakah penambahan berhasil
	if(tambah_user($_POST) > 0 ){
		
		echo "<script>
				alert('User Baru Berhasil Ditambahkan!');
				 	document.location.href = 'data.php';
		</script>";
		exit;
	
	}else{
		echo mysqli_error($conn);
	}
}

require 'navbar_admin.php';
?>
<div class="d-flex justify-content-center">
 	<div class="col-md-6 m-auto">
 	  <div class="card">
  		  <div class="card-body">

<form action="" method="post">
	<label for="nama">Nama :</label>
	<input type="text" name="nama" id="nama" class="form-control" required="required" autocomplete="off" autofocus="off">

	<label for="badge">Badge :</label>
	<input type="text" name="badge" id="badge" class="form-control" required="required" autocomplete="off" autofocus="off">

	<label for="jabatan">Jabatan :</label>
	<select name="jabatan" id="jabatan" class="form-control" required="required">
		<option value="Pimpinan">Direksi/GM/Manager</option>
		<option value="Karyawan">Karyawan</option>
	</select>
	<br>
	<button type="submit" name="tambah" class="btn btn-success">Tambah</button>
</form>
			</div>
		</div>
	</div>
</div>
 <?php require 'footer.php'; ?>