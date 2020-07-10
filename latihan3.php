
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POST</title>
</head>
<body>
  <?php if(isset($_POST["submit"])): ?>
    <h2>Selamat datang <?php echo $_POST["nama"]; ?></h2>
  
  <?php endif; ?>
  <form method="POST">
    Masukkan nama anda : 
    <input type="text" name="nama">
    <br>
    <input type="submit"name="submit" value="Kirim">
  </form>
</body>
</html>