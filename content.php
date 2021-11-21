<?php 
session_start();
//cek session
if ( !isset($_SESSION["login"]) ) {

	header("Location: login.php");
	exit;
}
//cek user
if ($_COOKIE["akses"] === 'Admin') {
 	header("Location: admin.php");
	exit;
} 
//menangkap data user
$akses = $_COOKIE["akses"];

	require'navbar_user.php';
	require 'functions.php';

if (isset($_GET["pg"])) :
		$pg = $_GET["pg"];
	if( $pg == 'rjp' OR $pg == 'rkap' OR $pg == 'kpi' ): 
			$jumlah1 = hitungData($pg, 'Proceeding', $akses);
			$jumlah2 = hitungData($pg, 'Buku', $akses);
			$jumlah3 = hitungData($pg, 'Evaluasi', $akses);
		?>
		<!-- <br><br><br><br> -->
			 <div class="row">
			  <div class="col-sm-4">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">PROCEED</h5>
			        <p class="card-text"><?= $jumlah1;?> Files</p>
			        <a href="
			        	<?php if ($pg == 'rjp'): ?>
			        		content.php?id2=rjp_proceed
			        	<?php elseif ($pg == 'rkap') :?>
			        		content.php?id2=rkap_proceed
			        	<?php else :?>
			        		content.php?id2=kpi_proceed
			        	<?php endif ?>
			        " class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			  <div class="col-sm-4">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">BUKU</h5>
			        <p class="card-text"><?= $jumlah2;?> Files</p>
			        <a href="
					    <?php if ($pg == 'rjp'): ?>
			        		content.php?id2=rjp_buku
			        	<?php elseif ($pg == 'rkap') :?>
			        		content.php?id2=rkap_buku
			        	<?php else :?>
			        		content.php?id2=kpi_buku
			        	<?php endif ?>
			        " class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>

			<div class="col-sm-4">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">EVALUASI</h5>
			        <p class="card-text"><?= $jumlah3;?> Files</p>
			        <a href="
			        	<?php if ($pg == 'rjp'): ?>
			        		content.php?id2=rjp_eval
			        	<?php elseif ($pg == 'rkap') :?>
			        		content.php?id2=rkap_eval
			        	<?php else :?>
			        		content.php?id2=kpi_eval
			        	<?php endif ?>
			        " class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			</div><!-- <br><br><br><br><br><br><br><br><br> -->


	<?php elseif($pg == 'daks'): 
				$pg2='data_eksternal';
				$jumlah1 = hitungData($pg2, 'Kurs Rupiah', 'Semua');
				$jumlah2 = hitungData($pg2, 'Inflasi', 'Semua');
				$jumlah3 = hitungData($pg2, 'Suku Bunga', 'Semua');
				$jumlah4 = hitungData($pg2, 'Harga Gas', 'Semua');
				$jumlah5 = hitungData($pg2, 'Harga Urea', 'Semua');
				$jumlah6 = hitungData($pg2, 'Harga Amonia', 'Semua');
		?>
			<br><br><br>
		 <div class="row">
			  <div class="col-sm-4">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">KURS RUPIAH</h5>
			        <p class="card-text"><?= $jumlah1;?> Files</p>
			        <a href="content.php?id2=kurs" class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			  <div class="col-sm-4">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">INFLASI</h5>
			        <p class="card-text"><?= $jumlah2;?> Files</p>
			        <a href="content.php?id2=inflasi" class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			<div class="col-sm-4">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">SUKU BUNGA</h5>
			        <p class="card-text"><?= $jumlah3;?> Files</p>
			        <a href="content.php?id2=bunga" class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			</div>
			<br>
			 <div class="row">
			  <div class="col-sm-4">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">HARGA GAS</h5>
			        <p class="card-text"><?= $jumlah4;?> Files</p>
			        <a href="content.php?id2=gas" class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			  <div class="col-sm-4">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">HARGA UREA</h5>
			        <p class="card-text"><?= $jumlah5;?> Files</p>
			        <a href="content.php?id2=urea" class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			<div class="col-sm-4">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">HARGA AMONIAK</h5>
			        <p class="card-text"><?= $jumlah6;?> Files</p>
			        <a href="content.php?id2=amon" class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- <br><br><br><br><br> -->
		<?php endif; ?>
		
<!-- ================================================================content download -->
<?php elseif (isset( $_GET["id2"]) || isset($_POST["cari"]) ):
	
	if (isset($_POST["cari"])) {
		// var_dump($_POST); die;
		$id2 = $_POST["folder"];
		$keyword = $_POST["keyword"];
		$data = ambilDataCari($id2,$akses, $keyword);
	}elseif (isset( $_GET["id2"]) ) {
		$id2 = $_GET["id2"];
		$data = ambilData($id2,$akses);
	}
	
	
 ?>

<br><br><br>
<div class="d-flex justify-content-center">
 	<div class="col-md-10 m-auto">
 		 <div class="card">
 		 	<div class="card-header">
				<h2 align="center"></h2><br>
 		 	</div> 
  			 <div class="card-body">

	<form action="" method="post" align="right">	
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian.." autocomplete="off" id="keyword" required="required">
		<input type="hidden" name="folder" value="<?= $id2;?>">
		<button type="submit" name="cari">Cari</button>
	<!-- <a href="content.php?id2=<?= $id2;?>" class="btn btn-primary" name="cari" type="submit">Cari</a> -->
	<img src="img/loader.gif" class="loader">
	</form>
<br><br>
<table align="center" class="table table-hover">

	<tr>
		<th>No.</th>
		<th>Nama File</th>
		<th>Tanggal Upload</th>
		<th>Judul File</th>
		<th>Deskripsi File</th>
		<th>Terakhir didownload</th>
		<th>Aksi</th>
	</tr>
	<?php $i=1; ?>
	<?php foreach ($data as $row) : ?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $row["nama_file"]; ?></td>
		<td><?= $row["tgl_upload"]; ?></td>
		<td><?= $row["judul"];?></td>
		<td><?= $row["deskripsi"];?></td>
		<td>
			<?php 
			$nama_file = $row["nama_file"];
			$folder = $id2;
			$jenis_file = $row["keterangan"];
			$log=terakhirDownload( $nama_file, $folder, $jenis_file );
			
			if (empty($log)) {
				echo "Belum Pernah di Download";
			}else{
				echo $log[0]["tgl_download"];
			}
			
			 ?>
		</td>
			<td><a href="#" onclick="window.open('download_log.php?data=<?=$row["nama_file"];?>_<?=$id2?>_<?=$row["keterangan"];?>')">Download</a></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
	</table>
	</div></div></div></div>


<!-- =====================================================else -->
<?php else: ?>	
	<div class="d-flex justify-content">
	 	<div class="col-md-6 m-auto">
	 		<div class="card">
	  			<div class="card-body">
					
	  			 <form action="" method="post">
	  			 	<h3 align="center">Selamat Datang <br> Pimpinan / Karyawan <br> PT. Pupuk Sriwidjaja Palembang</h3>
	  			 </form>
	  			</div>
	  		</div>
	  	</div>
	</div>

    <hr>
    <?php $jumlah1 = hitungData2('rjp');
    	  $jumlah2 = hitungData2('rkap');
    	  $jumlah3 = hitungData2('kpi');
    	  $jumlah4 = hitungData2('data_eksternal');
    	 ?>
		<div class="row">
			  <div class="col-sm-3">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">RJP</h5>
			        <p class="card-text"><?= $jumlah1;?> Files</p>
			        <a href="content.php?pg=rjp" class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			  <div class="col-sm-3">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">RKAP</h5>
			        <p class="card-text"><?= $jumlah2;?> Files</p>
			        <a href="content.php?pg=rkap" class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			  <div class="col-sm-3">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">KPI</h5>
			        <p class="card-text"><?= $jumlah3;?> Files</p>
			        <a href="content.php?pg=kpi" class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>
			  <div class="col-sm-3">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">Data Eksternal</h5>
			        <p class="card-text"><?= $jumlah4;?> Files</p>
			        <a href="content.php?pg=daks" class="btn btn-primary">Open Files</a>
			      </div>
			    </div>
			  </div>

		</div>
    <br><br><br><br><!-- <br><br><br><br><br><br><br><br><br><br><br><br> -->
	<!-- Menampilkan Berita Terbaru -->
	<?php $up = query("SELECT * FROM berita ORDER BY id DESC LIMIT 5"); ?>

	<style type="text/css">
		.text{
		    background-color: grey;
		    color: white;
		    font-family: monospace;
		    font-size: 15px;
}
</style>

	<marquee class="text" direction="left" onmouseover="this.stop();" onmouseout="this.start();" >
	<?php foreach ( $up as $row ) : ?>
                (<?= $row["tgl_update"] ?>)<?= $row["text"] ?>  |    
    <?php endforeach; ?>
	</marquee>
<?php endif; ?>
<!-- =====================================================endif -->
<!-- </div>
</div> -->
<!-- <br><br><br> -->
  <?php require "footer.php" ?>