<?php 
echo "passing by reference dalam fungsi";
function tambah_string ($str)
{
	$str=$str.". Sidoarjo";
	return $str;
}
echo "<br>";
$str="Rempong";
echo tambah_string($str)."<br>";

 ?>

