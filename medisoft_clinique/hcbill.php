
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

<title>Powered by: Medisoft Ltd</title>
<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>
<?php
include('link.php');

$hcbill=$_POST['bill'];
$ukwezi=$_POST['ukwezi'];
$facility=$_POST['facility'];
$facyear= mb_substr($ukwezi, 4, 4);
$facmonth =mb_substr($ukwezi, 0, 3);

switch ($facmonth)
 {
    case "Jan":
        $facmonth="Janvier";
        break;
    case "Feb":
        $facmonth="Fevrier";
        break;
    case "Mar":
        $facmonth="Mars";
        break;
		
	 case "Apr":
        $facmonth="Avril";
        break;
	 case "May":
        $facmonth="Mai";
        break;
	 case "Jun":
        $facmonth="Juin";
        break;
	 case "Jul":
        $facmonth="Juillet";
        break;
	case "Aug":
        $facmonth="Août";
        break;
	case "Sep":
        $facmonth="Septembre";
        break;
	case "Oct":
        $facmonth="Octobre";
        break;
	case "Nov":
        $facmonth="Novembre";
        break;
	case "Dec":
        $facmonth="Decembre";
        break;
						
    default:
        echo "error:WRONG MONTH";
}

?>
</head>

<body bgcolor="#006699">
<!--<a href="summary1.php"><img src="img/back.JPG" width="48" height="24" /></a>
--><table align="center" bgcolor="#FFFFFF">
  <tr><td>
  <table width="500" border="0">
  <tr>
    <td colspan="5">REPUBLIQUE DU RWANDA</td>
  </tr>
  <tr>
    <td colspan="5"><img  src="img/logo.JPG" width="77" height="77" /></td>
  </tr>
  <tr>
    <td colspan="5">MINISTERE DE LA SANTE</td>
  </tr>
  <tr>
    <td colspan="5">VILLE DE KIGALI</td>
  </tr>
  <tr>
  <!--<td>CENTRE DE SANTE GIHOGWE</td>-->
   <?php
   
   
  // Temporary coment to facilitate Gihogwe printing
  
  
  
  
    if ($facility=="BWERAMVURA")
  
        echo'<td colspan="5">CENTRE DE SANTE KABUYE/ PS '.$facility.'</td>';
    else
         echo'<td colspan="5">CENTRE DE SANTE KABUYE</td>';
    ?>
    
  </tr>
</table>





<?php



//echo $facmonth;



//$facility=$_POST['facility'];
$hcn=$_POST['hcnam'];
$district=$_POST['district'];

echo'</br><table id="releve" width="" border="0" bgcolor="#FFFF00"  >
  <tr bordercolor="#000000" >';
  

   echo' <th colspan="14"><u><font  size="+2"> Relevé des factures &nbsp;&nbsp;'.$district.'-section '.$hcn.'/mois '.$facmonth.'-'.$facyear.'</font></u></th>';
 echo' </tr>
</table><br>';
//echo $district_bill;
$i=0;
   
    $consul= 0;
    $labo= 0;
    $hosp= 0;
    $med= 0;
    $act= 0;
    $mat= 0;
    $tot= 0;

echo'<table id="text2" width="" border="1" cellpadding="0" cellspacing="0">';
echo'<tr bgcolor="#CCCCCC">
    <th width="20">NO.</td>
    <th width="60">DATE</td>
    <th width="30">NO MUSA</td>
    <th width="200">NOMS DU BENEFICIAIRE</td>
    <th width="50">SERVICE</td>
    <th width="50">CONSUL- TATION</td>
    <th width="50">LABO- RATOIRE</td>
    <th width="50">IMAGERY</td>
    <th width="50">HOSPITA- LISATION</td>
    <th width="50">MEDI CAMENTS</td>
    <th width="50">ACTES MEDICAUX</td>
    <th width="50">MATERIAUX</td>
    <th width="15">TM</td>
    <th width="40">MONTANT- TOTAL</td>
  </tr>';


$sql = "SELECT * FROM facture WHERE MS_Code LIKE \"$hcbill%\" AND Perfac = '$ukwezi'  ORDER BY Record_date ASC";

        $retval = mysqli_query($link, $sql );
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $i++;
	$consul += $row['Consultation'];
	if ($row['Laboratory']>0)
    $labo += $row['Laboratory'];
	if ($row['Hospit']>0)
    $hosp += $row['Hospit'];
    $med += $row['Medec'];
    $act += $row['Medec_acts'];
    $mat += $row['Materials'];
    $tot += $row['Total_amount'];
							
			
echo"<tr id='text2'>
    <td>" . $i."</td>
    <td>" . date("Y-m-d", strtotime($row['Record_date']))."</td>
	<td>" . $row['MS_Code']."</td>
	<td>" . $row['Benef_fname']."</td>
    <td>0</td>
    <td>" . $row['Consultation']."</td>
    <td>" . $row['Laboratory']."</td>
    <td>0</td>
    <td>" . $row['Hospit']."</td>
    <td>" . $row['Medec']."</td>
    <td>" . $row['Medec_acts']."</td>
    <td>" . $row['Materials']."</td>
    <td>0</td>
    <td>" . $row['Total_amount']."</td>
  </tr>";
					   
            
	
                  }
	echo'<tr bgcolor="#CCCCCC">
    <th width="20" colspan="4">GRAND TOTAL</td>
	

    
   <th width="50">0</td>
    <th width="50">'.$consul.'</td>
    <th width="50">'.$labo.'</td>
    <th width="50">0</td>
    <th width="50">'.$hosp.'</td>
    <th width="50">'.$med.'</td>
    <th width="50">'.$act.'</td>
    <th width="50">'.$mat.'</td>
    <th width="15">0</td>
    <th width="40">'.$tot.'</td>
  </tr>';

echo'</table>';

echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fait à Kabuye ".date('d/m/Y');"</b>";
?>
<br />
<br /><br />

<!--<img src="img/footer.JPG" width="953" height="149" /></td>-->
<img src="img/footer.JPG" width="953" height="90" /></td>

</tr>
</table>

</center>
<!--<a href="summary1.php"><img src="img/back.JPG" width="48" height="24" /></a>
--></body>
</html>