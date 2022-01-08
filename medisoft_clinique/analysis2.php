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
  content: '>>';
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

.cl{

 padding: 5px; 

 position: absolute; 
 left: 5px; 
 top: 100px;

}
.cl1 {box-shadow: 0px 0px 10px 0px #000;
		background-color:#C5E2E2;
 padding: 5px; 
 border-radius: 10px; 
 box-shadow: 20px; 
 position: absolute; 
 left: 400px; 
 top: 120px;
}
.cl2 {box-shadow: 0px 0px 10px 0px #000;
		background-color:#C5E2E2;
 padding: 5px; 
 border-radius: 10px; 
 box-shadow: 20px; 
 position: absolute; 
 left: 200px; 
 top: 120px;
}
.style1 {
	font-size: 16px;
	font-weight: bold;
}
</style>


</head>

<body>


<table width="0" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="analysis2.php" method="post">
  <tr>
    <td>Periode:&nbsp;&nbsp;&nbsp; Du</td>
    <td><input type="text" size="10" value="<?php echo date('Y-m-d') ?>" name="p1">
    
    &nbsp;&nbsp;Au
    <input type="text" size="10" value="<?php echo date('Y-m-d') ?>" name="p2">
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>

 </form>
</table>




<table border="1" cellspacing="0" cellpadding="0" style="font-size:13px; border-collapse: collapse;">
  <col width="37" />
  <col width="201" />
  <col width="64" span="4" />
  <col width="97" />
  <tr>
    <th width="37" colspan="2">
    <?php  
	
	if(isset($_POST['p1'])&&($_POST['p2']))
                     { 
					 $p1=$_POST['p1'];
					 $p2=$_POST['p2'];
					 }
else
 {
	 $p1=date('Y-m-d');
	 $p2=date('Y-m-d');
	 
 }
	echo $p1.'------>'.$p1;
	
	
	?>
    
    </th>
    
    <td colspan="2" width="128" bgcolor="#FFCC33"><strong><font size="+1">REGISTERED</font></strong></td>
    <td colspan="2" width="128" bgcolor="#99CC33"><strong><font size="+1">PAID</font></strong></td>
    <td width="97"></td>
  </tr>
  <tr  bordercolor="#000000" bgcolor="#CCCCCC">
    <td><strong>No</strong></td>
    <td><strong>ITEM</strong></td>
    <td><strong>QTTY</strong></td>
    <td><strong>TOTAL</strong></td>
    <td><strong>QTTY</strong></td>
    <td><strong>TOTAL</strong></td>
    <td ><strong>DISCORDANCE</strong></td>
  </tr>

<?php 

include ("link.php");

$last=0;
$i=0;


					 
					 
$i=1;
$torder=0;
$trec=0;
$tdisco=0;
$order_total=0;
$rec_total=0;
 $med = "SELECT DISTINCT item FROM orders WHERE date BETWEEN '$p1' AND '$p2' AND insured=0  ";// get the date 
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row= mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $item=$row['item'];
										
					
					$result = mysqli_query($link,"SELECT SUM(quantity) AS qtty FROM orders WHERE item='$item' AND date BETWEEN '$p1' AND '$p2' AND insured=0  "); 
                    $rowq = mysql_fetch_assoc($result); 
                    $qtty = $rowq['qtty'];
					
					$unityp =("SELECT unityp,quantity  FROM orders WHERE item='$item' AND date BETWEEN '$p1' AND '$p2' AND insured=0 "); 
                    $retvalorder = mysqli_query($link,$unityp);
					while($rowu = mysql_fetch_assoc($retvalorder))
					{
					  $o=$rowu['unityp']*$rowu['quantity'];
					  
					  $order_total +=$o;
					}
					
					
					$unityprec =("SELECT unitp,qtty  FROM receipt WHERE item='$item' AND date BETWEEN '$p1' AND '$p2' "); 
					$retvalrec = mysqli_query($link,$unityprec);
                    while($rowurec= mysql_fetch_assoc($retvalrec))
					{
					  $r=$rowurec['unitp']*$rowurec['qtty'];
					  $rec_total += $r;
					}
					
					
					$receipt= mysqli_query($link,"SELECT SUM(qtty) AS qttyr FROM receipt WHERE item='$item' AND date BETWEEN '$p1' AND '$p2' AND active=1 "); 
                    $rowrec = mysql_fetch_assoc($receipt); 
                    $qttyrec = $rowrec['qttyr'];
					
					echo '<td>';
					echo $i++;
					echo '</td>';
					
					echo '<td>';
					echo $item;
					echo '</td>';
					
					echo '<td bgcolor="#FFCC33">';
					echo $qtty;
					echo '</td>';
					
					//$order_total=$qtty*$price;
					$torder+=$order_total;
					echo '<td bgcolor="#FFCC33">';
					echo $order_total;
					echo '</td>';
					echo '<td bgcolor="#99CC33">';
					echo $qttyrec;
					echo '</td>';
					
					//$rec_total=$qttyrec*$price;
					$trec+=$rec_total;
					
					echo '<td bgcolor="#99CC33">';
					echo $rec_total;
					echo '</td>';
					$dico=$rec_total-$order_total;
					$tdisco+=$dico;
					echo '<td bgcolor="#FF0000">';
					settype($disco, "integer");
					echo $dico;
					
					echo '</td>';
					
					
				echo '</tr>';
				$order_total=0;
				$rec_total=0;
					 
				 }





?>

  <tr>
    <td colspan="2" align="right" width="238"> <font size="+1"><strong>TOTAL</strong></font></td>
    <td colspan="2" align="right" width="128" bgcolor="#FFCC33"> <font size="+1"><strong>RWF <?php echo $torder; ?></strong></font></td>
    <td colspan="2" align="right" width="128" bgcolor="#99CC33"><font size="+1"><strong>RWF <?php echo $trec; ?></strong></font></td>
    <td align="" width="97" bgcolor="#FF0000"><font size="+1"><strong>RWF <?php echo $tdisco; ?></strong></font></td>
  </tr>
</table>
<p>&nbsp;</p>

</body>
</html>