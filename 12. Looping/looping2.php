<table style="border:1px solid black;">
  <tr style="text-align:left;">
    <th>No</th>
    <th>Nama</th>
    <th>Kelas</th>
  </tr>
  <?php

    $kelas = 10;

    for ($i=1; $i <=10; $i++){
        echo "<tr><td>$i</td><td>Nama ke $i</td><td>Kelas $kelas</td>";
        $kelas--;
    }


    ?>

</table>
