<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::MEDICAMENTS</title>

<?php 
error_reporting(E_ERROR | E_PARSE);

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>







<?php
include('link.php');

?>

<style>
.coment:hover{
		box-shadow: 0px 0px 10px 0px #000;
		background-color:#C5E2E2;
		
}
.button {
	border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#069;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 7px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
</style>

</head>

<body bgcolor="">

<?php
	
	if(isset($_POST['receipt']))
                     {
						 
						 $receipt=$_POST['receipt'];
						 $i=1;
						// $gtotal=0;
						$tm=0;
	$products = "SELECT * FROM receipt WHERE receipt_id =$receipt LIMIT 1 ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' );
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			   $id=$row['client_id'];
			   $date=$row['date'];
			   $cname=$row['client_name'];
			   $name=$row['user'];
			   
			   $tm2=mb_substr($row['item'], 0, 2);
			   if ($tm2=='TM')
			   {    if ($tm==0)
				   $tm=$row['unitp'];
			   }
			echo '<strong>Name:</strong>'.$row['client_name'].'<br>';
			echo '<strong>Date:</strong>'.$row['date'].'<br>';
			echo '<strong>Receipt#:</strong>'.$row['receipt_id'].'<br>'; 
			   
			 
				 }
				 /*$products = "SELECT insurance FROM clients WHERE client_id =$id LIMIT 1 ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				 }
				 
				 
				 $insu=$row['client_id'];*/
				 
				 }
				 
				 
				 
	?>
    
    
    
    <br />
<?php    
if(isset($_POST['receipt']))
                     {    
echo ' <table width="0" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">



  <tr bgcolor="#D7D7D7">
    <td><strong>NO.</strong></td>
    <td><strong>Item description</strong></td>
    <td><strong>Qtty</strong></td>
    <td><strong>U. Price</strong></td>
    <td><strong>Total</strong></td>
  </tr>';
  
  
  
  
  
	
	
						 
						 $receipt=$_POST['receipt'];
						 $gt=0;
						 $i=1;
						 $active=1;
						// $gtotal=0;
	$products = "SELECT * FROM receipt WHERE receipt_id =$receipt";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			   echo '<tr>';
			   echo '<td>'.$i++.'</td>';
			   
			   echo '<td>'.$row['item'].'</td>';
			    echo '<td>'.$row['qtty'].'</td>';
			   
			   echo '<td>'.$row['unitp'].'</td>';
			   echo '<td>'.$row['qtty']*$row['unitp'].'</td>';
			    
				if ($row['active']==0)
				      $reason=$row['why'];
				   
			    $tot=$row['qtty']*$row['unitp'];
			    $gt+=$tot;
			   
			 
				 }}
	?>
  
  
  
  
  
  <tr>
    <td colspan="4"><strong>
    <?php 
	
	
	if(isset($_POST['receipt']))
                     {
   echo' TOTAL';
					 }
   ?>
    </strong></td>
   
    <td><strong>
	
	<?php 
	
	
	if(isset($_POST['receipt']))
                     {
	echo $gt;
					 }
	 ?></strong></td>
  </tr>
</table>
<?php


if (!empty($reason))
           {
			   echo '<strong> <font color="#FF0000">NB: CANCELED due:</strong>';
			       echo $reason;
				   echo '</font><br><br>';
				   
				   
		   }
				   
				   
	if(isset($_POST['receipt']))
                     {
$_SESSION['cname']=$cname;
$_SESSION['name']=$name;
$_SESSION['tm']=$tm;
$_SESSION['gt']=$gt;

echo'<table border="0">';
echo '<tr>';
echo '<td>';
echo '<a  href="receipt_copy.php?receipt='.$receipt.' &client_id='.$id.'&cname='.$cname.'"  onclick="return hs.htmlExpand(this, { objectType:'.'iframe'.'} )"><img  src="img/print-button.png" width="24" height="24" /></a>
';
echo '</td>';
echo '<td>';

echo'<form action="d.php" method="POST">';
echo'<input type="hidden" name="creceipt" value="'.$receipt.'">';
echo'<input type="hidden" name="gt" value="'.$gt.'">';
echo'<input type="hidden" name="cancel" value="1">';
echo'<button class="button" ><span>Cancel</span></button>';
echo'</form>';

echo '</td>';

echo '<td>';

echo'<form action="d.php" method="POST">';
echo'<input type="hidden" name="creceipt" value="'.$receipt.'">';
echo'<input type="hidden" name="client_id" value="'.$id.'">';
echo'<input type="hidden" name="date" value="'.$date.'">';
echo'<input type="hidden" name="gt" value="'.$gt.'">';
echo'<input type="hidden" name="dette" value="1">';
echo'<button class="button" ><span>Dette</span></button>';
echo'</form>';

echo '</td>';
}

?>









<div class="coment" style=" padding: 5px; border-radius: 10px; box-shadow: 20px; position: absolute; left: 383px; top: 6px;">

<?php

if(isset($_POST['cancel']))
                     {
						 $creceipt=$_POST['creceipt'];
						  $gt=$_POST['gt'];
						
						
						echo'
						<br />
<form action="d.php" method="post">
<strong>REASON TO CANCEL (#'.$creceipt.',  Amount: '.$gt.'FRW)</strong><hr>
<input type="hidden" name="receipt" value="'.$creceipt.'" />
<textarea name="why" rows="5" cols="50"></textarea><br />
<button class="button" ><span>Cancel</span></button>
</form>

</div>';	 
					 }
					 
					 
		if(isset($_POST['why']))
                     {
						 $receipt=$_POST['receipt'];
						 $why=$_POST['why'];
						  mysqli_query($link,"UPDATE receipt SET active ='0', why='$why'  WHERE receipt_id =$receipt");
						  echo'Invoice canceled';
						 
					 }
		
		
					 
					 
elseif(isset($_POST['dette']))
                     {
						 $creceipt=$_POST['creceipt'];
						  $gt=$_POST['gt'];	
						  $id=$_POST['client_id'];
						  
						  
						  echo'
						  <strong>ENREGISTRER UNE DETTE</strong><hr>
						  <table width="" border="0">
<form action="d.php" method="post">
  <tr>
    <td>No.ID</td>
    <td><input type="tex" name="nid">
	<input type="hidden" name="receipt" value="'.$creceipt.'">
	<input type="hidden" name="client_id" value="'.$id.'">
	</td>
  </tr>
  <tr>
    <td>Tel</td>
    <td><input type="tex" name="tel"></td>
  </tr>
  <tr>
    <td>District</td>
    
    <td><input type="tex" name="district"></td>

    
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
    <td><input type="tex" size="15"  value="'.$gt.'" name="amount"></td>
  </tr>
  <tr>
    <td>Montant disponible</td>
    <td><input type="tex" size="15" name="dispo"></td>
  </tr>
  <tr>
    <td>Date </td>
    <td>
	
	<input type="text" size="15" value="'.date('Y-m-d').'" name="date">
	
	</td>
  </tr>
  
  <tr>
    <td>Date de payement</td>
    <td>
	
	
	<input type="tex" size="15" value="'.date('Y-m-d').'" name="pdate">
	
	
	</td>
  </tr>
  
  
  
  <tr>
    <td></td>
    <td><button class="button" ><span>Enregistrer</span></button></td>
  </tr>
 </form>
</table>
  
						  ';		
						  
					 }
					 
					 
		elseif(isset($_POST['dispo']))
                     {		
 $client_id=$_POST['client_id'];	 
 $receipt=$_POST['receipt']; 						  
$nid=$_POST['nid']; 
$tel=$_POST['tel'];
$district=$_POST['district']; 
$sec=$_POST['sec'];
$cell=$_POST['cell'];
$village=$_POST['village'];
$amount=$_POST['amount'];
$dispo=$_POST['dispo'];

 $reste=$amount-$dispo;
 $pdate=$_POST['pdate'];

$date=$_POST['date'];
$user=$_SESSION['name'];
$period=date("F-Y", strtotime($date));

mysqli_query ($link,"INSERT INTO dettes2 (client_id, receipt_id, nid, tel, district, sector, cell, village, total, paid, reste, pdate, period, date, user) 
                         VALUES ($client_id, $receipt, '$nid', '$tel', '$district', '$sec', '$cell', '$village', $amount, $dispo, $reste , '$pdate', '$period' , '$date','$user')");

mysqli_query($link,"UPDATE receipt SET active ='2'  WHERE receipt_id =$receipt");

 echo '<p style="font-size:20px; background-color:#F00;">Une dette de:<b>'.$reste.'</b> a été éffectué avec succés!</p>';	  
						  
		}				  
						  
						  
	?>	


</div>

















</body>
</html>
