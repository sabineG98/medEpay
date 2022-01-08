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


$id2=0;
$id3=0;
$tot=0;
$gt=0;
$syncdate='2019-04-25';

mysqli_query($link,"DELETE FROM receipt WHERE date='$syncdate' ");

 $med = "SELECT clients.client_id, clients.insurance, clients.beneficiary, orders.item,orders.quantity, orders.unityp, orders.date, orders.insured, orders.user FROM clients, orders WHERE clients.client_id=orders.client_id AND  orders.date= '$syncdate'";// get the date  
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowcbhi= mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 
			
			//be back to analyse where data come from
			$client_id=$rowcbhi['client_id'];//clients
			$insurance=$rowcbhi['insurance'];//clients
			$client_name=$rowcbhi['beneficiary'];//clients
			$item=$rowcbhi['item'];//orders
			$quantity=$rowcbhi['quantity'];//orders
			$unityp=$rowcbhi['unityp'];//orders
			$date=$rowcbhi['date'];//orders
			$insured=$rowcbhi['insured'];//orders
			$user=$rowcbhi['user'];//orders
			//echo $insurance;
			
			
			
		     //Receipt number generation
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
			
			
			
			
			
			
			if ($insurance=='MUSA' or $insurance!='PRIVE')
			 
                 {
					 if ($insured==0)
					      {
	                          mysqli_query ($link,"INSERT INTO receipt (receipt_id,client_id,client_name,item,unitp,qtty,date,user) 
	  
                              VALUES ($no,$client_id,'$client_name','$item',$unityp, $quantity, '$date', '$user')");
						  }
				 }
				 
				if ($insurance=='PRIVE')
			 
                 {
					 
	                          mysqli_query ($link,"INSERT INTO receipt (receipt_id,client_id,client_name,item,unitp,qtty,date,user) 
	  
                              VALUES ($no,$client_id,'$client_name','$item',$unityp, $quantity, '$date', '$user')");
						  
				 } 
				 
				 
			
				 
				 
			elseif ($insurance=='RSSB')
			    {
					if ($insured==1)
					      {
	                          
						  }  
				}
						   
						   
 if ($insurance=='RSSB' && $client_id!=$id3)
        {
			
							  
					$gt=0;		  
					$gtcal =("SELECT unityp, quantity FROM orders WHERE client_id=$client_id AND date='$syncdate' AND insured=1"); 
                    $retvalorder = mysqli_query($link,$gtcal);
					while($rowu = mysql_fetch_assoc($retvalorder))
					{
						
					  $tot=$rowu['unityp']*$rowu['quantity'];
					  
					  $gt+=$tot;
						  
					}
	

$tm=$gt*0.15;

$item='TM-RSSB';


$check=0;
$number = "SELECT client_id  FROM receipt WHERE client_id=$client_id AND item='$item' AND date='$syncdate'  ORDER BY receipt_id DESC LIMIT 1";
                  $retvalmed1 = mysqli_query($link, $number);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($row = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $check=$row['client_id'];
										 
									  }




if ($check==0)
{
mysqli_query ($link,"INSERT INTO receipt (receipt_id,client_id,client_name,item,unitp,qtty,date,user) 
	  
                              VALUES ($no,$client_id,'$client_name','$item',$tm, 1, '$date', '$user')");
}
							  
			    }
					 			 

if ($insurance=='MMI' && $client_id!=$id3)
        {
			
							  
					$gt=0;		  
					$gtcal =("SELECT unityp, quantity FROM orders WHERE client_id=$client_id AND date='$syncdate' AND insured=1"); 
                    $retvalorder = mysqli_query($link,$gtcal);
					while($rowu = mysql_fetch_assoc($retvalorder))
					{
						if ($insured==1)
					      {
					  $tot=$rowu['unityp']*$rowu['quantity'];
					  
					  $gt+=$tot;
						  }
					}
	

$tm=$gt*0.15;

$item='TM-MMI';


$check=0;
$number = "SELECT client_id  FROM receipt WHERE client_id=$client_id AND item='$item' AND date='$syncdate'  ORDER BY receipt_id DESC LIMIT 1";
                  $retvalmed1 = mysqli_query($link, $number);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($row = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $check=$row['client_id'];
										 
									  }




if ($check==0)
{
mysqli_query ($link,"INSERT INTO receipt (receipt_id,client_id,client_name,item,unitp,qtty,date,user) 
	  
                              VALUES ($no,$client_id,'$client_name','$item',$tm, 1, '$date', '$user')");
	
                  }
			    }
								

				
					  
					 
	$id3=$client_id;				 

	


$id2=$client_id;
				 }

echo'Done successfully';

//echo'Merci Papa mon DIEU';



?>


</body>
</html>