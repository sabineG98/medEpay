<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Verification Process CBHI</title>

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
.if{ height:80px;}
.if:hover{}
.button:hover span:after {
  opacity: 1;
  right: 0;
}
.checked{ background-image:url(img/checked.png); cursor: pointer; background-color:#fff;  border:0px; background-repeat:no-repeat;}
.verified{ background-image:url(img/verified.png); cursor: pointer; width:65px; height:65px; border-radius:200px 200px 200px 200px; background-color:#FFF; -webkit-box-shadow: 0px 3px 3px #003D59; -moz-box-shadow: 0px 3px 3px #003D59; box-shadow: 0px 3px 3px #003D59;  border:0px; background-repeat:no-repeat;}
.verified:hover{
	-webkit-box-shadow: 0px 6px 6px #003D59; -moz-box-shadow: 0px 6px 6px #003D59; box-shadow: 0px 6px 6px #003D59;}

td:hover{background-color:#B9FFB9;   font-size:15px;}
th:hover{ color:#F00;}
.inner:hover{border:1px;}
tr:hover{box-shadow: 0px 0px 5px 0px #000; border: 2px solid #069;}

.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
	
    visibility: hidden;
    width: 600px;
	height:350px;
	background-color:#FFF;
	color: #000;
	opacity:0.95;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    margin-left: 0px;
	transition-duration:1s;
	box-shadow: 0px 0px 5px 0px #000;
	border-bottom:5px solid #09F;
	border-top:5px solid #09F;

}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    bottom: 100%;
   
    margin-left: -13px;
    border-width: 0px;
    border-style: solid;
    border-color: transparent transparent white transparent;
}

.tooltip:hover .tooltiptext {
	
    left: -1000%;
    visibility: visible;
}






/*input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
*/</style>



</head>

<?php 

session_start();
if(!$_SESSION['valid_pass']){
    header("Location: applications.php");
    exit;
} 

?>


<?php

ini_set('memory_limit', '50M');
ini_set('max_execution_time', 3000);
error_reporting(0);
if(isset($_GET['p']))
 
 {
$period=$_GET['p'];
$_SESSION['cbhiperiod']=$period;
 }
//$_SESSION['cbhiperiod']=$period;
$period=$_SESSION['cbhiperiod'];




include('link.php');

/*if(isset($_POST['qtty'])&&($_POST['unitp']))
{

$oid=$_POST['oid']; 
$qtty=$_POST['qtty'];
$unitp=$_POST['unitp'];

mysqli_query ($link,"UPDATE orders SET quantity=$qtty, unityp=$unitp, checked=1 WHERE order_id =$oid");
}*/

if(isset($_POST['cid']))
{

$cid=$_POST['cid']; 

mysqli_query ($link,"UPDATE orders SET verified=1 WHERE client_id =$cid");
}


?>

<?php
include('link.php');
//$period=$_SESSION['cbhiperiod'];
//$period=$_GET['p'];
//$_SESSION['cbhiperiod']=$period;

//$period=$_SESSION['cbhiperiod'];
//$district=$_POST['district'];
//$hcbill=$_POST['bill'];



$facyear= date("Y", strtotime($period));
$facmonth =mb_substr($period, 0, 3);
$where=mb_substr($period,9, 15);
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



<body bgcolor="#008FD5">
<?php 
$i=0;
$j=0;
$med = "SELECT order_id FROM orders WHERE period='$period' AND verified=1";// get the date 
        $retval = mysqli_query($link, $med);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$i++; 
				 }
				 
	  $med = "SELECT order_id FROM orders WHERE period='$period'";// get the date 
        $retval = mysqli_query($link, $med);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$j++; 
				 }
				 
				 
				 $p=$i/$j;
				 $per=$p*100;
				 $percentage=number_format((float)$per, 1, '.', '');
				 
				
?>
<div  style="position:absolute; padding:5px; font-size:20px;  position:fixed;  top:0px; left:0px; box-shadow: 0px 0px 5px 0px #000; height:40px; width:100%; opacity:0.7; background-color:#FFF;">
<form action="verifybill.php" method="post">
<?php echo'<font color="#FF0000" size="+3">'. $period.'</font>'; ?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CODE<input type="text" name="code" />DATE<input type="text" name="date" value="<?php echo date('Y-m-d') ?>" /><button class="button" ><span>Go </span></button>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--Find by CODE<input type="text" name="code" value="" /> <button class="button" ><span>Go </span></button>--><a href="cbhi.php" style="text-decoration:none; color:#000;"><strong> CBHI Dashboard<img src="img/play.png" width="16" height="16" /></strong></a> 

</form>



   
</div>

<!--<table width="0" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="222" scope="col"><b>PROVINCE/MVK</b></td>
    <th width="17" scope="col">&nbsp;</th>
    <th width="188" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td scope="row"><b>ADMINISTRATIVE DISTRICT</b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td scope="row"><b>HEALTH FACILITY<b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td scope="row"><b>CODE/HEALTH FACILITY</b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<br />
-->



<br /><br />
<table bgcolor="#FFFFFF" style="font-size:13px; border-collapse: collapse;  width:70%;" widtd ="0" border="1" cellspacing="0" cellpadding="0">
  <!--<tr>
  <th  bgcolor="#CCCCCC" style=" text-transform:uppercase;" colspan="17">RELEVE DES FACTURES MUTUELLE DE SANTE/  <?php echo ''.$facmonth.'-'.$facyear ?></th>
  </tr>-->
  
  
  
  
  
  
<?php
  
  
  
  
/*if(isset($_POST['cbhidate']))
 
 {*/
 
$cbhidate=$_POST['cbhidate'];
$periodcbhi2=$_POST['periodcbhi2'];

//$period=$_SESSION['cbhiperiod'];
//$period='January-2016';
//$cbhiyear= date("Y", strtotime($periodcbhi2));
$facyear1= date("Y", strtotime($periodcbhi2));
$cbhimonth= date("m", strtotime($period));
$fulld=$facyear1."-".$cbhimonth."-".$cbhidate."";
$dispage=$page/10;
//echo '<font color="#FFFFFF"><strong>Date:</strong> '.$fulld.'<strong>  Page:</strong>'.$dispage.'</font>';
  
  $i=0;
                                                                  $gtcons=0;
																  $gtlab=0;
																  $gtimg=0;
																  $gthosp=0;
																  $gtacts=0;
																  $gtconso=0;
																  $gtmed=0;
																  $ggt=0;
																  $gass=0;
  $med = "SELECT date FROM orders WHERE period='$period' AND quantity>0 AND verified=0 ORDER BY date ASC LIMIT 1";// get the date 
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
									$dat=$rowmed['date'];
                                                                  
																  
   $facture1 = "SELECT DISTINCT client_id,date FROM orders WHERE period='$period' AND date='$dat' AND verified=0 LIMIT 1";
                                             $retvalfac1 = mysqli_query($link, $facture1);
                                             if(! $retvalfac1 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {
															
															
															//get the provied code
																		
										   if(isset($_POST['code']))
										             {
       							     	   $cid=$_POST['code']; 
										   $odate=$_POST['date'];
														}
                                            else
											{
										   $cid=$rowfac1['client_id'];
									       $odate=$rowfac1['date'];
											}
											                     
											                    											 
											 
											 $facture2 = "SELECT* FROM orders, clients WHERE clients.client_id=$cid AND clients.insurance='MUSA' AND orders.date='$odate' AND orders.quantity>0 LIMIT 1";
                                             $retvalfac2 = mysqli_query($link, $facture2);
                                             if(! $retvalfac2 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac2 = mysqli_fetch_array($retvalfac2, MYSQLI_ASSOC))
                                                        {
														
														
														
														
															$i++;
															$code=$rowfac2['client_id'];
															$code=$cid;
															$insu=$rowfac2['insurance_code'];
													       echo'<tr style="font-size:30px;"><td  colspan="9"><strong>'.$rowfac2['beneficiary'].'</strong> ,'.$rowfac2['sex'].','.$rowfac2['age'].',( '.$rowfac2['insurance_code'].')<strong>Cat:'.$rowfac2['categorie'].'</strong> <em>code:</em><strong>'.$cid.'</strong>, '.$odate.', </td>';
														   //echo'<td>'.$cid.'</td>';
											               //echo'<td>'.$odate.'</td>';
														   //echo'<td>'.$rowfac2['insurance_code'].'</td>';
														   //echo'<td>'.$rowfac2['beneficiary'].'</td>';
														          
																  
echo'
<tr bgcolor="#CCCCCC">
  <!--  <td  scope="col">No</td >
     <td  scope="col">CODE</td >
    <td  scope="col">DATE</td >
    <td  scope="col">CODE MUSA</td >
    <td  scope="col">NOM ET PRENOM BENEFICIAIRE </td >-->
    <td  scope="col">COST FOR CONSULTATION</td >
    <td  scope="col">COST FOR LABORATORY TESTS</td >
    <td  scope="col">COST FOR MEDICAL IMAGING</td >
    <td  scope="col">COST FOR HOSPITALISATION</td >
    <td  scope="col">COST FOR PROCEDURES AND MATERIALS</td >
    <td  scope="col">COST FOR OTHER CONSUMABLES</td >
    <td  scope="col">COST FOR MEDEDECINES</td >
    <td  scope="col">TM</td >
    <td  scope="col">TOTAL AMOUNT-(TM)</td >
  </tr>



';												   
														   
														   
														   
														          $cons=0;
																  $lab=0;
																  $img=0;
																  $hosp=0;
																  $acts=0;
																  $conso=0;
																  $med=0;
																  
																  $tcons=0;
																  $tlab=0;
																  $timg=0;
																  $thosp=0;
																  $tacts=0;
																  $tconso=0;
																  $tmed=0;
																  $gt=0;
																  $ass=0;
																  
																  
																  
																  
																  
                                                                  $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND date='$odate' AND  insured=1 AND verified=0";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
			                                                                        
																					
																					
																					if ($rowfac['type']=='consultation')	
															                              {
																                            $cons=$rowfac['quantity']*$rowfac['unityp'];  
																                            $tcons+=$cons; 
															                              }
																				    elseif ($rowfac['type']=='laboratoire')	
															                              {
																                            $lab=$rowfac['quantity']*$rowfac['unityp'];  
																                            $tlab+=$lab; 
															                              }
																					elseif ($rowfac['type']=='img')	
															                              {
																                            $img=$rowfac['quantity']*$rowfac['unityp'];  
																                            $timg+=$img; 
															                              }
																				     elseif ($rowfac['type']=='hospitalisation')	
															                              {
																                            $hosp=$rowfac['quantity']*$rowfac['unityp'];  
																                            $thosp+=$hosp; 
															                              }
																					  elseif ($rowfac['type']=='soins')	
															                              {
																                            $acts=$rowfac['quantity']*$rowfac['unityp'];  
																                            $tacts+=$acts;																				 
															                              }
																					   elseif ($rowfac['type']=='consommable')	
															                              {
																                            $conso=$rowfac['quantity']*$rowfac['unityp'];  
																                            $tconso+=$conso; 
															                              }
																						elseif ($rowfac['type']=='med')	
															                              {
																                            $med=$rowfac['quantity']*$rowfac['unityp'];  
																                            $tmed+=$med; 
															                              }
																						  
																 


																					}
																
																					
																 $gt=$tcons+$tlab+$timg+$thosp+$tacts+$tconso+$tmed;
																 if ($tcons>0)
																 {
																 $tm=200;
																 $gt=$gt-$tm;
																 }
																 else
																 $tm=0;
																 $ass=$tm;
																 //$ass=$gt*85/100;	
																 
																  $gtcons+=$tcons;
																  $gtlab+=$tlab;
																  $gtimg+=$timg;
																  $gthosp+=$thosp;
																  $gtacts+=$tacts;
																  $gtconso+=$tconso;
																  $gtmed+=$tmed;
																  $ggt+=$gt;
																  $gass+=$ass;
																  
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code  AND type='consultation' AND date='$odate' AND insured=1 AND verified=0";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
                                                          
                                                          echo'<table class="inner" style="border-collapse: collapse;" bordercolor="#FFFFFF" border="1" >';
														  echo'<tr><th>Description</th><th>Qtté</th><th>P.U</th><th>Tot</th></tr>';
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '<form action="verifybill.php" method="post" >
																						<tr><td>'.$rowfac['item'].'</td><td>'.$rowfac['quantity'].'</td><td>'.$rowfac['unityp'].'</td><td>'.$rowfac['unityp']*$rowfac['quantity'].'</td><td>
																						
 <div draggable="true" class="tooltip"><img style="cursor:pointer;" border="0" src="img/chat.png" width="16" height="16" />
  <span class="tooltiptext">
  <em>-Deduction form-</em>
  <iframe src="addcoment.php?oid='.$rowfac['order_id'].'&cid='.$cid.'&period='.$period.' &odate='.$odate.'&insu='.$insu.' &item='.$rowfac['item'].'&qtty='.$rowfac['quantity'].'&unit='.$rowfac['unityp'].'" style="width:99%; height:95%">
  </iframe>
  
  
  </span>
</div>

																						
																						
																						
																						
																						
																						
																						</td></tr></form>';
																					}
																					echo'</table>';																		
																
																if ($tcons>0)
																echo '<b>Total:'.$tcons;													
																echo'</td>';
																
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code  AND type='laboratoire' AND date='$odate' AND insured=1 AND verified=0";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
                                                      echo'<table class="inner" style="border-collapse: collapse;" bordercolor="#FFFFFF" border="" >';
					                            		echo'<tr><th>Description</th><th>Qtté</th><th>P.U</th><th>Tot</th></tr>';
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '
																						<tr><td>'.$rowfac['item'].'</td><td>'.$rowfac['quantity'].'</td><td>'.$rowfac['unityp'].'</td><td>'.$rowfac['unityp']*$rowfac['quantity'].'</td><td>
																						
<div class="tooltip"><img style="cursor:pointer;" src="img/chat.png" width="16" height="16" />
  <span class="tooltiptext">
  <em>-Deduction form-</em>
  <iframe src="addcoment.php?oid='.$rowfac['order_id'].'&cid='.$cid.'&period='.$period.' &odate='.$odate.'&insu='.$insu.' &item='.$rowfac['item'].'&qtty='.$rowfac['quantity'].'&unit='.$rowfac['unityp'].'" style="width:99%; height:95%">
  </iframe>
  
  
  </span>
</div>


 </td></tr></form>';
																					}
																			echo'</table>';																			
																
																if ($tlab>0)
																echo '<b>Total:'.$tlab;													
																echo'</td>';
																echo'<td></td>';
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code  AND type='hospitalisation' AND date='$odate' AND insured=1 AND verified=0";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '-'.$rowfac['item'].''.$rowfac['quantity'].'x'.$rowfac['unityp'].'='.$rowfac['unityp']*$rowfac['quantity'].'Frw';
																						
echo'<div class="tooltip"><img style="cursor:pointer;" src="img/chat.png" width="16" height="16" />
  <span class="tooltiptext">
  <em>-Deduction form-</em>
  <iframe src="addcoment.php?oid='.$rowfac['order_id'].'&cid='.$cid.'&period='.$period.' &odate='.$odate.'&insu='.$insu.' &item='.$rowfac['item'].'&qtty='.$rowfac['quantity'].'&unit='.$rowfac['unityp'].'" style="width:99%; height:95%">
  </iframe>
  
  
  </span>
</div><br>';
																					}
																																							
																
																if ($thosp>0)
																echo '<b>Total:'.$thosp;													
																echo'</td>';
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND type='soins' AND date='$odate' AND insured=1 AND verified=0";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
                                                        echo'<table class="inner" style="border-collapse: collapse;" bordercolor="#FFFFFF" border="" >';
					                            		echo'<tr><th>Description</th><th>Qtté</th><th>P.U</th><th>Tot</th></tr>';
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '<tr><td>'.$rowfac['item'].'</td><td>'.$rowfac['quantity'].'</td><td>'.$rowfac['unityp'].'</td><td>'.$rowfac['unityp']*$rowfac['quantity'].'</td><td>
																						
  <div class="tooltip"><img style="cursor:pointer;" src="img/chat.png" width="16" height="16" />
  <span class="tooltiptext">
  <em>-Deduction form-</em>
  <iframe src="addcoment.php?oid='.$rowfac['order_id'].'&cid='.$cid.'&period='.$period.' &odate='.$odate.'&insu='.$insu.' &item='.$rowfac['item'].'&qtty='.$rowfac['quantity'].'&unit='.$rowfac['unityp'].'" style="width:99%; height:95%">
  </iframe>
  
  
  </span>
</div>


 </td></tr></form>';
																					}
																																							
																echo'</table>';
																if ($tacts>0)
																echo '<b>Total:'.$tacts;													
																echo'</td>';
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code  AND type='consommable' AND date='$odate' AND insured=1 AND verified=0";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
                                                        echo'<table class="inner" style="border-collapse: collapse;" bordercolor="#FFFFFF" border="" >';
					                            		echo'<tr><th>Description</th><th>Qtté</th><th>P.U</th><th>Tot</th></tr>';
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '<tr><td>'.$rowfac['item'].'</td><td>'.$rowfac['quantity'].'</td><td>'.$rowfac['unityp'].'</td><td>'.$rowfac['unityp']*$rowfac['quantity'].'</td><td>
																																												
  <div class="tooltip"><img style="cursor:pointer;" src="img/chat.png" width="16" height="16" />
  <span class="tooltiptext">
  <em>-Deduction form-</em>
  <iframe src="addcoment.php?oid='.$rowfac['order_id'].'&cid='.$cid.'&period='.$period.' &odate='.$odate.'&insu='.$insu.' &item='.$rowfac['item'].'&qtty='.$rowfac['quantity'].'&unit='.$rowfac['unityp'].'" style="width:99%; height:95%">
  </iframe>
  
  
  </span>
</div>

 </td></tr></form>';
																					}
																																							
																echo'</table>';
																if ($tconso>0)
																echo '<b>Total:'.$tconso;													
																echo'</td>';
																
																
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND type='med' AND date='$odate' AND insured=1 AND verified=0";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
                                                                     echo'<table class="inner" style="border-collapse: collapse;" bordercolor="#FFFFFF" border="" >';
																	 echo'<tr><th>Description</th><th>Qtté</th><th>P.U</th><th>Tot</th></tr>';
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						
																						echo '<tr><td>'.$rowfac['item'].'</td><td>'.$rowfac['quantity'].'</td><td>'.$rowfac['unityp'].'</td><td>'.$rowfac['unityp']*$rowfac['quantity'].'</td><td>

  <div class="tooltip"><img style="cursor:pointer;" src="img/chat.png" width="16" height="16" />
  <span class="tooltiptext">
  <em>-Deduction form-</em>
  <iframe src="addcoment.php?oid='.$rowfac['order_id'].'&cid='.$cid.'&period='.$period.' &odate='.$odate.'&insu='.$insu.' &item='.$rowfac['item'].'&qtty='.$rowfac['quantity'].'&unit='.$rowfac['unityp'].'" style="width:99%; height:95%">
  </iframe>
  
  
  </span>
</div>

 </td></tr></form>';
																					}echo'</tr></table>';
																																							
																
																if ($tmed>0)
																echo '<b>TOTAL:'.$tmed;	
																echo'</td>';
																
																echo'<td>'.$tm.'</td>';
																echo'<td>'.$gt.'</td>';
																
																											
																																						
														}
														   echo '</tr>';       
																  
																  
																  
												}
  
				 }
				 
				 
				 
				 
				 
				 
 // }end of date select condition
  
  
  ?></table>

<table bgcolor="#FFFFFF" style="font-size:13px; border-collapse: collapse;" widtd ="0" border="1" cellspacing="0" cellpadding="0">  
  
  
  <!--  <tr>
    <td bgcolor="#CCCCCC" colspan="5"><strong>TOTAL</strong></td>
    
    
    <td><?php echo $gtcons ?></td>
    <td><?php echo $gtlab ?></td>
    <td><?php echo $gtimg ?></td>
    <td><?php echo $gthosp ?></td>
    <td><?php echo $gtacts ?></td>
    <td><?php echo $gtconso ?></td>
    <td><?php echo $gtmed ?></td>
    <td><?php echo $gass ?></td>
    <td><?php echo $ggt ?></td>
  </tr>
-->   <?php $grand=$gtcons+$gtlab+$gtimg+$gthosp+$gtacts+$gtconso; $grandmed=$gtmed;  ?>
  <!--  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $grand ?></td>
    <td><?php echo $grandmed ?></td>
    <td><?php echo ($grand+$grandmed)*85/100 ?></td>
    <td>&nbsp;</td>
  </tr>
  
-->
  
  <!--<tr class="if"><td colspan="9">
  
    <form action="verifybill.php" method="POST">
      <input type="hidden" name="cid" value="<?php echo $cid ?>" />
      <input type="submit"  class="verified"  value="" />
      </form>
    
  </td></tr>-->
</table>
<?php
/*if ($percentage==100)
{
echo'

<center>
<h1 style="color:white;">Verification has been completed!<h1/>
</center>
';
}
elseif($percentage<100)
{
echo'<div style="background-color:#FFF; opacity:0.9; width:100%;">

<center>
<form action="verifybill.php" method="POST">
      <input type="hidden" name="cid" value="<?php echo $cid ?>" />
      <input type="submit"  class="verified"  value="" />
      </form>
      </center>
</div>';
}*/
?>
<div style=" opacity:0.9; width:70%;">

<center>
<form action="verifybill.php" method="POST">
      <input type="hidden" name="cid" value="<?php echo $cid ?>" />
      <input type="submit"  class="verified"  value="" />
      </form>
      <p style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; color:#FFF; font-size:60px;"> <?php echo $percentage; ?>% </p>
      </center>
      
</div>
<center>


</center>
</body>
</html>