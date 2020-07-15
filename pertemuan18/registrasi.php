<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'functions.php';

if (isset($_POST["register"])) {
	if (registrasi($_POST)>0) {
		echo "<script>
		alert('User berhasil ditambahkan');
		</script>";
	}else{
		echo mysqli_error($conn);
	}

}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
<form method="post" action="">

	<h1>Halaman Registrasi</h1>
	<ul>
		<li>
			<label for="username">Username : </label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password : </label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<label for="password2">Konfirmasi Password : </label>
			<input type="password" name="password2" id="password2">
		</li>
		<li>
			<button type="submit" name="register">Register ! </button>
		</li>
	</ul>
</form>
</body>
</html>