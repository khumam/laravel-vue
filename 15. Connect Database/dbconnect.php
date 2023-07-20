<?php

$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "1";

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "SELECT nama, telp, alamat, tgl_pinjam, tgl_kembali, COUNT(nama) as jumlah FROM anggota JOIN peminjaman ON peminjaman.id_anggota = anggota.id_anggota JOIN detail_peminjaman ON detail_peminjaman.id_pinjam = peminjaman.id_pinjam GROUP BY nama";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while($row = $result -> fetch_assoc()){
        echo "Nama: ".$row['nama'].", Alamat: ".$row['alamat'].", Telp: ".$row['telp'].", Tgl Pinjam: ".$row['tgl_pinjam'].", Tgl Kembali: ".$row['tgl_kembali'].", Jumlah(".$row['jumlah'].")<br><br>";
    }
} else {
    echo "0 results";
}

$conn->close();



?>