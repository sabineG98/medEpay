<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

<title>MBS-All districts</title>
</head>

<body>
<div class="liguini"><br />

<br /><br /><br /><br /><br /><br />
<hr />

</div>


<div class="all_container">
<div class="img1"> </div>
<div class="content">





<center>

<h2>Bill Summary</h2>
<hr />
<?php
 include"link.php"; 
 
 $ggtotal=0;
$district_codes = 'SELECT distrcode, distrname FROM district ORDER BY distrcode ASC';
$district_result = mysqli_query($link, $district_codes );
if(! $district_result )
{
  die('Could not get data: ' . mysqli_error($link));
}

echo'<table width="" class="gridtable" border="1" cellpadding="0" cellspacing="0">';

echo '<tr bgcolor="#CCCCCC">
    <th colspan=""> CODE  </th>
    <th colspan="">DISTRICT</th>
	<th colspan="">MONTANT</th>
    
  </tr>';
  
 


while($row = mysqli_fetch_array($district_result, MYSQLI_ASSOC))
{
	
	     $districtselect=$row['distrcode'];
	
	  	    

              
		
		echo "<tr id='text1'  bgcolor='' style='border:dashed'><td colspan=''>".$row['distrcode']."</td>";
		//echo "<th>".$total."</th>";
	    //echo "<th><form action='districtbill.php' method='Post'><input type='hidden' name='bill' value=".$districtselect."> 
		//<input name='' type='submit' id='button1' value='".$total." FRW' /></form></th></tr>";
	
	   
	    echo "<td border='0'>".$row['distrname']."</td>";
	   $hc = "SELECT hccode,hcname FROM healthc WHERE distrcode=$districtselect ";
       $hc1 = mysqli_query($link, $hc );
       
$gtotal=0;
while($hc2 = mysqli_fetch_array($hc1, MYSQLI_ASSOC))
{
	
	$hcselect=$hc2['hccode'];
	
	  	
	
        $sql1 = "SELECT Total_amount FROM facture WHERE MS_Code LIKE \"$hcselect%\" AND Total_amount > 0 ORDER BY MS_Code ASC";

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
                  $ggtotal+=$totalhc;
        if ($totalhc>0)
		{
		
		/*echo "<td >".$totalhc."</td>";
		$hcn=$hc2['hcname'];
		
	    echo "<td><form action='hcbill.php' method='Post'> 
		<input type='hidden' name='bill' value=".$hcselect.">
		 
		<input type='hidden' name='hcnam' value=".$hcn.">
		<input name='' type='submit' size='100' id='button' value=' ' alt='Voir facture' />
		</form></td></tr>";*/
		      }
	      
       
		
		
        }
		
	//echo "<tr id='text1'  bgcolor='' style='border:dashed'><th colspan='2'>TOTAL</th>";
		echo "<th colspan='2'  >".$gtotal."</th>";	
		
		
		
	} 

 echo "<tr id='text1'  bgcolor='#999999' style='border:dashed'><th colspan='2'>TOTAL</th>";
		echo "<th colspan='2'  >".$ggtotal."</th>";
echo'</table>';

?>

<hr />

</center>




</div>





</div>
<?php include"menu.php"; ?>



</div>
</body>
</html>