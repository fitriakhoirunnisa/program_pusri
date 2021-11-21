<a href="lup.php?id=<?='lup';?>_<?='arka';?>">lup</a>



<?php die; if (isset($_GET["pg"]) && $_GET["pg"]=='hapus' || isset($_GET["id2"]) || isset($_GET["pg"])):?>
      <a href="content.php?pg=rjp">RJP</a>| 
      <a href="content.php?pg=rkap">RKAP</a>| 
      <a href="content.php?pg=kpi">KPI</a>| 
      <a href="content.php?pg=daks">Data Eksternal</a>
    <br>
  <?php endif; ?>

<?php if (isset($_GET["pg"])):?>
  <a href="content.php?pg=hapus">Home</a> &raquo 
  <?php $pg = $_GET["pg"];?>
    <a href="
    <?php if ($pg == 'rjp'):?>
      content.php?pg=<?=$pg; ?>">RJP</a> &raquo
    <?php elseif ($pg == 'rkap') :?>
      content.php?pg=<?=$pg; ?>">RKAP</a> &raquo
    <?php elseif ($pg == 'kpi'):?>
      content.php?pg=<?=$pg; ?>">KPI</a> &raquo
    <?php elseif ($pg == 'daks'):?>
      content.php?pg=<?=$pg; ?>">Data Eksternal</a> &raquo
  <?php endif; ?>
<?php endif; ?>

<?php if (isset($_GET["id2"])): ?>
  <a href="content.php?pg=hapus">Home</a> &raquo 
  
  <?php $id2=$_GET["id2"];
        if( $id2=='kurs' || $id2=='inflasi' || $id2=='bunga' || $id2=='gas' || $id2=='urea' || $id2=='amon' ){
          $pg ='daks';
        }else{
          $id22 = explode('_', $id2);
          $pg = $id22[0];
          $id2 = end($id22);
        }
        ?>
    <a href="
    <?php if ($pg == 'rjp'):?>
      content.php?pg=<?=$pg; ?>">RJP</a> &raquo
    <?php elseif ($pg == 'rkap') :?>
      content.php?pg=<?=$pg; ?>">RKAP</a> &raquo
    <?php elseif ($pg == 'kpi'):?>
      content.php?pg=<?=$pg; ?>">KPI</a> &raquo
    <?php elseif ($pg == 'daks'):?>
      content.php?pg=<?=$pg; ?>">Data Eksternal</a> &raquo
    <?php endif; ?>

    <a href="
    <?php if ($id2=='proceed'):?>
        #">Proceeding</a> &raquo
    <?php elseif ($id2=='buku') :?>
        #">Buku</a> &raquo
    <?php elseif ($id2=='eval'):?>
        #">Evaluasi</a> &raquo
    <?php elseif($id2=='kurs'): ?>
        #">Kurs Rupiah</a> &raquo
    <?php elseif($id2=='inflasi'): ?>
        #">Inflasi</a> &raquo
    <?php elseif($id2=='bunga'): ?>
        #">Suku Bunga</a> &raquo
    <?php elseif($id2=='gas'): ?>
        #">Harga Gas</a> &raquo
    <?php elseif($id2=='urea'): ?>
        #">Harga Urea</a> &raquo
    <?php elseif($id2=='amon'): ?>
        #">Harga Amonia</a> &raquo
    <?php endif; ?>


<?php endif; ?>
