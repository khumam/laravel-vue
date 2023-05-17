<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<title>Add pengarang</title>
</head>

<?php
	include_once("connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>
 
<body class = "container">
	<a href="katalog.php" class = "mt-3 btn btn-warning">Go to katalog</a>
	<br/><br/>
 
	<form action="katalog_add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID Katalog</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr> 
				<td class="form-label">Nama Katalog</td>
				<td><input class="form-control" type="text" name="nama"></td>
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
			$id_katalog = $_POST['id'];
			$nama = $_POST['nama'];

			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`,`nama`) VALUES ('$id_katalog','$nama');");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>