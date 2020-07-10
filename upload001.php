<?php
if (isset($_POST['upload'])) {
  $dir_upload = "images/";
  $nama_file = $_FILES['file']['name'];
  if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    $cek = move_uploaded_file($_FILES['file']['tmp_name'], $dir_upload . $nama_file);
    if ($cek) {
      die("file berhasil diupload");
    } else {
      die("file gagal diupload");
    }
  }
}
