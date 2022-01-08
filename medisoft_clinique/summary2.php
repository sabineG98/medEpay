<?php include"link.php";

if (isset($_POST["month"])) 
$ukwezi=$_POST['month'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />

<title>MBS-summary</title>
</head>

<body>

<div class="all_container">
<img src="img/facturation1.jpg" height="97" class="img1">

<div class="content">


 
<div style="position:absolute; background-color:#CCC; color:#000; left: 131px; top: 9px; width: 206px; height: 29px;"> 

<form action="summary1.php" method="post"> 
PERIOD
<select name="month">
<?php


//$period = "SELECT DISTINCT Period FROM facture ORDER BY Period DESC ";
$period = "SELECT DISTINCT Period FROM facture ORDER BY Record_date DESC  ";
       $month = mysqli_query($link, $period );
       
while($mois = mysqli_fetch_array($month, MYSQLI_ASSOC))
{
	
	$periode=$mois['Period'];
	
	
	//echo $mois;
	   echo "<option value='".$periode."' name='periode'>".$periode."</option>";
	 
	   
	

}

echo"
</select>";
echo"<input type='submit' value='Go'>";
echo $ukwezi;
echo"</form>";


	?>
	

</div>
<center>

<h2>Bill Summary</h2>
<hr />
<?php
 $grandt=0;
$district_codes = 'SELECT distrcode, distrname FROM district ORDER BY distrcode ASC';
$district_result = mysqli_query($link, $district_codes );
if(! $district_result )
{
  die('Could not get data: ' . mysqli_error($link));
}

echo'<table   class="gridtable" width="" border="1" cellpadding="0" cellspacing="0">';

echo '<tr bgcolor="#CCCCCC">
    <th colspan="2">DISTRICT/CENTRE DE SANTE </th>
    <th colspan="2" width="95">MONTANT</th>
    
  </tr>';
  
 


while($row = mysqli_fetch_array($district_result, MYSQLI_ASSOC))
{
	
	     $districtselect=$row['distrcode'];
	
	  	    

              
		
		echo "<tr id='text1' bgcolor='#B3D9FF' style='border:dashed'><th colspan='4'>".$row['distrname']."-".$row['distrcode']."</th>";
		//echo "<th>".$total."</th>";
	    //echo "<th><form action='districtbill.php' method='Post'><input type='hidden' name='bill' value=".$districtselect."> 
		//<input name='' type='submit' id='button1' value='".$total." FRW' /></form></th></tr>";
	
	   
	   
	   $hc = "SELECT hccode,hcname FROM healthc WHERE distrcode=$districtselect ";
       $hc1 = mysqli_query($link, $hc );
       
$gtotal=0;
while($hc2 = mysqli_fetch_array($hc1, MYSQLI_ASSOC))
{
	
	$hcselect=$hc2['hccode'];
	
	  	//$date= date("0000-01-00");
		
		
	
        $sql1 = "SELECT Total_amount FROM facture WHERE MS_Code LIKE \"$hcselect%\" AND Period = '$periode' AND Total_amount > 0  ORDER BY MS_Code ASC";

        $retval1 = mysqli_query($link, $sql1 );
        if(! $retval1 )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          $totalhc=0;
          
          while($row2 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                 {
					 
					 
					 
					 
	               //echo $hc2['hcname'];
	              $totalhc +=$row2['Total_amount'];
	             
                  }
				  $gtotal+=$totalhc;

        if ($totalhc>0)
		{
		echo "<tr><td border='0'><i>#".$hc2['hccode']."</i></td><td><b>".$hc2['hcname']."</b></td>";
		echo "<td >".$totalhc."</td>";
		$hcn=$hc2['hcname'];
		
	    echo "<td><form action='hcbill.php' method='Post'> 
		<input type='hidden' name='bill' value=".$hcselect.">
		 <input type='hidden' name='district' value=".$row['distrname'].">
		<input type='hidden' name='hcnam' value=".$hcn.">
		<input name='' type='submit' size='100' id='button' value=' ' alt='Voir facture' />
		</form></td></tr>";
		//&date=$row2['Record_date'];
		      }
	      
       
		
		
        }
		
	echo "<tr id='text1'  bgcolor='' style='border:dashed'><th colspan='2'>TOTAL</th>";
		echo "<th colspan='2'  >".$gtotal."</th>";	
		
		$grandt+=$gtotal;
		
	} 
echo "<tr id='text1'  bgcolor='#999999' style='border:dashed'><th colspan='2'>GRAND TOTAL</th>";
		echo "<th colspan='2'  >".$grandt."</th>";	
 
echo'</table>';

?>

<hr />

</center>




</div>





</div>
<?php include("menu.php"); ?>
</body>
</html>