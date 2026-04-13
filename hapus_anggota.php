<?php
include "koneksi.php";
mysqli_query($conn, "DELETE FROM anggota WHERE id_anggota='$_GET[id]'");
header("Location: anggota.php");
?>