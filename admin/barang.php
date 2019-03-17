<?php 
session_start();
if (!isset($_SESSION["login"])) {
header("Location: loginadmin.php");
exit;
}
require 'functions.php';
//koneksi ke DBMS

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {
	//ambil tiap data dari tiap elemen dalam form
	if(tambah($_POST)>0) {
		echo "
		<script>
		alert('data berhasil ditambahkan');
		document.location.href = 'index.php';
		</script>
		";
	} else 
	{
		echo "
		<script>
		alert('data gagal ditambahkan');
		document.location.href = 'index.php';
		</script>
		";

	}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../style.css"> 
	<link rel="stylesheet" href="../style2.css">
	<title>Input Data Barang</title>
</head>
<body>
<a href="index.php">Back</a>
	<div class="container"> 
	<h1 class="judul" >Input Data Barang</h1>
	<div class="content"> 
		<div class="cont">
	<form action="" method="post">
		<div class="row">
			<div class="col-25">
		<label for="nama">Nama : </label>
	</div>
	<div class="col-75">
		<input type="text" name="nama" id="nama" required>
	</div>
</div>
		<div class="row">
			<div class="col-25">
		<label for="jenis">Jenis : </label> </div>
		<div class="col-75">
		<select id="jenis" name="jenis">
			<option value="makanan">Makanan</option>
			<option value="minuman">Minuman</option>
			<option value="rokok">Rokok</option>
			<option value="bahanpokok">Bahan pokok</option>
			<option value="lain">lain-lain</option>
		</select>
	</div>
</div>
<div class="row">
	<div class="col-25">
		<label for="supply">Suplier : </label> </div>
		<div class="col-75">
		<input type="text" name="supply" id="supply" required>
	</div>
</div>
<div class="row">
	<div class="col-25">
		<label for="harga_beli">Harga beli : </label> </div>
		<div class="col-75">
		<input type="text" name="harga_beli" id="harga_beli" required>
</div>
</div>
<div class="row">
	<div class="col-25">
		<label for="harga_jual">Harga jual</label> </div>
		<div class="col-75">
		<input type="text" name="harga_jual" id="harga_jual" required>
	</div>
</div>
<div class="row">
	<div class="col-25">
		<label for="jumlah">Jumlah : </label> </div>
		<div class="col-75">
		<input type="text" name="jumlah" id="jumlah" required>
	</div>
</div>
		<div class="row">
		<button type="submit" name="submit" >Input</button>
		<button type="reset" name="reset" >Reset</button> 
	</div>
	</form>
</div>
</body>
</html>