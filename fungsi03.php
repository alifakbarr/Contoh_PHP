<?php 
function luas_lingkaran($jari)
{
	return 3.14 * $jari * $jari;
}
//pemanggilan fungsi
$r =10;
echo "program fungsi yang mengembalikan nilai<br>";
echo "luas lingkaran dengan jari - jari = $r";
echo "<br>";
echo luas_lingkaran($r);

 ?>