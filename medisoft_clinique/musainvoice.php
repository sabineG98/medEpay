
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<title>MBS-summary</title>

<?php 

//error_reporting(E_ERROR | E_PARSE);

include"link.php";

/*if (isset($_POST["dperfac"])) 
$deletep=$_POST['dperfac'];

mysqli_query ($link,"DELETE FROM `facture` WHERE Perfac='$deletep'");
*/


$ryari=$_GET['p'];


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
 
<div style="position:fixed; border: 2px solid #F00; text-transform: uppercase; background-color:#CCC; opacity:0.8; box-shadow: 0px 0px 5px 0px #000; color:#000; left: 518px; top: 167px; width: 350px; height: 29px;"> 

<!--<form action="summary1.php" method="POST"> 
PERIOD 
<select name="month">-->

<?php
$facyear= date("Y", strtotime($ryari));
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




echo "<center><font  size='+1'><strong>".$facmonth."-".$facyear."".$where."</strong></font></center>";


	?>
	

</div>
<div style="position:fixed; width:970px;">
</div>
<br /><br /><br />
<center>




<?php
$grandt=0;
$district_codes = "SELECT DISTINCT district FROM clients WHERE mois='$ryari' AND insurance='MUSA'";
$district_result = mysqli_query($link, $district_codes );
if(! $district_result )
{
  die('Could not get data: ' . mysqli_error($link));
}

echo'<table   class="gridtable" width="" border="1" cellpadding="0" cellspacing="0">';

echo '<tr bgcolor="#CCCCCC">
    <th colspan="0">DISTRICT/CENTRE DE SANTE </th>
    <th colspan="2" width="95">MONTANT</th>
    
  </tr>';
  
 


while($row = mysqli_fetch_array($district_result, MYSQLI_ASSOC))
{
	
	     $district=$row['district'];
	
	  	    
             
              
		
		     echo "<tr id='text1' bgcolor='#B3D9FF' style='border:dashed'><th colspan='4'>".$row['district']."</th>";
	
	   
	   
	                     $hc = "SELECT DISTINCT section FROM clients WHERE district='$district' AND mois='$ryari' AND insurance='MUSA' ";
                         $hc1 = mysqli_query($link, $hc );
       
                                $gtotal=0;
                                while($hc2 = mysqli_fetch_array($hc1, MYSQLI_ASSOC))
                                        {
                                         	
                                               	$section=$hc2['section'];	
													
		                                     
											 
                                           $sql1 = "SELECT client_id FROM clients WHERE section='$section' AND insurance='MUSA'";

                                               $retval1 = mysqli_query($link, $sql1 );
                                                       if(! $retval1 )
                                                          {
                                                              die('Could not get data: ' . mysqli_error($link));
                                                          }    
                                                                
                                                            while($row2 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                                                                 {
																	 $ci=$row2['client_id'];
																	 
											 $totalhc=0;
                                             $t=0;
					 
					                        $sql1 = "SELECT quantity, unityp FROM orders WHERE client_id=$ci AND period = '$ryari'";

                                               $retval1 = mysqli_query($link, $sql1 );
                                                       if(! $retval1 )
                                                          {
                                                              die('Could not get data: ' . mysqli_error($link));
                                                          }    
                                                                
                                                            while($row2 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                                                                 {
					 
					 
			                                                  	   $t=$row2['quantity']*$row2['unityp'];
				                                                   $totalhc +=$t;
	             
                                                                  }
			                                                  	  
	                                                                $gtotal+=$totalhc;
                                                                  }
																   
				                                                 

		echo "<tr><td><b>".$section."</b></td>";
		echo "<td >".$totalhc."</td>";
		$hcn=$hc2['section'];
		
	    echo "<td><form action='hcbill2.php' method='Post'> 
		<input type='hidden' name='bill' value=".$section.">
		 <input type='hidden' name='district' value=".$row['district'].">
		 <input type='hidden' name='ukwezi' value=".$ryari.">
		 <input type='hidden' name='hcnam' value=".$hcn.">
		<input name='' type='submit' size='100' id='button' value=' ' alt='Voir facture' />
		</form></td></tr>";
	
		
		
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
<?php //include("menu.php");
//include ('delete.php');
 ?>
</body>
</html>