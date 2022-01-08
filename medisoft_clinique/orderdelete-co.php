<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="" >
<title>Untitled Document</title>
</head>
<body bgcolor="#BFDFFF">
<?php
// error_reporting(E_ERROR | E_PARSE);
include ('link.php');
session_start();
if (isset($_POST["order"])) 
{
$user=$_SESSION['name'];
$prod=$_POST['pro'];
$qtty=$_POST['qtty'];
$deletet=$_POST['order'];
$code=$_POST['client2'];
$id=$_POST['id'];
$type=$_POST['type'];
$unityp=$_POST['unityp'];
$insured=$_POST['insured'];
$date=date('Y-m-d');
$period=date("F-Y", strtotime($date));
$reason=$_POST['reason'];
if($type=='med')
{
$med = "SELECT qtty  FROM products WHERE prod_id='$prod'";
        $retvalmed = mysqli_query($link,$med);
        if(! $retvalmed )
           {  die('Could not get data: ' . mysqli_error($link));   }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {	 $prev=$rowmed['qtty'];	 }
$newq=$prev+$qtty;//new qtty		
mysqli_query ($link,"UPDATE products SET qtty ='$newq'  WHERE prod_id ='$prod'");//update the stock qtty
}
if($type=='consommable')
{
$med = "SELECT qtty  FROM consommables WHERE id='$prod'";
        $retvalmed = mysqli_query($link,$med);
        if(! $retvalmed )
           {    die('Could not get data: ' . mysqli_error($link));     }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {	 $prev=$rowmed['qtty'];	 }
$newq=$prev+$qtty;//new qtty		
mysqli_query ($link,"UPDATE consommables SET qtty ='$newq'  WHERE id ='$prod'");//update the stock qtty
}
mysqli_query ($link,"DELETE FROM orders WHERE order_id=$deletet");
mysqli_query ($link,"INSERT INTO recyclebin (client_id,item, type, quantity, unityp, period, date, status, insured, user,reason) 
                               VALUES ($id,'$prod', '$type', $qtty, $unityp, '$period', '$date','0', '$insured', '$user','$reason')");
}

$id=$_GET['id'];
$date=$_GET['date'];
if (isset($_POST["beneficiaryc"])) 
{
$corr_code=$_POST['codec']; 
$corr_ben=$_POST['beneficiaryc'];
// $corr_codechef=$_POST['codechef'];
$corr_tel=$_POST['tel'];
$corr_father=$_POST['fatherdefamille'];
$corr_cat=$_POST['cat'];
$cl=$_POST['cl_id'];
mysqli_query ($link,"UPDATE clients SET insurance_code ='$corr_code', beneficiary='$corr_ben', father='$corr_father',percentage='$corr_cat'  WHERE client_id =$cl");
echo ' <img src="img/yes.png"';
}

$defper = "SELECT DISTINCT client_id, insurance, insurance_code, beneficiary, father, percentage FROM clients WHERE client_id=$id ";
        $retvalper = mysqli_query($link,$defper);
        if(! $retvalper )
           {   die('Could not get data: ' . mysqli_error($link));    }                         
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				   $id=$defrowper['client_id'];
				   echo'<form action="orderdelete-co.php?id='.$id.'" method="post">';
                   echo '
				   <p style="font-size:20px; text-transform:uppercase;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beneficiary:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" style=" font-size:16px;" name="beneficiaryc" size="40" value="'.$defrowper['beneficiary'].'"> <input type="hidden" name="cl_id" value="'.$id.'">-TEL: <input type="text" size="8" style=" font-size:16px;" name="tel" value="'.$defrowper['tel'].'">&nbsp;['.$defrowper['insurance'].']

				   <p style="font-size:20px; text-transform:uppercase;"><span>Father\'s name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" style=" font-size:16px;" name="fatherdefamille" size="40" value="'.$defrowper['father'].'"> <input type="hidden" name="cl_id" value="'.$id.'">-Insurance Code: <input type="text" size="10" style=" font-size:16px;" name="codec" value="'.$defrowper['insurance_code'].'">['.$defrowper['insurance'].']&nbsp;&nbsp;&nbsp;Cat:&nbsp;<input style="width:20px; text-align:center;" type="text" name="cat" value="'.$defrowper['percentage'].'"
				   				   
				   <br>
				  <center> <input type="submit" value="CORRECTION"></center></p>';
				   echo'</form><hr>';
				   
				        echo'<table width="0"  border="1" cellspacing="0" cellpadding="0">
                            <tr bgcolor="#CCCCCC" >
                         <td>Designation</td>
						 <td>Qtté</td>						
                          <td>Prix U</td>
                           <td colspan="0">Total</td>
						   <td colspan="0">Date</td>
						   <td colspan="0">Observation</td>';						   
						$defper = "SELECT* FROM orders WHERE client_id=$id AND date='$date' ORDER BY time DESC ";
                            $retvalper = mysqli_query($link,$defper);
                            if(! $retvalper )
                               {   die('Could not get data: ' . mysqli_error($link));    }                         
                                 while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                                          {
											   $typ=$defrowper['type'];
											   $it=$defrowper['item'];
											   $oid=$defrowper['order_id'];
										echo '<form action="orderdelete-co.php?id='.$id.'&date='.$date.'" method="post">';	

										echo'<tr bgcolor="#FFFFFF">';
										echo '<td>'.$defrowper['name_consommable'].'</td>';										   
										echo '<input type="hidden" name="insured" value="'.$defrowper['insured'].'">';
										echo '<input type="hidden" name="unityp" value="'.$defrowper['unityp'].'">';
										echo '<input type="hidden" name="id" value="'.$defrowper['client_id'].'">';
										echo '<input type="hidden" name="type" value="'.$defrowper['type'].'">';										   
										echo '<input type="hidden" name="pro" value="'.$defrowper['item'].'">';
										echo'<td>'.$defrowper['quantity'].'</td>';
										echo '<input type="hidden" name="qtty" value="'.$defrowper['quantity'].'">';
										echo'<td>'.$defrowper['unityp'].'</td>';
										$t=$defrowper['quantity']*$defrowper['unityp'];
										echo'<td>'.$t.'</td>'; 
										echo '<input type="hidden" name="order" value="'.$defrowper['order_id'].'">';
										echo '<input type="hidden" name="client2" value="'.$id.'">';
										echo'<td>'.$defrowper['time'].'</td>';
										echo'<td><textarea name="reason" rows="2" cols="20"></textarea></td>';
										echo'<td><input style="background-color:#F00;" type="submit" value="X"></td>';
										echo'</form>';
										echo '</tr>';

// 										  		if($typ=='consommable')
// 													{
// $defpe = "SELECT * FROM orders,consommables WHERE orders.client_id=$id AND orders.item=consommables.id AND orders.item='$it' AND orders.date='$date' AND orders.order_id='$oid' ORDER BY orders.time DESC ";
// $retvalpe = mysqli_query($link,$defpe);
//                             if(! $retvalpe )
//                                {    die('Could not get data: ' . mysqli_error($link));     }                         
//                                  while($defrowpe = mysqli_fetch_array($retvalpe, MYSQLI_ASSOC))
//                                           {
// 				                           echo'<tr bgcolor="#FFFFFF">';
// 										   echo '<td>'.$defrowpe['name_consommable'].'</td>';										   
// 										   echo '<input type="hidden" name="insured" value="'.$defrowpe['insured'].'">';
// 										   echo '<input type="hidden" name="unityp" value="'.$defrowpe['unityp'].'">';
// 										   echo '<input type="hidden" name="id" value="'.$defrowpe['client_id'].'">';
// 										   echo '<input type="hidden" name="type" value="'.$defrowpe['type'].'">';										   
// 										   echo '<input type="hidden" name="pro" value="'.$defrowpe['item'].'">';
// 										   echo'<td>'.$defrowpe['quantity'].'</td>';
// 										   echo '<input type="hidden" name="qtty" value="'.$defrowpe['quantity'].'">';
// 										   echo'<td>'.$defrowpe['unityp'].'</td>';
// 										   $t=$defrowpe['quantity']*$defrowpe['unityp'];
// 										   echo'<td>'.$t.'</td>'; 
// 										   echo '<input type="hidden" name="order" value="'.$defrowpe['order_id'].'">';
// 							               echo '<input type="hidden" name="client2" value="'.$id.'">';
// 										   echo'<td>'.$defrowpe['time'].'</td>';
// 										   echo'<td><textarea name="reason" rows="2" cols="20"></textarea></td>';
// 										   echo'<td><input style="background-color:#F00;" type="submit" value="X"></td>';
// 										   echo'</form>';
// 										   echo '</tr>';
//                                           }
// 													}
													
// 													if($typ=='med')
// 													{
// $defpe = "SELECT * FROM orders,products WHERE orders.client_id=$id AND orders.item=products.prod_id AND orders.item='$it' AND orders.date='$date' AND orders.order_id='$oid' ORDER BY orders.time DESC ";
// $retvalpe = mysqli_query($link,$defpe);
//                             if(! $retvalpe )
//                                {    die('Could not get data: ' . mysqli_error($link));     }                         
//                                  while($defrowpe = mysqli_fetch_array($retvalpe, MYSQLI_ASSOC))
//                                           {
// 											echo'<tr bgcolor="#FFFFFF">';
// 										   echo '<td>'.$defrowpe['description'].'</td>';										   
// 										   echo '<input type="hidden" name="insured" value="'.$defrowpe['insured'].'">';
// 										   echo '<input type="hidden" name="unityp" value="'.$defrowpe['unityp'].'">';
// 										   echo '<input type="hidden" name="id" value="'.$defrowpe['client_id'].'">';
// 										   echo '<input type="hidden" name="type" value="'.$defrowpe['type'].'">';										   
// 										   echo '<input type="hidden" name="pro" value="'.$defrowpe['item'].'">';
// 										   echo'<td>'.$defrowpe['quantity'].'</td>';
// 										   echo '<input type="hidden" name="qtty" value="'.$defrowpe['quantity'].'">';
// 										   echo'<td>'.$defrowpe['unityp'].'</td>';
// 										   $t=$defrowpe['quantity']*$defrowpe['unityp'];
// 										   echo'<td>'.$t.'</td>'; 
// 										   echo '<input type="hidden" name="order" value="'.$defrowpe['order_id'].'">';
// 							               echo '<input type="hidden" name="client2" value="'.$id.'">';
// 										   echo'<td>'.$defrowpe['time'].'</td>';
// 										   echo'<td><textarea name="reason" rows="2" cols="20"></textarea></td>';
// 										   echo'<td><input style="background-color:#F00;" type="submit" value="X"></td>';
// 										   echo'</form>';
// 										   echo '</tr>';
// 										  }
// 													}
																																							
// 								if($typ=='soins' || $typ=='ambulance' || $typ=='consultation' || $typ=='laboratoire' || $typ=='hospitalisation')
// 			                           {
// 	$defpe = "SELECT * FROM orders,acts WHERE orders.client_id=$id AND orders.item=acts.act_id AND orders.item='$it' AND orders.date='$date' AND orders.order_id='$oid' ORDER BY orders.time DESC ";
// $retvalpe = mysqli_query($link,$defpe);
//                             if(! $retvalpe )
//                                {   die('Could not get data: ' . mysqli_error($link));    }                         
//                                  while($defrowpe = mysqli_fetch_array($retvalpe, MYSQLI_ASSOC))
//                                           {
// 											echo'<tr bgcolor="#FFFFFF">';
// 										   echo '<td>'.$defrowpe['act'].'</td>';										   
// 										   echo '<input type="hidden" name="insured" value="'.$defrowpe['insured'].'">';
// 										   echo '<input type="hidden" name="unityp" value="'.$defrowpe['unityp'].'">';
// 										   echo '<input type="hidden" name="id" value="'.$defrowpe['client_id'].'">';
// 										   echo '<input type="hidden" name="type" value="'.$defrowpe['type'].'">';										   
// 										   echo '<input type="hidden" name="pro" value="'.$defrowpe['item'].'">';
// 										   echo'<td>'.$defrowpe['quantity'].'</td>';
// 										   echo '<input type="hidden" name="qtty" value="'.$defrowpe['quantity'].'">';
// 										   echo'<td>'.$defrowpe['unityp'].'</td>';
// 										   $t=$defrowpe['quantity']*$defrowpe['unityp'];
// 										   echo'<td>'.$t.'</td>'; 
// 										   echo '<input type="hidden" name="order" value="'.$defrowpe['order_id'].'">';
// 							               echo '<input type="hidden" name="client2" value="'.$id.'">';
// 										   echo'<td>'.$defrowpe['time'].'</td>';
// 										   echo'<td><textarea name="reason" rows="2" cols="20"></textarea></td>';
// 										   echo'<td><input style="background-color:#F00;" type="submit" value="X"></td>';
// 										   echo'</form>';
// 										   echo '</tr>';
// 										  }
// 													}
				                          
	// 									  if($typ=='TM')
	// 		                           {
	// $defpe = "SELECT * FROM orders WHERE client_id=$id AND item='$it' AND date='$date' ORDER BY time DESC ";
	// $retvalpe = mysqli_query($link,$defpe);
    //                         if(! $retvalpe )
    //                            {   die('Could not get data: ' . mysqli_error($link));     }                         
    //                              while($defrowper = mysqli_fetch_array($retvalpe, MYSQLI_ASSOC))
    //                                       {
	// 									   echo'<tr bgcolor="#FFFFFF">';
	// 									   echo '<td>'.$defrowper['item'].'</td>';										   
	// 									   echo '<input type="hidden" name="insured" value="'.$defrowper['insured'].'">';
	// 									   echo '<input type="hidden" name="unityp" value="'.$defrowper['unityp'].'">';
	// 									   echo '<input type="hidden" name="id" value="'.$defrowper['client_id'].'">';
	// 									   echo '<input type="hidden" name="type" value="'.$defrowper['type'].'">';										   
	// 									   echo '<input type="hidden" name="pro" value="'.$defrowper['item'].'">';
	// 									   echo'<td>'.$defrowper['quantity'].'</td>';
	// 									   echo '<input type="hidden" name="qtty" value="'.$defrowper['quantity'].'">';
	// 									   echo'<td>'.$defrowper['unityp'].'</td>';
	// 									   $t=$defrowper['quantity']*$defrowper['unityp'];
	// 									   echo'<td>'.$t.'</td>'; 
	// 									   echo '<input type="hidden" name="order" value="'.$defrowper['order_id'].'">';
	// 						               echo '<input type="hidden" name="client2" value="'.$id.'">';
	// 									   echo'<td>'.$defrowper['time'].'</td>';
	// 									   echo'<td><textarea name="reason" rows="2" cols="20"></textarea></td>';
	// 									   echo'<td><input style="background-color:#F00;" type="submit" value="X"></td>';
	// 									   echo'</form>';
	// 									   echo '</tr>';
	// 									  }
	// 			 									}
										  }
										  echo'</table>';
	             }				 				     
?>
</body>
</html>