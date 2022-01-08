<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include ('link.php');

//error_reporting(E_ERROR | E_PARSE);

$id=$_GET['id'];
$date=$_GET['date'];
$categorie=$_GET['categorie'];
$period=$_GET['period'];







//echo $categorie.'<br>';
//echo $date.'<br>';
//echo $id.'<br>';
//echo $period

?>

<?php 


if(isset($_POST['tm']))
{
	
      $clientid=$_POST['clientid']; 
	   $categorie=$_POST['categorie'];
	  $date=$_POST['date'];
	  $period=$_POST['period'];  
	 
	   
    echo'Client d:';
	echo $clientid.'<br>';
	echo'Categorie';
	echo $categorie.'<br>';
	echo'Date';
	echo $date.'<br>';
	echo'period';
	echo $period.'<br>';
	
	
	
		
	
	  mysqli_query ($link,"INSERT INTO indigents  (client_id, categorie, date, period) 
                               VALUES ('$clientid', '$categorie', '$date', '$period')"); 
  	echo'<center><font color="#009900"><strong>Submited successfully</strong></font></center>';
	
	
	
	
	
	
						  
}

?>


<form action="ind.php?id=<?php echo $id; ?>&categorie=<?php echo $categorie; ?>&date=<?php echo $date; ?>&period=<?php echo $period; ?>" method="post">


<input type="text" name="id" value="<?php echo $clientid; ?>"  hidden="hidden"/>
<input type="submit" value="Cancel" />


</form>

</body>
</html>