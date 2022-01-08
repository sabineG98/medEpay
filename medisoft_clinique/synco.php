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

$sdate='2019-04-26';
$id2=0;
$med=0;
$gt=0;
$itemtm='no';
 $med = "SELECT clients.client_id AS c, clients.insurance, clients.beneficiary, orders.item,orders.quantity, orders.unityp, orders.date, orders.insured, orders.user FROM clients, orders WHERE clients.client_id=orders.client_id  AND orders.date = '$sdate'";// get the date 
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )           {

               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowcbhi= mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 
			
			
			$client_id=$rowcbhi['c'];//clients
			$insurance=$rowcbhi['insurance'];//clients
			$item=$rowcbhi['item'];//orders
			//echo $client_id.'<br>';
			$check=0;
			$number = "SELECT client_id  FROM receipt WHERE client_id=$client_id AND item='$item' OR '$itemtm' AND date='$sdate'  ORDER BY receipt_id DESC LIMIT 1";
                  $retvalmed1 = mysqli_query($link, $number);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($row = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $check=$row['client_id'];
										 
									  }
			
if($check==0)
		  {
	$number = "SELECT receipt_id  FROM receipt ORDER BY receipt_id DESC LIMIT 1";
                        $retvalmed1 = mysqli_query($link, $number);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($row = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $noo=$row['receipt_id'];
				                       }
									   
                                      //generate the number
                                      if ($client_id!=$id2)
                                         {
                                          $no=$noo+1;
                                         }		
			
			
			
			
			
			$insured=$rowcbhi['insured'];//orders
			
			
			if ($insurance!='PRIVE' && $insured=1 )
			  {
			
			$quantity=$rowcbhi['quantity'];//orders
			$unityp=$rowcbhi['unityp'];//orders
			
			$tot1=$rowcbhi['quantity']*$rowcbhi['unityp'];
			$gt+=$tot1;
			
			  }

			
			
			if ($insurance!='PRIVE' )
			  {
			$client_name=$rowcbhi['beneficiary'];//clients
			$item=$rowcbhi['item'];//orders
			$quantity=$rowcbhi['quantity'];//orders
			$unityp=$rowcbhi['unityp'];//orders
			$date=$rowcbhi['date'];//orders
			$user=$rowcbhi['user'];//orders
			$tot=$rowcbhi['quantity']*$rowcbhi['unityp'];
			$med+=$tot;
			
			// mysqli_query ($link,"INSERT INTO receipt (receipt_id,client_id,client_name,item,unitp,qtty,date,user) 
	  
            //                  VALUES ($no,$client_id,'$client_name','$item',$unityp, $quantity, '$date', '$user')");
							 	  
			
			
			  }
			  
		   if ($insurance=='PRIVE' )
			  {
			$client_name=$rowcbhi['beneficiary'];//clients
			$item=$rowcbhi['item'];//orders
			$quantity=$rowcbhi['quantity'];//orders
			$unityp=$rowcbhi['unityp'];//orders
			$date=$rowcbhi['date'];//orders
			$user=$rowcbhi['user'];//orders
					
			 mysqli_query ($link,"INSERT INTO receipt (receipt_id,client_id,client_name,item,unitp,qtty,date,user) 
	  
                              VALUES ($no,$client_id,'$client_name','$item',$unityp, $quantity, '$date', '$user')");
			
			
			  }
			
	 }
			

	 if ($insurance=='MUSA')
	 
	{
	   $ticket=0; 
	}
	
	elseif ($insurance=='MEDIPLAN')
	{
	$item='TM-MEDIPLAN';
	$ticket=$gt*0.20;
	echo $item.'='.$ticket.'<br>____<br>';
	}
	
	
	elseif ($insurance=='PRIVE')
	{
	
	$ticket=0;
	}

	elseif ($insurance=='RSSB')
	{
	$item='TM-RSSB';
	$ticket=$gt*0.15;
	echo $item.'='.$ticket.'<br>____<br>';
	}
	elseif ($insurance=='MMI')
	{
		
	$item='TM-MMI';
	$ticket=$gt*0.15;
	echo $item.'='.$ticket.'<br>____<br>';
	}	
	
	
	elseif ($insurance=='CORAR')
	{
	$item='TM-CORAR';
	$ticket=$gt*0.10;
	echo $item.'='.$ticket.'<br>____<br>';
	}	
	
	elseif ($insurance=='RADIANT')
	{
	$item='TM-RADIANT';
	$ticket=$gt*0.10;
	echo $item.'='.$ticket.'<br>____<br>';

	}	
if($check==0 && $insurance!='PRIVE')
mysqli_query ($link,"INSERT INTO receipt (receipt_id,client_id,client_name,item,unitp,qtty,date,user) 
	  
                              VALUES ($no,$client_id,'$client_name','$item',$ticket, 1, '$date', '$user')");

			
			$itemtm=$item;
			
			
			
			
			
			
					 			 
					  
					 $id2=$client_id;
					 
				 }

echo'Done successfully';

//echo'Merci Papa mon DIEU';



?>


</body>
</html>