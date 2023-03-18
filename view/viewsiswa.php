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
    <link rel="stylesheet" href="../assets/style/scss/style.css">
    <link rel="stylesheet" href="../template/css.css">
    <link rel="stylesheet" href="/assets/style/css/table.css">
    <title>Data Siswa</title>
    <style>
         

        .judul {
           /* Heading */
            margin-left: -2px;
       text-align: center;
       font-size: 72px;
        color: #10316B;
        font-family: montserrat,serif;
        font-weight: bolder;
        padding-top: 40px;

        }

        .bg3{
            background-color: #F2F7FF;
            
        }
        
        
    </style>
</head>
<body class="bg3" >
    <?php 
    require '../template/navbar.php';
    // var_dump($_SESSION['level']);
    // die;
    ?>
<h1 class="judul">Data Siswa</h1>
<center>
<a class="btn-in" href="../insert/siswa.php">Tambah Data</a>
    <div class="table">  
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama siswa</th>
                        <th>Kelas</th>
                        <th>Nomor Telp.</th>
                        <th>Angkatan</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $query = 'SELECT * FROM tb_siswa inner join tb_kelas on tb_siswa.id_kelas = tb_kelas.id_kelas inner join tb_tarif on tb_siswa.id_tarif = tb_tarif.id_tarif';
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nis'] . "</td>";
                        echo "<td>" . $row['nama_siswa'] . "</td>";
                        echo "<td>" . $row['jurusan'] . "</td>";
                        echo "<td>" . $row['no_tlp'] . "</td>";
                        echo "<td>" . $row['angaktan'] . "</td>";
                        echo "<td>" . $row['level'] . "</td>";
                        if (@$_SESSION ['level'] == 'admin'){
                        echo "<td> 
                        <a href='../update/siswaup.php?nis=" . $row['nis'] . "' class='btn-acc'>Update</a>
                        <a href='../delete/siswa.php?nis=" . $row['nis'] . "' class='btn-warn' >Delete</a>";
                        echo "</tr>";
                        } else {
                            echo "<td> No Permission";
                            echo "<td>";
                        }
                        }

                    error_reporting();
                    ?>
                    </tr>

                <tbody>
            </table>
        </div>
    </div>
</center>
</body>
</html>