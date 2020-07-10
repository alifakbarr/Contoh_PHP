<?php 
function cetak_ganjil(){
	for ($i=0; $i<100; $i++)
	{
		if ($i%2==1) {
			echo "$i ";
		}	
	}
}

function cetak_genap(){
	for ($j=1; $j<=100; $j++)
	{
		if ($j%2==0) {
			echo "$j ";
		}
	}
}
//pemanggilan fungsi

cetak_ganjil();
echo "<br>";
cetak_genap();
?>
