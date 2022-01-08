<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Step 3</title>
</head>

<body bgcolor="#FFFFFF">
<?php
ini_set('memory_limit', '500M');
ini_set('max_execution_time', 30000);
?>

<?php 

include ("link.php");

$last=0;
$i=0;
 $med = "SELECT * FROM clients, orders WHERE clients.client_id=orders.client_id AND clients.insurance='PRIVE' AND orders.insured=1 ";// get the date 
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row= mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 
					$clientid=$row['client_id'];
		         	$insurance='PRIVE';
					$beneficiary=$row['beneficiary'];
					
					echo $clientid;
					echo $beneficiary;
					echo $insurance;
					echo'<br>';
					
					
					//mysqli_query($link,"UPDATE orders SET insured=0 WHERE client_id='$clientid'");
					
					 
				 }





?>


</body>
</html>