<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "top_up_game";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
  die("tidak bisa terkoneksi ke database");
}
$id = "";
$tanggal = "";
$nama = "";
$harga = "";
$foto = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}
?>