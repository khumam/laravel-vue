<?php

echo "Volume Balok = Panjang x Lebar x Tinggi <br>";
$panjang_balok = 3;
$lebar_balok = 10;
$tinggi_balok = 8;
$volume_balok = $panjang_balok * $lebar_balok * $tinggi_balok;
echo " $panjang_balok x $lebar_balok x $tinggi_balok = $volume_balok<br><br>";

echo "Volume Kubus = sisi x sisi x sisi <br>";
$sisi_kubus = 8;
$volume_kubus = $sisi_kubus * $sisi_kubus * $sisi_kubus;
echo " $sisi_kubus x $sisi_kubus x $sisi_kubus = $volume_kubus<br><br>";

echo "Volume Tabung = 3,14 x jari-jari lingkaran x jari-jari lingkaran x tinggi <br>";
$jari_jari = 10;
$tinggi_tabung = 12;
$volume_tabung = 3.14 * $jari_jari * $jari_jari * $tinggi_tabung;
echo " 3.14 * $jari_jari * $jari_jari * $tinggi_tabung = $volume_tabung<br><br>";

?>