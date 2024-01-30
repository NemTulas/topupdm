<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>
 
	<center>
		<?php 
		include 'koneksi.php';
		?>
 
		<table border="1">
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Harga</th>
			</tr>
			<?php 
			$no = 1;
			$sql = mysqli_query($koneksi,"select * from barang");
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['harga']; ?></td>
			</tr>
			<?php 
			}
			?>
		</table>
 
		<br/>
 
		<a href="cetak3.php" target="_blank">CETAK</a>
 
 
	</center>
</body>
</html>



