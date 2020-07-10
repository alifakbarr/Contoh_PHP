<?php
$dir = "images";
if ($handle = opendir($dir)) {
  while ($handle !== ($file = readdir($handle))) {
    if ($file != "." && $file != "..") {
      echo "$file<br>";
    }
  }
}
closedir($handle);
