<?php
include "koneksi.php";
mysqli_query($conn, "INSERT INTO buku VALUES('', '$_POST[judul]', '$_POST[pengarang]', '$_POST[tahun]')");
header("Location: buku.php");
?>