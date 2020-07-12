<?php 
$conn=mysqli_connect("localhost","root","","phpdasar");

function query($query){
  global $conn;
  $result=mysqli_query($conn,$query);
  $rows=[];
  while($row = mysqli_fetch_assoc($result)){
    $rows[]=$row;
  }
  return $rows;
}
function tambah($data){
  global $conn;

  $nim = htmlspecialchars($data["nim"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  
  $gambar =upload();
  if (!$gambar) {
    return false;
  }

  $query ="INSERT INTO mahasiswa VALUES
    ('','$nim','$nama','$email','$jurusan','$gambar')";
  mysqli_query($conn,$query);

  return mysqli_affected_rows($conn);
}
function upload(){
  $namaFile = $_FILES["gambar"]["name"];
  $ukuranFile = $_FILES["gambar"]["size"];
  $error = $_FILES["gambar"]["error"];
  $tmpName = $_FILES["gambar"]["tmp_name"];

  if ($error === 4) {
    echo "<script>
          alert('Upload gambar dulu');
          </script>";
          return false;
  }
  $extensiGambarValid=['jpg','png','jpeg'];
  $extensiGambar=explode('.', $namaFile);
  $extensiGambar=strtolower(end($extensiGambar));

  if (!in_array($extensiGambar, $extensiGambarValid)) {
    echo "<script>
    alert('yang anda upload harus gambar');
    </script>";
    return false;
  }
  if ($ukuranFile >1000000) {
    echo "<script>
    alert('Ukuran Terlalu Besar');
    </script>";
    return false;
  }
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $extensiGambar;
  move_uploaded_file($tmpName, 'images/'.$namaFileBaru);

  return $namaFileBaru;
  
}
function hapus ($id){
  global $conn;
  mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");

  return mysqli_affected_rows($conn);
}

function ubah($data){
  global $conn;

  $id= $data["id"];
  $nim = htmlspecialchars($data["nim"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);
  if ($_FILES['gambar']['error']===4) {
    $gambar = $gambarLama;
  }else{
    $gambar = upload();
  }
  $query  ="UPDATE mahasiswa SET 
  nim='$nim',
  nama='$nama',
  email='$email',
  jurusan='$jurusan',
  gambar='$gambar'
  WHERE id=$id";
  mysqli_query($conn,$query);

  return mysqli_affected_rows($conn);
}
function cari($keyword){
  $query="SELECT * FROM mahasiswa WHERE 
  nim LIKE '%$keyword%' OR
  nama LIKE '%$keyword%' OR
  email LIKE '%$keyword%' OR
  jurusan LIKE '%$keyword%'";

  return query($query);

}

function registrasi($data){
  global $conn;
  $username =stripslashes($data["username"]);
  $password =mysqli_real_escape_string($conn,$data["password"]);
  $password2 =mysqli_real_escape_string($conn,$data["password2"]);

  //cek apakah password sama dengan confirm
  if ($password !== $password2) {
    echo "<script>
      alert('Password yang dikonfirmasi tidak sama');
    </script>";
    return false;
  }

  //encript password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // cek apakah username sudah pernah dibuat
  $result=mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
      alert('Username sudah dibuat');
    </script>";
    return false;
  }
  // masukkan user baru
  mysqli_query($conn,"INSERT INTO user VALUES ('','$username','$password')");

  return mysqli_affected_rows($conn);
  }
?>