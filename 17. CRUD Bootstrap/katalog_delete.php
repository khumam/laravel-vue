<?php
include_once("connect.php");
 
$nama = $_GET['nama'];
 
$result = mysqli_query($mysqli, "DELETE FROM katalog WHERE nama='$nama'");

header("Location:katalog.php");
?>