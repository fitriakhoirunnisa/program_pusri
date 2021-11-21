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
//cek apakah tombol sdh ditekan
if ( isset( $_POST["upload"]) ) {

	//jalankan fungsi tambah_file dan cek apakah data berhasil ditambahkan
	if ( tambah_file($_POST) > 0 ) {
		echo "
			<script>
				alert('Data Berhasil ditambahkan');
				document.location.href = 'hapus.php';
			</script>
		";
	}
	else {
				echo "
			<script>
				alert('Data Gagal ditambahkan');
				document.location.href = 'upload.php';
			</script>
		";
	}
}

require'navbar_admin.php'; ?>

<br><br>
<div class="d-flex justify-content-center">
 	<div class="col-md-6 m-auto">
 		 <div class="card">
  			 <div class="card-body">

	<form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
              	<label for="folder">FOLDER : </label>
                <select name="folder" id="folder" class="form-control" required="required" onchange="ubah('folder', 'file'); ubah2('folder', 'akses')">
					<option>-</option>
					<option value="rjp">RJP</option>
					<option value="rkap">RKAP</option>
					<option value="kpi">KPI</option>
					<option value="eksternal">DATA EKSTERNAL</option>			
				</select>
              </div>
			<div class="form-group">
				<label for="file">File : </label>
                <select name="file" id="file" class="form-control" required="required"></select>
            </div>

            <div class="form-group">
              <label for="akses">Hak Akses : </label>
                <select name="akses" id="akses" class="form-control" required="required" >
					<option>-</option>
				</select>
            </div>

            <div class="form-group">
              <label for="judul">Judul File : </label>
              <textarea name="judul" id="judul" cols="15" rows="2" class="form-control" required="required"></textarea>
            </div>

            <div class="form-group">
              <label for="desc">Deskripsi File : </label>
              <textarea name="desc" id="desc" cols="15" rows="5" class="form-control" required="required"></textarea>
            </div>

            <div class="form-group">
            	<label for="nama_file">Masukkan File</label>
            	<td align="center"><input type="file" name="nama_file" id="nama_file" width="50" required="required"></td>
            </div>
              <button type="submit" name="upload" class="btn btn-primary">Upload</button>
    </form>

          </div>
         </div>
      </div>
    </div>				
<?php require'footer.php'; ?>

<script>
	function ubah(s1,s2)
	{
		var s1 = document.getElementById(s1);
		var s2 = document.getElementById(s2);
		s2.innerHTML = "";

		if(s1.value == "rjp" || s1.value == "rkap" || s1.value == "kpi")
		{
			var optionArray = ["Proceeding|Proceeding","Buku|Buku","Evaluasi|Evaluasi"];
		}
		else if(s1.value == "eksternal")
		{
			var optionArray = ["Kurs Rupiah|Kurs Rupiah","Inflasi|Inflasi","Suku Bunga|Suku Bunga", "Harga Gas|Harga Gas", "Harga Urea|Harga Urea", "Harga Amonia|Harga Amonia"];
		}

		for(var option in optionArray)
		{
			var pair = optionArray[option].split("|");
			var newOption = document.createElement("option");
			newOption.value = pair[0];
			newOption.innerHTML = pair[1];
			s2.options.add(newOption);
		}

	}

	function ubah2(s1,s2)
	{
		var s1 = document.getElementById(s1);
		var s2 = document.getElementById(s2);
		s2.innerHTML = "";

		if(s1.value == "rjp" || s1.value == "rkap" || s1.value == "kpi")
		{
			var optionArray = ["Pimpinan|DIREKSI/GM/MANAGER","Karyawan|SELURUH KARYAWAN"];
		}
		else if(s1.value == "eksternal")
		{
			var optionArray = ["Semua|ALL"];
		}
		for(var option in optionArray)
		{
			var pair = optionArray[option].split("|");
			var newOption = document.createElement("option");
			newOption.value = pair[0];
			newOption.innerHTML = pair[1];
			s2.options.add(newOption);
		}

	}
</script>
