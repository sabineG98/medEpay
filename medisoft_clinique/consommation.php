<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::.CONSUMMATION.::</title>
<style>
tr:hover{ border:1px solid #F00;}
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
  content: 'OK';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
/* .button:hover span {  padding-right: 25px;} */
.button:hover span:after {
  opacity: 1;
  right: 0;
}

input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
</style>



</head>

<body>

<?php
include('link.php');

?>

<!--<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:350px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: 7px;"><b>CONSOMMATIONS DES MEDICAMENTS</b></div>-->
<!-- <div  style="width:752px; height:440px; box-shadow: 0px 0px 0px 0px #000; border: 1px solid #09F; overflow:auto; position:absolute; background-color:#FFF; left: 4px; top: 15px;"> -->

<div  style="width:100%; height:475px; border: 1px solid #09F; overflow:auto;background-color:#FFF;">
<table width="0" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="consommation.php" method="post">
  <tr>
    <td>Period:&nbsp;&nbsp;&nbsp; From</td>
    <td><input type="text" value="<?php echo date('Y-m-d') ?>" name="p1">
    
    &nbsp;&nbsp;To
    <input type="text" value="<?php echo date('Y-m-d') ?>" name="p2">
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>
 </form>
</table>
<table width="99.9%" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">    
  <tr bgcolor="#AAD5FF">
<?php				 
				if(isset($_POST['p1'])&&($_POST['p2']))
                     { 
					 $p1=$_POST['p1'];
					 $p2=$_POST['p2'];					 
           echo'<th colspan="6">From: <b><i><u>'.$p1.'</u></i> To: <i><u>'.$p2.'</u></i></b></th>';
   }
   ?>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td><strong>No&nbsp;&nbsp;</strong></td>
    <td><strong>DESIGNATION&nbsp;</strong></td>
    <td><strong>CONSUMMED QTY&nbsp;</strong></td>
    <td><strong>AMOUNT&nbsp;</strong></td>   
  </tr>
<?php 
if(isset($_POST['p1'])&&($_POST['p2']))
                     {
$i=0;
//find the month
$tot=0;
$med = "SELECT DISTINCT act FROM invoice WHERE type='MEDICAMENTS INJECTAB' AND date BETWEEN '$p1' AND '$p2'";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed ){ die('Could not get data: ' . mysqli_error($link)); }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $i++;					 					 
					 if ($i%2==0)
					   echo'<tr bgcolor="#D9FFD9">';					
					 else
					   echo'<tr>';					 					 
					 $med=$rowmed['act'];
					 echo '<td>'.$i.'</td>';					 
					 echo'<td>'.$med.'</td>';					 						
					    $med1 = "SELECT SUM(quantity), unityp  FROM invoice WHERE type='MEDICAMENTS INJECTAB' AND act='$med' AND date BETWEEN '$p1' AND '$p2'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {					 
				                   	 $medcost=$rowmed1['SUM(quantity)']*$rowmed1['unityp'];
				                  	 echo '<td>'.$rowmed1['SUM(quantity)'].'</td>';
					                 echo '<td style="text-align:right;">'.$medcost.'&nbsp;</td>';					 
				                       }
					 $tot+=$medcost;
					 echo '</tr>';
				 }	
  echo'<tr bgcolor="#CCCCCC">
    <th colspan="3">TOTAL</th>    
    <th style="text-align:right;">'.$tot.'&nbsp;</th>
  </tr>  
</table>';
}
?>
<br />
</div>
</div>
</body>
</html>
