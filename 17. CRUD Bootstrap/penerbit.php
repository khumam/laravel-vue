<?php
    include_once("connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit ORDER BY nama_penerbit ASC");
?>
 
<html>
<head>    
    <title>Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: center !important;">
        <center>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="penerbit.php">Penerbit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pengarang.php">Pengarang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="katalog.php">Katalog</a>
              </li>
            </ul>
        </center>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col">
        <!-- <center>
    <a href="index.php">Buku</a> |
    <a href="penerbit.php">Penerbit</a> |
    <a href="pengarang.php">Pengarang</a> |
    <a href="katalog.php">Katalog</a>
    <hr>
</center> -->

<a href="penerbit_add.php" class="btn btn-primary" role="button">Add New Penerbit</a><br/><br/>
 
    <table class="table" width='80%' border=1>
 
    <tr>
        <th>ID Penerbit</th>
        <th>Nama Penerbit</th> 
        <th>Email</th> 
        <th>No. Telepon</th> 
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td>".$penerbit_data['id_penerbit']."</td>";
            echo "<td>".$penerbit_data['nama_penerbit']."</td>";
            echo "<td>".$penerbit_data['email']."</td>";
            echo "<td>".$penerbit_data['telp']."</td>";    
            echo "<td>".$penerbit_data['alamat']."</td>";           
            echo "<td><a class='btn btn-warning' href='penerbit_edit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <a class='btn btn-danger' href='penerbit_delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
        </div>
    </div>
</div>


</body>
</html>