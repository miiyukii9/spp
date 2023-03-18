<?php 
    include '../connect.php';

    $id = $_GET['nip'];
     $query = "DELETE from tb_petugas where nip = '$id' ";
     $result = mysqli_query($connect,$query);
     if(!$result){
         ("Gagal menghapus data : " .mysqli_errno($connect). " - " .mysqli_error($connect));
     }else{
         echo "<script>alert ('Data Berhasil Dihapus.'); window.location='../view/viewpetugas.php';</script> ";
     }

?>