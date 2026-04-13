<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h2>Data Buku</h2>

    <form action="simpan_buku.php" method="POST">
        <label>Judul:</label>
        <input type="text" name="judul">

        <label>Pengarang:</label>
        <input type="text" name="pengarang">

        <label>Tahun:</label>
        <input type="number" name="tahun">

        <button type="submit">Simpan</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM buku");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['judul'] ?></td>
            <td><?= $d['pengarang'] ?></td>
            <td><?= $d['tahun'] ?></td>
            <td><a href="hapus_buku.php?id=<?= $d['id_buku'] ?>">Hapus</a></td>
        </tr>
        <?php } ?>
    </table>

    <a class="btn-kembali" href="index.php">Kembali</a>

</div>

</body>
</html>