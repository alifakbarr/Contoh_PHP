<?php
$counter_file = "counter.txt";
if (!file_exists($counter_file)) {
  fopen($counter_file, "w");
}
$file = fopen($counter_file, "r");

$counter = fread($file, 10);
fclose($file);

$counter++;

echo "<h2>Anda adalah pengunjung ke - $counter</h2>";
$file = fopen($counter_file, "w");
fwrite($file, $counter);
fclose($file);
