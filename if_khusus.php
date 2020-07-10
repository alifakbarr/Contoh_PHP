<?php  
$tahun = date("Y");
$kabisat = ($tahun%4==0)?"Kabisat" : "Bukan Kabisat";
echo "tahun <b>$tahun</b> $kabisat";

?>