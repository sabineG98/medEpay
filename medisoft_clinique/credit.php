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
$amount=$_SESSION['amount'];//get the amount to pay

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
$period=$_SESSION['period'];





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
                   echo '<p style="font-size:20px; text-transform:uppercase;"><img src="img/dette3.png" width="40" height="40" />'.$defrowper['beneficiary'].'-'.$defrowper['insurance_code'].'['.$defrowper['insurance'].']<b>---[DETTE]</b></p>';
				   echo'<hr>';
				   
				        
				 }


?>

<table width="" border="0">
<form action="credit.php" method="post">
  <tr>
    <td>No.ID</td>
    <td><input type="tex" size="30" name="nid"></td>
  </tr>
  <tr>
    <td>Tel</td>
    <td><input type="tex" name="tel"></td>
  </tr>
  <tr>
    <td>District</td>
    <td>
     <?php 
    $products = "SELECT distrcode, distrname FROM district";
    echo '<select  name="district">';
    echo'<option  value="">---------------</option>';

        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {  
					 //echo'<input type="hidden" name="dcode" value="'.$row['distrcode'].'">';
					 echo'<option  value="'.$row['distrname'].'">'.$row['distrname'].'</option>';
					 
					//echo'<input type="hidden" name="dcode" value="'.$row['distrcode'].'">';
				 }
  

   
   echo '</select>';
   
   ?>
    </td>
  </tr>
  <tr style="">
    <td>Secteur</td>
    <td><input type="tex" name="sec"></td>
  </tr>
  <tr>
    <td>Cellule</td>
    <td><input type="tex" name="cell"></td>
  </tr>
  <tr>
    <td>Village</td>
    <td><input type="tex" name="village"></td>
  </tr>
  <tr>
    <td>Montant total à payer</td>
    <td><input type="tex" size="15"  value="<?php echo $amount; ?>" name="amount"></td>
  </tr>
  <tr>
    <td>Montant disponible</td>
    <td><input type="tex" size="15" name="dispo"></td>
  </tr>
  <tr>
    <td>Date de payement</td>
    <td><input type="tex" size="15" value="<?php echo date('Y-m-d') ?>" name="pdate"></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" value="Enregistrer" /><input type="reset" value="Annuler" /></td>
  </tr>
 </form>
</table>

<hr />
<?php
if(isset($_POST['nid'])&&($_POST['dispo']))
{
	
$nid=$_POST['nid']; 
$tel=$_POST['tel'];
$district=$_POST['district']; 
$sec=$_POST['sec'];
$cell=$_POST['cell'];
$village=$_POST['village'];
$dispo=$_POST['dispo'];
$reste=$amount-$dispo;
$pdate=$_POST['pdate'];

//$date=date('Y-m-d');



mysqli_query ($link,"INSERT INTO dettes (client_id, nid, tel, district, sector, cell, village, total, paid, reste, pdate, period, date) 
                         VALUES ($id, '$nid', '$tel', '$district', '$sec', '$cell', '$village', $amount, $dispo, $reste , '$pdate', '$period' , '$date')");



 echo '<p style="font-size:20px; background-color:#F00;">Une dette de:<b>'.$reste.'</b> a été éffectué avec succès!</p>';
}
?>
</center>


</body>
</html>