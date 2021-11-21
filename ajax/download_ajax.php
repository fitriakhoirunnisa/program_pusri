<?php 
// echo "lup"; die;
sleep(1);
require '../functions.php';
$keyword = $_GET["keyword"];
if ($keyword=='') {
	echo "File not Found"; exit;
}
$data = cari($keyword, 'download_log');
if (count($data)==0) {
	echo "File not Found"; exit;
}
 ?>
<table align="center" class="table table-hover">

	<tr>
		<th>No</th>
		<th>Badge</th>
		<th>Nama File</th>
		<th>Folder</th>
		<th>Jenis File</th>
		<th>Tanggal Download</th>
		<th>Waktu Download</th>
	</tr>
	<?php $i=1; ?>
	<?php foreach ($data as $row) : ?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $row["badge"]; ?></td>
		<td><?= $row["nama_file"]; ?></td>
		<td><?= $row["folder"]; ?></td>
		<td><?= $row["jenis_file"]; ?></td>
		<td><?= $row["tgl_download"]; ?></td>
		<td><?= $row["waktu_download"]; ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
	</table>