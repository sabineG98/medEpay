<script>
    window.print();
</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
include ('link.php');
session_start();

error_reporting(E_ERROR | E_PARSE);

$id=$_SESSION['id'];
$insu=$_SESSION['insurance'];
$date=$_SESSION['date'];
$cname=$_SESSION['cname'];
$name=$_SESSION['name'];
$tm=$_SESSION['tm'];
$gt=$_SESSION['gt'];





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
									   
	$products = "SELECT status FROM orders WHERE client_id=$id  AND date='$date'  ORDER BY order_id DESC LIMIT 1";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$status= $row['status'];
				 }
									   
									   
									   
									   
?>

<center>
<font size="-2" face="Tahoma, Geneva, sans-serif">
<?php 


//get the number
$number = "SELECT receipt_id  FROM receipt ORDER BY receipt_id DESC LIMIT 1";
                        $retvalmed1 = mysqli_query($link, $number);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($row = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $no=$row['receipt_id'];
				                       }
//generate the number
if ($status!='1')
{
$no=$no+1;
}




if ($status=='1')
echo '*****<em>COPY</em>*****<br><br>'; 


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
				
				
				if ($status!='1')
				mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$cname', '$item' , '$unitp', '$qtty', '$date', '$name')");
				$tot=$row['quantity']*$row['unityp'];
				$med+=$tot;
			    
				 }
}
elseif($insu='PRIVE')
{
	
$products = "SELECT* FROM orders WHERE client_id=$id  AND date='$date'";
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
	            echo ''.$row['item'].'<br>('.$row['quantity'].'*'.$row['unityp'].')='.$row['unityp']*$row['quantity'].'<br>____<br>';
				if ($status!='1')
				mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$cname', '$item' , '$unitp', '$qtty', '$date', '$name')");
							   
				$tot=$row['quantity']*$row['unityp'];
				$med+=$tot;
			    
				
				
				
				 }
}



?>






<?php  //echo $tm; ?>

 <?php
 
 $ass=0;
	$adh=0;

	$musap=$gt-$tm; 
	//$musa_ass=200;
	$rssbp=$gt*0.85;
	$rssb_ass=$gt*0.15;
	$mmip=$gt*0.85;
	$mmi_ass=$gt*0.15;
	$mediplanp=$gt*0.80;
	$mediplan_ass=$gt*0.20;
		$corarp=$gt*0.90;//NOT YET CONFIRMED
		$corar_ass=$gt*0.10;//NOT YET CONFIRMED
		$radiantp=$gt*0.90;//NOT YET CONFIRMED
		$radiant_ass=$gt*0.10;//NOT YET CONFIRMED

	$comp=$gt;
	$comp_ass=$gt;
	$indig=0;
	$prive=$gt;
 
 
 
 
	 if (!empty($id))//check if client exists
	{
	 if ($insu=='MUSA')
	 
	{
	echo 'TM='.$tm.'<br>____<br>';
	$tot_not=$tm;
	
	if ($status!='1')
	mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$cname', 'TM-MUSA' , '$tot_not', '1', '$date', '$name')");
	}
	
	elseif ($insu=='MEDIPLAN')
	{	
	echo 'TM='.$mediplan_ass.'<br>____<br>';
	$tot_not=$mediplan_ass;
	
	if ($status!='1')
	mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$cname', 'TM-MEDIPLAN' , '$tot_not', '1', '$date', '$name')");
	}
	
	elseif ($insu=='COMPASSION')
	{
	echo 0;
	
	}
	
	elseif ($insu=='PRIVE')
	{
	$med=0;
	$tot_not=$gt;
	
	
	
	
	}
	elseif ($insu=='INDIGENI')
	{
	//echo $prive;
	}
	
	elseif ($insu=='RSSB')
	{
	echo'TM='. $rssb_ass.'<br>____<br>';	
	$tot_not=$rssb_ass;
	
	
	if ($status!='1')
	mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$cname', 'TM-RSSB' , '$tot_not', '1', '$date', '$name')");
	
	
	
	}
	elseif ($insu=='MMI')
	{
	echo 'TM='.$mmi_ass.'<br>____<br>';	
	$tot_not=$mmi_ass;
	
	if ($status!='1')
	mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$cname', 'TM-MMI' , '$tot_not', '1', '$date', '$name')");
	}	
	
	elseif ($insu=='CORAR')
	{
	echo 'TM='.$corar_ass.'<br>____<br>';	
	$tot_not=$corar_ass;
	
	if ($status!='1')
	mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$cname', 'TM-CORAR' , '$tot_not', '1', '$date', '$name')");
	}	
	
	elseif ($insu=='RADIANT')
	{
	echo 'TM='.$radiant_ass.'<br>____<br>';	
	$tot_not=$radiant_ass;
	
	if ($status!='1')
	mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$cname', 'TM-RADIANT' , '$tot_not', '1', '$date', '$name')");
	
	
	
	}	
	}
	
	 
	?>
    



<strong>TOTAL: <?php  echo $med+$tot_not; ?> FRW</strong><br />
-------------------------------------<br />
Date: <?php  echo $date;

mysqli_query($link,"UPDATE orders SET status ='1'  WHERE client_id =$id AND date='$date'");


 ?><br />
-------------------------------------<br />
By:<?php  echo $name; ?><br />

</font>
<br />
<br />
=======================================


</center>
</body>
</html>