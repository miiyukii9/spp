<?php 

    include '../connect.php';
    $nis = ($_POST['nis']);
    $nama = ($_POST['nama_siswa']);
    $jurusan = ($_POST['jurusan']);
    $tlp = ($_POST['no_tlp']);
    $angkatan = ($_POST['angaktan']);
    $password = ($_POST['password']);
    $level = ($_POST['level']);
    $query = "UPDATE tb_siswa set nis='$nis', nama_siswa='$nama', id_kelas='$jurusan', no_tlp='$tlp', id_tarif='$angkatan', password='$password' Where nis= '$nis'";

    $result = mysqli_query ($connect,$query);

    if (!$result){
        ("Query gagal dijalankan : ".mysqli_errno($connect).
            " - ". mysqli_error($connect));
    }else{
        echo "<script>
        alert('Data Berhasil Diubah!');
        location.href = '../view/viewsiswa.php';
        </script>";
    }
?>