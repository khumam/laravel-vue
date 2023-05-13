<?php

function luas_persegi($sisi){
    $luas_persegi = pow($sisi,2);
    echo "Luas persegi = $sisi x $sisi = $luas_persegi <br><br>";
}

function luas_persegi_panjang($panjang,$lebar){
    $luas_persegi_panjang = $panjang * $lebar;
    echo "Luas persegi panjang = $panjang x $lebar = $luas_persegi_panjang  <br><br>";
}

function luas_jajargenjang($alas,$tinggi){
    $luas_jajargenjang = $alas * $tinggi;
    echo "Luas jajargenjang = $alas x $tinggi = $luas_jajargenjang  <br><br>";
}

function luas_lingkaran($jari_jari){
    $luas_lingkaran = 3.14 * pow($jari_jari,2);
    echo "Luas lingkaran = 3.14 x $jari_jari x $jari_jari = $luas_lingkaran  <br><br>";
}

function luas_segitiga($alas_segitiga,$tinggi_segitiga){
    $luas_segitiga = ($alas_segitiga * $tinggi_segitiga) / 2;
    echo "Luas segitiga = ($alas_segitiga x $tinggi_segitiga) / 2 = $luas_segitiga  <br><br>";
}

function volume_balok($panjang_balok,$lebar_balok,$tinggi_balok){
    $volume_balok = $panjang_balok * $lebar_balok * $tinggi_balok;
    echo "Volume balok = $panjang_balok x $lebar_balok x $tinggi_balok = $volume_balok  <br><br>";
}

function volume_kubus($sisi_kubus){
    $volume_kubus = pow($sisi_kubus,3);
    echo "Volume kubus = $sisi_kubus x $sisi_kubus x $sisi_kubus = $volume_kubus  <br><br>";
}

function volume_prisma_segitiga($alas_prisma,$tinggi_alas,$tinggi_prisma){
    $volume_prisma_segitiga = (($alas_prisma * $tinggi_alas) / 2) * $tinggi_prisma;
    echo "Volume prisma segitiga = (($alas_prisma x $tinggi_alas) / 2) x $tinggi_prisma = $volume_prisma_segitiga  <br><br>";
}

function volume_limas_segiempat($sisi_alas, $tinggi_limas){
    $volume_limas = (pow($sisi_alas,2) * $tinggi_limas) / 3;
    echo "Volume limas = ($sisi_alas x $sisi_alas x $tinggi_limas) / 3 = $volume_limas  <br><br>";
}

function volume_bola($jari_jari_bola){
    $volume_bola = pow($jari_jari_bola,3) * 3.14 * 4 / 3;
    echo "Volume bola = 3.14 x $jari_jari_bola x $jari_jari_bola x $jari_jari_bola x 4/3 = $volume_bola  <br><br>";
}


luas_persegi(5);
luas_persegi_panjang(5,6);
luas_jajargenjang(3,19);
luas_segitiga(6,8);
luas_lingkaran(10);

volume_kubus(9);
volume_balok(3,9,10);
volume_bola(30);
volume_limas_segiempat(5,9);
volume_prisma_segitiga(4,8,10);

?>