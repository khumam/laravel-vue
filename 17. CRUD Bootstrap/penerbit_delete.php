<?php
include_once("connect.php");
 
$nama_penerbit = $_GET['nama_penerbit'];
 
$result = mysqli_query($mysqli, "DELETE FROM penerbit WHERE nama_penerbit='$nama_penerbit'");

header("Location:penerbit.php");
?>