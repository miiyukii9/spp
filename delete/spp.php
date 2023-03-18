<?php 
    include '../connect.php';

    $id = $_GET['id_tarif'];
     $query = "DELETE from tb_tarif where id_tarif = '$id' ";
     $result = mysqli_query($connect,$query);
     if(!$result){
         ("Gagal menghapus data : " .mysqli_errno($connect). " - " .mysqli_error($connect));
     }else{
         echo "<script>alert ('Data Berhasil Dihapus.'); window.location='../view/spp.php';</script> ";
     }

?>