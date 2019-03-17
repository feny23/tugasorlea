<?php
session_start();
if (!isset($_SESSION["login"])) {
header("Location: loginadmin.php");
exit;
} 
require '../functions.php';
//koneksi ke DBMS
//ambil data di URL
$id = $_GET["id"];
//query data mahasiswa berdasarkan id
$mhs = query("SELECT  * FROM pelanggan WHERE id_pelanggan = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {
	//ambil tiap data dari tiap elemen dalam form
	if(ubahpelanggan($_POST)>0) {
		echo "
		<script>
		alert('data berhasil diubah');
		document.location.href = 'buyer.php';
		</script>
		";
	} else 
	{
		echo "
		<script>
		alert('data gagal diubah');
		document.location.href = 'buyer.php';
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
	<link rel="stylesheet" href="../../style.css"> 
	<link rel="stylesheet" href="../../style2.css">
	<title>Ubah data pelanggan</title>
</head>
<body>
	<div class="container">
	<h1 class="judul">Ubah data pelanggan</h1>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $mhs["id_pelanggan"]; ?>">
		<!-- 	<div class="row">
			<div class="col-25">
				<label for="id">id : </label> </div>
				<div class="col-75">
				<input type="text" name="id" id="id" required="" value="<?= $mhs["id_pelanggan"]; ?>">
			</div>
		</div> -->
		<div class="row">
			<div class="col-25">
				<label for="nama">nama : </label> </div>
				<div class="col-75">
				<input type="text" name="nama" id="nama" required="" value="<?= $mhs["nama_pel"]; ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="jk">Jenis kelamin: </label> </div>
				<div class="col-75">
		<select id="jenis" name="jk" >
			<option>Perempuan</option>
			<option>Laki-laki</option>
		</select>
		</div>
	</div>
	<div class="row">
			<div class="col-25">
				<label for="umur">Umur : </label> </div>
				<div class="col-75">
				<input type="text" name="umur" id="umur" value="<?= $mhs["umur"]; ?>">
			</div>
		</div>
	<div class="row">
			<div class="col-25">
				<label for="hp">Nomor hp : </label> </div>
				<div class="col-75">
				<input type="text" name="hp" id="hp" value="<?= $mhs["no_hp"]; ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="alamat">Alamat : </label> </div>
				<div class="col-75">
				<input type="text" name="alamat" id="alamat" value="<?= $mhs["alamat"]; ?>">
			</div>
		</div>
		<div class="row">
				<button type="submit" name="submit" >Ubah Data</button>
			</div>
	</form>
</div>
</body>
</html>