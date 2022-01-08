<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="3" />
<title></title>
<style>
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
tr:hover{ border:5px solid #BDF;}

</style>
</head>

<body>

<center><button class="button"  >  
<?php 
error_reporting(E_ERROR | E_PARSE);

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
include('link.php');
?>
<?php
$date1=date('Y-m-d');
// $products = "SELECT COUNT(DISTINCT client_id) AS tot FROM orders,acts WHERE orders.item_id=acts.act_id AND acts.type='laboratoire' AND orders.date='$date1' AND orders.done=0 ";
$products = "SELECT COUNT(DISTINCT client_id) AS tot FROM orders,acts WHERE orders.item_id=acts.act_id AND acts.type='laboratoire' AND orders.date='$date1'";
        $retval = mysqli_query($link,$products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
			while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {					 
			    echo $row['tot'];
				 }
?>
 Patient(s) are waiting</button></center><br />
 
<center><!--<table style="font-size:13px; border-collapse: collapse;"  width="400" border="1" cellspacing="0" cellpadding="0">-->
<table width="100%" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
<tr bgcolor="#CCCCCC">
<th colspan="4" style="font-size:20px;"><center>Waiting List</center></th>
</tr>
<tr bgcolor="skyblue">
 <th><center>No</center></th>
  <th>Names</th>
  <th><center>Client Code</center></th>
  <th><center>Select</center></th>
  </tr>
  <?php 
  
  
  
  
  // $products1 = "SELECT DISTINCT client_id FROM orders,acts WHERE acts.type='laboratoire' AND orders.item_id=acts.act_id AND orders.date='$date1' AND orders.done=0 ";
  $products1 = "SELECT DISTINCT client_id FROM orders,acts WHERE acts.type='laboratoire' AND orders.item_id=acts.act_id AND orders.date='$date1'";
        $retval1 = mysqli_query($link,$products1);
        if(! $retval1 )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
			while($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                 {
					 $clien=$row1['client_id'];
			    //echo $row['tot'];
				//echo $clien.' ';
				 }
  
  
  
  
  $i=0;
  // $clients="SELECT DISTINCT beneficiary,orders.client_id FROM clients,orders,acts WHERE clients.client_id=orders.client_id  AND orders.item_id=acts.act_id AND acts.type='laboratoire' AND orders.done=0 AND orders.date='$date1'"; 
  $clients="SELECT DISTINCT beneficiary,orders.client_id FROM clients,orders,acts WHERE clients.client_id=orders.client_id  AND orders.item_id=acts.act_id AND acts.type='laboratoire' AND orders.date='$date1'"; 
  $qry_run=mysqli_query($link,$clients);
  	if(!$qry_run)
		{
			die('Could not get data:'.mysqli_error($link));	
		}
		while($rows=mysqli_fetch_array($qry_run,MYSQLI_ASSOC))
			{
				$i++;
				$clien=$rows['client_id'];
				if($i%2==0)
				{
				echo '<tr bgcolor="#D9FFD9">';
				}
				else
				echo '<tr bgcolor="#FFF">';
				echo'<form action="labo.php" method="post" target="_parent" name="form1"  >';
				echo '<td><center>'.$i.'</center></td>';
				echo '<td>'.ucfirst($rows['beneficiary']).'</td>';
				echo '<td><center>'.$clien.'</center></td>';
				 echo'<input type="hidden" name="code" value="'.$clien.'">
				   <input type="hidden" name="date" size="8" value="'.date('Y-m-d').'"  autofocus="autofocus"/>';
				echo' <td width="70"><center><button class="button" ><span>Ok </span></button></center></td>';
				echo '</form>';
				echo '</tr>';
			}
  ?>
 </table></center>


</body>
</html>