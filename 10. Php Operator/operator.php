<?php

echo "Luas Persegi = Sisi x Sisi <br>";
$sisi = 5;
$luas_persegi = $sisi * $sisi;
echo " $sisi x $sisi = $luas_persegi <br><br>";

echo "Luas Persegi Panjang = Panjang x Lebar <br>";
$panjang = 9;
$lebar = 7;
$luas_persegi_panjang = $panjang * $lebar;
echo " $panjang x $lebar = $luas_persegi_panjang<br><br>";

echo "Luas Segitiga = (Alas x Tinggi) / 2 <br>";
$alas = 6;
$tinggi = 10;
$luas_segitiga = ($alas * $tinggi)/2;
echo " ($alas x $tinggi)/2 = $luas_segitiga<br><br>";

echo "Luas Jajargenjang = Alas x Tinggi <br>";
$alas_jajargenjang = 6;
$tinggi_jajargenjang = 20;
$luas_jajargenjang = ($alas_jajargenjang * $tinggi_jajargenjang);
echo " $alas_jajargenjang x $tinggi_jajargenjang = $luas_jajargenjang<br><br>";

echo "Luas Lingkaran = 3,14 x jari-jari x jari_jari <br>";
$jari_jari = 10;
$luas_lingkaran = 3.14 * $jari_jari * $jari_jari;
echo " 3.14 * $jari_jari * $jari_jari = $luas_lingkaran<br><br>";

echo "Volume Kubus = sisi x sisi x sisi <br>";
$sisi_kubus = 5;
$volume_kubus = $sisi * $sisi * $sisi;
echo " $sisi x $sisi x $sisi = $volume_kubus<br><br>";

echo "Volume Balok = Panjang x Lebar x Tinggi <br>";
$panjang_balok = 5;
$lebar_balok = 8;
$tinggi_balok = 10;
$volume_balok = $panjang_balok * $lebar_balok * $tinggi_balok;
echo " $panjang_balok x $lebar_balok x $tinggi_balok = $volume_balok<br><br>";

echo "Prisma Segitiga = ((Alas x tinggi)/2) x Tinggi <br>";
$alas_segitiga = 6;
$tinggi_segitiga = 10;
$tinggi_prisma = 5;
$volume_prisma_segitiga = (($alas_segitiga * $tinggi_segitiga)/2) * $tinggi_prisma;
echo " (($alas_segitiga * $tinggi_segitiga)/2) * $tinggi_prisma = $volume_prisma_segitiga<br><br>";

?>