<?php
$namafile = "data3.txt";
$handle = fopen($namafile, "r");

if (!$handle) {
  echo "<b>file beluma adaatau tidak ada";
} else {
  echo "<b>Isi</b><br>";
  while ($isi = fgets($handle, 2048)) {
    echo "$isi" . "<br>";
  }
}
fclose($handle);
