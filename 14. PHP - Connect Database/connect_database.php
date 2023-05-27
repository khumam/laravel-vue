<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            text-align: left;
            padding: 15px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $database = "perpus";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // echo "Connected successfully";
    // mysqli_close($conn);

    $sql = "SELECT * FROM buku WHERE qty_stok < 10";
    $result = $conn->query($sql);
    ?>
    <table>
        <tr>
            <th>ISBN</th>
            <th>Judul Buku</th>
            <th>quantity</th>
        </tr>
        <?php
        foreach ($result as $r) :
        ?>
            <tr>
                <td><?= $r['isbn']; ?></td>
                <td><?= $r['judul']; ?></td>
                <td><?= $r['qty_stok']; ?></td>

            </tr>
        <?php endforeach; ?>
    </table>


</body>

</html>