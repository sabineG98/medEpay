<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REDRESSEMENT</title>
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
$period=$_GET['p'];

if(isset($_POST['amountde']))
{

$id=$_POST['vid']; 
$amountde=$_POST['amountde']; 
$explanation=$_POST['explanation']; 
$date=date('Y-m-d');
mysqli_query ($link,"UPDATE verification SET amountde ='$amountde', explanation ='$explanation', date='$date'  WHERE verification_id =$id");
}



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
<h2><u>REPORT OF MEDICAL VERIFICATION-<i>REDRESSEMENT</i></u></h2>
<p><strong>
HEALTH FACILITY: <?php echo $hc ?> HC <br />
CBHI SECTION: <?php echo $hc ?><br />
ADMINISTRATIVE DISTRICT: <?php echo $district ?> <br />
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
$i=0;
 $deducted = "SELECT * FROM verification,orders WHERE verification.orders_id=orders.order_id AND verification.period='$period'";// get the date 
        $retval = mysqli_query($link, $deducted);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowded = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $d=date('Y-m-d');
					 
					 $i++;
					 if ($d==$rowded['date'])
					   echo'<tr bgcolor="#D9FFD9">';
					 elseif($i%2==0)
					 echo'<tr bgcolor="#D8D8D8">';

					 else
					  echo'<tr>';
					  
					echo'<td>'.$i.'</td>';
					echo'<td>'.$rowded['date'].'</td>';
					echo'<td>'.$rowded['insurance_code'].'</td>';
					
					
					
					echo '<form action="redress.php?p='.$period.'" method="post">';
					
					echo'<input type="hidden" value="'.$rowded['verification_id'].'" name="vid">';
					echo'<td><input type="text" value="'.$rowded['amountde'].'" name="amountde" ></td>';
					echo'<td><textarea style="overflow:hidden;" name="explanation" >'.$rowded['explanation'].'</textarea>';
					
					echo'<input type="submit" value="" style="background-image:url(img/upd.jpg); background-repeat:no-repeat;" />';
					
					
					echo'</form>';
					echo'</td>';
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