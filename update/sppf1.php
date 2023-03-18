<?php 

    include '../connect.php';
    $id = ($_POST['id_tarif']);
    $usr = ($_POST['angkatan']);
    $nama = ($_POST['nominal']);
    $tlp = ($_POST['tipe']);

    $query = "UPDATE tb_tarif set id_tarif='$id',angaktan='$usr', nominal='$nama', tipe='$tlp' Where id_tarif= '$id'";

    $result = mysqli_query ($connect,$query);

    if (!$result){
        ("Query gagal dijalankan : ".mysqli_errno($connect).
            " - ". mysqli_error($connect));
    }else{
        echo "<script>
        alert('Data Berhasil Diubah!');
        location.href = '../view/spp.php';
        </script>";
    }
?>