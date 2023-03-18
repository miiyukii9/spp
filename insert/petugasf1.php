<?php
require '../connect.php';

// fungsi tambah obat
$usr = ($_POST['username']);
$nmp = ($_POST['nama_petugas']);
$tlp = ($_POST['no_tlp']);
$pass = ($_POST['password']);
$level = ($_POST['level']);


$query = "INSERT INTO tb_petugas(nip,username,nama_petugas,no_tlp,password,level) VALUES ('', '$usr', '$nmp', '$tlp', '$pass', '$level')";

$result = mysqli_query($connect, $query);   
if (!$result) {
    ("Gagal memasukan data!" . mysqli_error($connect));
} else {
    echo "<script>
    alert('Data berhasil ditambahkan!');
    document.location.href = '../view/viewpetugas.php';
    </script>";
}
