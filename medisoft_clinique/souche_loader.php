<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>





<?php

$bigt=0;

$products1 = "SELECT DISTINCT receipt_id, client_id, client_name FROM receipt WHERE date='$date' AND active=1";
        $retval1 = mysqli_query($link, $products1);
        if(! $retval1 )
           {
               die('Could not get data: ');
            }    
          
           
         while($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                 {
/*$products1 = "SELECT* FROM receipt WHERE receipt_id=".$row['receipt_id']."";
        $retval1 = mysqli_query($link, $products1);
        if(! $retval1 )
           {
               die('Could not get data: ' );
            }    
          
           
         while($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                 {*/
					include('souche.php');
					echo'<hr>';
					
					 
				 
				 
}


?>

<center>
<?php 








echo $date;
echo '<br>';

echo'Total: ';
echo $bigt;
echo ' FRW<br>';




$gtotal=0;
	$products = "SELECT SUM(reste) AS total_dette FROM dettes2 WHERE  date ='$date' ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ');
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			 
	            $total_dettes= $row['total_dette'];
				
				 }
				 
				 
				 
				 
					 if ($total_dettes>0)
					 echo'Dettes:'. $total_dettes.'  FRW';
					 else 
					 echo 0; 
	


echo'<br>';

echo'Total en caisse: ';
echo $bigt+$total_dettes;
echo ' FRW<br>';








?>
<br />
==========
</center>
</body>
</html>