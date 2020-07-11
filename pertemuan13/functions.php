<?php 
//koneksi database
//mempunyai 4 parameter
//ururtan =hostname,username,password,database
$conn= mysqli_connect("localhost","root","","phpdasar");

function query($query){
  global $conn;
  $result = mysqli_query($conn,$query);
  $rows=[];
  while ($row =mysqli_fetch_assoc($result)) {
    //variable rows berisi variabel row 
    $rows[]=$row;
  }
  return $rows;
}

function tambah($data){
  global $conn;
  //ambil data dari tiap elemen dalam form
  // htmlspecialchars agar usertidak bisa memasukkan tag html 
  $nim=htmlspecialchars($data["nim"]);
  $nama=htmlspecialchars($data["nama"]);
  $email=htmlspecialchars($data["email"]);
  $jurusan=htmlspecialchars($data["jurusan"]);
  // upload file
  $gambar = upload();
  if (!$gambar){

    // return false akan menyebabkan function tambah tidak akan dijalankan
    // lalu insert dibawah tidak akan dijalankan
    return false;
  }
   //query insert data
   $query="INSERT INTO mahasiswa VALUES 
   ('','$nim','$nama','$email','$jurusan','$gambar')";
   mysqli_query($conn,$query);

   return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES["gambar"]["name"];
    $UkuranFile= $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

// 4 adalah arti dari error kalau gambar tidak diupload
    if($error === 4){
      echo "<script>alert('Upload gambar dahulu');</script>";
// jika false maka function tambah gagal
      return false;
    }
//cek apakah yang diupload gambar
// ekstensi file yang boleh diupload
$ekstensiGambarValid=['jpg','jpeg','png'];
// mengambil ekstensi dari satu string gambar yang kita upload
// expload adalah fungsi yang digunakan untuk memecahkan string menjadi array
// contoh irdho.jpg menjadi ['irdho','jpg']
$ekstensiGambar =explode('.',$namaFile);
// fungsi end untuk mengambil array paling akhir
// fungsi strtolower memaksa ectensi menjadi huruf kecil
// contoh irdho.JPG menjadi irdho.jpg
$ekstensiGambar = strtolower(end($ekstensiGambar));
// in_array(,)fungsinya untuk mengecek apakah ada string didalam sebuah array
if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
  echo "<script>alert('Yang diupload harus gambar!');</script>";
  return false;
  }
// cek ukuruan jika terlalu besar
// 2000000 sama dengan 2mb dalam byte
if($UkuranFile > 1000000){
  echo "<script>
  alert('Ukuran gambar terlalu besar');
  </script>";
  return false;
  }
  //lolos pengecekan ,gambar siap upload
  // move_uploaded_file untuk memindahkan file
  // uniqid() akan membangkitkan string random
  //generate nama baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .=$ekstensiGambar;
  move_uploaded_file($tmpName,'images/'.$namaFileBaru);

  return $namaFileBaru;

}
function hapus($id){
  global $conn;
  mysqli_query($conn,"DELETE FROM mahasiswa WHERE id=$id");
  return mysqli_affected_rows($conn);
}

function ubah($data){
  global $conn;
  //ambil data dari tiap elemen dalam form
  // htmlspecialchars agar user tidak bisa memasukkan tag html

  $id = $data["id"];
  $nim=htmlspecialchars($data["nim"]);
  $nama=htmlspecialchars($data["nama"]);
  $email=htmlspecialchars($data["email"]);
  $jurusan=htmlspecialchars($data["jurusan"]);
  $gambarLama =htmlspecialchars($data["gambarLama"]);
  //jika user tidak upload maka $gambar diisi dengan gambar lama
  if($_FILES['gambar']['error']===4){
    $gambar = $gambarLama;
  }else{
    $gambar=upload();
  }
  
  //query ubah data
  $query="UPDATE mahasiswa SET
          nim='$nim',
          nama='$nama',
          email='$email',
          jurusan='$jurusan',
          gambar='$gambar'
          WHERE id=$id
          ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
  // LIKE artinya mirip
  // OR atau
  $query ="SELECT * FROM mahasiswa WHERE
  nim LIKE '%$keyword%' OR
  nama LIKE '%$keyword%' OR
  email LIKE '%$keyword%' OR 
  jurusan LIKE '%$keyword%'
  ";

// $query akan dikembalikan ke fuction query  hasilnya array associative dan akan masuk kedalam $mahasiswa di index.php / ditimpa
// query disini function
  return query($query);
}
?>