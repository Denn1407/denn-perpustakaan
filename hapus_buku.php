<?php
include "koneksi.php";
mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$_GET[id]'");
header("Location: buku.php");
?>