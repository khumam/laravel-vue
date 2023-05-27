<?php
include_once("db_connect.php");

$penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
$pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
$katalog = mysqli_query($conn, "SELECT * FROM katalog");
?>

<html>

<head>
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <a class="btn btn-secondary mt-5 ms-5" href="index.php">Kembali</a>
    <center>
        <h1>Tambah Buku</h1>
        <form action="add.php" method="post" name="form1">
            <table width=25% border="0">
                <tr>
                    <td>ISBN</td>
                    <td><input class="form-control" type="text" name="isbn"></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><input class="form-control" type="text" name="judul"></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td><input class="form-control" type="text" name="tahun"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>
                        <select class="form-control" name="id_penerbit">
                            <?php while ($penerbitData = mysqli_fetch_array($penerbit)) : ?>
                                <option value="<?= $penerbitData['id_penerbit']; ?>"><?= $penerbitData['nama_penerbit']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>
                        <select class="form-control" name="id_pengarang">
                            <?php while ($pengarangData = mysqli_fetch_array($pengarang)) : ?>
                                <option value="<?= $pengarangData['id_pengarang']; ?>"><?= $pengarangData['nama_pengarang']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Katalog</td>
                    <td>
                        <select class="form-control" name="id_katalog">
                            <?php while ($katalogData = mysqli_fetch_array($katalog)) : ?>
                                <option value="<?= $katalogData['id_katalog']; ?>"><?= $katalogData['nama']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Qty Stok</td>
                    <td><input class="form-control" type="text" name="qty_stok"></td>
                </tr>
                <tr>
                    <td>Harga Pinjam</td>
                    <td><input class="form-control" type="text" name="harga_pinjam"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"><input class="form-control btn btn-success" type="submit" name="submit" value="Add"></td>
                </tr>
            </table>
        </form>
    </center>

    <?php
    if (isset($_POST['submit'])) {
        $isbn = $_POST['isbn'];
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $id_penerbit = $_POST['id_penerbit'];
        $id_pengarang = $_POST['id_pengarang'];
        $id_katalog = $_POST['id_katalog'];
        $qty_stok = $_POST['qty_stok'];
        $harga_pinjam = $_POST['harga_pinjam'];

        include_once("db_connect.php");

        $result = mysqli_query($conn, "INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");

        header("Location:index.php");
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>