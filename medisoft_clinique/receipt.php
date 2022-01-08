<script>
    window.print();
</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.</title>
</head>

<body>

<?php
include ('link.php');
session_start();





//get the needed info 
$id=$_SESSION['id'];//
$insu=$_SESSION['insurance'];//
$date=$_SESSION['date'];//
$cname=$_SESSION['cname'];
$name=$_SESSION['name'];
$tm=$_SESSION['tm'];
$gt=$_SESSION['gt'];
//end of info



//get the address of health facility
$med1 = "SELECT*  FROM address ";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $ds=$rowmed1['district'];
										 $hc=$rowmed1['hc'];

				                       }
//end of address



//check if the invoice isn't already printed							   
	$products1 = "SELECT status FROM orders WHERE client_id=$id  AND date='$date'  ORDER BY order_id DESC LIMIT 1";
        $retval1 = mysqli_query($link, $products1);
        if(! $retval1 )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                 {
					$status= $row1['status'];
				 }
				   									   
//end of check									   
									   
?>
<center>
<font size="-2" face="Tahoma, Geneva, sans-serif">
<?php 

//get the number
$no=0;


if ($status!='1')
{
$number = "SELECT receipt_id  FROM receipt ORDER BY receipt_id DESC LIMIT 1";
}
elseif ($status='1')
{
$number = "SELECT receipt_id  FROM receipt WHERE client_id=$id  ORDER BY receipt_id DESC LIMIT 1";
}

                  $retvalmed1 = mysqli_query($link, $number);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($row = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $no=$row['receipt_id'];
										 
									  }
if ($status!='1')
{
$no=$no+1;
}									  
									  
//$no=$no+1;				                       
//generate the number







if ($status=='1')
{
echo '*****<em>COPY</em>*****<br><br>'; 
}

?>
REPUBLIC OF RWANDA <br />
MINISTRY OF HEALTH<br />
<?php echo $ds; ?>  DISTRICT<br />
<?php echo $hc; ?>  HC<br />
-------------------------------------<br />
    RECEIPT #: <?php echo $no; ?><br />
-------------------------------------<br />
CLIENT(#:<?php echo $id; ?>) <br />
<?php  echo $cname; ?><br />

-------------------------------------<br />

<?php 
if ($insu!='PRIVE')

{
$products = "SELECT* FROM orders WHERE client_id=$id  AND date='$date' AND insured='0'";
}
elseif($insu='PRIVE')
{
$products = "SELECT* FROM orders WHERE client_id=$id  AND date='$date'";
}
$med=0;
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			   $item=$row['item'];
			   $qtty=$row['quantity'];
			   $unitp=$row['unityp'];
	            echo ''.$row['item'].'('.$row['quantity'].'*'.$row['unityp'].')='.$row['unityp']*$row['quantity'].'<br>';
				
				$tot=$row['quantity']*$row['unityp'];
				$med+=$tot;
				
				if ($status!='1')
				       {
			        	mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                               VALUES ($no, $id, '$cname', '$item' , $unitp, $qtty, '$date', '$name')");
							   
							   
					   
				       }
				
				
				
				 }






?>






<?php  //echo $tm; ?>

 <?php
 
 $ass=0;
 $adh=0;

	
 if (!empty($id) && $insu!='PRIVE')//check if client exists
 {
	 if ($insu=='MUSA')
	 
	{
	   $ticket=0; 
	}
	
	elseif ($insu=='MEDIPLAN')
	{
	$item='TM-MEDIPLAN';
	$ticket=$gt*0.20;
	echo $item.'='.$ticket.'<br>____<br>';
	}
	
	
	elseif ($insu=='PRIVE')
	{
	
	$ticket=0;
	}

	elseif ($insu=='RSSB')
	{
	$item='TM-RSSB';
	$ticket=$gt*0.15;
	echo $item.'='.$ticket.'<br>____<br>';
	}
	elseif ($insu=='MMI')
	{
		
	$item='TM-MMI';
	$ticket=$gt*0.15;
	echo $item.'='.$ticket.'<br>____<br>';
	}	
	
	
	elseif ($insu=='CORAR')
	{
	$item='TM-CORAR';
	$ticket=$gt*0.10;
	echo $item.'='.$ticket.'<br>____<br>';
	}	
	
	elseif ($insu=='RADIANT')
	{
	$item='TM-RADIANT';
	$ticket=$gt*0.10;
	echo $item.'='.$ticket.'<br>____<br>';

	}	

if ($status!='1')
	mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$cname', '$item' , '$ticket', '1', '$date', '$name')");

}
	
	 
	 
	 
	 
	 
	 
	 
	?>
    



<strong>TOTAL: <?php  echo $med+$ticket; ?> FRW</strong><br />
-------------------------------------<br />
Date: <?php  echo $date;

if ($status!='1')
mysqli_query($link,"UPDATE orders SET status ='1'  WHERE client_id =$id AND date='$date'");


 ?><br />
-------------------------------------<br />
By:<?php  echo $name; ?><br />

</font>
<br />
==========
</center>
</body>
</html>