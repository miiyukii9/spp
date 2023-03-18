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
        <form action="siswaf1.php" method="POST">
            <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                            <tr colspan='5'>
                                <h2>Masukan data Siswa</h2>
                            </tr>
                            <tr>
                                <td>NIS </td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="nis" readonly></td>
                            </tr>
                            <tr>
                                <td>Nama Siswa</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="nama"></td>
                            </tr>
                            
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td><select name="jurusan">
                                    <option value=""></option>
                                        <?php 
                                        $query = "SELECT * FROM tb_kelas";
                                        $result = $connect -> query($query);
                                        if($result->num_rows> 0){
                                            while($optionData=$result->fetch_assoc()){
                                            $option =$optionData['jurusan'];
                                            $optid = $optionData['id_kelas'];
                                        ?>
                                    <option value="<?php echo $optid ?>" selected><?php echo $option; ?> </option>
                                        <?php 
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Tlp</td>
                                <td>:</td>
                                <td><input type="number" class="form-control" name="no_tlp"></td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>:</td>
                                <td><select name="angaktan">
                                        <?php 
                                        $query = "SELECT * FROM tb_tarif";
                                        $result =  mysqli_query($connect, $query);
                                            while($optionData=mysqli_fetch_assoc($result)){
                                            $option =$optionData['angaktan'];
                                            $optid = $optionData['id_tarif'];
                                        ?>
                                    <option value="<?php echo $optionData['id_tarif']; ?>"><?php echo $option; ?></option>
                                        <?php 
                                            }

                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="password"></td>
                            </tr>
                            <tr>
                                <td>Level</td>
                                <td>:</td>
                                <td><input type="text" name="level" value="siswa" readonly></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="" align="right"><a href="../view/viewsiswa.php" class='btn-warn'>Back</a></td>
                                <td align="left"><button class='btn-acc' type="submit" name="tambah">Add data</button></td>
                            </tr>
            </table>
        </form>
    </center>

</body>

</html>