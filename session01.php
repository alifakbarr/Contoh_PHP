<?php
// nama file : session01.php
// halaman ini merupakan halaman contoh penciptaan session.
// perintah session_start() harus ditaruh di perintah pertama
// tanpa spasi didepannya.perintah session_start() harus ada
// pada setiap halaman yang berhubungan dengan session.

session_start();
if (isset($_POST['Login'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  //periksa login
  if ($user == "irdho" && $pass == "irdho") {
    //meciptakan session
    $_SESSION['login'] = $user;
    //menuju ke halaman pemeriksaan session
    echo "<h2>anda berhasil login</h2>";
    echo "<h3>klik <a href='session02.php'>di sini (session02.php)</a>
    untuk menuju ke halaman pemeriksaan session";
  }
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Here</title>
  </head>

  <body>
    <form action="" method="POST">
      <h2>Login Here</h2>
      username: <input type="text" name="user"><br>
      password: <input type="pass" name="pass"><br>
      <input type="submit" name="Login" value="Log In">
    </form>
  </body>

  </html>

  <?}?>
<?php } ?>