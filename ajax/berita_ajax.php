<?php 
// echo "lup"; die;
sleep(1);
require '../functions.php';
$keyword = $_GET["keyword"];
if ($keyword=='') {
	echo "File not Found"; exit;
}
$data = cari($keyword, 'berita');
if (count($data)==0) {
	echo "File not Found"; exit;
}
 ?>
 <table align="center" class="table table-hover">
	<tr>
		<th>No.</th>
		<th>Tanggal Update</th>
		<th>Text</th>
		<th>Aksi</th>
	</tr>

<?php $i=1; ?>
<?php foreach ( $data as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["tgl_update"] ?></td>
		<td><?= $row["text"] ?></td>
		<td><a href="delete_news.php?id=<?=$row["id"];?>_berita" class="btn btn-warning" onclick=" return confirm('Hapus File?');">Hapus</a></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>