<?php 
require 'functions.php';
// menangkap id
$id=$_GET["id"];

if(hapus($id)>0){
  echo "
      <script>alert('Data berhasil dihapus');
      document.location.href= 'index.php';
      </script>
    ";
}else{
  echo "
      <script>alert('Data berhasil dihapus');
      document.location.href= 'index.php';
      </script>
    ";
}

?>