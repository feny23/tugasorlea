<?php

session_start();
// // if (isset($_SESSION["login"])) {
// // header("Location: index.php");
// // exit;
// }
require 'functions.php';

if( isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' ");
 
 //cek username
if (mysqli_num_rows($result) === 1) {
	//cek password
	$row = mysqli_fetch_assoc($result);
	if (password_verify($password,$row["password"])) {
		//set session
		$_SESSION["login"] = true;
		echo "
		<script>
		alert('data berhasil ditambahkan');
		document.location.href = 'index.php';
		</script>
		";

		header("Location: index.php");
		exit;

	}
	}

	$error = true;
}


?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../style.css">
<head>
	<title>Halaman Login</title>
</head>
<body class="body2">

<h1 >Login Owner</h1>
<!-- <a href="registrasi.php">Registrasi</a> -->

<?php if (isset($error)) : 
		echo "
		<script>
		alert('Username/Password salah');
		document.location.href = 'loginadmin.php';
		</script>
		";

	?>
<?php endif;  ?>
<div class="loginadmin">
	<p class="lgnadmin">Welcome Owner!</p>
<form action="" method="post">
			<label for="username">Username : </label>
			<input type="text" name="username" id="username" class="form_login" placeholder="Username..">
			<label for="password">Password : </label>
			<input type="password" name="password" id=password"  class="form_login"placeholder="Password.." >

			<button type="submit" name="login" class="tombol_login">Login</button>		

			<button type="reset" name="reset" class="tombol_login" >Reset</button> 
		</li>
	</ul>
</form>
</div>
</body>
</html>