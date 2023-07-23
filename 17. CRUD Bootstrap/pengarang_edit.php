<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<title>Edit pengarang</title>
</head>

<?php
	include_once("connect.php");
	$id_pengarang = $_GET['id_pengarang'];

	$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");

    while($pengarang_data = mysqli_fetch_array($pengarang))
    {
		$id_pengarang = $pengarang_data['id_pengarang'];
		$nama_pengarang = $pengarang_data['nama_pengarang'];
    	$email = $pengarang_data['email'];
    	$telp = $pengarang_data['telp'];
    	$alamat = $pengarang_data['alamat'];
    }
?>
 
<body>
	<a href="pengarang.php" class = "btn btn-warning">Go to pengarang</a>
	<br/><br/>
 
	<form action="pengarang_edit.php?nama_pengarang=<?php echo $nama_pengarang; ?>" method="post">
		<table width="25%" border="0">	
			<tr> 
				<td>ID pengarang</td>
				<td><input type="text" name="id_pengarang" value="<?php echo $id_pengarang; ?>" disabled></td>
			</tr>
			<tr> 
				<td class="form-label">Nama pengarang</td>
				<td><input class="form-control" type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>"></td>
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
			$id_pengarang = $_GET['id_pengarang'];
			$nama_update = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];

			$result = mysqli_query($mysqli, "UPDATE pengarang SET nama_pengarang = '$nama_update', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang';");
			
            $mysqli->close();

			header("Location:pengarang.php");
		}
	?>
</body>
</html>