<?php
require 'functions.php';
// cek user
if ($_COOKIE["akses"] === 'Admin') {
 	header("Location: admin.php");
	exit;
 } 

//menangkap badge user
$badge = $_COOKIE["user"];

if ( isset($_GET["data"]) ) {
	$data=$_GET["data"];
	$data2 = explode('_', $data);
	$nama_file = $data2[0];
	$folder = $data2[1];
	$jenis = $data2[2];
	// var_dump($data); die;
	if ($jenis=='proceed' || $jenis=='buku' || $jenis=='eval') {
		$jenis_file = $data2[3];
	}else{
		$jenis_file = $data2[2];
	}
	 // var_dump($jenis_file); die;

		// catat log download di database
	download_log($nama_file, $folder, $jenis_file, $badge);

	// menuju ke halaman download
	header("Location: file/$nama_file");
}
 ?>