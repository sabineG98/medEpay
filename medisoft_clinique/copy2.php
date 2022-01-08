
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

$products3 = "SELECT* FROM receipt WHERE receipt_id=$receipt ";
        $retval3 = mysqli_query($link, $products3);
        if(! $retval3 )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row3 = mysqli_fetch_array($retval3, MYSQLI_ASSOC))
                 {

$receipt=$row3['receipt_id'];
$client_id=$row3['client_id'];
$cname=$row3['client_name'];


}
						   
?>


<font size="-2" face="Tahoma, Geneva, sans-serif">


    <td> <?php echo $cname; ?></td>
   
    <td> <?php echo $client_id; ?></td>
     <td> <?php echo $receipt; ?></td>
   
     <td>

<?php
$med=0;
$tot_not=0;
$products2 = "SELECT* FROM receipt WHERE receipt_id=$receipt ";
        $retval2 = mysqli_query($link, $products2);
        if(! $retval2 )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row2 = mysqli_fetch_array($retval2, MYSQLI_ASSOC))
                 {
			   
			   //$item=$row['item'];
			  // $qtty=$row['quantity'];
			   //$unitp=$row['unityp'];
	            echo ''.$row2['item'].'('.$row2['qtty'].'*'.$row2['unitp'].')='.$row2['unitp']*$row2['qtty'].'<br>';
				
				$tot=$row2['qtty']*$row2['unitp'];
				$med+=$tot;
				$date=$row2['date'];
				$user=$row2['user'];
			    
				 }
    
    
    
    
    ?>
    
    
    
</td>
<td> <strong><?php 

$bt=$med+$tot_not;
echo $bt; ?></strong> </td>
<td><?php  echo $date; ?></td>
<td><?php  echo $user; ?></td>

 <?php 



 //echo $med+$tot_not; 
 
 
 $bigt +=$bt;
 
 
 ?> 



</font>


</body>
</html>