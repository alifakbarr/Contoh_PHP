<?php
$buku = [
  ["cover" => "1.jpg", "judul" => "Makhluk buas", "pengarang" => "joko", "penerbit" => "gramedia", "halaman" => 178],
  ["c'over" => "2.jpg", "judul" => "Mata Jerapah", "pengarang" => "Versuing", "penerbit" => "Lektung", "halaman" => 117]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php foreach ($buku as $iden) : ?>
    <ul>
      <li><img src="images/<?php echo $iden["cover"] ?>"></li>
      <li><?php echo $iden["judul"] ?></li>
      <li><?php echo $iden["pengarang"] ?></li>
      <li><?php echo $iden["penerbit"] ?></li>
      <li><?php echo $iden["halaman"] ?></li>
    </ul>
  <?php endforeach; ?>
</body>

</html>