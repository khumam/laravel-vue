<?php
// Bangun Datar
function persegi($a)
{
    echo "<b>Rumus Luas Persegi</b> <br>";
    echo "Diketahui : S = " . $a . "<br>";
    echo "Penyelesaian : <br> L = " . $a . " x " . $a . "<br>";
    $lp = $a * $a;
    echo "L = " . $lp;
}

function persegiPanjang($a, $b)
{
    echo "<b>Rumus Luas Persegi Panjang</b> <br>";
    echo "Diketahui : P = " . $a . "<br>";
    echo "Diketahui : L = " . $b . "<br>";
    echo "Penyelesaian : <br> L = " . $a . " x " . $b . "<br>";
    $lpp = $a * $b;
    echo "L = " . $lpp;
}

function segitiga($a, $b)
{
    echo "<b>Rumus Luas Segitiga</b> <br>";
    echo "Diketahui : A = " . $a . "<br>";
    echo "Diketahui : T = " . $b . "<br>";
    echo "Penyelesaian : <br> L = 1/2 x " . $a . " x " . $b . "<br>";
    $ls = 0.5 * $a * $b;
    echo "L = " . $ls;
}

// Bangun Ruang
function balok($a, $b, $c)
{
    echo "<b>Rumus Volume Balok</b> <br>";
    echo "Diketahui : P = " . $a . "<br>";
    echo "Diketahui : L = " . $b . "<br>";
    echo "Diketahui : T = " . $c . "<br>";
    echo "Penyelesaian : <br> V = " . $a . " x " . $b . " x " . $c . "<br>";
    $vb = $a * $b * $c;
    echo "V = " . $vb;
}

function tabung($a, $b)
{
    echo "<b>Rumus Luas Tabung</b> <br>";
    echo "Diketahui : R = " . $a . "<br>";
    echo "Diketahui : T = " . $b . "<br>";
    echo "Penyelesaian : <br> V = 3.14 x " . $a . " x " . $a . " x " . $b . "<br>";
    $vt = 3.14 * $a * $a * $b;
    echo "V = " . $vt;
}

// Yang ditampilkan
echo "<b>Bangun Datar</b>";
echo "<hr><br>";

persegi(16);
echo "<hr><br>";

persegiPanjang(8, 7);
echo "<hr><br>";

segitiga(15, 7);
echo "<hr><br>";

echo "<hr><br>";
echo "<b>Bangun Ruang</b>";
echo "<hr><br>";

balok(7, 11, 13);
echo "<hr><br>";

tabung(8, 19);
echo "<hr><br>";
