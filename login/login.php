<?php 
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
  //cek username dan password
  if($_POST["username"]=="admin" && $_POST["password"]=="123"){
  //jika benar, redirect ke halaman admin
  header("Location:admin.php");
  exit;
  //jika salah,tampilkan pesan
  }else{
    $error = true;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Login Admin</h1>
  <?php if (isset($error)):?>
    <p style="color: red; font-style: italic;">username salah</p>
  <?php endif; ?>
  <form action="" method="post">
    <label for="username">Username :</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Password :</label>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit" name="submit">Login</button>
  </form>
</body>
</html>