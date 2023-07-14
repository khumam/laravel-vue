<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
<table class="table table-striped">
  <thead>
    <tr>
        <?php 
            $head = ["no","nama","tanggal_lahir","umur","alamat","kelas","nilai","hasil"];

            for ($i=0; $i < count($head) ; $i++) { 
                if ($i === 2) {
                    echo "<th scope='col'>".ucwords(str_replace("_", " ", $head[$i]))."</th>";
                }
                else {
                    echo "<th scope='col'>".ucwords($head[$i])."</th>";
                }
            }
        ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $dataArray = file_get_contents('data.json');
    $data = json_decode($dataArray, true);
    $nowDate = date_create();

    foreach($data as $key => $value){

        if($value['nilai'] >= 90){
            $hasil = 'A';
        }elseif($value['nilai'] >= 80 && $value['nilai'] < 90){
            $hasil = 'B';
        }elseif($value['nilai'] >= 70 && $value['nilai'] < 80){
            $hasil = 'C';
        }else{
            $hasil = 'D';
        }

        $umur = date_diff($nowDate,  date_create($value['tanggal_lahir']))->y;
        $no = $key + 1;
        
        echo "<tr>";

        for ($i=0; $i < count($head) ; $i++) { 
            switch ($i) {
                case 0:
                    echo "<th scope='row'>$no</th>";
                    break;
                case 3:
                    echo "<td>".$umur."</td>";
                    break;
                case 7:
                    echo "<td>".$hasil."</td>";
                    break;
                default:
                    echo "<td>".$value[$head[$i]]."</td>";
                    break;
            }
        }
        echo "</tr>";
    }

    ?> 
  </tbody>
</table>
 
</body>
</html>
