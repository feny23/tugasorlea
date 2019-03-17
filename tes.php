<?php 
	require_once 'admin/functions.php';
	$nama = $_GET['nama'];
	$barang = query("SELECT * FROM barang WHERE nama='$nama'");
	// var_dump($barang);
?>
<script>
	$("#harga_jual").attr('value', <?= $barang[0]['harga_jual']; ?>);
</script>