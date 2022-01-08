<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 


?>
<?php

include('link.php');

if(isset($_POST['qtty']))
{
	
$qtty=$_POST['qtty']; 
$prod=$_POST['product']; 
$id=$_POST['id'];
$date=$_POST['date'];

//echo $id;

$price = "SELECT unit_price, insured FROM products WHERE description='$prod' ";
        $retvalprice = mysqli_query($link, $price);
        if(! $retvalprice )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowp = mysqli_fetch_array($retvalprice, MYSQLI_ASSOC))
                 {
					 
					 $tarif=$rowp['unit_price'];
					 $insured=$rowp['insured'];
					
					
				 }
//echo $tarif;


//$tot=$qtty*$tarif;

$status='finished';
$user=$_SESSION['name'];

$period=date("F-Y", strtotime($date));


$med = "SELECT qtty  FROM products WHERE description='$prod'";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $prev=$rowmed['qtty'];
				 }
				 
if ($prev>=$qtty)
 {

mysqli_query ($link,"INSERT INTO orders (client_id,item, type, quantity, unityp, period, date, status, insured, user) 
                               VALUES ($id,'$prod', 'med', $qtty, $tarif, '$period', '$date','$status', '$insured', '$user')");
							   
							   
							   $newq=$prev-$qtty;//new qtty		
							   mysqli_query ($link,"UPDATE products SET qtty ='$newq'  WHERE description ='$prod'");//update the stock qtty
	 

 }
							   

}
include('med1.php');
?>









</body>
</html>
