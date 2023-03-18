<?php 
session_start();
include("../connect.php");

$username = $_POST['username'];
$pass = $_POST['password'];

$qadmin = mysqli_query( $connect, "SELECT * from tb_petugas Where username='$username' and password = '$pass' and level = 'admin'") or die(mysqli_error($connect));

$qpetugas = mysqli_query( $connect, "SELECT * from tb_petugas Where username='$username' and password = '$pass' and level = 'petugas'") or die(mysqli_error($connect));

$qsiswa = mysqli_query( $connect, "SELECT * from tb_siswa Where nis='$username' and password = '$pass' and level = 'siswa' ") or die(mysqli_error($connect));

if (mysqli_num_rows($qadmin) > 0) {
    $data = mysqli_fetch_assoc($qadmin);
    $_SESSION['nip'] = $data['nip'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['login']= true;
    echo " <script>alert('Successfully login as ADMIN'); window.location='../dashboard.php';</script>";
} elseif (mysqli_num_rows($qpetugas) > 0){
    $data = mysqli_fetch_assoc($qpetugas);
    $_SESSION['nip'] = $data['nip'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['login']= true;
    echo " <script>alert('Successfully login as EMPLOYEE '); window.location='../dashboard.php';</script>";
} elseif(mysqli_num_rows($qsiswa) > 0){
    $data = mysqli_fetch_assoc($qsiswa);
    $_SESSION['nis'] = $data['nis'];
    $_SESSION['username'] = $data['nis'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['login'] = true;
    echo " <script>alert('Successfully login as STUDENT'); window.location='../dashboard.php';</script>";
} else {
    echo " <script>alert('Incorrect Password or Username'); window.location='login.php';</script>";
}

?>