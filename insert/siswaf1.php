<?php
require '../connect.php';

// fungsi tambah obat
$nama = ($_POST['nama']);
$jurusan = ($_POST['jurusan']);
$tlp = ($_POST['no_tlp']);
$angkatan = ($_POST['angaktan']);
$password = ($_POST['password']);
$level = ($_POST['level']);

echo $angkatan;

$query = "INSERT INTO tb_siswa(nis,nama_siswa,id_kelas,no_tlp,id_tarif,password,level) VALUES ('', '$nama', '$jurusan', '$tlp', '$angkatan', '$password', '$level')";

$result = mysqli_query($connect, $query);   
if (!$result) {
    ("Gagal memasukan data!" . mysqli_error($connect));
} else {
    echo "<script>
    alert('Data berhasil ditambahkan!');
    document.location.href = '../view/viewsiswa.php';
    </script>";
}
