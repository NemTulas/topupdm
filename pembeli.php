<?php
include 'konek.php';
if(isset($_GET['aksi'])){
    if($_GET['aksi']=="edit"){
        $query = "SELECT * FROM admin WHERE ID_PEMBELI='$_GET[ID_PEMBELI]'";
        $edit = mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_array($edit)){
            $id_pembeli = $data['id_pembeli'];
            $username = $data['username'];
            $password = $data['password'];
            $foto = $data['foto'];
        }
    }
}
$host = "localhost";
$user = "root";
$pass = "";
$db = "top_up_game";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
  die("tidak bisa terkoneksi ke database");
}
$nama_pembeli = "";
$username = "";
$email  = "";
$password ="";
$foto   ="";
$no_hp  ="";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == 'delete') {
  $id = $_GET['id'];
  $sql1 = "delete from pembeli where id_pembeli = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  if ($q1) {
    $sukses = "Berhasil hapus data";
  } else {
    $error = "Gagal melakukan delete data";
  }
}

if ($op == 'edit') {
  $id = $_GET['id'];
  $sql1 = "select * from pembeli where id_pembeli = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $nama_pembeli = $r1['nama_pembeli'];
  $username = $r1['username'];
  $email = $r1['email'];
  $password = $r1['password'];
  $ekstensi1 = array('png','jpg','jpeg');
  $x = explode('.','$foto');
  $ekstensi= strtolower(end($x));
  if(in_array($ekstensi,$ekstensi1) === true){
    move_uploaded_files($file_tmp.'img/'.$foto);
  }else{
    echo "<script>alert('Ekstensi diperbolehkan')</script>";
  }
  $no_hp    =$r1['no_hp'];

  if ($nama_pembeli == '') {
    $error = "Data tidak ditemukan";
  }
}
if (isset($_POST['simpan'])) { //untuk create
  $nama_pembeli = $_POST['nama_pembeli'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $foto   = $_FILES['foto']['name'];
  $ekstensi1 = array('png','jpg','jpeg');
  $x = explode('.','$foto');
  $ekstensi= strtolower(end($x));
  $file_tmp= $_FILES['foto']['tmp_name'];
  if(in_array($ekstensi,$ekstensi1) === true){
    move_uploaded_files($file_tmp.'img/'.$foto);
  }else{
    echo "<script>alert ('Ekstensi tidak diperbolehkan') </script>";
  }
  $no_hp    =$_POST['no_hp'];

  
  if ($nama_pembeli && $username && $email && $password && $foto && $no_hp) {
    if ($op == 'edit') { //untuk update
      $sql1 = "update pembeli set nama_pembeli = '$nama_pembeli', username = '$username', email = '$email', password = '$password',foto = '$foto', no_hp= '$no_hp' where id_pembeli = '$id'";
      $q1 = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Data berhasil diupdate";
      } else {
        $error = "Data gagal diupdate";
      }
    } else { //untuk insert
      $sql1 = "insert into pembeli(nama_pembeli,username,email,password,foto,no_hp) values ('$nama_pembeli','$username','$email','$password','$foto','$no_hp')";
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
  <title>Data Pembeli</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
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
    <div class="card">
      <div class="card-header">
        Create / edit data
      </div>
      <div class="card-body">
        <?php
        if ($error) {
          ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
          </div>
          <?php
          header("refresh:2;url=pembeli.php"); //5 : detik
        }
        ?>
        <?php
        if ($sukses) {
          ?>
          <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
          </div>
          <?php
          header("refresh:2;url=pembeli.php"); //5 : detik
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3 row">
            <label for="nib" class="col-sm-2 col-form-label">Nama Pembeli</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="<?php echo $nama_pembeli ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="stok" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="stok" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $foto ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nib" class="col-sm-2 col-form-label">No HP</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp ?>">
            </div>
            <div class="col-12">
              <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary">
            </div>
          </form>
          <!--untuk mengeluarkan data-->

        </div>
      </div>
      <div class="card">
        <div class="card-header text-white bg-secondary">
          Data Pembeli
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama_pembeli</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Foto</th>
                <th scope="col">No_hp</th>
                <th scope="col">Aksi</th>
              </tr>
            <tbody>
              <?php
                $sql2 = "select * from pembeli order by id_pembeli desc";
                $q2 = mysqli_query($koneksi, $sql2);
                $urut = 1;
                while ($r2 = mysqli_fetch_array($q2)) {
                  $id_pembeli = $r2['id_pembeli'];
                  $nama_pembeli = $r2['nama_pembeli'];
                  $username = $r2['username'];
                  $email = $r2['email'];
                  $password = $r2['password'];
                  $foto   =$r2['foto'];
                  $no_hp    = $r2['no_hp'];

                  ?>
              <tr>
                <td scope="row">
                  <?php echo $urut++ ?>
                </td>
                <td scope="row">
                  <?php echo $nama_pembeli ?>
                </td>
                <td scope="row">
                  <?php echo $username ?>
                </td>
                <td scope="row">
                  <?php echo $email ?>
                </td>
                <td scope="row">
                  <?php echo $password ?>
                </td>
                <td scope="row"><img src="img/<?=$foto?>" class="img_thumbnail" width="100px" height="100px">
                </td>
                <td scope="row">
                  <?php echo $no_hp ?>
                </td>
                <td scope="row">
                  <a href="pembeli.php?op=edit&id=<?php echo $id_pembeli ?>"><button type="button"
                      class="btn btn-warning">Edit</button></a>
                  <a href="pembeli.php?op=delete&id=<?php echo $id_pembeli ?>"> <button type="button" class="btn btn-danger"
                      onclick="return confirm('Yakin ingin delete data?')">Delete</button></a>
                </td>
              </tr>
              <?php
                }
                
                ?>
          </tbody>
          </thead>
        </table>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"></script>
</body>

</html>