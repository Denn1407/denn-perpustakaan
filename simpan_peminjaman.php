<?php
include "koneksi.php";
mysqli_query($conn, "INSERT INTO peminjaman VALUES('', '$_POST[id_buku]', '$_POST[id_anggota]', '$_POST[tanggal]')");
header("Location: peminjaman.php");
?>