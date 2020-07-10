<?php 
if (isset($_POST['login'])) {
	$user=$_POST['username'];
	$pass=$_POST['password'];
	if ($user == "irdho" && $pass="123") {
		echo "Login Berhasil";
	}else{
		echo "Login Gagal";
	}
}
 ?>