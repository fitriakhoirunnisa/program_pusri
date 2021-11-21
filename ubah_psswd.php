 <?php 
session_start();
// cek session
if ( !isset($_SESSION["login"]) ) {

	header("Location: login.php");
	exit;
}

// cek user
if ($_COOKIE["akses"] === 'Admin') {
 	require 'navbar_admin.php';
 } else{
 	require 'navbar_user.php';
 }

require 'functions.php';
// cek apakah tombol update sudah ditekan
if (isset($_POST["updatepass"])) {
	
	if ( updatepass($_POST) > 0 ) {
		echo "
			<script>
				alert('Password berhasil diubah');
				document.location.href = 'content.php';
			</script>
		";
	}
}
 ?>
 	<div class="d-flex justify-content">
 	<div class="col-md-6 m-auto">
 		 <div class="card">
  			 <div class="card-body">
   	
<form action="" method="post">
	<label for="password">Password Baru :</label>
	<input type="password" autofocus="off" name="password" id="password" class="form-control" placeholder="Masukkan Password baru .." required="required">

	<label for="password2">Konfirmasi Password Baru :</label>
	<input type="password" name="password2" id="password2" class="form-control" placeholder="Masukkan konfirmasi password .." required="required">

	<br>
	
	<button type="reset" name="reset" class="btn btn-warning">Reset</button>
	<button type="submit" name="updatepass" class="btn btn-primary btn-left ">Update</button>
	
</form>
			</div>
		</div>
	</div>
</div>
 <?php require 'footer.php' ?>