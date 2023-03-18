<?php
    session_start();
    if (!isset($_SESSION['login'])){
        echo "<script>alert ('Anda Belum Login'); window.location='../login/login.php'</script>";
        exit;
    };
    require "../connect.php";

    if (isset ($_GET['nip'])){
        $id = $_GET['nip'];
        $query = "SELECT * From tb_petugas Where nip = '$id' ";
        $result = mysqli_query($connect,$query);
        // $row=mysqli_fetch_assoc($result);
      /*  $nm=$row['nama_siswa'];
        $idk=$row['jurusan'];
        $telp=$row['no_tlp'];
        $idt=$row['angaktan'];
        $pass=$row['l'];
        $lvl=$row['']; */

        if (!$result){
           ("Query Error : ".mysqli_errno($connect).
            " - ".mysqli_error($connect));
        }
        $data = mysqli_fetch_assoc($result);
        if (!count($data)){
            echo "<script>alert('Data tidak ditemukan pada database');windows.location='../view/viewsiswa.php';</script>";

        }else{
            echo "<script>alert('Masukan data ID. ');windows.location='../view/viewsiswa.php';</script>";
        }
    }

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
        <h1>Update Data Siswa <?php echo $data['nama_petugas']; ?></h1>
        <center>
        <form action="petugasf1.php" method="POST">
            <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                            <tr colspan='5'>
                                <h2>Masukan data Petugas</h2>
                            </tr>
                            <tr>
                                <td>NIP </td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="nis" value="<?php echo $data['nip'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td><input type="text" class="form-control"  name="username" value="<?php echo $data['username'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" class="form-control"  name="nama_petugas" value="<?php echo $data['nama_petugas'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Nomor Tlp</td>
                                <td>:</td>
                                <td><input type="number" class="form-control" name="no_tlp" value="<?php echo $data['no_tlp'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Level</td>
                                <td>:</td>
                                <td><select name="level" id="">
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="password" value="<?php echo $data['password'] ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="" align="right"><a href="../view/viewpetugas.php" class='btn-warn'>Back</a></td>
                                <td align="left"><button class='btn-acc' type="submit" name="tambah">Add data</button></td>
                            </tr>
            </table>
        </form>
        </center>
    </body>
</html>
