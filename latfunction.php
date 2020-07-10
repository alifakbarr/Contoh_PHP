<?php
$x = 10;
// fungsi global untuk membuat variabel lokal menjadi global
function tampilx()
{
  global $x;
  echo $x;
}
echo $x;
