<?php
    $key=$_GET['key'];
    $array = array();
    include ('link.php');
    $query=mysqli_query($link,"SELEct * from district where distrname LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['distrname'];
    }
    echo json_encode($array);
?>
