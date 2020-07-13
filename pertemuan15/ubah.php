<?php 
require 'functions.php';
//ambil data di url
$id=$_GET["id"];

//query data mahasiswa berdasarkan id
$mhs=query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  //cek apakah data berhasil di ubah atau tidak
  if (ubah($_POST)>0) {
    echo "
      <script>alert('Data berhasil diubah');
      document.location.href= 'index.php';
      </script>
    ";
  }else {
    echo "
      <script>alert('Data gagal diubah');
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
  <title>Ubah Data</title>
</head>
<body>
  <h1>Ubah Data Mahasiswa</h1>
  <form method="post" action="" enctype="multipart/form-data">

<!-- fungsi dari required agar user mewajibkan mengisi data -->
<!-- value akan otomatis mengisi field -->

  <ul>
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"];?>">
    <li>
  <label for="nim">Nim : </label>
  <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
  </label>
  </li>
  <li>
    <label for="nama">Nama : </label>
    <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"];?>">
    </label>
  </li>
  <li>
    <label for="jurusan">Jurusan : </label>
    <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"];?>">
    </label>
  </li>
  <li>
    <label for="email">Email : </label>
    <input type="text" name="email" id="email" required value="<?= $mhs["email"];?>">
    </label>
  </li>
  <li>
    <label for="gambar">Gambar : </label><br>
    <img src="images/<?= $mhs['gambar'] ?>" width="50"><br>
    <input type="file" name="gambar" id="gambar">
    </label>
  </li>
  <li>
  <button type="submit" name="submit">Ubah</button>
  </li>  
</ul>
</form>
</body>
</html>