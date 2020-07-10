<?php 
$namafile = "data2.txt";
$handle = fopen($namafile,"w");
if (!$handle){
  echo "<b>File tidak dapat dibuka atau belum ada</b>";
}else {
  echo "<b>File berhasil dibuka</b>";
}
fclose($handle);
