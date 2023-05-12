

<?php

$array = file_get_contents('data.json');
$data = json_decode($array, true);
$no = 1;
$tanggal_sekarang = date_create();


foreach($data as $key => $value){

    if($value['nilai'] >= 90){
        $hasil = 'A';
    }elseif($value['nilai'] >= 80 && $value['nilai'] < 90){
        $hasil = 'B';
    }elseif($value['nilai'] >= 70 && $value['nilai'] < 80){
        $hasil = 'C';
    }else{
        $hasil = 'D';
    }

    $usia = date_diff($tanggal_sekarang,  date_create($value['tanggal_lahir']));

    echo "No : $no, Nama : ".$value['nama'].", Tanggal Lahir : ".$value['tanggal_lahir'].", Umur : " .$usia->y.", Alamat : ".$value['alamat'].", Kelas : ".$value['kelas'].", Nilai : ".$value['nilai'].", Hasil : ".$hasil;
    echo "<br>";
    $no++;
}

?>