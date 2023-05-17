<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<title>Edit Penerbit</title>
</head>

<?php
	include_once("connect.php");
	$nama_penerbit = $_GET['nama_penerbit'];

	$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE nama_penerbit='$nama_penerbit'");

    while($penerbit_data = mysqli_fetch_array($penerbit))
    {
		$id_penerbit = $penerbit_data['id_penerbit'];
		$nama_penerbit = $penerbit_data['nama_penerbit'];
    	$email = $penerbit_data['email'];
    	$telp = $penerbit_data['telp'];
    	$alamat = $penerbit_data['alamat'];
    }
?>
 
<body class = "container mt-3">
	<a href="penerbit.php" class = "btn btn-warning">Go to Penerbit</a>
	<br/><br/>
 
	<form action="penerbit_edit.php?nama_penerbit=<?php echo $nama_penerbit; ?>" method="post">
		<table width="25%" border="0">	
			<tr> 
				<td>ID Penerbit</td>
				<td><input type="text" name="id_penerbit" value="<?php echo $id_penerbit; ?>"></td>
			</tr>
			<tr> 
				<td class="form-label">Nama Penerbit</td>
				<td><input class="form-control" type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>"></td>
			</tr>
			<tr> 
				<td class="form-label">Email</td>
				<td><input class="form-control" type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td class="form-label">No Telepon</td>
				<td><input class="form-control" type="text" name="telp" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr> 
				<td class="form-label">Alamat</td>
				<td><input class="form-control" type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
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
			$nama_penerbit = $_GET['nama_penerbit'];
			$id_penerbit = $_POST['id_penerbit'];
			$nama_update = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE penerbit SET id_penerbit = '$id_penerbit', nama_penerbit = '$nama_update', email = '$email', telp = '$telp', alamat = '$alamat' WHERE nama_penerbit = '$nama_penerbit';");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>