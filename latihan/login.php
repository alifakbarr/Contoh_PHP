<?php 
session_start();
require 'koneksi.php';
if (isset($_COOKIE['id'])&& isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$result = mysqli_query($conn,"SELECT username FROM user WHERE id = $id");

	$row = mysqli_fetch_assoc($result);
	if ($key === hash('sha256', $row["username"])) {
	$_SESSION['login'] = true;
}

}



if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}


if (isset($_POST["login"])) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

	// cek username
	if(mysqli_num_rows($result)===1){

		// $row berisi id username password yang sudah diacak
		$row = mysqli_fetch_assoc($result);
		// cek password
		if (password_verify($password, $row["password"])) {
			$_SESSION["login"]=true;

			setcookie('id',$row["id"],time()+60);
			setcookie('key',hash('sha256',$row["username"])+60);

			header("Location: index.php");
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
<h1>Halaman Login</h1>
<?php 

if (isset($error)) {
	echo "<script>
		alert('username / password salah');
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
			<label for="password">Password : </label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember Me</label>
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>
</form>
</body>
</html>