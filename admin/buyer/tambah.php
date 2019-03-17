<?php
session_start();
if (!isset($_SESSION["login"])) {
header("Location: loginadmin.php");
exit;
}
require '../functions.php';
//koneksi ke DBMS

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {
	//ambil tiap data dari tiap elemen dalam form
	if(tambahuser($_POST)>0) {
		echo "
		<script>
		alert('data berhasil ditambahkan');
		document.location.href = 'buyer.php';
		</script>
		";
	} else 
	{
		echo "
		<script>
		alert('data gagal ditambahkan');
		document.location.href = 'buyer.php';
		</script>
		";

	}
	}
?>

<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="../../style.css"> 
	<link rel="stylesheet" href="../../style2.css">
	<title>Data Pelanggan</title>
</head>
<body>
	<div class="container"> 
	<h1 class="judul">Input Data Pelanggan</h1>
	<div class="content"> 
		<div class="cont">
	<form action="" method="post">
		<!-- <div class="row">
		<div class="col-25">
		<label for="id">ID pelanggan</label> </div>
		<div class="col-75">
		<input type="text" name="id" id="id" required>
	</div>
</div>	 -->
<div class="row">
			<div class="col-25">
		<label for="nama">Nama</label> </div>
		<div class="col-75">
		<input type="text" name="nama" id="nama" required>
	</div>
</div>
<div class="row">
<div class="col-25">
<label for="jk">Jenis Kelamin</label> </div>
<div class="col-75">
<select id="Jenis" name="jk">
<option>Perempuan</option>
<option>Laki-laki</option>				
</select>
</div>
</div>
<div class="row">
	<div class="col-25">
		<label for="umur">Umur</label> </div>
		<div class="col-75">
		<input type="text" name="umur" id="umur" required>
	</div>
</div>
<div class="row">
			<div class="col-25">
		<label for="hp">Nomor hp</label> </div>
		<div class="col-75">
		<input type="text" name="hp" id="hp" required>
	</div>
</div>
<div class="row">
			<div class="col-25">
		<label for="alamat">Alamat</label> </div>
		<div class="col-75">
		<input type="text" name="alamat" id="alamat" >
	</div>
</div>
<div class="row">
		<button type="submit" name="submit">Input</button>
		<button type="reset" name="reset">Reset</button>
</div>
	</form>
</div>
</body>
</html>