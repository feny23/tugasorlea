<?php
// session_start();
// if (!isset($_SESSION["login"])) {
// header("Location: loginadmin.php");
// exit;
// }
require 'functions.php';
$barang = query("SELECT pelanggan.nama_pel,barang.nama,barang.harga_jual,penjualan.jmlh,penjualan.total,penjualan.ket FROM penjualan JOIN pelanggan ON pelanggan.id_pelanggan=penjualan.id_pelanggan JOIN barang ON barang.id_barang=penjualan.id_barang");
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../style.css">
<head>
	<title>Halaman Admin</title>
</head>
<body class="body2">

	<!-- <a href="../logout.php">Logout|</a>
	<a href="buyer/buyer.php">Data pelanggan</a> -->
<div class="container">
	<div class="header">
	<ul>
		<li>
	<a href="../logout.php">Logout</a> </li>
	<li>
	<a href="index.php">Data barang</a> </li>
	<li>
	<a href="buyer/buyer.php">Data pelanggan</a> </li>
	<li>
	<a href="utang2.php">Data utang pelanggan</a>
    </li>
    </ul>
    <h1 class="judul">Data Transaksi</h1>
</div>
<div class="navigasi">
	<a href="transaksi.php" >Input transaksi penjualan</a>
	<a href="../index.php">Cetak data penjualan</a>
	</div>
	<div class="content">
	<table id="tabel" border="1" cellpadding="10" cellspacing="0" >
		<tr>
			<th>No.</th>
			<th>Nama Pelanggan</th>
			<th>Nama barang</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Total</th>
			<th>Keterangan</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach ($barang as $row ) :
		 ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $row["nama_pel"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["harga_jual"]; ?></td>
			<td><?= $row["jmlh"]; ?></td>
			<td><?= $row["total"]; ?></td>
			<td><?= $row["ket"]; ?></td>
			<!-- <td class="ubah">
<!-- <div class="ubah"> -->
			<!-- 	<a href="ubah.php?id=<?= $row["id"]; ?>"">Ubah</a>
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah anda yakin?');">Hapus</a> --> 
			<!-- </div> -->
			</td>		
		</tr>
		<?php $i++; ?>
		<?php endforeach;  ?>
	</table>
</div>
</body>
</html>
