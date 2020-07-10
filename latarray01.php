<?php
//cara penulisan array
$hari = array("senin ", "selasa ", "rabu ");
$bulan = ["Januari", "Februari", "Maret"];
$arr = [100, "teks", true];
$angka = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
// cara menampilkan array
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";
//cara menampilkan elemen array
echo $arr[0];
echo "<br>";
foreach ($angka as $a) :
  foreach ($a as $b) :
    echo $b;
  endforeach;
endforeach;

echo "<br>";
echo $angka[1][1];
