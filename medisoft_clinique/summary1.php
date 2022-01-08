

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<title>MBS-summary</title>
<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>


<?php 

//error_reporting(E_ERROR | E_PARSE);

include"link.php";

if (isset($_POST["dperfac"])) 
$deletep=$_POST['dperfac'];

mysqli_query ($link,"DELETE FROM `facture` WHERE Perfac='$deletep'");




if (isset($_GET["perfac"]))
{
$ryari=$_GET['perfac'];
}
else
 {
   $period = "SELECT DISTINCT Perfac,facility FROM facture ORDER BY Record_date ASC  ";
       $month = mysqli_query($link, $period );
       
    while($mois = mysqli_fetch_array($month, MYSQLI_ASSOC))
    {
	
	$ryari=$mois['Perfac'];
	//$facility=$mois['Facility'];
	
    }
 }










/*$period = "SELECT DISTINCT Perfac,facility FROM facture ORDER BY Period ASC  ";
       $month = mysqli_query($link, $period );
       
while($mois = mysqli_fetch_array($month, MYSQLI_ASSOC))
{
	
	$ukwezi=$mois['Perfac'];
	//$facility=$mois['Facility'];
	
}*/


//echo $ukwezi;


if (isset($_POST["month"])) 
{
$ukwezi=$_POST['month'];
//$facility=$_POST['facility'];
}
?>









</head>

<body>
<div class="liguini"><br />

<br /><br /><br /><br /><br /><br /><br />
<hr />

</div>






<div class="all_container">
<div class="show">

</div>


<div class="liguini">
<div class="img1">

</div>

<div class="show">
<?php  //include('clock.php')  ?>



    <div style="position:absolute;">  
      <div class="menu1"><a href="home.php"><img  style="position:absolute; left: 207px; top: -18px; width: 49px; height: 37px;" src="img/hm.png" width="120" alt="Saisie" height="42" /></a></div>
      <div class="menu1"><a href="applications.php"><img  style="position:absolute; left: 269px; top: -13px; width: 96px; height: 28px;" src="img/appp.JPG" width="120" height="42" /></a></div>
      <div class="menu1"><a href="applications.php"><img  style="position:absolute; left: 381px; top: -12px; width: 49px; height: 28px;" src="img/pro.png" width="120" height="42" /></a></div>

    
    
    </div>  
     
    <!--<td><a href="factures.php">Factures</a></td>
    <td><a href="reports.php">Rapports</a></td>
    
    <td><a href="">Parametres</a></td>
    <td><a href="">Profile</a></td>-->



</div>

</div>



<div class="content">


<div style="position:fixed; background-color:#FFF; color:#000; left: 512px; top: 131px; width: 348px; height: 35px;"></div>
 
<div style="position:fixed; border: 2px solid #F00; text-transform: uppercase; background-color:#CCC; opacity:0.8; box-shadow: 0px 0px 5px 0px #000; color:#000; left: 514px; top: 167px; width: 340px; height: 29px;"> 

<!--<form action="summary1.php" method="POST"> 
PERIOD 
<select name="month">-->

<?php
$facyear= mb_substr($ryari, 4, 4);
$facmonth =mb_substr($ryari, 0, 3);
$where=mb_substr($ryari,9, 15);
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




echo "<center><font  size='+1'><strong>".$facmonth."-".$facyear."/".$where."</strong></font></center>";
/*echo"<option value='".$ukwezi."' selected='selected'>".$ukwezi."</option>";

//$period = "SELECT DISTINCT Period FROM facture ORDER BY Period DESC ";
$period = "SELECT DISTINCT Perfac FROM facture ORDER BY Period ASC  ";
       $month = mysqli_query($link, $period );
       
while($mois = mysqli_fetch_array($month, MYSQLI_ASSOC))
{
	
	$periode=$mois['Perfac'];
	//$facility=$mois['Facility'];
	
	//echo $mois;
	   echo "<option value='".$periode."' name='periode'>".$periode."</option>";
	   
	   	

}

echo"</select>
";
echo"<input type='submit' value='Go'>";
echo $ryari;
//echo $ukwezi;
echo"</form>";*/


	?>
	

</div>
<div style="position:fixed; width:970px;">
<h2>Bill Summary</h2>
<hr />
</div>
<br /><br /><br />
<center>




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
		
		
	
        $sql1 = "SELECT Facility, Total_amount FROM facture WHERE MS_Code LIKE \"$hcselect%\" AND Perfac = '$ryari' AND Total_amount > 0  ORDER BY MS_Code ASC";

        $retval1 = mysqli_query($link, $sql1 );
        if(! $retval1 )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          $totalhc=0;
          
          while($row2 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                 {
					 
					 
					 
					 $facility=$row2['Facility'];
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
		 <input type='hidden' name='facility' value=".$facility.">
		 <input type='hidden' name='ukwezi' value=".$ryari.">
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
<?php include("menu.php");
include ('delete.php');
 ?>
</body>
</html>