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

if(isset($_POST['tm']))
{
	
$prod=$_POST['tm']; 
$id=$_POST['id'];
//$insu=$_POST['insu'];
$date=$_POST['date'];
$type='tm';
$tarif=200;
//echo $id;
$insured='1';					 
               

$status='finished';

$period=date("F-Y", strtotime($date));
$user=$_SESSION['name'];

mysqli_query ($link,"INSERT INTO orders (client_id,item, type, unityp, period, date, status, insured, user) 
                               VALUES ($id,'$prod', '$type', $tarif, '$period', '$date', '$status', '$insured', '$user')");
							   
							   

}
//echo $id;
echo 'Ticket Moderateur Ajouté';



?>



</body>
</html>