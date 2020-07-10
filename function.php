<?php

function salam($waktu = "Sore", $nama = "Irdho")
{
  echo "selamat $waktu, $nama";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Function</title>
</head>

<body>
  <h1><?php echo salam(); ?></h1>
</body>

</html>