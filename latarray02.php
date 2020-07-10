<?php
$mahasiswa = [
  ["nim" => "202", "nama" => "Irdho", "jurusan" => "IT", "gambar" => "1.jpg"],
  ["nim" => "203", "nama" => "Sur", "jurusan" => "TI", "gambar" => "2.jpg"]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <!-- //array assosiative
  //definisinya sama sperti array numerik,kecuali
  //keynya adalah string yang kita buat sendiri -->
  <?php foreach ($mahasiswa as $mhs) :
  ?>
    <ul>
      <li>
        <img src="images/<?php echo $mhs["gambar"]; ?>">
      </li>
      <li>nim : <?php echo $mhs["nim"]; ?></li>
      <li>nama : <?php echo $mhs["nama"]; ?></li>
      <li>jurusan : <?php echo $mhs["jurusan"]; ?></li>
    </ul>
  <?php endforeach;
  ?>
</body>

</html>