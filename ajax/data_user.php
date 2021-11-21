
<?php 
// echo "lup"; die;
sleep(1);
require '../functions.php';
$keyword = $_GET["keyword"];
if ($keyword=='') {
	echo "File not Found"; exit;
}
$daftarkaryawan = cari($keyword, 'user');
if (count($daftarkaryawan)==0) {
	echo "File not Found"; exit;
}
 ?>

 <table align="center" class="table table-hover">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Badge</th>
		<th>Jabatan</th>
		<th>Status</th>
		<th>Aksi</th>
	</tr>

<?php $i=1 ; ?>
<?php foreach ( $daftarkaryawan as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["nama"] ?></td>
		<td><?= $row["badge"] ?></td>
		<td><?= $row["jabatan"] ?></td>
		<td><?= $row["status"] ?></td>
		<td>
			<a href="ubah.php?badge=<?= $row["badge"]?>" class="btn btn-primary">Ubah</a> |
			<a href="data.php?badge=<?= $row["badge"]?>" class="btn btn-danger" onclick="return confirm('Hapus?')">Hapus</a>|
			<a href="data.php?badge2=<?= $row["badge"]?>" class="btn btn-warning" onclick="return confirm('Reset Password?')">Reset Password</a>
		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>
