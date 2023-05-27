<html>

<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<?php
include_once("db_connect.php");
$isbn = $_GET['isbn'];

$buku = mysqli_query($conn, "SELECT * FROM buku WHERE isbn='$isbn'");
$penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
$pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
$katalog = mysqli_query($conn, "SELECT * FROM katalog");

while ($bukuData = mysqli_fetch_array($buku)) {
    $judul = $bukuData['judul'];
    $isbn = $bukuData['isbn'];
    $tahun = $bukuData['tahun'];
    $id_penerbit = $bukuData['id_penerbit'];
    $id_pengarang = $bukuData['id_pengarang'];
    $id_katalog = $bukuData['id_katalog'];
    $qty_stok = $bukuData['qty_stok'];
    $harga_pinjam = $bukuData['harga_pinjam'];
}
?>

<body>
    <a class="btn btn-secondary mt-5 ms-5" href="index.php">Kembali</a>
    <center>
        <h1>Edit Buku</h1>
        <form action="edit.php?isbn=<?php echo $isbn; ?>" method="post">
            <table width="25%" border="0">
                <tr>
                    <td>ISBN</td>
                    <td style="font-size: 11pt;"><?php echo $isbn; ?> </td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><input class="form-control" type="text" name="judul" value="<?php echo $judul; ?>"></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td><input class="form-control" type="text" name="tahun" value="<?php echo $tahun; ?>"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>
                        <select class="form-control" name="id_penerbit">
                            <?php
                            while ($penerbitData = mysqli_fetch_array($penerbit)) {
                                echo "<option " . ($penerbitData['id_penerbit'] == $id_penerbit ? 'selected' : '') . " value='" . $penerbitData['id_penerbit'] . "'>" . $penerbitData['nama_penerbit'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>
                        <select class="form-control" name="id_pengarang">
                            <?php
                            while ($pengarang_data = mysqli_fetch_array($pengarang)) {
                                echo "<option " . ($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : '') . " value='" . $pengarang_data['id_pengarang'] . "'>" . $pengarang_data['nama_pengarang'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Katalog</td>
                    <td>
                        <select class="form-control" name="id_katalog">
                            <?php
                            while ($katalog_data = mysqli_fetch_array($katalog)) {
                                echo "<option " . ($katalog_data['id_katalog'] == $id_katalog ? 'selected' : '') . " value='" . $katalog_data['id_katalog'] . "'>" . $katalog_data['nama'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Qty Stok</td>
                    <td><input class="form-control" type="text" name="qty_stok" value="<?php echo $qty_stok; ?>"></td>
                </tr>
                <tr>
                    <td>Harga Pinjam</td>
                    <td><input class="form-control" type="text" name="harga_pinjam" value="<?php echo $harga_pinjam; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input class="form-control btn btn-warning" type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </center>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['update'])) {

        $isbn = $_GET['isbn'];
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $id_penerbit = $_POST['id_penerbit'];
        $id_pengarang = $_POST['id_pengarang'];
        $id_katalog = $_POST['id_katalog'];
        $qty_stok = $_POST['qty_stok'];
        $harga_pinjam = $_POST['harga_pinjam'];

        include_once("db_connect.php");

        $result = mysqli_query($conn, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn';");

        header("Location:index.php");
    }
    ?>
</body>

</html>