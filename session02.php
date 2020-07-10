<?php
// halaman ini merupakaan contoh halaman pemeriksaan session.
// pemeriksaan session biasanya dilakukan jika suatu halaman memiliki
// akses terbatas.misalnya harus login terlebih dahulu.
session_start();
//pemeriksaan session
if (isset($_SESSION['login'])) {
  //jika sudah login menmpilkan isi session
  echo "<h1>Selamat datang " . $_SESSION['login'] . "<h1>";
  echo "<h2>Halaman ini hanya bisa di akses jika anda sudah login</h2>";
  echo "<h2>klik <a href='session03.php'>disini (session03.php)</a>
  logout </h2>";
} else {
  //session belum ada artinya belum login
  die("anda belum login! anda tidak berjak masuk ke halaman ini.
  silahkan login <a href='session01.php'>disini</a>");
}
