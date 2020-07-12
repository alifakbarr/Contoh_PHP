<?php 
require 'koneksi.php';

if (isset($_POST["registrasi"])) {
	if (registrasi($_POST)>0) {
		echo "<script>
			alert('User berhasil ditambah');
		</script>";
	}
}
 ?><!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
<h1>Halaman Registrasi</h1>
<form method="post" action="">
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
			<label for="password2">Konfirmasi password : </label>
			<input type="password" name="password2" id="password2">
		</li>
		<li>
			<button type="submit" name="registrasi">Registrasi</button>
		</li>
	</ul>
</form>
</body>
</html>