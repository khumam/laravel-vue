<html>
<head>
	<title>Edit pengarang</title>
</head>

<?php
	include_once("connect.php");
	$nama = $_GET['nama'];

	$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE nama='$nama'");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
		$nama = $katalog_data['nama'];
    }
?>
 
<body>
	<a href="katalog.php">Go to katalog</a>
	<br/><br/>
 
	<form action="katalog_edit.php?nama=<?php echo $nama; ?>" method="post">
		<table width="25%" border="0">	
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {
			$nama = $_GET['nama'];
			$nama_update = $_POST['nama'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE katalog SET nama = '$nama_update' WHERE nama = '$nama';");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>