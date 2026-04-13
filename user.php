<?php
session_start();
if ($_SESSION['role'] != "user") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h2>Halaman User</h2>

        <ul>
            <li><a href="peminjaman.php">Pinjam Buku</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

</body>

</html>