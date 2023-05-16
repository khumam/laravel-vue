<?php
include_once("connect.php");
 
$nama_pengarang = $_GET['nama_pengarang'];
 
$result = mysqli_query($mysqli, "DELETE FROM pengarang WHERE nama_pengarang='$nama_pengarang'");

header("Location:pengarang.php");
?>