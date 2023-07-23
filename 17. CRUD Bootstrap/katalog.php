<?php
    include_once("connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog ORDER BY id_katalog ASC");
?>
 
<html>
<head>    
    <title>Katalog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body class = "container">
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

        <a href="katalog_add.php" class="btn btn-primary" role="button">Add New Katalog</a><br/><br/>
        
            <table class="table table-striped" width='80%' border=1>
        
            <tr>
                <th>ID Katalog</th> 
                <th>Nama Katalog</th> 
                <th>Aksi</th>
            </tr>
            <?php  
                while($katalog_data = mysqli_fetch_array($katalog)) {         
                    echo "<tr>";
                    echo "<td>".$katalog_data['id_katalog']."</td>";
                    echo "<td>".$katalog_data['nama']."</td>";           
                    echo "<td><a class='btn btn-warning' href='katalog_edit.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> | <a class='btn btn-danger' href='katalog_delete.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td></tr>";        
                }
            ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>