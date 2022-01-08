<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Medical verification report</title>
</head>

<body>

<?php 

session_start();
if(!$_SESSION['valid_pass']){
    header("Location: applications.php");
    exit;
} 

?>

<?php
include('link.php');
$period=$_GET['period'];

?>


<?php
$med = "SELECT *  FROM address";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $district= $rowmed['district'];
					 $hc= $rowmed['hc'];
				 }
	?>
<h2><u>REPORT OF MEDICAL VERIFICATION</u></h2>
<p><strong>
HEALTH FACILITY: <?php echo $hc ?> HC <br />
CBHI SECTION: <?php echo $hc ?><br />
ADMINISTRATIVE DISTRICT: <?php echo  $district ?> <br />
PERIOD:<?php echo $period ?></strong>

<table bgcolor="#FFFFFF" style="font-size:15px; border-collapse: collapse; "   border="1" cellspacing="0" cellpadding="0">
<tr >
<td><strong>No.</strong></td>
<td><strong>DATE</strong></td>
<td><strong>BENEFICIARY' S AFFILIATION NUMBER </strong></td>
<td><strong>AMOUNT DEDUCTED</strong></td>
<td><strong>EXPLANATION OF DEDUCTION</strong></td>
</tr>




<?php
$i=1;
 $deducted = "SELECT * FROM verification,orders WHERE verification.orders_id=orders.order_id AND verification.period='$period' AND verification.amountde>0";// get the date 
        $retval = mysqli_query($link, $deducted);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowded = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo'<tr>';
					echo'<td>'.$i++.'</td>';
					echo'<td>'.$rowded['date'].'</td>';
					echo'<td>'.$rowded['insurance_code'].'</td>';
					echo'<td>'.$rowded['amountde'].'</td>';
					echo'<td>'.$rowded['explanation'].'</td>';
					echo'</tr>';
				 }	
				 
				 
			$total = "SELECT SUM(amountde) AS total FROM verification WHERE period='$period'";// get the date 
        $retval = mysqli_query($link, $total);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowtot= mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$total=$rowtot['total'];
				 }	 
				 
				 	
?>
<tr  bgcolor="#999999" style="font-size:16px; ">
<td></td>
<td><strong>TOTAL</strong></td>
<td></td>
<td><strong><?php echo $total ?></strong></td>
<td></td>
</tr>
</p>
</body>
</html>