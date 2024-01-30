<?php
include "konek.php";
session_start();
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username!="" && $password!="") {
        $mysql=mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' and password='$password'");
        if($data = mysqli_fetch_array($mysql)){
            $_SESSION['username']=$data['username'];
            $_SESSION['password']=$data['password'];
            header('location:admin.php');
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
                <span class"glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <?php $error="";?> username atau password salah
            </div><?php
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Atau Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
         <header>Login to YasStore</header>
         <form action="daftar.php" method="post">
            <input type="text" placeholder="username" name="username">
            <input type="password" placeholder="Masukan password" name="password">
            <a href="#">Lupa password?</a>
            <input type="submit" value="login" name="login" class="submit">
         </form>
         <div class="signup">
            <span class="signup">Belum punya akun?
            <label for="check">Daftar</label>
            </span>
         </div>
    </div>
    <div class="registration form">
        <header>Form Register</header>
            <form action="daftar.php" method="post">
                <input type="text" placeholder="Nama lengkap" name="nama_pengguna">
                <input type="text" placeholder="Username" name="username">
                <input type="email" placeholder="Masukan email" name="email">
                <input type="password" placeholder="Masukan password" name="password">
                <input type="submit" value="daftar" name="daftar" class="submit">
            </form>
            <div class="signup">
                <span class="signup">Sudah punya akun?
                    <label for="check">Login</label>
                </span>
            </div>
    </div>
</div>
</body>
</html>