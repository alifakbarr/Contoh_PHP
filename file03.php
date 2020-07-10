<?php
$namafile = "data3.txt";
$handle = fopen($namafile, "w");

if (!$handle) {
  echo "<b>File tidak dapat dibuka atau belum ada";
} else {
  fwrite($handle, "Universitas Muhammadiyah  Sidoarjo ");
  fputs($handle, "Saya kuliah disana");
  //file_put_contents ($namafile,"jakarta");
  echo "<b>File berhasil dibuka</b>";
}
fclose($handle);
