<?php
//date
//untuk menampilkan tanggal dengan format tertentu 
echo date("l, d-M-Y");
echo "<br>";
//time
//unix timestamp /EPOCH time
//detik yang sudah berlalusejak 1 januari 1970
//echo time();
echo date("l", time() - 60 * 60 * 24 * 100);
echo "<br>";
//mktime
//membuat sendiri detik
//mktime(0,0,0,0,0,0)
//jam, menit,detik,bulan ,tanggal,tahun

echo date("l", mktime(0, 0, 0, 8, 8, 2000));
echo "<br>";

//strotime
echo date("l", strtotime("8 aug 2000"));
