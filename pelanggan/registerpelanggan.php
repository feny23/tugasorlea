<?php 

require '../admin/functions.php';

if( isset($_POST["register"])) {
	if( registerpelanggan($_POST)>0) {
	echo "<script>
	alert('user baru berhasil ditambahkan!');
	</script>";
	header("Location: loginpelanggan.php");
	} else {
		echo mysqli_error($conn);
	}
}
	 ?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="../style.css">
	<title>Halaman Registrasi</title>
</head>
<body class="body2">

<h1>Halaman Registrasi</h1>
<div class="loginadmin">
	<p class="lgnadmin">Registrasi Pelanggan</p>

<form action="" method="post">
			<label for="username">username : </label>
			<input type="text" name="username" id="username" class="form_login" placeholder="nama lengkap anda">
			<label for="password">password : </label>
			<input type="password" name="password" id="password" class="form_login">
			<label for="password2">konfirmasi password : </label>
			<input type="password" name="password2" id="password2" class="form_login">

			<button type="submit" name="register" class="tombol_login">Registrasi</button>
		</li>
	</ul>
	</form>
</div>
</body>
</html>