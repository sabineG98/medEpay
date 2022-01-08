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

/*$id=$_SESSION['id'];
$insu=$_SESSION['insurance'];
$date=$_SESSION['date'];
$cname=$_SESSION['cname'];
$name=$_SESSION['name'];
$tm=$_SESSION['tm'];
$gt=$_SESSION['gt'];*/

$receipt=$_GET['receipt'];
$client_id=$_GET['client_id'];
$cname=$_GET['cname'];

$med1 = "SELECT *  FROM address ";
$retvalmed1 = mysqli_query($link, $med1);
if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
        {
            $ds=$rowmed1['district'];
            $hc=$rowmed1['hc'];
        }						   
?>

<center>
<font size="-2" face="Tahoma, Geneva, sans-serif">
<?php 

echo '*****<em>COPY</em>*****<br><br>'; 

?>
REPUBLIC OF RWANDA <br />
MINISTRY OF HEALTH<br />
<?php echo $ds; ?>  DISTRICT<br />
<?php echo $hc; ?>  HC<br />
-------------------------------------<br />
    RECEIPT #: <?php echo $receipt; ?><br />
-------------------------------------<br />
CLIENT(#:<?php echo $client_id; ?>) <br />
<?php  echo $cname; ?><br />

-------------------------------------<br />
<?php
$products = "SELECT * FROM receipt WHERE receipt_id=$receipt ";
$retval = mysqli_query($link, $products);
if(! $retval ){ die('Could not get data: ' . mysqli_error($link));   }                         
    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
            {			                   
        //$item=$row['item'];
        // $qtty=$row['quantity'];
        //$unitp=$row['unityp'];
        echo '1- '.$row['item'].'('.$row['qtty'].'*'.$row['unitp'].')='.$row['unitp']*$row['qtty'].'<br>';				
        $tot=$row['qtty']*$row['unitp'];
        $med+=$tot;
        $date=$row['date'];
        $user=$row['user'];
        $i=1;

        $products = "SELECT act,order_id,unityp,quantity,status,orders.insured FROM acts, orders WHERE  acts.act_id=orders.item_id AND client_id=$client_id AND orders.date='$date' AND orders.active=1 AND orders.status=1  ORDER BY time ASC ";
        $retval = mysqli_query($link, $products);
        if(! $retval ){  die('Could not get data: ' . mysqli_error($link));   }                         
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
                    $i++;
				  $insured=$row['insured'];
				  $order_id=$row['order_id'];
				  $item=$row['act'];
				  $unitp=$row['unityp'];
				  $qtty=$row['quantity'];
				  $status1=$row['status'];				    
				  $tot=$row['unityp']*$row['quantity'];
				  echo $i.'- '.$row['act'];
				  if ($insured==0)
				       echo'<br><sup>not insured</sup>';
				   echo '('.$row['quantity'].'x'.$row['unityp'].')='.$tot.'<br>';   
                 }     
        
            }                
    ?>

<strong>TOTAL: <?php  echo $med+$tot_not; ?> FRW</strong><br />
-------------------------------------<br />
Date: <?php  echo $date;
 ?><br />
-------------------------------------<br />
By:<?php  echo $user; ?><br />
</font>
</center>
</body>
</html>