<?php

$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "SELECT * FROM buku WHERE id_pengarang = 'PG05'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while($row = $result -> fetch_assoc()){
        echo "Buku: ".$row["isbn"]." ".$row["judul"]." ID Pengarang: ".$row["id_pengarang"]."<br>";
    }
} else {
    echo "0 results";
}
echo "<br><br>";

$mysql = "SELECT * FROM anggota WHERE alamat LIKE '%Bandung%'";
$hasil = $conn->query($mysql);

if ($hasil->num_rows > 0){
    while($baris = $hasil -> fetch_assoc()){
        echo "Nama: ".$baris["nama"]." Telepon: ".$baris["telp"]." Alamat: ".$baris["alamat"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();



?>