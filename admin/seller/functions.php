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
function registerseller($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password2 = mysqli_real_escape_string($conn,$data["password2"]);

//cek username sudah ada atau belum
	$result = mysqli_query($conn,"SELECT username FROM seller WHERE username='$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
		alert('username sudah terdaftar!')
		</script>";
		return false;
	}
		# code...
		if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai'); 
			  </script>";		
		return false;
	}

	//enkripsi password
	$password = password_hash($password,PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	mysqli_query($conn,"INSERT INTO seller VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);
}
?>