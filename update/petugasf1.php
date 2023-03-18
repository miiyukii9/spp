<?php 

    include '../connect.php';
    $nip = ($_POST['nip']);
    $usr = ($_POST['username']);
    $nama = ($_POST['nama_petugas']);
    $tlp = ($_POST['no_tlp']);
    $level = ($_POST['level']);
    $password = ($_POST['password']);

    $query = "UPDATE tb_petugas set nip='$nip',username='$usr', nama_petugas='$nama', no_tlp='$tlp', level='$level', password='$password' Where nip= '$nip'";

    $result = mysqli_query ($connect,$query);

    if (!$result){
        ("Query gagal dijalankan : ".mysqli_errno($connect).
            " - ". mysqli_error($connect));
    }else{
        echo "<script>
        alert('Data Berhasil Diubah!');
        location.href = '../view/viewpetugas.php';
        </script>";
    }
?>