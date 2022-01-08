<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="15" >
<title>Untitled Document</title>
<style>
.delx:hover{ background-color:#F63; border:1px solid #F00;}
</style>
</head>
<body bgcolor="#BFDFFF">
<?php
error_reporting(E_ERROR | E_PARSE);
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
$date1=$_POST['date'];
if($type=='LABORATOIRE')
{
$med = "SELECT * FROM lab_results,acts WHERE acts.act=lab_results.act AND acts.act_id='$prod'";
        $retvalmed = mysqli_query($link,$med);
        if(! $retvalmed ){  die('Could not get data: ' . mysqli_error($link));  }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $examid=$rowmed['exam_id'];
					 $exam=$rowmed['act'];
				 }
//$newq=$prev+$qtty;//new qtty		
$a=mysqli_query ($link,"DELETE FROM lab_results WHERE act ='$exam' AND date ='$date1' AND client_id ='$id'");//update the stock qtty
if(!$a){ die('Can not delete: '.mysqli_error($link)); }
// mysqli_query ($link,"UPDATE orders SET done =0  WHERE item ='$examid' AND date ='$date1' AND client_id ='$id'");//update the stock qtty
}
}
$id=$_GET['id'];
$date=$_GET['date'];
if (isset($_POST["beneficiaryc"])) 
{
$corr_code=$_POST['codec']; 
$corr_ben=$_POST['beneficiaryc'];
$corr_tel=$_POST['tel'];
$corr_father=$_POST['fatherdefamille'];
$corr_cat=$_POST['cat'];
$cl=$_POST['cl_id'];
// $cell=$_POST['cell'];
// $sector=$_POST['sector'];
// mysqli_query ($link,"UPDATE clients SET insurance_code ='$corr_code', beneficiary='$corr_ben', famille='$corr_tel', father='$corr_father',percentage='$corr_cat',cellule='$cell',sector='$sector'  WHERE client_id =$cl");
mysqli_query ($link,"UPDATE clients SET insurance_code ='$corr_code', beneficiary='$corr_ben', father='$corr_father',percentage='$corr_cat',tel='$corr_tel'  WHERE client_id =$cl");
echo ' <img src="img/yes.png"';
}
//$code=$_POST['client'];
$defper = "SELECT DISTINCT client_id,insurance,insurance_code,beneficiary,father,percentage,sector,cell,tel FROM clients WHERE client_id=$id ";
        $retvalper = mysqli_query($link,$defper);
        if(! $retvalper )
           {  die('Could not get data: ' . mysqli_error($link));   }                         
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				   $sect=$defrowper['sector'];
				   $id=$defrowper['client_id'];
				   echo'<form action="orderdelete-lab.php?id='.$id.'&date='.$date.'" method="post">';
                   echo '
				   <p style="font-size:20px; text-transform:uppercase;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beneficiary:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" style=" font-size:16px;" name="beneficiaryc" size="40" value="'.$defrowper['beneficiary'].'"> <input type="hidden" name="cl_id" value="'.$id.'">-TEL: <input type="text" size="8" style="font-size:16px;" name="tel" value="'.$defrowper['tel'].'">&nbsp;['.$defrowper['insurance'].']
				   
				   <p style="font-size:20px; text-transform:uppercase;"><span>father\'s name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" style=" font-size:16px;" name="fatherdefamille" size="40" value="'.$defrowper['father'].'"> <input type="hidden" name="cl_id" value="'.$id.'">-Insurance Code: <input type="text" size="10" style="font-size:16px;" name="codec" value="'.$defrowper['insurance_code'].'">['.$defrowper['insurance'].']&nbsp;&nbsp;&nbsp;Cat:&nbsp;<input style="width:20px; text-align:center;" type="text" name="cat" value="'.$defrowper['percentage'].'"';	   				   
				   
// 				  echo'<!--<center> <input type="submit" value="CORRECTION"></center>-</p>
				  				  
// 				  -<p style="font-size:20px; text-transform:uppercase;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sector:&nbsp;&nbsp;&nbsp;&nbsp;</span>
// <input type="text" style=" font-size:16px;" name="sector" size="50" value="'.$defrowper['sector'].'"> -->';

// $products = "SELECT section,sector_code FROM sector ORDER BY section ASC";
//     echo '<select name="sector" required>';
// 	    echo'<option  value="'.$sect.'">';
// 		$produc = "SELECT section,sector_code FROM sector WHERE sector_code=$sect";
// 		 $retv = mysqli_query($link,$produc);
//         if(! $retv )
//            {  die('Could not get data: ' . mysqli_error($link));  }                         
//          while($rowx = mysqli_fetch_array($retv, MYSQLI_ASSOC))
//                  {				 
// 		          echo $rowx['section'];
// 				 }
// 				 echo'</option>';
//         $retval = mysqli_query($link,$products);
//         if(! $retval )
//            {  die('Could not get data: ' . mysqli_error($link));  }                         
//          while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
//                  {  echo'<option  value="'.$row['sector_code'].'">'.$row['section'].'</option>'; }  
//     echo'<option  value="">-----------------</option>';
//     echo'<option  value=""><strong>NON TROUVE</strong></option>';
//    echo '</select>';   
// echo'<input type="hidden" name="cl_id" value="'.$id.'">-Cell:&nbsp;<input type="text" style=" font-size:16px;" name="cell" value="'.$defrowper['cellule'].'">
echo'<br>
				  <center> <input type="submit" value="CORRECTION"></center></p>';
				   echo'</form><hr>';		
				   
				   		echo'<form action="orderdelete-lab.php?id='.$id.'&date='.$date.'" method="post">';		   
				        echo'<table width="0"  border="1" cellspacing="0" cellpadding="0">
                            <tr bgcolor="#CCCCCC" >
							<td colspan="0">Date</td>
                        	<td>Designation</td>';
						$defper = "SELECT * FROM orders,acts WHERE orders.item_id=acts.act_id AND client_id=$id AND orders.date='$date' AND type='laboratoire' ORDER BY time DESC ";
                            $retvalper = mysqli_query($link,$defper);
                            if(! $retvalper )
                               {  die('Could not get data: ' . mysqli_error($link));   }                         
                                 while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                                          {
											  $it=$defrowper['item_id'];
											  $oid=$defrowper['order_id'];
$defpe = "SELECT * FROM orders,acts WHERE orders.client_id=$id AND orders.item_id=acts.act_id AND orders.item_id='$it' AND orders.date='$date' AND orders.order_id='$oid' ORDER BY orders.time DESC ";
$retvalpe = mysqli_query($link,$defpe);
                            if(! $retvalpe )
                               {   die('Could not get data: ' . mysqli_error($link));    }                         
                                 while($defrowpe = mysqli_fetch_array($retvalpe, MYSQLI_ASSOC))
                                          {											  
										echo '<form action="orderdelete-lab.php?id='.$id.'&date='.$date.'" method="post">';										
				                           echo'<tr bgcolor="#FFFFFF">';
										   echo'<td>'.$defrowper['time'].'</td>';
										   echo '<td>'.$defrowpe['act'];
										   ////////
$defperx = "SELECT * FROM lab_results,acts WHERE lab_results.act=acts.act AND lab_results.client_id=$id AND lab_results.date='$date' AND acts.act_id='".$defrowper['item_id']."'";
                            $retvalperx = mysqli_query($link,$defperx);
                            if(! $retvalperx )
                               {  die('Could not get data: ' . mysqli_error($link));   }                         
                                 while($defrowperx = mysqli_fetch_array($retvalperx, MYSQLI_ASSOC))
                                          {
		echo '<input type="hidden" name="pos" value="'.$defrowperx['result'].'"> (Result:<font color="#0033FF"> '.$defrowperx['result'].'</font>  <input style="background-color:#F00; border:0px; border-radius:50%;" type="submit" value="X">)';
// if($defrowperx['pos_neg_result']==3)
// 	{
// 	echo '<input type="hidden" name="pos" value="'.$defrowperx['pos_neg_result'].'"> (Result:<font color="#006600"> Negatif</font>  <input style="background-color:#F00; border:0px; border-radius:50%;" type="submit" value="X">)';
// 	}
// 	elseif($defrowperx['pos_neg_result']==1)
// 		{
// 		echo '<input type="hidden" name="pos" value="'.$defrowperx['pos_neg_result'].'"> (Result:<font color="#FF0000"> Positif</font>  <input style="background-color:#F00; border:0px; border-radius:50%;" type="submit" value="X">)';
// 		}
// 		elseif($defrowperx['pos_neg_result']==2)
// 			{
// 			echo '<input type="hidden" name="pos" value="'.$defrowperx['pos_neg_result'].'"> (Result:<font color="#0033FF"> '.$defrowperx['comment'].'</font>  <input style="background-color:#F00; border:0px; border-radius:50%;" type="submit" value="X">)';
// 			}									
// 			elseif($defrowperx['exam_id']==14)
// 				{
// 				echo '<input type="hidden" name="pos" value="'.$defrowperx['pos_neg_result'].'"> (Result:<font color="#0033FF"> '.$defrowperx['pos_neg_result'].'</font>  <input style="background-color:#F00; border:0px; border-radius:50%;" type="submit" value="X">)';
// 				}	
										  }
										   ////////
										   echo '</td>';
										   echo '<input type="hidden" name="insured" value="'.$defrowper['insured'].'">';
										   echo '<input type="hidden" name="unityp" value="'.$defrowper['unityp'].'">';
										   echo '<input type="hidden" name="id" value="'.$defrowper['client_id'].'">';
										   echo '<input type="hidden" name="type" value="'.$defrowper['type'].'">';										   
										   echo '<input type="hidden" name="pro" value="'.$defrowper['item_id'].'">';
										   //echo'<td>'.$defrowper['quantity'].'</td>';
										   echo '<input type="hidden" name="qtty" value="'.$defrowper['quantity'].'">';
										   //echo'<td>'.$defrowper['unityp'].'</td>'
										   $t=$defrowper['quantity']*$defrowper['unityp'];
										   //echo'<td>'.$t.'</td>'; 
										   echo '<input type="hidden" name="order" value="'.$defrowper['order_id'].'">';
							               echo '<input type="hidden" name="client2" value="'.$id.'">';
										   echo '<input type="hidden" name="date" value="'.$date.'">';										   
										   //echo'<td><textarea name="reason" rows="2" cols="20"></textarea></td>';
										   //echo'<td><input style="background-color:#F00;" type="submit" value="X"></td>';
										   echo'</form>';
										   echo '</tr>';
                                          }
										  }
										  echo'</table>';
	             }
?>
</body>
</html>