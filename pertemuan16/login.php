<?php 
session_start();
if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}
require 'functions.php';

if (isset($_POST["login"])) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	// apakah yangdinputkan ada didalam database
	$result = mysqli_query($conn,"SELECT * FROM user WHERE username ='$username'");

	// cek username
	// mysqli_num_rows digunakan untuk menghitung berapa baris yang dikembalikan dari perintah select
	// kalau ada username ditable user
	// kalau ketemu pasti nilainya 1 kalau 0 tidak ketemu
	if (mysqli_num_rows($result)===1){

		// cek password 
		// didalam row terdapat id, username, password yang sudah diacak
		$row=mysqli_fetch_assoc($result);
		// password_verify mengecek apakah sebuah string sama atau tidak dengan hashnya
		// (yang belum diacak,yang sudah diacak)
		if(password_verify($password, $row["password"])){
			// set session
			$_SESSION["login"]=true;
			// jika benar kita arahkan ke index.php
			header("Location:index.php");
			// menggunakan exit agar berhenti di header saja
			exit;
		}
	}

	$error = true;
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<h1>Halaman Login </h1>
<?php 
if (isset($error)) {
	echo "<script>
		alert('Username / Password Salah');
	</script>";
}

 ?>
<form method="post" action="">
	<ul>
		<li>
			<label for="username">Username : </label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>
</form>
</body>
</html>