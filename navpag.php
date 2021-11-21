<!-- ======================== navigasi pagination========================= -->
<nav aria-label="...">
  <ul class="pagination justify-content-center">

<?php if($halamanAktif == 1) : ?>
  	<li class="page-item disabled">
  		<span class="page-link">Previous</span>
<?php elseif($halamanAktif > 1) : ?>
    <li class="page-item">
      	<a class="page-link" href="?halaman=<?= $halamanAktif - 1;?>">Previous</a>   
<?php endif; ?>
	</li>
<!-- =============================================prev=========================== -->


<?php if ($jumlahHalaman<=8):?>
<?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>
	<?php if($i == $halamanAktif) : ?>
	<li class="page-item active">
      <span class="page-link">
        <?= $i;?>
        <span class="sr-only">(current)</span>
      </span>
    </li>
	<?php else : ?>
    <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i;?></a></li>
<?php endif; ?>  
<?php endfor; ?>

<?php elseif ($jumlahHalaman > 8):?>
  
  <?php 
  if (isset($_GET["halaman"])) {
    $i = $_GET["halaman"];
  }else{
    $i=1;
  }
  if ($i <= $jumlahHalaman-7) {
    $end = $i+7; 
  }else{
    $end=$jumlahHalaman;
    $i = $end-7;
  }

  ?>
<?php for ($i = $i; $i <= $end; $i++): ?>
  <?php if($i == $halamanAktif) : ?>
  <li class="page-item active">
      <span class="page-link">
        <?= $i;?>
        <span class="sr-only">(current)</span>
      </span>
    </li>
  <?php else : ?>
    <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i;?></a></li>
<?php endif; ?>  
<?php endfor; ?>
  
<?php endif; ?>



<!-- =============================================next================================= -->
 <?php if($halamanAktif >= $jumlahHalaman) : ?>
  	<li class="page-item disabled">
  		<span class="page-link">Next</span>
<?php elseif($halamanAktif < $jumlahHalaman) : ?>
    <li class="page-item">
      	<a class="page-link" href="?halaman=<?= $halamanAktif + 1;?>">Next</a>   
<?php endif; ?>
	</li>

  </ul>
</nav>
<!-- ========================end navigasi pagination========================= -->
