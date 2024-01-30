<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Checkout Form</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
<script src="assets/jquery/dist/jquery.min.js"></script>
<link rel="stylesheet" href="css/style2.css" /><link rel="stylesheet" href="./style.css">

</head>
<body>

<div class="game">
  <h1>1. Masukkan User Id</h1>
  <div>
  <tr>
    <td>id user:</td>
    <td><input type="text" name="id_pemain" placeholder="Masukkan id user"></td>
  </tr>
  </div>
</div>
<div class="dm">
  <h1>2. Pilih Nominal</h1>
  <img src="./img/Diamond1.jpg" width="100" height="100" onclick=”Function()” alt="">

  <img src="./img/Diamond2.jpg" width="100" height="100"  alt="">
  <img src="./img/Diamond3.jpg" width="100" height="100"  alt="">
  <img src="./img/Diamond4.jpg" width="100" height="100"  alt="">
 <br>
 <img src="./img/Diamond5.jpg" width="100" height="100"  alt="">
 <img src="./img/Diamond6.jpg" width="100" height="100"  alt="">
 <img src="./img/Diamond7.jpg" width="100" height="100"  alt="">
 <img src="./img/Diamond8.jpg" width="100" height="100"  alt="">
 <br>
 <img src="./img/Diamond9.jpg" width="100" height="100"  alt="">
 <img src="./img/Diamond10.jpg" width="100" height="100"  alt="">
 <img src="./img/Diamond11.jpg" width="100" height="100"  alt="">
 <img src="./img/Diamond12.jpg" width="100" height="100"  alt="">
 <br>
 <img src="./img/Diamond13.jpg" width="100" height="100"  alt="">
 <img src="./img/Diamond14.jpg" width="100" height="100"  alt="">
 <img src="./img/Diamond15.jpg"  width="100" height="100" alt="">

 <div>
  <h1>3. Pembayaran</h1>
  <?php
include "konek.php";
if(isset($_POST['beli'])){
    $nama_game = $_POST['nama_game'];
    $nama = $_POST['nama'];
    $harga =$_POST['harga'];
    $queryy = mysqli_query($koneksi, "select * from barang where nama_game='$nama_game'");
    $cek_login = mysqli_num_rows($queryy);

    if($cek_barang > 0){
        echo "<script>
        alert('username telah digunakan');
        window.location = 'checkout.php';
        </script>";
    }else{
        if ($pw != $pw2){
            echo"<script>
            alert('konfirmasi password tidak sesuai');
            window.localtion = 'ff.php';
            </script>";
        }else{
            mysqli_query($koneksi,"INSERT INTO barang VALUE('$id','$nama_game','$nama','$harga')")
; echo "<script>
alert('data berhasil dikirim');
window.location = 'web.php';
</script>";
        }
    }
}
?>
    <div class="registration form">
            <form action="checkout.php" method="post">
                <input type="text" placeholder="Nama game" name="nama_game">
                <input type="text" placeholder="Nama" name="nama">
                <input type="text" placeholder="Masukan harga" name="harga">
                <input type="submit" value="Beli" name="beli" class="submit">
            </form>
    </div>
  <script  src="./script.js"></script>

</body>
</html>
