<!-- 
// session_start();
// // session_destroy();
// include("../../connect.php");    

// if(@$_POST['username']){
// $nis = $_SESSION['username'];
// $siswa = mysqli_query($connect, "SELECT nis from tb_siswa where nis='$nis");

// if (mysqli_num_rows($siswa)>0){
//  echo "<script>alert('Your're registered as STUDENT');location.href='../../dashboard.php'</script>";
// } elseif ($_SESSION['level'] == 'petugas') {
//     echo "<script>alert('Your're registered as EMPLOYEE');location.href='../../dashboard.php'</script>";
// } elseif(!isset ($_SESSION['username'])){
//     echo "<script>alert('You Havent login yet');location.href='login.php'</script>";
// }
// }
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
<link rel="stylesheet" href="../assets/style/scss/style.css">
</head>
<body class="bg.body">
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="loginf1.php" method="POST">
        <h3>SPP-Kita</h3>
        <br>
        <center>
        <h5>Login here</h5>
        </center>
        <label for="username">NIS or Username</label>
        <input type="text" name="username" placeholder="NIS or Username" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password">

        <button>Log In</button>
    </form>
</body> 
</html>
