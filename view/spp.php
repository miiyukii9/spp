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
    <title>Data SPP</title>
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
<h1 class="judul">Data SPP</h1>
<center>
<a class="btn-in" href="../insert/spp.php">Tambah Data</a>
    <div class="table">  
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Angkatan</th>
                        <th>Nominal</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $query = 'SELECT * FROM tb_tarif';
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_tarif'] . "</td>";
                        echo "<td>" . $row['angaktan'] . "</td>";
                        echo "<td>" . $row['nominal'] . "</td>";
                        echo "<td>" . $row['tipe'] . "</td>";
                        if (@$_SESSION ['level'] == 'admin'){
                        echo "<td> 
                        <a href='../update/spp.php?id_tarif=" . $row['id_tarif'] . "' class='btn-acc'>Update</a>
                        <a href='../delete/spp.php?id_tarif=" . $row['id_tarif'] . "' class='btn-warn' >Delete</a>";
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