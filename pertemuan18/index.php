<?php
session_start();
// jika user belum melakukan login maka akan di alihkan ke dalam login.php
// jika tidak ada session login
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerhalaman = 3;
// mysqli_num_rows($result); akan menghasilkan ada berapa baris dari queri() artinya ada berapa mahasiswa dari table mahasiswa
// $jumlahData berisi jumlah data dari $result / jumlah data mahasiswanya
// count untuk menghitung berapa baris
$jumlahData = count(query("SELECT * FROM mahasiswa"));
// menghitung jumlah halaman
// round();membulatkan bilangan pecahan ke desimal terdekatnya
// floor();membulatkan bilangan pecahan ke desimal kebawah
// ceil(); membulatkan bilangan pecahan ke desimal keatas
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

// mencari sekarang kita berada dihalaman ke berapa
// menggunakan operator ternary
// jika kodisinya true maka $halamanAktif  ? diisi dengan $_GET["halaman"] jika false : maka $halamanAktif diisi halaman 1 
// misal jika user login maka otomatis urlnya index.php berdada pada halaman ke 1
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

// menghitung awal data yang ditampilkan per halaman
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

// LIMIT dimulai dari,Jumlah data perhalaman
$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData,$jumlahDataPerhalaman");
// mahasiswa akan berisi data dari function cari ,dan fuction cari akan mendapatkan data dari user yang diketikkan
if(isset($_POST["cari"])){
  // variabel mahasiswa dibawah ini
  $mahasiswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
</head>
<body>
  <a href="logout.php">Logout</a>
  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah Data</a>
  <br><br>
  <!-- fungsi auto focus agar saat masuk halaman akan langsung aktif kpd field yang dituju -->
  <!-- autocomplete agar menghapus histori pencarian -->
  <!-- placeholder membuat tulisan transparan pada field -->
  <form action="" method="post">

    <input type="text" name="keyword" autofocus autocomplete="off" placeholder="Masukkan keyword pencarian..." size="45">
    <button type="submit" name="cari">Cari</button>
    
  </form>
  <br>
<!-- navigasi -->
<!-- membuat panah -->
<?php if ($halamanAktif > 1) :?>
  <a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo</a>
<?php endif; ?>

<!-- $i=1 agar halaman dimulai dari halaman ke 1 -->
<?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
  <!-- memberi warna pada hal yang di klik -->
  <?php if ($i == $halamanAktif) :?>
    <a href="?halaman=<?= $i ?>"style="font-weight: bold; color: red;"><?= $i ?></a>
  <?php else: ?>
    <a href="?halaman=<?= $i ?>"><?= $i ?></a>
  <?php endif; ?>
<?php endfor; ?>

<?php if ($halamanAktif < $jumlahHalaman) :?>
  <a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo</a>
<?php endif; ?>
  <table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>Gambar</th> 
    <th>NIM</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Jurusan</th>
  </tr>
<?php $i=1; ?>
<?php foreach ($mahasiswa as $row):?>
  <tr>
    <td><?php echo $i; ?></td>
    <td>
      <a href="ubah.php?id=<?= $row["id"];?>">Ubah</a> |
      <a href="hapus.php?id=<?= $row["id"]; ?>"onclick="return confirm('Yakin ingin Menghapus?');
      ">Hapus</a>
    </td>
    <td><img src="images/<?= $row["gambar"]; ?>" width="50"></td>
    <td><?php echo $row["nim"]; ?></td>
    <td><?php echo $row["nama"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["jurusan"]; ?></td>
  </tr>
  <?php $i++ ?>
<?php endforeach;  ?>
  </table>
</body>
</html>