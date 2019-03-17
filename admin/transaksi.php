
<?php
// $nama = $_GET["nama"];
// $barang = query("SELECT * FROM barang WHERE nama=$nama")[0];
// session_start();
// if (!isset($_SESSION["login"])) {
// header("Location: login.php");
// exit;
// }

// $sisa=$data['jumlah']-$jumlah;
// mysqli_query("update barang set jumlah='$sisa' where nama='$nama'");
require '../admin/functions.php';
if(isset($_POST["simpan"])) {
	//ambil tiap data dari tiap elemen dalam form
	if((penjualan($_POST)>0)) {
		echo "
		<script>
		alert('data berhasil ditambahkan');
		</script>
		";
	// $jmlh = $_POST['jmlh'];
	// $jumlah = "SELECT jmlh FROM penjualan WHERE nama=$nama" ;

	// $stok= $jumlah - $jmlh;
	// $query2 = "UPDATE barang SET jumlah = '$stok' WHERE nama='$nama' ";
	// mysqli_query($query2);

	} else 
	{
		echo "
		<script>
		alert('data gagal ditambahkan');
		</script>
		";

	}
	}
// if(isset($_POST["utang"])) {
// 	//ambil tiap data dari tiap elemen dalam form
// 	if(utang($_POST)>0) {
// 		echo "
// 		<script>
// 		alert('utang berhasil disimpan');
// 		document.location.href = 'transaksi.php';
// 		</script>
// 		";
// 	} else 
// 	{
// 		echo "
// 		<script>
// 		alert('utang gagal disimpan');
// 		document.location.href = 'transaksi.php';
// 		</script>
// 		";
// 	}
// }
	$barang = query("SELECT * FROM barang");
	$user = query("SELECT * FROM pelanggan");
   $nilai1 = "";
    $nilai2 = "";
     $nilai3 = "";
// if(isset($_POST['hitung'])
//     // and
//     //     ($_POST['text2'])
//         )
// {
//     $nilai1 = $_POST['harga_jual'];    #mengambil nilai didalam
//     $nilai2 = $_POST['jmlh'];    #formulir sesuai name yang ada
//     $nilai3 = $nilai1*$nilai2;
// }
// $harga=$data['harga_jual'];
// // $laba=$harga-$modal;
// // $labaa=$laba*$jumlah;
// $jumlah=$data['jmlh'];
// $total=$harga*$jumlah;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Penjualan barang</title>
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="../style2.css"> 
</head>
<body>
	 <div class="container"> 
	<h1 class="judul">Input data penjualan</h1>
	<div class="content"> 
		<div class="cont">
	<a href="datatransaksi.php">Back</a>
	<a href="../logout.php">Logout</a>
	<form action=""  method="post" style="margin-left: 100px">
	<div class="row">
			<div class="col-25"> 
	<label for="buyer">Nama pelanggan:</label> </div>
<div class="col-75">
 	<select for="buyer" name="buyer" id="buyer">
		<!-- <option value="$barang"><?php $barang ?></option> -->
		<option value="-">--Pilih pelanggan--</option>
		<?php foreach ($user as $usr) { ?>
			<option value="<?= $usr['nama_pel']; ?>"><?= $usr['nama_pel']; ?></option>
		<?php } ?>
	</select>
</div>
</div>
	<div class="row">
			<div class="col-25"> 
	<label for="nama">Nama barang :       </label> </div>
	<div class="col-75">
	<select for="nama" name="nama" id="nama">
		<!-- <option value="$barang"><?php $barang ?></option> -->
		<option>--Pilih barang--</option>
		<?php foreach ($barang as $brg) { ?>
			<option value="<?= $brg['nama']; ?>"><?= $brg['nama']; ?></option>
		<?php } ?>
	</select>
</div>
</div>
<div class="row">
			<div class="col-25"> 
	<label for="harga_jual">Harga</label> </div>
	<div class="col-75">
	<input type="text" name="harga_jual" id="harga_jual"  value="<?= $barang[0]['harga_jual']; ?>" >
</div>
</div>
<div class="row">
			<div class="col-25"> 
	<label for="jmlh">Jumlah</label> </div>
	<div class="col-75">
	<input type="text" name="jmlh" id="jmlh" value="<?php echo $nilai2?>" >
</div>
</div>
<div class="row">
			<div class="col-25"> 
	<label for='total'>Total</label> </div> 
<div class="col-75">
	<input type='text' name='total' id='total' value="<?php echo $nilai3?>">
</div>
</div>
<div class="row">
			<div class="col-25"> 
	<label for="ket">Keterangan</label> </div>
	<div class="col-75">
	<select for="ket" name="ket">
		<option>Lunas</option>
		<option>Utang</option>
	</select>
</div>
</div>
<button style="float: right; margin-right: 200px;" type="submit" name="simpan">Simpan</button>
<!-- <button type="submit" name="simpan">Lunas</button>
<button type="submit" name="utang">Utang</button> -->
<!-- <label for="total">Total</label>
	<input type="text" name="total" id="total" value="<?php //$total ?>"> -->
</form>
<button  type="submit" name="hitung" id="hitung" style="float: left; margin-top: 0px;margin-left: 265px;">Hitung</button>
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="../script.js"></script>
</div>
</div>
</body>
</html>