<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />

<title>Untitled Document</title>
</head>

<body>

<div class="all_container">
<img src="img/facturation.jpg" height="97" class="img1">

<div class="content">





<center>

<h2>Bill Summary</h2>
<hr />
<?php
 include"link.php"; 
//$musa_codes = 'SELECT ms_code , benef_fname FROM facture ORDER BY MS_Code ASC';// her we select all musa codes 
$district_codes = 'SELECT distrcode, distrname FROM district ORDER BY distrcode ASC';
$district_result = mysqli_query($link, $district_codes );
if(! $district_result )
{
  die('Could not get data: ' . mysqli_error($link));
}
//$row = mysqli_fetch_array($musa_reult, MYSQLI_ASSOC);

//$prov=substr($row['ms_code'], 0, 2);
//$distr=substr($row['ms_code'], 0, 4);
//$hc=substr($row['ms_code'], 4, 2);
//echo ''.$prov.'<br>'.$distr.'<br>'.$hc.'';
//echo '<br><br><br>';

//echo $hc;

//$districts = "SELECT DISTINCT ms_code FROM facture WHERE MS_Code LIKE\"$distr%\"";
//$distr1 = mysqli_query($link, $districts );
//$row1 = mysqli_fetch_array($distr1, MYSQLI_ASSOC);
echo'<table width="300" border="1" cellpadding="0" cellspacing="0">';

echo '<tr bgcolor="#CCCCCC">
    <th>CENTRE DE SANTE </th>
    <th>MONTANT</th>
    
  </tr>';
  
 


while($row = mysqli_fetch_array($district_result, MYSQLI_ASSOC))
{
	
	$districtselect=$row['distrcode'];
	
	  
	
	
        $sql = "SELECT Total_amount FROM facture WHERE MS_Code LIKE \"$districtselect%\" AND Total_amount >0 ORDER BY MS_Code ASC";

        $retval = mysqli_query($link, $sql );
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
             $row1 = mysqli_fetch_array($retval, MYSQLI_ASSOC);
          
           $total=0;
         while($row1 = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 
					 
					 
					 
	               //echo $hc2['hcname'];
	              $total +=$row1['Total_amount'];
	
                  }

        if ($total>0)
		{
		
		echo "<tr id='text1'  bgcolor='#BCECFA' style='border:dashed'><th>".$row['distrname']."</th>";
		echo "<th>".$total."</th>";
	    //echo "<th><form action='districtbill.php' method='Post'><input type='hidden' name='bill' value=".$districtselect."> 
		//<input name='' type='submit' id='button1' value='".$total." FRW' /></form></th></tr>";
	
	   
	   
	   $hc = "SELECT hccode,hcname FROM healthc WHERE distrcode=$districtselect ";
       $hc1 = mysqli_query($link, $hc );
       

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

        if ($totalhc>0)
		{
		echo "<tr><td><i>".$hc2['hcname']."</i></td>";
		echo "<td>".$totalhc."</td>";
		$hcn=$hc2['hcname'];
		
	    /*echo "<td><form action='hcbill.php' method='Post'> 
		<input type='hidden' name='bill' value=".$hcselect.">
		 
		<input type='hidden' name='hcnam' value=".$hcn.">
		<input name='' type='submit' size='100' id='button' value='".$totalhc." FRW' alt='Voir facture' />
		</form></td></tr>";*/
		}
	
       }
		
   }
		
		
		
		
		
	} 

 
echo'</table>';

?>

<hr />

</center>




</div>





</div>
</body>
</html>