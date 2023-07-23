<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<title>Add Penerbit</title>
</head>
 
<body class = "container">
	<a href="penerbit.php" class = "btn btn-warning">Go to Penerbit</a>
	<br/><br/>
 
	<form action="penerbit_add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID Penerbit</td>
				<td><input type="text" name="id_penerbit"></td>
			</tr>
			<tr> 
				<td class="form-label">Nama Penerbit</td>
				<td><input class="form-control" type="text" name="nama_penerbit"></td>
			</tr>
			<tr> 
				<td class="form-label">Email</td>
				<td><input class="form-control" type="text" name="email"></td>
			</tr>
			<tr> 
				<td class="form-label">No Telepon</td>
				<td><input class="form-control" type="text" name="telp"></td>
			</tr>
			<tr> 
				<td class="form-label">Alamat</td>
				<td><input class="form-control" type="text" name="alamat"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add" class = "btn btn-primary"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_penerbit = $_POST['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `penerbit` (`id_penerbit`,`nama_penerbit`, `email`, `telp`, `alamat`) VALUES ('$id_penerbit','$nama_penerbit', '$email', '$telp', '$alamat');");
			
            $mysqli->close();

			header("Location:penerbit.php");
		}
	?>
</body>
</html>