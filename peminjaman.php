<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h2>Peminjaman</h2>

        <form action="simpan_peminjaman.php" method="POST">

            <label>Buku:</label>
            <select name="id_buku" required>
                <?php
                $buku = mysqli_query($conn, "SELECT * FROM buku");
                while ($b = mysqli_fetch_array($buku)) {
                    echo "<option value='$b[id_buku]'>$b[judul]</option>";
                }
                ?>
            </select>

            <?php if ($_SESSION['role'] == "admin") { ?>
                <label>Anggota:</label>
                <select name="id_anggota" required>
                    <?php
                    $a = mysqli_query($conn, "SELECT * FROM anggota");
                    while ($d = mysqli_fetch_array($a)) {
                        echo "<option value='$d[id_anggota]'>$d[nama]</option>";
                    }
                    ?>
                </select>
            <?php } else {
                $user = mysqli_query($conn, "SELECT * FROM anggota WHERE username='$_SESSION[username]'");
                $u = mysqli_fetch_array($user);
                ?>
                <input type="hidden" name="id_anggota" value="<?= $u['id_anggota'] ?>">
            <?php } ?>

            <label>Tanggal:</label>
            <input type="date" name="tanggal" required>

            <button type="submit">Simpan</button>
        </form>

        <table>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;

            if ($_SESSION['role'] == "admin") {
                $data = mysqli_query($conn, "
                SELECT peminjaman.*, buku.judul, anggota.nama 
                FROM peminjaman
                JOIN buku ON peminjaman.id_buku=buku.id_buku
                JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
            ");
            } else {
                $data = mysqli_query($conn, "
                SELECT peminjaman.*, buku.judul, anggota.nama 
                FROM peminjaman
                JOIN buku ON peminjaman.id_buku=buku.id_buku
                JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
                WHERE anggota.username='$_SESSION[username]'
            ");
            }

            while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['judul'] ?></td>
                    <td><?= $d['nama'] ?></td>
                    <td><?= $d['tanggal_pinjam'] ?></td>
                    <td>
                        <?php if ($_SESSION['role'] == "admin") { ?>
                            <a href="hapus_peminjaman.php?id=<?= $d['id_peminjaman'] ?>">Hapus</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <a class="btn-kembali" href="<?= ($_SESSION['role'] == 'admin') ? 'index.php' : 'user.php'; ?>">Kembali</a>

    </div>

</body>

</html>