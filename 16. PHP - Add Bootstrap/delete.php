<?php
include_once("db_connect.php");
$isbn = $_GET['isbn'];

$result = mysqli_query($conn, "DELETE FROM buku WHERE isbn='$isbn'");

header("location:index.php");
