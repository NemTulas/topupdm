<?php
include "konek.php";
session_start();
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username!="" && $password!="") {
        $mysql=mysqli_query($koneksi, "SELECT * FROM pembeli WHERE username='$username' and password='$password'");
        if($data = mysqli_fetch_array($mysql)){
            $_SESSION['username']=$data['username'];
            $_SESSION['password']=$data['password'];
            header('location:index.php');
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
                <span class"glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <?php $error="";?> username atau password salah
            </div><?php
        }
    }
}
if(isset($_POST['daftar'])){
    $nama_pembeli = $_POST['nama_pembeli'];
    $username = $_POST['username'];
    $email =$_POST['email'];
    $password = $_POST['password'];
    $queryy = mysqli_query($koneksi, "select * from pembeli where username='$username'");
    $cek_login = mysqli_num_rows($queryy);

    if($cek_login > 0){
        echo "<script>
        alert('username telah digunakan');
        window.location = 'index.php';
        </script>";
    }else{
        if ($pw != $pw2){
            echo"<script>
            alert('konfirmasi password tidak sesuai');
            window.localtion = 'daftar.php';
            </script>";
        }else{
            mysqli_query($koneksi,"INSERT INTO pembeli VALUE('$id_pembeli','$nama_pembeli','$username','$email','$password')")
; echo "<script>
alert('data berhasil dikirim');
window.location = 'web.php';
</script>";
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