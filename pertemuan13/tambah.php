<?php 
require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  //cek apakah data berhasil di tambahkan atau tidak
  
  if (tambah($_POST)>0) {
    echo "
      <script>alert('Data berhasil ditambahkan');
      document.location.href= 'index.php';
      </script>
    ";
  }else {
    echo "
      <script>alert('Data gagal ditambahkan');
      document.location.href= 'index.php';
      </script>
    ";
    echo "<br>";
    echo mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
</head>
<body>
  <h1>Tambah Data Mahasiswa</h1>
  <form method="post" action="" enctype="multipart/form-data">
  <ul>
    <li>
  <label for="nim">Nim : </label>
  <input type="text" name="nim" id="nim" required>
  </label>
  </li>
  <li>
    <label for="nama">Nama : </label>
    <input type="text" name="nama" id="nama" required>
    </label>
  </li>
  <li>
    <label for="jurusan">Jurusan : </label>
    <input type="text" name="jurusan" id="jurusan" required>
    </label>
  </li>
  <li>
    <label for="email">Email : </label>
    <input type="text" name="email" id="email" required>
    </label>
  </li>
  <li>
    <label for="gambar">Gambar : </label>
    <input type="file" name="gambar" id="gambar">
    </label>
  </li>
  <li>
  <button type="submit" name="submit">Input</button>
  </li>  
</ul>
</form>
</body>
</html>