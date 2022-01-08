<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$exist=0;
include ('link.php');
session_start();

//error_reporting(E_ERROR | E_PARSE);

$id=$_GET['id'];
$date=$_GET['date'];
$categorie=$_GET['categorie'];
$period=$_GET['period'];

if(isset($_POST['tm']))
{
	
  $clientid=$_POST['clientid']; 
   $date=$_POST['date'];
$musatm = "SELECT client_id,item,date FROM orders WHERE client_id='$clientid' AND item='MUSA-TM' AND date ='$date'";
        $retval = mysqli_query($link, $musatm);
        if(! $retval)
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
      
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				 $musa=$row['item'];
				 } 
		
	if(empty($musa ))
	 {
		  $exist=1;		
	 }

}


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
	  
	   
   /* echo'Client d:';
	echo $clientid.'<br>';
	echo'Categorie';
	echo $categorie.'<br>';
	echo'Date';
	echo $date.'<br>';
	echo'period';
	echo $period.'<br>';
	*/
	
	
	$status='finished';

$user=$_SESSION['name'];	
	if ($exist==1)
	{
	 mysqli_query ($link,"INSERT INTO orders (client_id,item, type, unityp, period, date, status, insured, user) 
                               VALUES ($clientid,'MUSA-TM', 'TM', 200, '$period', '$date', '$status', 0, '$user')"); 
	
	
	  					   
	
							   
	}						   
  	echo'<center><font color="#009900"><strong>Submited successfully</strong></font></center>';
	
		
	
						  
}








/*if(isset($_POST['id']))
{
	
      $ccid=$_POST['id']; 
	  $date=$_POST['date'];
	  echo 'Canceled';
	  
	
	  mysqli_query ($link,"DELETE FROM `rapidb`.`indigents` WHERE `indigents`.`client_id` = '$ccid' AND `indigents`.`date` = '$date' ");
	
	
						  
}*/

?>

<form action="ind.php?id=<?php echo $id; ?>&categorie=<?php echo $categorie; ?>&date=<?php echo $date; ?>&period=<?php echo $period; ?>" method="post">
<input type="text" value="200"  hidden="hidden" name="tm" />
<input type="hidden" name="clientid" value="<?php echo $id ?>" />
<input type="hidden" name=" date" value="<?php echo $date ?>" />
<input type="hidden" name="period" value="<?php echo $period ?>" />
<input type="hidden" name="categorie" value="<?php echo $categorie ?>" />



<input type="submit"  style="background-color:#F66; height:40px; width:250px; font-size:16px; font-weight:300; cursor:pointer;"  value="MUSA-Ticket moderateur(200)" />

</form>


<form action="ind.php?id=<?php echo $id; ?>&categorie=<?php echo $categorie; ?>&date=<?php echo $date; ?>&period=<?php echo $period; ?>" method="post">

<input type="hidden" name=" date" value="<?php echo $date ?>" />
<input type="text" name="id" value="<?php echo $id; ?>"  hidden="hidden"/>
<!--<input type="submit" style="width:100px;" value="Cancel" />-->


</form>


</body>
</html>