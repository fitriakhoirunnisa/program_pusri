<?php 
// echo "lup"; die;
sleep(1);
require '../functions.php';
$keyword = $_GET["keyword"];
if ($keyword=='') {
	echo "File not Found"; exit;
}
$data = cari($keyword, 'login_log');
// var_dump($data); exit;
if (count($data)==0) {
	echo "File not Found"; exit;
}
 ?>
 <table align="center" class="table table-hover">

	<tr>
		<th>No</th>
		<th>Badge</th>
		<th>Tanggal Login</th>
		<th>Waktu Login</th>
	</tr>
	<?php $i=1; ?>
	<?php foreach ($data as $row) : ?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $row["badge"]; ?></td>
		<td><?= $row["tgl_login"]; ?></td>
		<td><?= $row["waktu_login"]; ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
	</table>
