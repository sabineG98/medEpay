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

$last=0;
$i=0;
 $med = "SELECT rec_id, client_id,item, date FROM receipt ";// get the date 
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row= mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
			
			$idr=$row['rec_id']; 
			$client_id=$row['client_id'];
			$item=$row['item'];
			$date=$row['date'];
			
			
			
			
$id = "SELECT order_id FROM orders WHERE order_id!=$last AND client_id=$client_id AND item='$item' AND date='$date'  LIMIT 1";// get the date 
        $retvalmedi = mysqli_query($link, $id);
        if(! $retvalmedi )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowid= mysqli_fetch_array($retvalmedi, MYSQLI_ASSOC))
                 {
					 $order_id=$rowid['order_id'];
					 $last=$order_id;
					 echo $i++.'---';
					 echo $idr.'-';
					 if ($order_id>0)
					 {
					mysqli_query($link,"UPDATE receipt SET order_id='$order_id' WHERE rec_id=$idr");
					 
					 
					 echo $order_id.'---------<em>done</em>';
					 echo'<br>';
					 }
					 else
					 {
					 echo $idr.'-';
					 echo'NA<br>';
					 }
					 
					 $order_id=0;
				 }
			
			

					 
					 
				 }





?>


</body>
</html>