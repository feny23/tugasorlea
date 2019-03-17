<?php
// session_start();
// if (!isset($_SESSION["login"])) {
// header("Location: loginadmin.php");
// exit;
// }
require 'functions.php';
$barang = query("SELECT * FROM barang");
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
	<a href="buyer/buyer.php">Data pelanggan</a>
	<li>
	<a href="datatransaksi.php">Data Transaksi</a> </li>
	<li>
	<a href="utang2.php">Data utang pelanggan</a>
    </li>

    </li>
    </ul>
    <h1 class="judul">Data Barang</h1>
</div>
<div class="navigasi">
	<a href="barang.php" >Input barang</a>
	</div>
	<div class="content">
	<table id="tabel" border="1" cellpadding="10" cellspacing="0" >
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Jenis</th>
			<th>Suplier</th>
			<th>Harga beli</th>
			<th>Harga jual</th>
			<th>Jumlah</th>
			<th>Aksi</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach ($barang as $row ) :
		 ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["jenis"]; ?></td>
			<td><?= $row["supply"]; ?></td>
			<td><?= $row["harga_beli"]; ?></td>
			<td><?= $row["harga_jual"]; ?></td>
			<td><?= $row["jumlah"]; ?></td>
			<td class="ubah">
<!-- <div class="ubah"> -->
				<a href="ubah.php?id=<?= $row["id_barang"]; ?>">Ubah</a>
				<a href="hapus.php?id=<?= $row["id_barang"]; ?>" onclick="return confirm('Apakah anda yakin?');">Hapus</a>
			<!-- </div> -->
			</td>		
		</tr>
		<?php $i++; ?>
		<?php endforeach;  ?>
	</table>
</div>
</body>
</html>
