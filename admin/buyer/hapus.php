<?php 
session_start();
if (!isset($_SESSION["login"])) {
header("Location: loginadmin.php");
exit;
} 
require '../functions.php';

$id = $_GET["id"];

if(hapuspelanggan($id)>0)
{
			echo "
		<script>
		alert('data berhasil dihapus');
		document.location.href = 'buyer.php';
		</script>
		";
	} else 
	{
		echo "
		<script>
		alert('data gagal dihapus');
		document.location.href = 'buyer.php';
		</script>
		";

	}

 ?>
