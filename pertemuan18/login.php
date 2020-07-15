<?php 
session_start();

require 'functions.php';
// // cek cookie jika masih ada maka bisa login
// if (isset($_COOKIE['login'])) {
// 	// jika $_COOKIE['login'] sama dengan true
// 	if ($_COOKIE['login'] =='true') {
// 		// maka $_SESSION['login'] akan diubah menjadi true
// 		$_SESSION['login'] = true;
// 	}
// }

// cek cookie
// adakah id dan keynya
if (isset($_COOKIE['id']) && isset($_COOKIE['key']))  {
	// kita ambil
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result=mysqli_query($conn,"SELECT username FROM user WHERE id=$id");
	//$row berisi username
	$row=mysqli_fetch_assoc($result);

	// cek cookie dan username
	// $key adalah username yang sudah diacak dan akan dibandingkan dengan username yang diacak
	// === artinya sama persis
	if ($key === hash('sha256', $row["username"])) {
		$_SESSION['login'] = true;
	}
}
// jika $_SESSION['login'] brisi true maka akan langsung ke index
// jika $_COOKIE masih ada maka akan langsung ke index.php
if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}


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

			//cek remember me
			if (isset($_POST['remember'])) {
				setcookie('id',$row['id'],time()+60);
				// key adalah username
				// menajalnkan hash untuk menecrip username
				// hash('algo','yang di encrip')
				setcookie('key',hash('sha256', $row['username']),time()+60);
			}
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
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember Me </label>
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>
</form>
</body>
</html>