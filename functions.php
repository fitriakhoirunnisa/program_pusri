<?php 
	//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "cpis_pusri");

//ambil data dari tabel mahasiswa / query data mahasiswa
function query($query){
	global $conn;
	// var_dump($query);
	$result = mysqli_query($conn, $query);
	$rows = [];
	// var_dump($result); die;
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


//================================================================================================

function query2($tabel, $kondisi, $akses){
	global $conn;
	if ($akses=='Karyawan') {
		$query = "SELECT * FROM $tabel WHERE keterangan = '$kondisi' && hak_akses = '$akses'";
	}else{
		$query = "SELECT * FROM $tabel WHERE keterangan = '$kondisi'";
	}
	// var_dump($kondisi); die;
	// var_dump($tabel); var_dump($kondisi); var_dump($akses); die;
	// var_dump($query); die;
	$result = mysqli_query($conn, $query);
	// var_dump(mysqli_error($conn)); die;
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	// var_dump($rows); die;
	return $rows;
}

function query3($tabel, $kondisi, $akses, $keyword){
	global $conn;
	if ($akses=='Karyawan') {
		$query = "SELECT * FROM $tabel WHERE 
			keterangan = '$kondisi' AND hak_akses = '$akses' AND
				(nama_file LIKE '%$keyword%' OR 
				tgl_upload  LIKE '%$keyword%' OR 
				judul  LIKE '%$keyword%' OR 
				deskripsi LIKE '%$keyword%')
		";
	}else{
		$query = "SELECT * FROM $tabel WHERE keterangan = '$kondisi' AND

				(nama_file LIKE '%$keyword%' OR 
				tgl_upload  LIKE '%$keyword%' OR 
				judul  LIKE '%$keyword%' OR 
				deskripsi LIKE '%$keyword%')

		";
	}
	// var_dump($kondisi); die;
	// var_dump($tabel); var_dump($kondisi); var_dump($akses); die;
	// var_dump($query); die;
	$result = mysqli_query($conn, $query);
	// var_dump(mysqli_error($conn)); die;
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	// var_dump($rows); die;
	return $rows;
}

function query4($tabel, $keyword){
	// var_dump($tabel); var_dump($keyword); die;
	global $conn;
		$query = "SELECT * FROM $tabel WHERE 
				nama_file LIKE '%$keyword%' OR 
				tgl_upload  LIKE '%$keyword%' OR 
				keterangan  LIKE '%$keyword%' OR 
				judul  LIKE '%$keyword%' OR 
				deskripsi LIKE '%$keyword%'

		";
	
	// var_dump($kondisi); die;
	// var_dump($tabel); var_dump($kondisi); var_dump($akses); die;
	// var_dump($query); die;
	$result = mysqli_query($conn, $query);
	// var_dump(mysqli_error($conn)); die;
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	// var_dump($rows); die;
	return $rows;
}
function ambilData($id2,$akses){
	global $conn;
	
	if ( $id2 == 'rjp_proceed' ) {
		$data = query2('rjp', 'Proceeding', $akses);
	}elseif ( $id2 == 'rjp_buku' ) {
		$data = query2('rjp', 'Buku', $akses);
	}elseif ( $id2 == 'rjp_eval' ) {
		$data = query2('rjp', 'Evaluasi', $akses);
	}elseif ( $id2 == 'rkap_proceed' ) {
		$data = query2('rkap', 'Proceeding', $akses);
	}elseif ( $id2 == 'rkap_buku' ) {
		$data = query2('rkap', 'Buku', $akses);
	}elseif ( $id2 == 'rkap_eval' ) {
		$data = query2('rkap', 'Evaluasi', $akses);
	}elseif ( $id2 == 'kpi_proceed' ) {
		$data = query2('kpi', 'Proceeding', $akses);
	}elseif ( $id2 == 'kpi_buku' ) {
		$data = query2('kpi', 'Buku', $akses);
	}elseif ( $id2 == 'kpi_eval' ) {
		$data = query2('kpi', 'Evaluasi', $akses);
	}elseif ( $id2 == 'kurs' ) {
		$data = query2('data_eksternal', 'Kurs Rupiah', 'Semua');
	}elseif ( $id2 == 'inflasi' ) {
		$data = query2('data_eksternal', 'Inflasi', 'Semua');
	}elseif ( $id2 == 'bunga' ) {
		$data = query2('data_eksternal', 'Suku Bunga', 'Semua');
	}elseif ( $id2 == 'gas' ) {
		$data = query2('data_eksternal', 'Harga Gas', 'Semua');
	}elseif ( $id2 == 'urea' ) {
		$data = query2('data_eksternal', 'Harga Urea', 'Semua');
	}elseif ( $id2 == 'amon' ) {
		$data = query2('data_eksternal', 'Harga Amonia', 'Semua');
	}
	return $data;
}

function ambilDataCari($id2,$akses, $keyword){
	global $conn;
	
	if ( $id2 == 'rjp_proceed' ) {
		$data = query3('rjp', 'Proceeding', $akses, $keyword);
	}elseif ( $id2 == 'rjp_buku' ) {
		$data = query3('rjp', 'Buku', $akses, $keyword);
	}elseif ( $id2 == 'rjp_eval' ) {
		$data = query3('rjp', 'Evaluasi', $akses, $keyword);
	}elseif ( $id2 == 'rkap_proceed' ) {
		$data = query3('rkap', 'Proceeding', $akses, $keyword);
	}elseif ( $id2 == 'rkap_buku' ) {
		$data = query3('rkap', 'Buku', $akses, $keyword);
	}elseif ( $id2 == 'rkap_eval' ) {
		$data = query3('rkap', 'Evaluasi', $akses, $keyword);
	}elseif ( $id2 == 'kpi_proceed' ) {
		$data = query3('kpi', 'Proceeding', $akses, $keyword);
	}elseif ( $id2 == 'kpi_buku' ) {
		$data = query3('kpi', 'Buku', $akses, $keyword);
	}elseif ( $id2 == 'kpi_eval' ) {
		$data = query3('kpi', 'Evaluasi', $akses, $keyword);
	}elseif ( $id2 == 'kurs' ) {
		$data = query3('data_eksternal', 'Kurs Rupiah', 'Semua', $keyword);
	}elseif ( $id2 == 'inflasi' ) {
		$data = query3('data_eksternal', 'Inflasi', 'Semua', $keyword);
	}elseif ( $id2 == 'bunga' ) {
		$data = query3('data_eksternal', 'Suku Bunga', 'Semua', $keyword);
	}elseif ( $id2 == 'gas' ) {
		$data = query3('data_eksternal', 'Harga Gas', 'Semua', $keyword);
	}elseif ( $id2 == 'urea' ) {
		$data = query3('data_eksternal', 'Harga Urea', 'Semua', $keyword);
	}elseif ( $id2 == 'amon' ) {
		$data = query3('data_eksternal', 'Harga Amonia', 'Semua', $keyword);
	}
	return $data;
}

//================================================================================================

//================================================================================================


//================================================================================================

//================================================================================================

//================================================================================================

 function ubah($data){
 	global $conn;
	//ambil data dari tiap elemen dalam form
	$badge = htmlspecialchars($data["badge"]);
	$nama = htmlspecialchars($data["nama"]);
	$jabatan = htmlspecialchars($data["jabatan"]);
	$badgeLama=$data["badgeLama"];
	// var_dump($badge);var_dump($nama);var_dump($jabatan);var_dump($badgeLama);die;
	// query insert data
	$query = "UPDATE user SET
				badge = '$badge',
				nama = '$nama',
				jabatan = '$jabatan'
			WHERE badge = '$badgeLama'
			";
	mysqli_query($conn, $query);
	// var_dump(mysqli_error($conn)); die;
	// var_dump(mysqli_affected_rows($conn)); die;
	return mysqli_affected_rows($conn);
}
//================================================================================================

//================================================================================================

//================================================================================================

 function non($data){
 	global $conn;
	// query update data
	$query = "UPDATE user SET
				status = 'Non Aktif'
			WHERE badge = $data
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
//================================================================================================

//================================================================================================

//================================================================================================

function cari($keyword,$tabel){
	if ($tabel=='user') {
		$query = "SELECT * FROM $tabel
				WHERE status= 'Aktif' AND
				(nama LIKE '%$keyword%' OR 
				badge  LIKE '%$keyword%' OR 
				jabatan LIKE '%$keyword%') 
			";
	}elseif ($tabel=='download_log') {
		$query = "SELECT * FROM $tabel
				WHERE 
				badge LIKE '%$keyword%' OR 
				nama_file  LIKE '%$keyword%' OR 
				jenis_file LIKE '%$keyword%' OR 
				folder  LIKE '%$keyword%' OR 
				tgl_download  LIKE '%$keyword%' OR 
				waktu_download LIKE '%$keyword%'
			";
	}elseif ($tabel=='login_log') {
		$query = "SELECT * FROM $tabel
				WHERE 
				badge LIKE '%$keyword%' OR 
				tgl_login  LIKE '%$keyword%' OR 
				waktu_login LIKE '%$keyword%'
			";
	}elseif ($tabel=='berita') {
		$query = "SELECT * FROM $tabel
				WHERE 
				tgl_update  LIKE '%$keyword%' OR 
				text LIKE '%$keyword%'
			";
	}
	
	return query($query);
}
//================================================================================================

//================================================================================================

//================================================================================================

function tambah_user($data){

	global $conn;
$badge = strtolower(stripslashes($data["badge"]));
$nama = mysqli_real_escape_string($conn, $data["nama"]);
$jabatan = mysqli_real_escape_string($conn, $data["jabatan"]);
$status = "Aktif";

$result = mysqli_query($conn, "SELECT badge FROM user WHERE badge = '$badge'");

//cek apakah badge sudah ada
if(mysqli_fetch_assoc($result)){
	echo "<script>
			alert('badge Sudah Terdaftar!')
			</script>";

	return false;
}

	//enskripsi password
	$password = password_hash($badge, PASSWORD_DEFAULT);
// var_dump($badge); var_dump($nama); var_dump($jabatan); var_dump($status); var_dump($password); die;
	$query = "INSERT INTO user 
			VALUES
		('$badge','$password' ,'$nama','$jabatan','$status')
		";
		// var_dump($query);
	//tambhakan userbaru ke databases
	mysqli_query($conn, $query);
// return $password;
	return mysqli_affected_rows($conn);

}
//================================================================================================

//================================================================================================

//================================================================================================

function tambah_file($data) {
	global $conn;
	//ambil data dari tiap elemen dalam form
	// $id = $data["id"];
	// $namafile = htmlspecialchars($data["nama_file"]); //upload
	$judul = htmlspecialchars($data["judul"]);
	$deskripsi = htmlspecialchars($data["desc"]);
	$folder = htmlspecialchars($data["folder"]);
	$file = htmlspecialchars($data["file"]);
	$hakakses = htmlspecialchars($data["akses"]);
	$tgl_upload = date('d-m-Y');
// var_dump($tgl_upload); die;
	//upload file
	$namafile= upload_file();
	//cek apakah file sudah benar
	if(!$namafile)
	{
		return false;
	}
// var_dump($file); var_dump($hakakses); 
// 	var_dump($namafile); var_dump($folder); die;
	if ($folder=='rjp') {
		$query = "INSERT INTO rjp
				 VALUES
			('', '$namafile','$tgl_upload', '$file', '$hakakses','$judul', '$deskripsi')
			";
	}elseif ($folder=='rkap') {
		$query = "INSERT INTO rkap
				 VALUES
			('', '$namafile','$tgl_upload', '$file', '$hakakses', '$judul', '$deskripsi')
			";
			// var_dump($query); die;
	}elseif ($folder=='kpi') {
		$query = "INSERT INTO kpi
				 VALUES
			('', '$namafile','$tgl_upload','$file', '$hakakses', '$judul', '$deskripsi')
			";
	}elseif ($folder=='eksternal') {
		$query = "INSERT INTO data_eksternal
				 VALUES
			('', '$namafile','$tgl_upload', '$file', '$judul', '$deskripsi')
			";

	}
	// query insert data
	mysqli_query($conn, $query);
	// var_dump($query);
	// var_dump(mysqli_error($conn)); die;
	return mysqli_affected_rows($conn);
}
//================================================================================================

//================================================================================================

//================================================================================================

function upload_file(){
	$namafile =$_FILES['nama_file']['name'];
	$ukuranfile =$_FILES['nama_file']['size'];
	$error =$_FILES['nama_file']['error'];
	$tmpname =$_FILES['nama_file']['tmp_name'];

	//CEK APAKAH TIDAK AD AGMABRA TIDAK DI UPOD

	// if ($error === 4){
	// 	echo "<script>
	// 		alert('Pilih File Terlebih Dahulu!');
	// 		</script>";
	// 		return false;
	// }

	// cek apakah yang diuploud adalah nama_file\\
	$ekstensinama_fileValid = ['pdf'];
	$ekstensinama_file = explode('.', $namafile);
	$ekstensinama_file = strtolower(end($ekstensinama_file));
	if (!in_array($ekstensinama_file, $ekstensinama_fileValid)){
			echo "<script>
			alert('Yang Anda Upload Bukan PDF!');
			</script>";
			return false;
		}

		//cek jika ukurannnya terlalu besar
		if($ukuranfile > 10000000)
		{
			echo "<script>
			alert('Ukuran File Terlalu Besar!');
			</script>";
			return false;
		}
		//lolos pengecekkan, nama_file siap uploud
		// //generic nama baru 
		// $namafilebaru = uniqid();
		// $namafilebaru .='.';
		// $namafilebaru .= $ekstensinama_file;


		move_uploaded_file($tmpname, 'file/'. $namafile);
		return $namafile;
}
//================================================================================================

//================================================================================================

//================================================================================================


function updatepass($psswd){
 	global $conn;
	//ambil psswd dari tiap elemen dalam form
	$badge = $_COOKIE["user"];
	$password = mysqli_real_escape_string($conn, $psswd["password"]);
	$password2 = mysqli_real_escape_string($conn, $psswd["password2"]);
	//cek konfirmasi password
	if ($password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
				</script>
				";
				return false;
	}

	//enskripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
// var_dump($badge); var_dump($nama); var_dump($jabatan); var_dump($status); var_dump($password); die;
	// query insert data
	$query = "UPDATE user SET
				password = '$password'
			WHERE badge = '$badge'
			";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
//================================================================================================

//================================================================================================

//================================================================================================

function login_log($badge){
	global $conn;
	$tgl_login = date('d-m-Y');
	$waktu_login = date('H:i:s', time()+6*60*60);
	// var_dump($tgl_login); var_dump($waktu_login); var_dump($badge); die;
	$query = "INSERT INTO login_log 
			VALUES
		('','$badge','$tgl_login' ,'$waktu_login')
		";
			// var_dump($query);
		//tambhakan userbaru ke databases
		mysqli_query($conn, $query);
	// return $password;
		// return mysqli_affected_rows($conn);



}

function download_log($nama_file, $folder, $jenis_file, $badge){

	global $conn;
	$tgl_download = date('d-m-Y');
	$waktu_download = date('H:i:s', time()+6*60*60);
	
	if( $folder=='kurs' || $folder=='inflasi' || $folder=='bunga' || $folder=='gas' || $folder=='urea' || $folder=='amon' ){
		$folder = 'Data Eksternal';
	}else{
		$folder2 = explode('_', $folder);
		$folder = strtoupper($folder2[0]);
	}
		

	// var_dump($folder); die;
	// var_dump($badge); var_dump($nama_file); var_dump($folder); var_dump($jenis_file); var_dump($tgl_download); var_dump($waktu_download); die;
	// var_dump($tgl_login); var_dump($waktu_login); var_dump($badge); die;
	$query = "INSERT INTO download_log 
			VALUES
		('', '$badge', '$nama_file', '$folder', '$jenis_file', '$tgl_download', '$waktu_download')
		";
			// var_dump($query);
		//tambhakan userbaru ke databases
		// var_dump($query); die;
		mysqli_query($conn, $query);
	// return $password;
		// return mysqli_affected_rows($conn);
		// var_dump(mysqli_affected_rows($conn)); die;


}

function hitungData($pg, $jmlh, $akses){
	global $conn;
	$query = query2($pg, $jmlh, $akses);
	// var_dump($query); die;
	// var_dump(count($query)); die;
	return count($query);	
}

function hitungData2($tabel){
	global $conn;
	$query = query("SELECT * FROM $tabel");
	// var_dump($query); die;
	// var_dump(count($query)); die;
	return count($query);
}

function terakhirDownload( $nama_file, $folder, $jenis_file ){
	global $conn;
	if( $folder=='kurs' || $folder=='inflasi' || $folder=='bunga' || $folder=='gas' || $folder=='urea' || $folder=='amon' ){
		$folder = 'Data Eksternal';
	}else{
		$folder2 = explode('_', $folder);
		$folder = strtoupper($folder2[0]);
	}
	// var_dump($folder); die;

	// var_dump($nama_file); var_dump($folder); var_dump($jenis_file); die;
	 $query=query("SELECT tgl_download FROM download_log WHERE nama_file = '$nama_file'  && folder = '$folder' && jenis_file = '$jenis_file' ORDER BY id_dwnld DESC LIMIT 1");
	 // var_dump($query); die;
	 return $query;
}

function uptodate($up){
	global $conn;

	$tgl_update = date('d/m');
	$text = mysqli_real_escape_string($conn, $up["text"]);

	$query = "INSERT INTO berita VALUES ('' , '$tgl_update' , '$text')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
		$tabel2 = explode('_', $id);
		$tabel = $tabel2[1];
		$id=$tabel2[0];
	if( $tabel=='daks' ){
		$tabel = 'data_eksternal';
	}
	mysqli_query($conn, "DELETE FROM $tabel WHERE id=$id");
	return mysqli_affected_rows($conn);
}

function resetPasssword($badge){
	global $conn;
	
	$password = password_hash($badge, PASSWORD_DEFAULT);
	// var_dump($password); die;
	$query = "UPDATE user SET
				password = '$password'
			WHERE badge = $badge
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}
