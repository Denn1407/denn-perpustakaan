<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn, "SELECT * FROM anggota WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $d = mysqli_fetch_assoc($data);

    $_SESSION['username'] = $d['username'];
    $_SESSION['role'] = $d['role'];

    if ($d['role'] == "admin") {
        header("Location: index.php");
    } else {
        header("Location: user.php");
    }
} else {
    echo "Login gagal!";
}
?>