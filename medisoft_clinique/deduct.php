<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php 


include('link.php');

if(isset($_POST['deducted'])&&($_POST['explanation']))
{
	   $cid=$_POST['cid'];
      $oid=$_POST['oid']; 
	  $insu=$_POST['insu'];
	  $period=$_POST['period'];  
	  $deducted=$_POST['deducted'];
	  $explanation=$_POST['explanation']; 
    
	
	
	
	
	
	
	
	  mysqli_query ($link,"INSERT INTO verification (client_id, orders_id, insurance_code, period, amountde, explanation) 
                               VALUES ('$cid', $oid, '$insu','$period', $deducted, '$explanation')"); 
  	echo'<center><font size="5" color="#009900"><strong>Deducted successfully</strong></font><br>
	
	
	
	
	</center>';					  
}
?>
</body>
</html>