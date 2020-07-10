<?php  
// contoh 1
for ($i=1; $i <=10 ; $i++) { 
	echo "$i";
}
echo "<hr>";
// contoh 2
for ($i=1;  ; $i++) { 
	if ($i>10) {
		break;
	}
	echo "$i";
}
echo "<hr>";
// contoh 3
$i=1;
for (; ;)  { 
	if ($i > 10){
		break;
	}
	echo "$i";
	$i++;
}
echo "<hr>";
// contoh 4
for ($i=1; $i <=10 ; print"$i", $i++);
?>