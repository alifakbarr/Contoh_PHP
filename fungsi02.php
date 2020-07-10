<?php 
function cetak_ganjil($awal,$akhir){
	for ($i=$awal; $i<=$akhir;$i++){
		if ($i%2==1) {
			echo "$i ";
		}
	}
}
$a=2;
$b=30;
echo "bilangan ganjil dari $a dan $b : <br>";
cetak_ganjil($a,$b);
?>
