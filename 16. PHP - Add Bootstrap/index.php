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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <center>
        <nav class="navbar navbar-expand-lg" style="background-color: lightgray;">
            <div class="collapse navbar-collapse offset-md-4" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item ms-4">
                        <a class="nav-link active" aria-current="page" href="index.php">Buku</a>
                    </li>

                    <li class="nav-item ms-4">
                        <a class="nav-link active" aria-current="page" href="#">Pengarang</a>
                    </li>

                    <li class="nav-item ms-4">
                        <a class="nav-link active" aria-current="page" href="#">Penerbit</a>
                    </li>

                    <li class="nav-item ms-4">
                        <a class="nav-link active" href="#"><i class="fas fa-sign-in-alt"></i> Katalog</a>
                    </li>
                </ul>
            </div>
        </nav>
    </center>

    <a class="btn btn-success ms-5 mt-4" href="add.php"> <b>+ Buku Baru</b> </a> <br><br>
    <center>
        <table class="table table-bordered" style="align-content: center; width:93%;">
            <tr>
                <thead class="table-primary">
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Tahun</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Katalog</th>
                    <th>Stok</th>
                    <th>Harga Pinjam</th>
                    <th>Aksi</th>
                </thead>
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
                    <td><a class="btn btn-primary" href='edit.php?isbn=<?= $b['isbn'] ?>'>Edit</a> <a class="btn btn-danger" href='delete.php?isbn=<?= $b['isbn'] ?>'>Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>