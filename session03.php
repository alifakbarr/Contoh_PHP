<?php
// 
session_start();
if (isset($_SESSION['login'])) {
  unset($_SESSION);
  session_destroy();
  //
  echo "<h1>anda sudah berhasil logout<h1>";
  echo "<h2>klik <a href='session01.php'>disini</a>
  untuk login kembali</h2>";
  echo "<h2>anda sekarang tidak bisa masuk ke halaman
  <a href='session02.php'>session02.php</a>lagi";
}
