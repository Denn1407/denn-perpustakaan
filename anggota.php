<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h2>Data Anggota</h2>

        <form action="simpan_anggota.php" method="POST">
            <label>Nama:</label>
            <input type="text" name="nama">

            <label>Kelas:</label>
            <input type="text" name="kelas">

            <label>Username:</label>
            <input type="text" name="username">

            <label>Password:</label>
            <input type="text" name="password">

            <label>Role:</label>
            <select name="role">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <button type="submit">Simpan</button>
        </form>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM anggota");
            while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['nama'] ?></td>
                    <td><?= $d['kelas'] ?></td>
                    <td><?= $d['username'] ?></td>
                    <td><?= $d['role'] ?></td>
                    <td><a href="hapus_anggota.php?id=<?= $d['id_anggota'] ?>">Hapus</a></td>
                </tr>
            <?php } ?>
        </table>

        <a class="btn-kembali" href="index.php">Kembali</a>

    </div>

</body>

</html>