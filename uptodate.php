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
// cek apakah tombol ubah sudah ditekan
if (isset($_POST["tambah"])) {
	// jalankan fungsi uptodate dan cek apakah update sudah berhasil
	if ( uptodate($_POST) > 0 ) {
		echo "
			<script>
				alert('Berita Berhasil di-Update');
				document.location.href = 'delete_news.php';
			</script>
		";
		exit;
	}
}
require 'navbar_admin.php'; ?>
<div class="d-flex justify-content-center">
 	<div class="col-md-6 m-auto">
 		 <div class="card">
  			 <div class="card-body">

<form action="" method="post">
	<label for="text">Input Berita :</label>
	<textarea type="text" name="text" id="text" class="form-control" rows="2"></textarea>
	<br>
	<button type="reset" name="reset" class="btn btn-warning">Reset</button>
	<button type="submit" name="tambah" class="btn btn-success">Tambah</button>
</form>

			</div>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>