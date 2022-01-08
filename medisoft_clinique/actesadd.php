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

if(isset($_POST['product']))
{
$qtty=$_POST['qtty']; 
$prod=$_POST['product']; 
$id=$_POST['id'];
$insu=$_POST['insu'];
$date=$_POST['date'];

//echo $id;

$price = "SELECT type,ta, insured FROM acts WHERE act='$prod' ";
        $retvalprice = mysqli_query($link, $price);
        if(! $retvalprice )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowp = mysqli_fetch_array($retvalprice, MYSQLI_ASSOC))
                 {
					 
					 $tarif=$rowp['ta'];
					 
					 $type=$rowp['type'];
					 $insured=$rowp['insured'];


				 }
//echo $tarif;


//$tot=$qtty*$tarif;

$status='finished';

$period=date("F-Y", strtotime($date));
$user=$_SESSION['name'];


mysqli_query ($link,"INSERT INTO orders (client_id,item, type, quantity, unityp, period, date, status, insured, user) 
                               VALUES ($id,'$prod', '$type', $qtty, $tarif, '$period', '$date', '$status','$insured', '$user')");
							   
							   

}

include('actes1.php');



?>

</body>
</html>
