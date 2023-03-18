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
    <title>Data Petugas</title>
    <style>
        .bg3{
            background-color: #F2F7FF;
            
        }

        .judul {
           /* Heading */
            margin-left: -2px;
       text-align: center;
        color: #10316B;
        margin-left: -2px;
       font-size: 72px;
        font-family: montserrat,serif;
        font-weight: bolder;
        padding-top: 40px;

        }
        
    </style>
</head>
<body class="bg3" >
    <?php 
    require '../template/navbar.php'; 
    // var_dump($_SESSION['level']);
    // die;
    ?>
<h1 class="judul">Data Petugas</h1>

<center>
<a class="btn-in" href="../insert/petugas.php">Tambah Data</a>

    <div class="table">
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama Petugas</th>
                        <th>No Telp.</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $query = 'SELECT * FROM tb_petugas';
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nip'] . "</td>";
                        echo "<td>" . $row['nama_petugas'] . "</td>";
                        echo "<td>" . $row['no_tlp'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['level'] . "</td>";
                        echo "<td> 
                        <a href='../update/petugas.php?nip=" . $row['nip'] . "' class='btn-acc'>Update</a>
                        <a href='../delete/petugas.php?nip=" . $row['nip'] . "' class='btn-warn' >Delete</a>";
                        echo "</tr>";
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