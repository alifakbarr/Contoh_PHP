<?php 
$arrNilai = array("Ani"=>80,"Otim"=>90);

echo "menampilkan isi array dengan foreach : <br>";
foreach ($arrNilai as $nama => $nilai) {
	echo "Nilai $nama = $nilai <br>";
}
reset($arrNilai);
echo "<br>menampilkan isi arry dengan while dan list : <br>";
while (list ($nama,$nilai)=each($arrNilai)) {
	echo "Nilai $nama = $nilai<br>";
}

 ?>