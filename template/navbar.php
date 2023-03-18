
<?php  if ($_SESSION['level']=="admin"){ ?>
    <link rel="stylesheet" href="css.css">
    <header class="header">
		<h1 class="logo"><a href="../../PembayaranSPP/dashboard.php">SPP-Kita</a></h1>
      <ul class="main-nav">
          <li><a href="../../PembayaranSPP/dashboard.php">HOME</a></li>
          <li><a href="../../PembayaranSPP/view/viewsiswa.php">SISWA</a></li>
          <li><a href="../../PembayaranSPP/view/viewpetugas.php">PETUGAS</a></li>
          <li><a href="../../PembayaranSPP/view/spp.php">SPP</a></li>
          <li><a href="../pebayaran/pbmyr.php">PEMBAYARAN</a></li>
          <li><a href="#">HISTORY</a></li>
          <li><a href="#">LAPORAN</a></li>
          <li><a href="../../PembayaranSPP/login/logoutf1.php">LOG OUT</a></li>
      </ul>
	</header> 
<?php }?>

<?php  if ($_SESSION['level']=="petugas"){
?>
    <link rel="stylesheet" href="css.css">
    <header class="header">
		<h1 class="logo"><a href="../../PembayaranSPP/dashboard.php">SPP-Kita</a></h1>
      <ul class="main-nav">
      <li><a href="../../PembayaranSPP/dashboard.php">HOME</a></li>
          <li><a href="../pebayaran/pbmyr.php">PEMBAYARAN</a></li>
          <li><a href="#">HISTORY</a></li>
          <li><a href="#">LAPORAN</a></li>
          <li><a href="../../PembayaranSPP/login/logoutf1.php">LOG OUT</a></li>
      </ul>
	</header> 
<?php }?>

<?php  if ($_SESSION['level']=="siswa"){
?>
    <header class="header">
		<h1 class="logo"><a href="../../PembayaranSPP/dashboard.php">SPP-Kita</a></h1>
      <ul class="main-nav">
          <li><a href="../../PembayaranSPP/dashboard.php">HOME</a></li>
          <li><a href="#">HISTORY</a></li>
          <li><a href="../../PembayaranSPP/login/logoutf1.php">LOG OUT</a></li>
      </ul>
	</header> 
<?php }?>