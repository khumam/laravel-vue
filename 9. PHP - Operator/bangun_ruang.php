<?php
$a = 5;
$b = 4;
$c = 8;

echo "3 Bangun Ruang dan Rumus Volume";
echo "<hr><br>";

echo "1. Kubus (Volume Kubus = S x S x S)";
echo "<hr>";
echo "Diketahui : S = " . $a . "<br>";
echo "Penyelesaian : <br> V = " . $a . " x " . $a . " x " . $a . "<br>";
$vk = $a * $a * $a;
echo "V = " . $vk;
echo "<hr><br>";

echo "2. Balok (Volume Balok = P x L x T)";
echo "<hr>";
echo "Diketahui : P = " . $a . "<br>";
echo "Diketahui : L = " . $b . "<br>";
echo "Diketahui : T = " . $c . "<br>";
echo "Penyelesaian : <br> V = " . $a . " x " . $b . " x " . $c . "<br>";
$vb = $a * $b * $c;
echo "V = " . $vb;
echo "<hr><br>";

echo "3. Tabung (Volume Tabung = 3.14 x R x R x T)";
echo "<hr>";
echo "Diketahui : R = " . $a . "<br>";
echo "Diketahui : T = " . $b . "<br>";
echo "Penyelesaian : <br> V = 3.14 x " . $a . " x " . $a . " x " . $b . "<br>";
$vt = 3.14 * $a * $a * $b;
echo "V = " . $vt;
echo "<hr><br>";
