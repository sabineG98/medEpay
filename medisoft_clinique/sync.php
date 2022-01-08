<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>data sync</title>
</head>

<body bgcolor="#FFFFFF">
<?php
ini_set('memory_limit', '500M');
ini_set('max_execution_time', 30000);
?>

<?php 

include ("link.php");



 $med = "SELECT* FROM orders";// get the date 
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowcbhi= mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 
			
			$order_id=$rowcbhi['order_id'];
			$client_id=$rowcbhi['client_id'];
			$item=$rowcbhi['item'];
			$type=$rowcbhi['type'];
			$quantity=$rowcbhi['quantity'];
			$unityp=$rowcbhi['unityp'];
			$time=$rowcbhi['time'];
			$period=$rowcbhi['period'];
			$date=$rowcbhi['date'];
			$status=$rowcbhi['status'];
			$insured=$rowcbhi['insured'];
			$user=$rowcbhi['user'];
			
			
			
			
			 

	  mysqli_query ($link,"INSERT INTO orderscbhi (order_id,client_id, item, type, quantity,  unityp, time, period, date, status, insured, user) 
 VALUES ($order_id,$client_id, '$item', '$type', $quantity,  $unityp, '$time', '$period', '$date', '$status', '$insured', '$user')");
					 
					 			 
					  
					 
					 
				 }


//echo'Merci Papa mon DIEU';



?>


</body>
</html>