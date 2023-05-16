<html>

<head>
    <title>Looping 2</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        th {
            background-color: aqua;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
        <?php
        $j = 10;
        while ($j > 0) {
            for ($i = 1; $i <= 10; $i++) {
        ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>Nama ke <?= $i; ?></td>
                    <td>Kelas <?= $j--; ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>

</body>

</html>