<?php 
echo "memeriksa suatu fungsi tersedia di PHP atau tidak<br>";
if (function_exists('exif_read_data')) {
	echo "fungsi exif_read_data() ada di php.<br>";
}else {
	echo "fungsi exif_read_data() tidak ada di php.<br>";
}
 ?>
