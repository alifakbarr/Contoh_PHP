<?php 
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'koneksi.php';
$jumlahDataPerhalaman= 3;

$jumlahData =count(query("SELECT * FROM mahasiswa"));

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awalData = ($jumlahDataPerhalaman * $halamanAktif) -$jumlahDataPerhalaman;


$mahasiswa =query("SELECT * FROM mahasiswa LIMIT $awalData,$jumlahDataPerhalaman");

if(isset($_POST["cari"])){
  $mahasiswa=cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
</head>
<body>
  <a href="logout.php">Logout</a>
  <h1>Data Mahasiswa</h1>
  <a href="tambah.php">Tambah Data</a>
  <br><br>
  <form action="" method="POST">
  <input type="text" name="keyword" autofocus autocomplete placeholder="Masukkan pencarian disini.." size="45">
  <button type="submit" name="cari">Cari</button>
  </form>

<?php if ($halamanAktif > 1) : ?>
  <a href="?halaman=<?= $halamanAktif -1 ?>">&laquo</a>
<?php endif; ?>

  <?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif):?>
    <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
        <?php else: ?>
    <a href="?halaman=<?= $i; ?>"><?= $i ?></a>
        <?php endif; ?>
  <?php endfor; ?>
<?php if($halamanAktif < $jumlahHalaman): ?>
  <a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo</a>
<?php endif; ?>
  <table border="1" cellpadding="10" cellspacing="0";>
    <tr>
      <th>No</th>
      <th>Aksi</th>
      <th>Foto</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Jurusan</th>
      <th>Email</th>
    </tr>
    <?php $i=1; ?>
    <?php foreach ($mahasiswa as $row): ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><a href="ubah.php?id=<?= $row["id"];?>">Ubah</a> | 
      <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin Hapus Data?');">Hapus</a>
      </td>
      <td><img src="images/<?=$row["gambar"];?>" width="50"></td>
      <td><?= $row["nim"]; ?></td>
      <td><?= $row["nama"]; ?></td>
      <td><?= $row["email"]; ?></td>
      <td><?= $row["jurusan"]; ?></td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
  </table>
</body>
</html>