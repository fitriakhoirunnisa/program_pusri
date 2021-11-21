<?php 
// start session
session_start();

// include functions.php
require 'functions.php';

//cek session
if (isset($_SESSION["login"]) ){

	header("Location: content.php");
	exit;
}


//cek apakah tombol login sudah ditekan
if(isset($_POST["login"])){

	$badge=$_POST["badge"];
	$password=$_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE badge = '$badge'");
	
	//cek badge
	if(mysqli_num_rows($result)===1){	//ada data

		
		$row = mysqli_fetch_assoc($result);
		// cek status
		if ($row["status"]=='Non Aktif') {
			echo "
				<script>
					alert('Anda sudah di-non-aktifkan');
					document.location.href = 'login.php';
				</script>
				";
				exit;
		}
		
		//cek password
		if(password_verify($password, $row["password"])){

			//set session
			$_SESSION["login"] = true;

			// login Log
			login_log($row["badge"]);

			//menangkap data user
			setcookie('user', $row['badge']);
			setcookie('akses', $row['jabatan']);

			//ke halaman admin jika admin
			if ($row['jabatan']==="Admin") {
				header("Location: admin.php");
				exit;
			} else{
				header("Location: content.php");
				exit;
			}
				
		}
	}
	// mengembalikan eror jika user tidak ditemukan di database
	$error = true;
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/sb-admin.css" rel="stylesheet">
	<?php require 'paviqon.html'; ?>

	<style>
    	body {
    		background : url(img/pusri6.jpg)
			no-repeat fixed;
			-webkit-background-size : 100% 100%;
			-moz-background-size : 100% 100%;
			-o- background-size : 100% 100%;
			background-size: 100% 100%;
    	}

		label{
			display: block;
		}
	</style>

	<style type="text/css">
	.text{
	    background-color: yellow;
	    color: darkblue;
	    font-family: monospace;
	    font-size: 20px;
	    font-style: bold;
		}
	</style>

</head>


	 
<body class="bg-dark">
<?php if (isset($error)) {
	echo "
				<script>
					alert('Badge/Password Anda Salah!');
					document.location.href = 'login.php';
				</script>
				";
} ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<a class="navbar-brand" href="content.php?pg=pusri"><img src="img/logopusri2.png" width="250" height="50" class="d-inline-block align-top"></a>
</nav>
<br><br><br><br>
  <div class="container">
    <div class="card card-login mx-auto mt-1">
      <div class="card-header" align="center"><h3>Menu Login</h3></div>
      <div class="card-body">
        
        <form action="" method="post">
          <div class="form-group">
            <label for="badge">Badge</label>
            <input class="form-control" id="badge" type="text"  placeholder="Enter Badge" autocomplete="off" name="badge" autofocus="off" required="required">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" type="password" placeholder="Password" name="password" required="required">
          </div>
        <tr>
		<td align="center">
			<button type="submit" name="login" class="btn-block"><b>Login</b></button>
		</td>
		</tr>
        </form>

        <div class="text-center">
          <a class="d-block small mt-3">Forgot Password? <i>Silahkan Hubungi Admin</i></a>
        </div>
      </div>
    </div>
  </div>
</body>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
</html>