<?php
$a = 5;
$b = 4;
$c = 8;

echo "5 Bangun Datar dan Rumus Luas";
echo "<hr><br>";

echo "1. Persegi (Luas Persegi = S x S)";
echo "<hr>";
echo "Diketahui : S = " . $a . "<br>";
echo "Penyelesaian : <br> L = " . $a . " x " . $a . "<br>";
$lp = $a * $a;
echo "L = " . $lp;
echo "<hr><br>";

echo "2. Persegi Panjang (Luas Persegi Panjang = P x L)";
echo "<hr>";
echo "Diketahui : P = " . $a . "<br>";
echo "Diketahui : L = " . $b . "<br>";
echo "Penyelesaian : <br> L = " . $a . " x " . $b . "<br>";
$lpp = $a * $b;
echo "L = " . $lpp;
echo "<hr><br>";

echo "3. Segitiga (Luas Segitiga = 1/2A x T)";
echo "<hr>";
echo "Diketahui : A = " . $a . "<br>";
echo "Diketahui : T = " . $b . "<br>";
echo "Penyelesaian : <br> L = 1/2 x " . $a . " x " . $a . "<br>";
$ls = 0.5 * $a * $a;
echo "L = " . $ls;
echo "<hr><br>";

echo "4. Jajar Genjang (Luas Jajar Genjang = A x T)";
echo "<hr>";
echo "Diketahui : A = " . $b . "<br>";
echo "Diketahui : T = " . $c . "<br>";
echo "Penyelesaian : <br> L = " . $b . " x " . $c . "<br>";
$ljg = $b * $c;
echo "L = " . $ljg;
echo "<hr><br>";

echo "5. Trapesium (Luas Trapesium = 1/2 x (A + B) x T)";
echo "<hr>";
echo "Diketahui : A = " . $a . "<br>";
echo "Diketahui : B = " . $b . "<br>";
echo "Diketahui : T = " . $c . "<br>";
echo "Penyelesaian : <br> L = 1/2 x (" . $a . " + " . $b . ") x " . $c . "<br>";
$lt = 0.5 * ($a + $b) * $c;
echo "L = " . $lt;
echo "<hr><br>";
