<?php

session_start();
if (isset($_SESSION["login"])) {
 header("Location: listbarang.php");
exit; }
require '../admin/functions.php';

if( isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn,"SELECT * FROM buyer WHERE username='$username' ");
 
 //cek username
if (mysqli_num_rows($result) === 1) {
	//cek password
	$row = mysqli_fetch_assoc($result);
	if (password_verify($password,$row["password"])) {
		//set session
		$_SESSION["login"] = $_POST['username'];
		// echo "
		// <script>
		// alert('data berhasil ditambahkan');
		// document.location.href = 'listbarang.php';
		// </script>
		// ";

		header("Location: listutang.php");
		exit;
	}
	}

	$error = true;
}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../style.css">

	<title>Halaman Login</title>
</head>
<body class="body2">

<h1>Halaman Login</h1>
<!-- <a href="registrasi.php">Registrasi</a> -->
<!-- <a href="registerpelanggan.php">Registrasi</a> -->
<?php if (isset($error)) : 
		echo "
		<script>
		alert('Username/Password salah');
		document.location.href = 'loginpelanggan.php';
		</script>
		";

	?>
<?php endif;  ?>
<div class="loginadmin">
	<p class="lgnadmin">Hello Costumer!</p>

<form action="" method="post">
			<label for="username">Username : </label>
			<input type="text" name="username" id="username" class="form_login">
			<label for="password">Password : </label>
			<input type="password" name="password" id=password" class="form_login">
			<button type="submit" name="login" class="tombol_login">Login</button> 
			<button type="reset" name="reset" class="tombol_login" >Reset</button>
			<br>
			<br>
			Belum registrasi? <a href="registerpelanggan.php">Registrasi</a> 
		</li>
	</ul>
</form>
</div>
</body>
</html>