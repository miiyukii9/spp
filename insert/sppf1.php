<?php
require '../connect.php';

// fungsi tambah obat
$usr = ($_POST['angkatan']);
$nmp = ($_POST['nominal']);
$tlp = ($_POST['tipe']);



$query = "INSERT INTO tb_tarif(id_tarif,angaktan,nominal,tipe) VALUES ('', '$usr', '$nmp', '$tlp')";

$result = mysqli_query($connect, $query);   
if (!$result) {
    ("Gagal memasukan data!" . mysqli_error($connect));
} else {
    echo "<script>
    alert('Data berhasil ditambahkan!');
    document.location.href = '../view/spp.php';
    </script>";
}
