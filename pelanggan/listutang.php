<?php
session_start();
/*if (!isset($_SESSION["login"])) {
header("Location: login.php");
exit;
}*/
require '../admin/functions.php';
$user = $_SESSION['login'];
// echo $user;
$utang = query("SELECT penjualan.tanggal,pelanggan.nama_pel,barang.nama,barang.harga_jual,penjualan.jmlh,penjualan.total FROM penjualan JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan JOIN barang ON barang.id_barang=penjualan.id_barang WHERE penjualan.ket='Utang'");
 
?> 

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../style.css">
<head>
	<title>Halaman Pelanggan</title>
</head>
<body class="body2">
	<div class="container">
	<div class="header">
<ul>
<li>
	<a href="../logout.php">Logout</a> </li>
	<li>
	<a href="listbarang.php">Cek Barang</a> </li>
</ul>
	<h1 class="judul">Data Utang</h1>
	<div class="content">
	<table id="tabel" border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Tanggal</th>
			<th>Nama</th>
			<th>Barang</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Total utang</th>
		
		</tr>

		<?php $i = 1; ?>
		<?php foreach ($utang as $row ) :
		 ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $row["tanggal"]; ?></td>
			<td><?= $row["nama_pel"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["harga_jual"]; ?></td>
			<td><?= $row["jmlh"]; ?></td>
			<td><?= $row["total"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?> 
	</table>
</div>
</body>
</html>
