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

?>