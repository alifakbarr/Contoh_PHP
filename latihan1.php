<?php
$buku = [
  [
    "cover" => "1.jpg",
    "judul" => "Makhluk buas",
    "pengarang" => "joko",
    "penerbit" => "gramedia",
    "halaman" => 178
  ],
  [
    "cover" => "2.jpg",
    "judul" => "Mata Jerapah",
    "pengarang" => "Versuing",
    "penerbit" => "Lektung",
    "halaman" => 117
  ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Buku</title>
</head>

<body>
  <ul>
    <?php foreach ($buku as $iden) : ?>
      <li>
        <!-- pengiriman  -->
        <a href="latihan2.php?judul=<?php echo $iden["judul"]; ?>
        &pengarang=<?php echo $iden["pengarang"] ?>
        &penerbit=<?php echo $iden["penerbit"] ?>
        &halaman=<?php echo $iden["halaman"] ?>
        &cover=<?php echo $iden["cover"] ?>">
        <?php echo $iden["judul"]; ?> </a> 
      </li> <?php endforeach; ?>
    </ul>
</body>

</html>