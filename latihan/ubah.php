<?php 
require 'koneksi.php';

$id=$_GET["id"];

$mhs=query("SELECT * FROM mahasiswa WHERE id = $id")[0];


if(isset($_POST["submit"])){
  if(ubah($_POST)>0){
    echo "
      <script>
        alert('data berhasil diubah');
        document.location.href='index.php';
      </script>
    ";
  }else{
    echo "
    <script>
      alert('data gagal diubah');
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
  <title>Ubah Data</title>
</head>
<body>
  <form method="POST" action="">
<ul>  
<h1>Ubah Data Mahasiswa</h1>
  <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
  <li>
  <label for="nim">NIM : </label>
  <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
  </label>
  </li>
  <li>
  <label for="nama">Nama : </label>
  <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
  </label>
  </li>
  <li>
  <label for="email">Email : </label>
  <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
  </label>
  </li>
  <li>
  <label for="jurusan">Jurusan : </label>
  <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
  </label>
  </li>
  <li>
    <label for="gambar">Gambar : </label>
    <input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"]; ?>">
    </label>
  </li>
  <li>
    <button type="submit" name="submit">Submit</button>
  </li>
  </ul>
</form>
</body>
</html>