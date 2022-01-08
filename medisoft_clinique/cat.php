<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
ini_set('memory_limit', '500M');
ini_set('max_execution_time', 30000);
?>


<?php


include('link.php'); 


/*a robot which verifies that a cat 1&2client has not confirmed for maralia	*/	
for ($i=1; $i<=2; $i++)
{
$last = "SELECT order_id FROM clients,orders  WHERE clients.client_id=orders.client_id AND  clients.categorie=$i AND orders.item LIKE '%coartem%' AND orders.period='January-2016'";
        $retval_last = mysqli_query($link, $last);
        if(! $retval_last )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
					 $order_id=$rowlast['order_id'];
					 mysqli_query ($link,"UPDATE orders SET unityp ='0' WHERE order_id =$order_id ");

					 echo $rowlast['order_id'].'<br>';
					 
				 }
}
/*a robot which verifies that a cat 1&2client has not confirmed for maralia	*/	
?>

</body>
</html>