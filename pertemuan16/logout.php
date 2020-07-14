<?php 
session_start();
// $_SESSION=[]; untuk menimpa dengan session kosong
$_SESSION=[];
// session_unset(); untuk mencek kembali apakah session sudah hilang
session_unset();
session_destroy();

header("Location: login.php");
exit;
 ?>