<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


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
</style>

</head>

<body>

<?php 
session_start();

include('link.php');

if(isset($_POST['deducted'])&&($_POST['explanation']))
{
	
	  $cid=$_POST['cid'];
      $oid=$_POST['oid']; 
	  $insu=$_POST['insu'];
	  $period=$_POST['period'];  
	  $deducted=$_POST['deducted'];
	  $explanation=$_POST['explanation']; 
    
	
	
	
	
	
	
	
	  mysqli_query ($link,"INSERT INTO verification (client_id, orders_id, insurance_code, period, amountde, explanation) 
                               VALUES ('$cid', '$oid', '$insu','$period', $deducted, '$explanation')"); 
							  
  	echo'<center><font color="#009900"><strong>Submited successfully</strong></font></center>';					 
}








if(isset($_GET['oid']))
{
$id=$_GET['oid'];
$cid=$_GET['cid'];
$period=$_GET['period'];
$odate=$_GET['odate'];
$insu=$_GET['insu'];
$item=$_GET['item'];
$qtty=$_GET['qtty'];
$unit=$_GET['unit'];

$_SESSION['id']=$id;
$_SESSION['cid']=$cid;
$_SESSION['period']=$period;
$_SESSION['odate']=$odate;
$_SESSION['insu']=$insu;
$_SESSION['item']=$item;
$_SESSION['qtty']=$qtty;
$_SESSION['unit']=$unit;
}
else 
{
	
$id=$_SESSION['id'];
$cid=$_SESSION['cid'];
$period=$_SESSION['period'];
$odate=$_SESSION['odate'];
$insu=$_SESSION['insu'];
$item=$_SESSION['item'];
$qtty=$_SESSION['qtty'];
$unit=$_SESSION['unit'];
}
$i=0;
$med = "SELECT * FROM orders, verification WHERE orders.order_id=verification.orders_id AND orders.date='$odate' AND orders.unityp=$unit LIMIT 1";// get the date 
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $i+=1;
									$amountde=$rowmed['amountde'];
									$explanation=$rowmed['explanation'];
                           
						   
				 }

/*if ($i>0)
{
echo $amountde;
echo $explanation;
}*/


?>
<table  border="1" style="font-size:16px; border-collapse: collapse; width:100%;" cellpadding="0" cellspacing="0">
  <tr bgcolor="#CCCCCC">
    <td><strong>Item</strong></td>
    <td><strong>Quantity</strong></td>
    <td><strong>Unit price</strong></td>
    <td><strong>Total price</strong></td>
  </tr>
  <tr bordercolor="#FF0000">
    <td> <font color="#FF0000"><?php echo $item ?></font></td>
    <td><font color="#FF0000"><?php echo $qtty ?></font></td>
    <td><font color="#FF0000"><?php echo $unit ?></font></td>
    <td><font color="#FF0000"><?php echo $qtty*$unit ?></font></td>
  </tr>
</table>

<table border="0" style="font-size:13px; border-collapse: collapse; width:100%;">
<form action="deduct.php" method="post">
<tr>
<td>
Amount
</td>
<?php
if ($i>0)
echo '<td bgcolor="#FF0000">';
else
echo'<td bgcolor="#CCCCCC">';

?>
<input type="hidden" name="cid" value="<?php echo $cid ?>" />
<input type="hidden" name="oid" value="<?php echo $id ?>" />
<input type="hidden" name="insu" value="<?php echo $insu ?>" />
<input type="hidden" name="period" value="<?php echo $period ?>" />
<?php
if ($i>0)
 echo'<input type="text" autocomplete="off" size="10" name="deducted" value="'.$amountde.'" />';

else
echo'<input type="text" autocomplete="off" size="10" name="deducted" />';

?>
</td>
</tr>
<tr>
<td>Explanation</td>
<?php
if ($i>0)
echo '<td bgcolor="#FF0000">';
else
echo'<td bgcolor="#CCCCCC">';

?>
<?php
if ($i>0)
echo '<textarea rows="6" cols="40" style="font-size:20px;" name="explanation" >'.$explanation.'</textarea>';
else
 echo '<textarea rows="6" cols="40" style="font-size:20px;" name="explanation">'.$item.', </textarea>';
 
?>



</td

></tr>
<td ></td>

<tr>
<td ></td>
<?php
if ($i>0)
echo '<td bgcolor="#FF0000">';
else
echo'<td bgcolor="#CCCCCC">';

?>
<button class="button" ><span>Submit </span></button>
</td><tr>
</form>
</table>
</body>
</html>