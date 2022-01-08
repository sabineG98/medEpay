<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
</head>

<body bgcolor="#BFDFFF">
<center>
<?php
include ('link.php');
session_start();

if (isset($_POST["order"])) 
{
$deletet=$_POST['order'];
$code=$_POST['client2'];


mysqli_query ($link,"DELETE FROM orders WHERE order_id=$deletet");

}





/*if(isset($_GET['id']))
{
$id=$_GET['id'];
}
else
{
$id=$_POST['client2'];
}*/




//$user=$_GET['user'];
//$date=$_GET['date'];

//echo $user;
//echo $date;
//echo $id;

$id=$_SESSION['id'];
$date=$_SESSION['date'];





//$code=$_POST['client'];
$defper = "SELECT DISTINCT client_id, insurance, insurance_code, beneficiary FROM clients WHERE client_id=$id ";
        $retvalper = mysqli_query($link, $defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				   $id=$defrowper['client_id'];
                   echo '<p style="font-size:20px; text-transform:uppercase;"><img src="img/coment.png" width="60" height="60" />'.$defrowper['beneficiary'].'-'.$defrowper['insurance_code'].'['.$defrowper['insurance'].']<b>---[COMMENTAIRE]</b></p>';
				   echo'<hr>';
				   
				        
				 }


?>

<table width="" border="0">
 <form action="coment.php" method="post">
   <tr>
    <td></td>
    <td><textarea rows="10" cols="50" placeholder="tapez votre commentaire ici" name="coment"></textarea></td>
  </tr>
  
  <tr>
    <td></td>
    <td><input type="submit" value="Enregistrer" /><input type="reset" value="Annuler" /></td>
  </tr>
  </form>
</table>

<?php
if(isset($_POST['coment']))
{
	
$coment=$_POST['coment']; 


//$date=date('Y-m-d');



mysqli_query ($link,"INSERT INTO coment (client_id, coment) 
                         VALUES ($id, '$coment')");



 echo '<p style="font-size:20px; background-color:#F00;"><b>Votre comentaire a été ajouté avec succès!</b></p>';
}
?>

</center>


</body>
</html>