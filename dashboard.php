<?php 
session_start();
require "connect.php";
if (!isset($_SESSION['login'])){
    echo "<script>alert ('Anda Belum Login'); window.location='./login/login.php'</script>";
    exit;
};
if(@$_SESSION['level'] == 'siswa'){
    $id = $_SESSION['username'];
    $aku = mysqli_query($connect,"SELECT * from tb_siswa where nis='$id'");
    $nama = mysqli_fetch_assoc($aku);
} else {
    $id_petugas = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css.css" >
    <link rel="stylesheet" href="/assets/style/scss/style.css">
    <title>Dashboard</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .hero-image {
            background-image: linear-gradient(rgba(8, 49, 119, 0.3), rgba(0, 0, 0, 0.5)), url("img/back.jpg");
            height: 91%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            /* margin-top: -34px; */
        }
        .hero-text button:hover {
            background-color: #555;
            color: white;
        }
        .hero-text  {
            text-align: left;
            position: absolute;
            padding-left: 20rem;
            top: 50%;
            left: 30%;
            transform: translate(-50%, -50%);
            color: white;
            font-family: Montserrat, Helvetica, sans-serif ;
            flex-direction: column;
            display: flex;
        }   
            .hero-sub-text{
            font-size: 20px; 
            /* display: flex; */
            top: 85%;
            padding-left: 20rem;
            left: 24%;
            transform: translate(-50%, -50%);
            flex-direction: column;
            position: absolute;
        }

        @media only screen and (max-width: 1200px)   {
            body {
                font-size: 15px;
            }
            .hero-text  {
            text-align: center;
            position: absolute;
            top: 40%;
            left: 40%;
            /* transform: translate(-50%, -50%); */
            color: white;
            font-family: Montserrat, Helvetica, sans-serif ;
            flex-direction: column;
            display: flex;
            }
            .hero-sub-text{
            font-size: 20px; 
            /* display: flex; */
            top: 90%;
            left: 50%;
            transform: translate(-50%, -50%);
            flex-direction: column;
            position: absolute;
            text-align: center;
            }

            
        }


    </style>
</head>
<body class="background">
   <?php 
   include "template/navbar.php";
   ?>
    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size: 90px;">Selamat Datang 
            <?php
            if(@$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas'){
             echo $id_petugas;
            } else {
             echo $nama['nama_siswa'];
            }
             ?>
             </h1>
            <p class="hero-sub-text">Website Pembayaran SPP</p>
        </div>
    </div>
    <div>
        <div></div>
    </div>
</body>
</html>