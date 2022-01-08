<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Step 2</title>
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
 $med = "SELECT * FROM receipt WHERE item LIKE 'TM%' AND item NOT LIKE '%Ambulance%' AND order_id=0 AND active=1";// get the date 
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row= mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
			
			 
			$client_id=$row['client_id'];
			$item=$row['item'];
			$type='TM';
			$qtty=1;
			$unitp=$row['unitp'];
			$date=$row['date'];
			$period=date("F-Y", strtotime($date));
			$status=1;
			$insured=0;
			$user=$row['user'];
			
			echo $client_id.'-';
			echo $item.'-';
			echo $type.'-';
			echo $qtty.'-';
			echo $unitp.'-';
			echo $date.'-';
			echo $period.'-';
			echo $insured.'-';
			echo $user;
			echo'<br>';
			
			mysqli_query($link,"INSERT  INTO orders ( client_id,item,type,quantity,unityp,period,date,status,insured,user )
			VALUES ($client_id,'$item','$type',$qtty,$unitp,'$period','$date',$status, $insured,'$user')");
						 
					 
				 }





?>


</body>
</html>