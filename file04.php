<?php
$namafile = "data3.txt";
$handle = fopen($namafile, "r");

if (!$handle) {
  echo "<b>File tidak dapat dibuka atau belum ada</b>";
} else {
  $isi2 = fread($handle, 20);
  $isi = fgets($handle, 2048);
  echo "isi 1: $isi<br>";
  echo "isi 2: $isi2";
}
fclose($handle);
