
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

$receipt=$row1['receipt_id'];
$client_id=$row1['client_id'];
$cname=$row1['client_name'];

$med1 = "SELECT*  FROM address ";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' );
                               }    
          
           
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $ds=$rowmed1['district'];
										 $hc=$rowmed1['hc'];

				                       }

						   
?>

<center>
<font size="-2" face="Tahoma, Geneva, sans-serif">

<img src="img/bill2.PNG" width="210" height="63" /><br />

<?php 

echo '*****<em>COPY</em>*****<br><br>'; 

?>

-------------------------------------<br />
    RECEIPT #: <?php echo $receipt; ?><br />
-------------------------------------<br />
CLIENT(#:<?php echo $client_id; ?>) <br />
<?php  echo $cname; ?><br />

-------------------------------------<br />
<?php
$med=0;
$tot_not=0;
$products = "SELECT* FROM receipt WHERE receipt_id=$receipt ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' );
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
    
    
    



<strong>TOTAL: <?php 



 echo $med+$tot_not; 
 
 $bt=$med+$tot_not;
 $bigt +=$bt;
 
 
 ?> FRW</strong><br />
-------------------------------------<br />
Date: <?php  echo $date;



 ?><br />
-------------------------------------<br />
By:<?php  echo $user; ?><br />

</font>

</center>
</body>
</html>