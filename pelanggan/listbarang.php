<?php
session_start();
/*if (!isset($_SESSION["login"])) {
header("Location: login.php");
exit;
}*/
require '../admin/functions.php';

$barang = query("SELECT nama,jenis,harga_jual,jumlah FROM barang"); 
// $brg = query("SELECT jmlh FROM penjualan");
// $brg2=$data["jmlh"];
// $brg3=$data["jumlah"];
// $brg4=$brg2=$brg3-$brg2;

// $query = "UPDATE barang SET jumlah='$brg4'";
?> 

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../style.css">
<head>
<head>
	<title>Halaman Pelanggan</title>
</head>
<body class="body2" >
	<div class="container">
	<div class="header">
		<ul>
			<li>
	<a href="../logout.php">Logout</a> </li>
	<li>
	<a href="loginpelanggan.php">Cek Hutang</a> </li>
</ul>
	<h1 class="judul">Data Barang</h1>
</div>
<div class="content">
	<table id="tabel" border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Jenis</th>
			<th>Harga</th>
			<th>Jumlah</th>
		
		</tr>

		<?php $i = 1; ?>
		<?php foreach ($barang as $row ) :
		 ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["jenis"]; ?></td>
			<td><?= $row["harga_jual"]; ?></td>
			<td><?= $row["jumlah"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?> 
	</table>
</div>
</div>
</body>
</html>
