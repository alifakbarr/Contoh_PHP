<?php 
if (isset($_POST['pilih'])) {
	echo "Band favorit mu : <br>";
	if (isset($_POST['band01'])) {
		echo "+ ".$_POST['band01']."<br>";
	}
	if (isset($_POST['band02'])) {
		echo "+ ".$_POST['band02']."<br>";
	}
}
 ?>