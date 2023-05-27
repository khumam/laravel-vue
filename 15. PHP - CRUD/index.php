<?php
include_once("db_connect.php");
$buku = mysqli_query($conn, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku
                        LEFT JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang
                        LEFT JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
                        LEFT JOIN katalog ON katalog.id_katalog = buku.id_katalog
                        ORDER BY judul ASC");
?>

<html>

<head>
    <title>Homepage</title>
</head>

<body>
    <center>
        <a href="index.php">Buku</a> |
        <a href="#">Pengarang</a> |
        <a href="#">Penerbit</a> |
        <a href="#">Katalog</a>
        <hr>
    </center>

    <a href="add.php">Tambah Buku Baru</a> <br><br>

    <table width='80%' border=1>
        <tr>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Tahun</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Katalog</th>
            <th>Stok</th>
            <th>Harga Pinjam</th>
            <th>Aksi</th>
        </tr>
        <?php while ($b = mysqli_fetch_array($buku)) : ?>
            <tr>
                <td><?= $b['isbn']; ?></td>
                <td><?= $b['judul']; ?></td>
                <td><?= $b['tahun']; ?></td>
                <td><?= $b['nama_pengarang']; ?></td>
                <td><?= $b['nama_penerbit']; ?></td>
                <td><?= $b['nama_katalog']; ?></td>
                <td><?= $b['qty_stok']; ?></td>
                <td><?= $b['harga_pinjam']; ?></td>
                <td><a href='edit.php?isbn=<?= $b['isbn'] ?>'>Edit</a> | <a href='delete.php?isbn=<?= $b['isbn'] ?>'>Delete</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>