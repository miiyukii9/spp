<?php
    session_start();
    require "../connect.php";
    if (!isset($_SESSION['login'])){
        echo "<script>alert ('Anda Belum Login'); window.location='../login/login.php'</script>";
        exit;
    };

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/scss/btn.css">
    <link rel="stylesheet" href="../template/css.css">
    <title>Tambah Data Obat</title>
    <style>
    .bg3{
            background-color: #F2F7FF;
            
        }
</style>
</head>

<body class="bg3">

    <?php include '../template/navbar.php' ?>
    <center>
        <form action="sppf1.php" method="POST">
            <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                            <tr colspan='5'>
                                <h2>Masukan data Angaktan</h2>
                            </tr>
                            <tr>
                                <td>ID Tarif </td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="id" readonly></td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="angkatan"></td>
                            </tr>
                            <tr>
                                <td>Nominal</td>
                                <td>:</td>
                                <td><input type="number" class="form-control" name="nominal"></td>
                            </tr>
                            <tr>
                                <td>Tipe</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="tipe"></td>
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