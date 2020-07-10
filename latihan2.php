<?php 
// cek apakah tidak ada data di $_GET
if(!isset($_GET["judul"])||
(!isset($_GET["pengarang"]))||
(!isset($_GET["penerbit"]))||
(!isset($_GET["halaman"])))
  {
    //redirect
    header("Location:latihan1.php");
    exit;
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Buku</title>
</head>

<body>
  <h1>Detail Buku</h1>
  <ul>
    <!-- setelah dikirim akan ditangkap -->
    <li><img src="images/<?php echo $_GET["cover"] ?>"></li>
    <li><?php echo $_GET["judul"]; ?></li>
    <li><?php echo $_GET["pengarang"]; ?></li>
    <li><?php echo $_GET["penerbit"]; ?></li>
    <li><?php echo $_GET["halaman"]; ?></li>
  </ul>
  <a href="latihan1.php">kembali</a>
</body>

</html>