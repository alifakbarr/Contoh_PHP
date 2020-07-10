<?php
$namafile = "data.txt";
$handle = fopen($namafile, "r");
if (!$handle) {
  echo "<b> File tidak dapat dibuka atau belum ada </b>";
} else {
  echo "<b> File berhasil di buka";
}
fclose($handle);
