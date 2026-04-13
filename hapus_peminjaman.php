<?php
include "koneksi.php";
mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman='$_GET[id]'");
header("Location: peminjaman.php");
?>