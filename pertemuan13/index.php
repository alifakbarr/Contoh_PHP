<?php 
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
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
    <td><?php echo$i; ?></td>
    <td>
      <a href="ubah.php?id=<?= $row["id"];?>">Ubah</a> |
      <a href="hapus.php?id=<?= $row["id"]; ?>"onclick="return confirm('Yakin ingin Menghapus?');"
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