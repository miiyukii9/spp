<?php
    session_start();
    if (!isset($_SESSION['login'])){
        echo "<script>alert ('Anda Belum Login'); window.location='../login/login.php'</script>";
        exit;
    };
    require "../connect.php";

        $id = $_GET['id_tarif'];
        $query = "SELECT * From tb_tarif Where id_tarif = '$id'";
        $result = mysqli_query($connect,$query);
        $data = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../template/css.css">
<style>
    .bg3{
            background-color: #F2F7FF;
            
        }
</style>
    <title>Update Data</title>
    </head>

    <body class="bg3">
        <?php require '../template/navbar.php'; ?>
        <center>
        <h1>Update Data Angkatan </h1>
        <center>
        <form action="sppf1.php" method="POST">
            <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                            <tr colspan='5'>
                                <h2>Masukan data Tarif</h2>
                            </tr>
                            <tr>
                                <td>ID Tarif</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="id_tarif" value="<?php echo $data['id_tarif'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>:</td>
                                <td><input type="text" class="form-control"  name="angkatan" value="<?php echo $data['angaktan'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Nominal</td>
                                <td>:</td>
                                <td><input type="number" class="form-control"  name="nominal" value="<?php echo $data['nominal'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Tipe</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="tipe" value="<?php echo $data['tipe'] ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="" align="right"><a href="../view/spp.php" class='btn-warn'>Back</a></td>
                                <td align="left"><button class='btn-acc' type="submit" name="tambah">Add data</button></td>
                            </tr>
            </table>
        </form>
        </center>
    </body>
</html>
