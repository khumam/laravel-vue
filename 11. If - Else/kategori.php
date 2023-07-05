<?php

$nama = "Someone";
// dalam satuan meter
$tinggi_badan = 1.68;
$berat_badan = 53;

$bmi = $berat_badan/(pow($tinggi_badan,2));
$bmi = round($bmi, 2);

if($bmi < 17){
    $status = "Kurus (Kekurangan Berat Badan) Berat";
}elseif($bmi < 18.5){
    $status = "Kurus (Kekurangan Berat Badan) Ringan";
}
elseif($bmi < 25){
    $status = "Normal (Ideal)";
}elseif($bmi < 30){
    $status = "Kelebihan Berat Badan";
}else{
    $status = "Obesitas";
}

echo "Halo, $nama. Nilai BMI anda adalah $bmi, anda termasuk $status";

?>