<?php

function luas_persegi($sisi){
    echo "Sisi = $sisi <br>";
    echo "Luas Persegi = Sisi x Sisi <br>";
    $luas_persegi = $sisi * $sisi;
    echo " $sisi x $sisi = $luas_persegi <br><br>";
}

function luas_persegi_panjang($panjang,$lebar){
    echo "Panjang = $panjang <br>";
    echo "Lebar = $lebar <br>";
    echo "Luas Persegi Panjang = Panjang x Lebar <br>";
    $luas_persegi_panjang = $panjang * $lebar;
    echo " $panjang x $lebar = $luas_persegi_panjang<br><br>";
}

function luas_trapesium($sisi1,$sisi2,$tinggi){
    echo "Sisi 1 = $sisi1 <br>";
    echo "Sisi 2 = $sisi2 <br>";
    echo "Tinggi = $tinggi <br>";
    echo "Luas Trapesium = 1/2 x tinggi (sisi 1 + sisi2) <br>";
    $luas_trapesium = 1/2 * $tinggi * ($sisi1 + $sisi2);
    echo " 1/2 x $tinggi( $sisi1 + $sisi2 ) = $luas_trapesium<br><br>";
}

function luas_lingkaran($jari_jari){
    echo "Jari - jari = $jari_jari <br>";
    echo "Luas Lingkaran = 3,14 x jari-jari x jari_jari <br>";
    $luas_lingkaran = 3.14 * $jari_jari * $jari_jari;
    echo " 3.14 * $jari_jari * $jari_jari = $luas_lingkaran<br><br>";
}

function luas_segitiga($alas,$tinggi){
    echo "Alas = $alas <br>";
    echo "Tinggi = $tinggi <br>";
    echo "Luas Segitiga = (Alas x Tinggi) / 2 <br>";
    $luas_segitiga = ($alas * $tinggi)/2;
    echo " ($alas x $tinggi)/2 = $luas_segitiga<br><br>";
}

function volume_balok($panjang_balok,$lebar_balok,$tinggi_balok){
    echo "Volume Balok = Panjang x Lebar x Tinggi <br>";
    $volume_balok = $panjang_balok * $lebar_balok * $tinggi_balok;
    echo " $panjang_balok x $lebar_balok x $tinggi_balok = $volume_balok<br><br>";
}

function volume_kubus($sisi_kubus){
    echo "Volume Kubus = sisi x sisi x sisi <br>";
    $volume_kubus = $sisi_kubus * $sisi_kubus * $sisi_kubus;
    echo " $sisi_kubus x $sisi_kubus x $sisi_kubus = $volume_kubus<br><br>";
}

function volume_tabung($jari_jari, $tinggi){
    echo "Volume Tabung = 3,14 x jari-jari lingkaran x jari-jari lingkaran x tinggi <br>";
    $volume_tabung = 3.14 * $jari_jari * $jari_jari * $tinggi;
    echo " 3.14 * $jari_jari * $jari_jari * $tinggi = $volume_tabung<br><br>";
}


luas_persegi(8);
luas_persegi_panjang(10,12);
luas_trapesium(8,12,6);
luas_segitiga(4,8);
luas_lingkaran(12);

volume_kubus(8);
volume_balok(3,10,8);
volume_tabung(10,12);

?>