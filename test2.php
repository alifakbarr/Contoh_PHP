<?php 
$nim ="191080200202";
$nama="Alif Akbar I";
$nilai="90";
$status=true;
echo "Nama : ".$nama."<br>";
echo "Nim : $nim<br>";
echo "Nilai : $nilai<br>";
if ($status) {
	echo "Lulus";
}
else {
	echo"Gagal";
}
echo "<hr>";
echo "Konstanta<br>";
define("nama", "Alif Akbar");
define("nim", "202");

echo "Nama : ".nama;
echo "<br>Nim : ".nim;
echo "<hr>";
$gaji=1000000;
$pajak=0.1;
$thp=$gaji - ($gaji*$pajak);
echo "Gaji sebelum pajak : Rp.$gaji<br>";
echo "Gaji setelah pajak : Rp.$thp";
echo "<hr>";

?>