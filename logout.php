<?php
include "koneksi.php";

if(isset($_POST['daftar'])){
    
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // validasi kosong
    if(empty($nama) || empty($kelas) || empty($username) || empty($password)){
        echo "Data tidak boleh kosong!";
        exit();
    }

    // cek username
    $cek = mysqli_query($conn, "SELECT * FROM anggota WHERE username='$username'");
    if(mysqli_num_rows($cek) > 0){
        echo "Username sudah digunakan!";
        exit();
    }

    // simpan data
    mysqli_query($conn, "
    INSERT INTO anggota (nama, kelas, username, password, role)
    VALUES ('$nama', '$kelas', '$username', '$password', 'user')
    ");

    echo "<script>
        alert('Pendaftaran berhasil!');
        window.location='login.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="login-page">

<div class="login-box">
    <h2>Daftar Akun</h2>

    <form method="POST">

        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Kelas</label>
        <input type="text" name="kelas" required>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="daftar">Daftar</button>
    </form>

    <br>
    <a href="login.php">Sudah punya akun? Login</a>
</div>

</body>
</html>
