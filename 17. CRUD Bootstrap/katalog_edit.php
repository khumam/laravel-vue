<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<title>Edit katalog</title>
</head>

<?php
	include_once("connect.php");
	$nama = $_GET['nama'];

	$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE nama='$nama'");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
		$id_katalog = $katalog_data['id_katalog'];
		$nama = $katalog_data['nama'];
    }
?>
 
<body class = "container mt-3">
	<a href="katalog.php" class = "btn btn-warning">Go to katalog</a>
	<br/><br/>
 
	<form action="katalog_edit.php?nama=<?php echo $nama; ?>" method="post">
		<table width="25%" border="0">	
			<tr> 
				<td>ID Katalog</td>
				<td><input type="text" name="id_katalog" value="<?php echo $id_katalog; ?>"></td>
			</tr>
			<tr> 
				<td class="form-label">Nama Katalog</td>
				<td><input class="form-control" type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update" class = "btn btn-primary"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {
			$nama = $_GET['nama'];
			$id_katalog = $_POST['id_katalog'];
			$nama_update = $_POST['nama'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE katalog SET id_katalog = '$id_katalog', nama = '$nama_update' WHERE nama = '$nama';");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>