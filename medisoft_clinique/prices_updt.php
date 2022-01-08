<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Special update</title>
</head>

<body>

<?php
ini_set('memory_limit', '50M');
ini_set('max_execution_time', 3000);
?>
<?php 
include("link.php");

$med = "SELECT* FROM acts ORDER BY act_id ASC";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 
					$act=$rowmed['act'];
					$ta=$rowmed['ta'];
					$tb=$rowmed['tb'];
					$tc=$rowmed['tc'];
					$td=$rowmed['td'];
					$te=$rowmed['te'];
					
	 $orders = "SELECT clients.insurance, orders.unityp FROM orders, clients WHERE orders.client_id=clients.client_id AND orders.date>='2016-01-01'";
        $retvalorders = mysqli_query($link, $orders);
        if(! $retvalorders )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($roworders = mysqli_fetch_array($retvalorders, MYSQLI_ASSOC))
                 {
					  
					$insu=$roworders['insurance'];
					$unityp=$roworders['unityp'];
					
					switch($insu)
					 {
						case"MUSA":
						  $tarif=$ta;
						  break;
						case"MEDIPLAN":
						  $tarif=$td;
						  break;
						case"CORAR":
						  $tarif=$td;
						  break;
						case"RADIANT":
						  $tarif=$td;
						  break;
					    case"RSSB":
						  $tarif=$tc;
						  break;
					    case"MMI":
						  $tarif=$tb;
						  break;
					    case"UR":
						  $tarif=$tb;
						  break;
						case"INDIGENT":
						  $tarif=$te;
						  break;
				        case"COMPASSION":
						  $tarif=$te;
						  break;
					    case"PRIVE":
						  $tarif=$te;
						  break;
					   default:
                        echo "No Insurance";
					}
					 	
						if ($tarif!=$unityp)
						{
							
mysqli_query ($link,"UPDATE orders SET unityp=$tarif  WHERE item ='$act' AND date >= '2016-01-01' ");
							}
						
						
						
					 
					 
					 

					
				 }



}

echo'Done';

?>
</body>
</html>