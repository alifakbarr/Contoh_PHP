<?php 
require 'koneksi.php';

if(isset($_POST["submit"])){
  if(tambah($_POST)>0){
    echo "
      <script>
        alert('data berhasil ditambah');
        document.location.href='index.php';
      </script>
    ";
  }else{
    echo "
    <script>
      alert('data gagal ditambah');
      document.location.href='index.php';
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
  <form method="POST" action="" enctype="multipart/form-data">
<ul>  
<h1>Tambah Data Mahasiswa</h1>
  <li>
  <label for="nim">NIM : </label>
  <input type="text" name="nim" id="nim" required>
  </label>
  </li>
  <li>
  <label for="nama">Nama : </label>
  <input type="text" name="nama" id="nama" required>
  </label>
  </li>
  <li>
  <label for="email">Email : </label>
  <input type="text" name="email" id="email" required>
  </label>
  </li>
  <li>
  <label for="jurusan">Jurusan : </label>
  <input type="text" name="jurusan" id="jurusan" required>
  </label>
  </li>
  <li>
    <label for="gambar">Gambar : </label>
    <input type="file" name="gambar" id="gambar" required>
    </label>
  </li>
  <li>
    <button type="submit" name="submit">Submit</button>
  </li>
  </ul>
</form>
</body>
</html>