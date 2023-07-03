<?php
echo "Jari - jari = 12 <br>";
echo "Luas Lingkaran = 3,14 x jari-jari x jari_jari <br>";
$jari_jari = 12;
$luas_lingkaran = 3.14 * $jari_jari * $jari_jari;
echo " 3.14 * $jari_jari * $jari_jari = $luas_lingkaran<br><br>";

echo "Alas = 4 <br>";
echo "Tinggi = 8 <br>";
echo "Luas Segitiga = (Alas x Tinggi) / 2 <br>";
$alas = 4;
$tinggi = 8;
$luas_segitiga = ($alas * $tinggi)/2;
echo " ($alas x $tinggi)/2 = $luas_segitiga<br><br>";

echo "Sisi = 8 <br>";
echo "Luas Persegi = Sisi x Sisi <br>";
$sisi = 8;
$luas_persegi = $sisi * $sisi;
echo " $sisi x $sisi = $luas_persegi <br><br>";

echo "Panjang = 10 <br>";
echo "Lebar = 12 <br>";
echo "Luas Persegi Panjang = Panjang x Lebar <br>";
$panjang = 10;
$lebar = 12;
$luas_persegi_panjang = $panjang * $lebar;
echo " $panjang x $lebar = $luas_persegi_panjang<br><br>";

echo "Sisi 1 = 8 <br>";
echo "Sisi 2 = 12 <br>";
echo "Tinggi = 6 <br>";
echo "Luas Trapesium = 1/2 x tinggi (sisi 1 + sisi2) <br>";
$sisi1 = 8;
$sisi2 = 12;
$tinggi_trapesium = 6;
$luas_trapesium = 1/2 * $tinggi_trapesium * ($sisi1 + $sisi2);
echo " 1/2 x $tinggi_trapesium( $sisi1 + $sisi2 ) = $luas_trapesium<br><br>";

?>