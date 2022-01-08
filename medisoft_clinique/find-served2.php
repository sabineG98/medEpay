<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <script type="text/javascript" language="javascript">
	function getVote1(int) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {  // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById("poll1").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","datedetails.php?date="+int,true);
	xmlhttp.send();
	}

	function stringleng(inputtxt)
	{ 
			var field = inputtxt.value; 
			if(isNaN(field))
				{ 
				alert("Please Enter a valid date !");
				return false;
				document.form1.date.focus() ;
				}
	}
</script>
</head>
<body>
<div style="position:absolute; width:800px;  height:670px; left:60px; top:60px; background-image:none; overflow:auto;">
<?php
error_reporting(E_ERROR | E_PARSE);
 if(isset($_POST['p1'])&&($_POST['p2']))
                     { 
					 $p1=$_POST['p1'];
					 $p2=$_POST['p2'];    
   }   
echo'<table width="0" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="labo.php" method="post">
  <tr>
    <td>Periode:&nbsp;&nbsp;&nbsp; Du</td>
    <td><input type="text" value="';  echo date('Y-m-d').$service; echo'" name="p1">    
    &nbsp;&nbsp;Au
    <input type="text" value="'; echo date('Y-m-d'); echo'" name="p2">
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>
 </form>
</table><BR>';
	echo'<table width="100%" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
			<th colspan="8"><CENTER>Du '.$p1.'&nbsp; Au &nbsp;'.$p2.'</CENTER></th>
						<tr bgcolor="#CCCCCC" ><td colspan="8">';
							$code=$_POST['client'];  
							$i=0;
							$date=date('Y-m-d');
	$defper3 = "SELECT count(DISTINCT client_id) FROM orders WHERE done = 3 AND  quantity > 0 AND date BETWEEN '$p1' AND '$p2' AND type='laboratoire'";
									$retvalper3 = mysqli_query($link,$defper3);
									if(! $retvalper3 )
									{ die('Could not get data: ' . mysqli_error($link)); }    
									while($defrowper3 = mysqli_fetch_array($retvalper3, MYSQLI_ASSOC))
								{ echo '<h4><center>[<font color="red"> '.$defrowper3['count(DISTINCT client_id)'].' </font>]served</center></h4>';	}
						
						 echo'</td>	</tr>
						 <tr bgcolor="skyblue" >
						 <th><center>No</center></th>
                         <th>BENEFICARY</th>
						 <th><center>CODE</center></th>						
                          <!--<td>INSURANCE CODE </td>-->
                           <th colspan=""><center>CAT<c/enter></th>
						  <!-- <td colspan="">CHEF DE F.</td>-->
						   <th colspan=""><center>AGE</center></th>
						   <th colspan=""><center>SEXE</center></th>
						   <!--<td colspan="">REG DATE</td>-->
						   <th><center>ITEM</center></th>
						   <!--<td></td>-->';						   
$code=$_POST['client'];
$i=0;
$date=date('Y-m-d');
$defper1 = "SELECT DISTINCT client_id FROM orders WHERE done= 3 AND quantity > 0 AND date BETWEEN '$p1' AND '$p2' AND type='laboratoire'";
$retvalper1 = mysqli_query($link,$defper1);
if(! $retvalper1 )
{ die('Could not get data: ' . mysqli_error($link)); }    
while($defrowper1 = mysqli_fetch_array($retvalper1, MYSQLI_ASSOC))
		{
			$k=$defrowper1['client_id'];
			$itm=$defrowper1['item'];
$defper = "SELECT * FROM clients WHERE client_id='$k'";
        $retvalper = mysqli_query($link,$defper);
        if(! $retvalper )
           { die('Could not get data: ' . mysqli_error($link)); }                         
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				   $id=$defrowper['client_id'];
				   $i++;				   
				   if ($i%2==0)
					 echo'<tr bgcolor="#D9FFD9">';					 
				   else
					echo'<tr>';
					echo'<form action="labo.php" method="post" target="_parent" name="form1" >';//////////
					echo'<td><center>'.$i.'</center></td>';
					echo'<td width="300px">'.$defrowper['beneficiary'].'</td>';
					echo'<td><center>'.$id.'</center></td>';
					echo'<td><center>'.$defrowper['categorie'].'</center></td>';
					echo'<td><center>'.$defrowper['age'].'</center></td>';
					echo'<td><center>'.$defrowper['sex'].'</center></td>';
					echo'<td width="300px">';
					$retvalper11 = mysqli_query($link,"SELECT * FROM orders,acts WHERE orders.item=acts.act_id AND orders.done= 3 AND orders.quantity > 0 AND orders.date BETWEEN '$p1' AND '$p2' AND orders.type='laboratoire' AND orders.client_id='$id'");
					if(! $retvalper11 )
					{	die('Could not get data: ' . mysqli_error($link));	}    
					while($defrowper11 = mysqli_fetch_array($retvalper11, MYSQLI_ASSOC))
							{
								$k=$defrowper11['client_id'];
								$itm=$defrowper11['act'];
								echo '-'.$itm.' (<font color="red">'.$defrowper11['quantity'].'</font>)'.'<br>';
							}					
					'</td>';
					}										 
				}										
		 echo'</table>';
		 echo'</form>';
    ?>
</div>
</body>
</html>
