
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
//include ('link.php');
//session_start();

//error_reporting(E_ERROR | E_PARSE);

$receipt=$row['receipt_id'];
$client_id=$row['client_id'];
$cname=$row['client_name'];



						   
?>


<font size="-2" face="Tahoma, Geneva, sans-serif">


    <td> <?php echo $cname; ?></td>
   
    <td> <?php echo $client_id; ?></td>
     <td> <?php echo $receipt; ?></td>
   
     <td>

<?php
$med=0;
$tot_not=0;
$products = "SELECT* FROM receipt WHERE receipt_id=$receipt AND active=0 ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			   //$item=$row['item'];
			  // $qtty=$row['quantity'];
			   //$unitp=$row['unityp'];
	            echo ''.$row['item'].'('.$row['qtty'].'*'.$row['unitp'].')='.$row['unitp']*$row['qtty'].'<br>';
				
				$tot=$row['qtty']*$row['unitp'];
				$med+=$tot;
				$date=$row['date'];
				$user=$row['user'];
			    
				 }
    
    
    
    
    ?>
    
    
    
</td>
<td> <strong><?php 

$bt=$med+$tot_not;
echo $bt; ?></strong>  FRW</td>

<td><?php  echo $user; ?></td>

 <?php 



 //echo $med+$tot_not; 
 
 
 $bigt +=$bt;
 
 
 ?> 



</font>


</body>
</html>