<?php
include "koneksi.php";
mysqli_query($conn, "INSERT INTO anggota VALUES('', '$_POST[nama]', '$_POST[kelas]', '$_POST[username]', '$_POST[password]', '$_POST[role]')");
header("Location: anggota.php");
?>