<?php 
// array dengan sort()dan rsort()
$arrNilai = array ("Ani"=>80,"Otim"=>90,"Sri"=>75);
echo "<b>array sebelum pengurutan</b>";
echo "<br>";
echo "</pre>";
print_r($arrNilai);
echo "</pre>";

sort($arrNilai);
reset($arrNilai);
echo "<br>";
echo "<b>array setelanh pengurutan menggunakan dengan sort ()</b>";
echo "<pre>";
print_r($arrNilai);
echo "</pre>";

rsort($arrNilai);
reset($arrNilai);
echo "<b>array setelah pengurutan menggunakan rsort()</b>";
echo "<pre>";
print_r($arrNilai);
echo "</pre>";

echo "<br>";
asort($arrNilai);
reset($arrNilai);
echo "<b>array setelah pengrurutan asort()</b>";
echo "<br>";
echo "<pre>";
print_r($arrNilai);
echo "</pre>";

echo "<br>";
arsort($arrNilai);
reset($arrNilai);
echo "<b>array setelah pengururtan arsort()</b>";
echo "<br>";
echo "<pre>";
print_r($arrNilai);
echo "</pre>";

echo "<br>";
ksort($arrNilai);
reset($arrNilai);
echo "array setelah pengurutan ksort()";
echo "<br>";
echo "<pre>";
print_r($arrNilai);
echo "<pre>";
echo "<br>";

krsort($arrNilai);
reset($arrNilai);
echo "array setelah pengurutan krsort()";
echo "<br>";
echo "<pre>";
print_r($arrNilai);
echo "</pre>";

echo "<br>";
echo "Mencari elemen array";
$arrBuah = array("mangga","apel","pisang","kedondong");
echo "<br>";
if (in_array("kedondong", $arrBuah)) {
	echo "ada buah kedondong disini ";
}else{
	echo "Tidak ada buah kedondong disini";
}
?>
