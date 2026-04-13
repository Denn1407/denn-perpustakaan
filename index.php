<?php
session_start();
if ($_SESSION['role'] != "admin") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h2>Dashboard Admin</h2>

        <ul>
            <li><a href="buku.php">Data Buku</a></li>
            <li><a href="anggota.php">Data Anggota</a></li>
            <li><a href="peminjaman.php">Peminjaman</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

</body>

</html>