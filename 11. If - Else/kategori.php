<?php

$nama = "Briyan";
$tinggi_badan = 1.8;
$berat_badan = 80;

$bmi = $berat_badan/(pow($tinggi_badan,2));

if($bmi < 18.5){
    $status = "Kurus";
}elseif($bmi >= 18.5 && $bmi < 25){
    $status = "Normal (Ideal)";
}elseif($bmi >= 25 && $bmi < 30){
    $status = "Kelebihan Berat Badan";
}elseif($bmi >= 30){
    $status = "Obesitas";
}

echo "Halo, $nama. Nilai BMI anda adalah $bmi, anda termasuk $status";

?>