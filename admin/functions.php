<?php
$conn = mysqli_connect("localhost","root","","warung_kelontong") ;
function query($query) {
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
}
return $rows;
}
function tambah($data) {
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$jenis = $_POST['jenis'];
	$supply = htmlspecialchars($data["supply"]);
	$harga_beli = htmlspecialchars($data["harga_beli"]);
	$harga_jual = htmlspecialchars($data["harga_jual"]);
	$jumlah = htmlspecialchars($data["jumlah"]);

	$query = "INSERT INTO barang VALUES 
			  ('','$nama','$jenis','$supply','$harga_beli','$harga_jual','$jumlah')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}
function ubah($data) {
global $conn;
$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$jenis =$data["jenis"];
	$supply = htmlspecialchars($data["supply"]);
	$harga_beli = htmlspecialchars($data["harga_beli"]);
	$harga_jual = htmlspecialchars($data["harga_jual"]);
	$jumlah = htmlspecialchars($data["jumlah"]);


	$query = "UPDATE barang SET 
	nama = '$nama',
	jenis = '$jenis',
	supply = '$supply',
	harga_beli = '$harga_beli',
	harga_jual = '$harga_jual',
	jumlah = '$jumlah'
	WHERE id_barang = '$id' ";
	mysqli_query($conn,$query);
 
	return mysqli_affected_rows($conn);
}
function hapus($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM barang WHERE id_barang = '$id'");
	return mysqli_affected_rows($conn);

}
function register($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password2 = mysqli_real_escape_string($conn,$data["password2"]);

//cek username sudah ada atau belum
	$result = mysqli_query($conn,"SELECT username FROM admin WHERE username='$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
		alert('username sudah terdaftar!')
		</script>";
		return false;
		# code...
	}
	
//cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai'); 
			  </script>";		;
		return false;
	}

	//enkripsi password
	$password = password_hash($password,PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	mysqli_query($conn,"INSERT INTO admin VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);
}
function tambahuser($data) {
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$jk = $_POST["jk"];
	$umur = htmlspecialchars($data["umur"]);
	$hp = htmlspecialchars($data["hp"]);
	$alamat = htmlspecialchars($data["alamat"]);

	$query = "INSERT INTO pelanggan VALUES 
			  ('','$nama','$jk','$umur','$hp','$alamat')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}
function ubahpelanggan($data) {
global $conn;
$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$jk = $data["jk"];
	$umur = htmlspecialchars($data["umur"]);
	$hp = htmlspecialchars($data["hp"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$query = "UPDATE pelanggan SET 
	nama_pel = '$nama',
	jk = '$jk',
	umur = '$umur',
	no_hp = '$hp',
	alamat = '$alamat'
	WHERE id_pelanggan = $id ";
	mysqli_query($conn,$query);
 
	return mysqli_affected_rows($conn);
}
function hapuspelanggan($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM pelanggan WHERE id_pelanggan = $id");
	return mysqli_affected_rows($conn);

}
// function tambahutang($data) {
// 	global $conn;
// 	$npel = htmlspecialchars($data["npel"]);
// 	$nbarang = htmlspecialchars($data["nbarang"]);
// 	$utang = htmlspecialchars($data["utang"]);

// 	$query = "INSERT INTO utang VALUES 
// 			  ('','$npel','$nbarang','$utang')";
// 	mysqli_query($conn,$query);

// 	return mysqli_affected_rows($conn);
// }
// function penjualan($data) {
// 	global $conn;
// 	$nama = htmlspecialchars($data["nama"]);
// 	$harga_jual = htmlspecialchars($data["harga_jual"]);
// 	$jmlh = htmlspecialchars($data["jmlh"]);
// 	$total = $data["total"];

// 	$query = "INSERT INTO penjualan VALUES 
// 			  ('','$nama','$harga_jual','$jmlh','$total')";
// 	mysqli_query($conn,$query);

// 	return mysqli_affected_rows($conn);
// }
function registerpelanggan($data) {
	global $conn;

	$username = stripslashes($data["username"]);
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password2 = mysqli_real_escape_string($conn,$data["password2"]);

//cek username sudah ada atau belum
	$result = mysqli_query($conn,"SELECT username FROM buyer WHERE username='$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
		alert('username sudah terdaftar!')
		document.location.href = 'loginpelanggan.php';
		</script>";
		return false;
		# code...
	}
	
//cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai'); 
			  </script>";		;
		return false;
	}

	//enkripsi password
	$password = password_hash($password,PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	mysqli_query($conn,"INSERT INTO buyer VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);
}
function penjualan($data) {
	global $conn;
	$tgl = date('Y-m-d');
	$buyer = $data['buyer'];
	$nama = $data['nama'];
	$tes= $data['harga_jual'];
	$jmlh = $data['jmlh'];
	$total = $data['total'];
	$ket = $data['ket'];
	$jumlah=mysqli_query($conn,"SELECT * FROM barang where nama='$nama'");
	$jml=mysqli_fetch_assoc($jumlah); 
	$tes=mysqli_query($conn,"SELECT * FROM pelanggan where nama_pel='$buyer'");
	$tess=mysqli_fetch_assoc($tes);
	$id_barang=$jml['id_barang'];
	$id_pelanggan=$tess['id_pelanggan'];

	// var_dump($jml);
	// exit();
	
	if ($jmlh<=$jml['jumlah'])  { 
		$query = "INSERT INTO penjualan VALUES 
				('','$tgl','$jmlh','$total','$ket','$id_pelanggan','$id_barang')";
		
		$update="UPDATE barang SET jumlah=jumlah - $jmlh where nama='$nama'";
		mysqli_query($conn,$query);
		mysqli_query($conn,$update);
		return mysqli_affected_rows($conn);
	}
	else{
		echo "<script>
		alert('Stok barang tidak cukup');
		</script>";
	}
}

?>