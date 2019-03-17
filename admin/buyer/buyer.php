<?php
session_start();
if (!isset($_SESSION["login"])) {
header("Location: loginadmin.php");
exit;
}
require '../functions.php';
$pelanggan = query("SELECT * FROM pelanggan");
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../../style.css">
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<div class="container">
	<div class="header">
	<ul>
		<li>
	<a href="../../logout.php">Logout</a></li>
	<li>
		<a href="../index.php">Data Barang</a> </li>
	<li>
	<a href="../datatransaksi.php">Data Transaksi</a> </li>
	<li>
	<a href="../utang2.php">Data utang pelanggan</a>
    </li>
    </ul>
	<h1 class="">Data pelanggan</h1>
</div>
<div class="navigasi">
	<a class="barang" href="tambah.php">Input pelanggan</a> </div>
	<div class="content">

	<table id="tabel" border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Umur</th>
			<th>No.Hp</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach ($pelanggan as $row ) :
		 ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $row["nama_pel"]; ?></td>
			<td><?= $row["jk"]; ?></td>
			<td><?= $row["umur"]; ?></td>
			<td><?= $row["no_hp"]; ?></td>
			<td><?= $row["alamat"]; ?></td>
			<td class="ubah">
				<a href="ubah.php?id=<?= $row["id_pelanggan"]; ?>"">Ubah</a>
				<a href="hapus.php?id=<?= $row["id_pelanggan"]; ?>" onclick="return confirm('Apakah anda yakin?');">Hapus</a>
			</td>		
		</tr>
		<?php $i++; ?>
		<?php endforeach;  ?>
	</table>
</div>

</body>
</html>
