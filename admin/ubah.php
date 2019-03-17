<?php
session_start();
if (!isset($_SESSION["login"])) {
header("Location: loginadmin.php");
exit;
} 
require 'functions.php';
//koneksi ke DBMS
//ambil data di URL
$id = $_GET["id"];
//query data mahasiswa berdasarkan id
$mhs = query("SELECT  * FROM barang WHERE id_barang = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {
	//ambil tiap data dari tiap elemen dalam form
	if(ubah($_POST)>0) {
		echo "
		<script>
		alert('data berhasil diubah');
		document.location.href = 'index.php';
		</script>
		";
	} else 
	{
		echo "
		<script>
		alert('data gagal diubah');
		document.location.href = 'index.php';
		</script>
		";

	}
	}

	//query insert data
	
	//cek apakah data berhasil ditambahkan atau tidak

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../style.css"> 
	<link rel="stylesheet" href="../style2.css">
	<title>Ubah data barang</title>
</head>
<body>
	<div class="container">
		<div class="navigasi">
		<a href="index.php">Back</a> </div>
	<h1 class="judul">Ubah data barang</h1>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $mhs["id_barang"]; ?>">
		<br>
			<div class="row">
			<div class="col-25">
				<label for="nama">nama : </label></div>
				<div class="col-75">
				<input type="text" name="nama" id="nama" required="" value="<?= $mhs["nama"]; ?>">
			</div>
		</div>
			<div class="row">
			<div class="col-25">
				<label for="jenis">Jenis : </label> </div>
				<div class="col-75">
		<select id="jenis" name="jenis">
			 <option>Makanan</option>
			<option>Minuman</option>
			<option>Rokok</option>
			<option>Bahan pokok</option>
			<option>lain-lain</option> 
		</select>
		</div>
	</div>
		<div class="row">
			<div class="col-25">
				<label for="supply">supply : </label> </div>
				<div class="col-75">
				<input type="text" name="supply" id="supply" value="<?= $mhs["supply"]; ?>">
			</div>
		</div>
			<div class="row">
			<div class="col-25">
				<label for="harga_beli">harga_beli : </label>
			</div>
			<div class="col-75">
				<input type="text" name="harga_beli" id="harga_beli" value="<?= $mhs["harga_beli"]; ?>">
			</div>
		</div>
			<div class="row">
			<div class="col-25">
				<label for="harga_jual">harga_jual : </label> </div>
				<div class="col-75">
				<input type="text" name="harga_jual" id="harga_jual" value="<?= $mhs["harga_jual"]; ?>">
			</div>
		</div>
			<div class="row">
			<div class="col-25">
				<label for="jumlah">jumlah : </label> </div>
				<div class="col-75">
				<input type="text" name="jumlah" id="jumlah" value="<?= $mhs["jumlah"]; ?>">
			</div>
		</div>
	<div class="row">
				<button type="submit" name="submit" >Simpan</button>
			</div>
	</form>
</div>

</body>
</html>