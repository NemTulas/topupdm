<?php
include 'konek.php';
$host = "localhost";
$user = "root";
$pass = "";
$db = "top_up_game";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
  die("tidak bisa terkoneksi ke database");
}
$foto   ="";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == 'delete') {
  $id = $_GET['id'];
  $sql1 = "delete from barang where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  if ($q1) {
    $sukses = "Berhasil hapus data";
  } else {
    $error = "Gagal melakukan delete data";
  }
}

if ($op == 'edit') {
  $id = $_GET['id'];
  $sql1 = "select * from barang where id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $ekstensi1 = array('png','jpg','jpeg');
  $x = explode('.','$foto');
  $ekstensi= strtolower(end($x));
  if(in_array($ekstensi,$ekstensi1) === true){
    move_uploaded_files($file_tmp.'img/'.$foto);
  }else{
    echo "<script>alert('Ekstensi diperbolehkan')</script>";
  }

  if ($nama_game == '') {
    $error = "Data tidak ditemukan";
  }
  

}
if (isset($_POST['simpan'])) { //untuk create
  $foto   = $_FILES['foto']['name'];
  $ekstensi1 = array('png','jpg','jpeg');
  $x = explode('.','$foto');
  $ekstensi= strtolower(end($x));
  $file_tmp= $_FILES['foto']['tmp_name'];
  if(in_array($ekstensi,$ekstensi1) === true){
    move_uploaded_files($file_tmp.'img/'.$foto);
  mysqli_query($koneksi);
		header("location:ml.php?alert=berhasil");
    }else{
    echo "<script>alert ('Ekstensni diperbolehkan') </script>";
  }
  if(!in_array($ekstensi,$ekstensi1) ) {
	header("location:index.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'img/'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'img/'.$foto);
	}else{
		header("location:index.php?alert=gagak_ukuran");
	}
}

  if ($foto) {
    if ($op == 'edit') { //untuk update
      $sql1 = "update barang set foto = '$foto' where id = '$id'";
      $q1 = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Data berhasil diupdate";
      } else {
        $error = "Data gagal diupdate";
      }
    } else { //untuk insert
      $sql1 = "insert into barang(foto) values ('$foto')";
      $q1 = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Berhasil memasukkan data baru";
      } else {
        $error = "Gagal memasukkan data";
      }
    }
  } else {
    $error = "Silahkan masukkan semua data";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <style>
    .mx-auto {
      width: 800px;
    }

    .card {
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <div class="mx-auto">
    <?php
    
    ?>
    <!----untuk memasukan data---->
        <?php
        if ($error) {
          ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
          </div>
          <?php
          header("refresh:2;url=barang.php"); //5 : detik
        }
        ?>
        <?php
        if ($sukses) {
          ?>
          <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
          </div>
          <?php
          header("refresh:2;url=barang.php"); //5 : detik
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3 row">
            <label for="stok" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $foto ?>">
            </div>
          </div>
            <div class="col-12">
              <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary">
            </div>
          </form>
          <!--untuk mengeluarkan data-->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Foto</th>
              </tr>
            <tbody>
              <?php
                $sql2 = "select * from barang order by id desc";
                $q2 = mysqli_query($koneksi, $sql2);
                $urut = 1;
                while ($r2 = mysqli_fetch_array($q2)) {
                  $foto   =$r2['foto'];

                  ?>
                <td scope="row"><img src="img/<?=$foto?>" class="img_thumbnail" width="100px" height="100px">
                </td>
              <?php
                }
                
                ?>
          </tbody>
          </thead>
        </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"></script>
</body>

</html>