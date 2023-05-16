<html>

<head>
    <title>
        Nilai BMI
    </title>
</head>

<?php
// mengdefiniskan variabel dan diset kosong
$nama = $gtb = $tb = $bb = $bmi = $bmii = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = $_POST["nama"];
    $gtb    = $_POST["tb"];
    $tb  = $gtb / 100;
    $bb      = $_POST['bb'];
    $bmi   = $bb / ($tb ** 2);
    $bmii = round($bmi, 1);
}
?>

<body>
    <form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama :</label><br>
        <input type="text" name="nama"> <br><br>
        <label for="tb">Tinggi Badan :</label><br>
        <input type="text" name="tb"> <br><br>
        <label for="bb">Berat Badan :</label><br>
        <input type="text" name="bb"> <br><br>
        <input type="submit">
    </form>

    <?php
    if (!empty($nama)) {
        if ($bmii < 18.5) {
            echo "Halo, " . $nama . ". Nilai BMI anda Adalah " . $bmii . " Anda Termasuk Kurus";
        } elseif ($bmii >= 18.5 && $bmi <= 24.9) {
            echo "Halo, " . $nama . ". Nilai BMI anda Adalah " . $bmii . " Anda Termasuk Sedang";
        } else {
            echo "Halo, " . $nama . ". Nilai BMI anda Adalah " . $bmii . " Anda Termasuk Gemuk";
        }
    } else {
        echo "Silahkan Input Data";
    }
    ?>

</body>

</html>