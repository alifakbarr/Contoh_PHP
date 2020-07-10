<?php
$dir = "images";
$cek = mkdir($dir);
if ($cek) {
  echo "Direktori <b>$dir</b> berhasil dibuat";
} else {
  echo "Direktori <b>$dir</b> gagal dibuat";
}
echo "<br>";
$del = rmdir($dir);
if ($del) {
  echo "folder <b>$dir</b> telah dihapus";
} else {
  echo "folder <b>dir</b> gagal di hapus";
}
