<?php 
    include '../connect.php';

    $id = $_GET['nis'];
     $query = "DELETE from tb_siswa where nis = '$id' ";
     $result = mysqli_query($connect,$query);
     if(!$result){
         ("Gagal menghapus data : " .mysqli_errno($connect). " - " .mysqli_error($connect));
     }else{
         echo "<script>alert ('Data Berhasil Dihapus.'); window.location='../view/viewsiswa.php';</script> ";
     }

?>