<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facture MUSA</title>
</head>
<?php
ini_set('memory_limit', '50M');
ini_set('max_execution_time', 3000);
?>
<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>

<?php
include('link.php');
$period=$_GET['p'];


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
<body>
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
-->
<br />





<table style="font-size:13px;" widtd ="0" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <th  bgcolor="#CCCCCC" style=" text-transform:uppercase; height:40px; font-size:16px;" colspan="19">CS GIHOGWE-S U M M A R Y   OF  V OUC H E R S    F O R   R W A N D A  S O C I A L  S E C U R I T Y  B O A D (R S S B) / CBHI/  <?php echo ''.$facmonth.'-'.$facyear ?></th>
  </tr>
  
  
  
  <tr bgcolor="">
    <td  scope="col"><strong>No</strong></td >
    <td  scope="col"><strong>CODE</strong></td >
    <td  scope="col"><strong>DATE</strong></td >
    <td  scope="col"><strong>MEMBER'S CATEGORY</strong></td >
    <td  scope="col"><strong>BENEFICIARY'S AFFILIATION NUMBER</strong></td >
    <td  scope="col"><strong>BENEFICIARY'S AGE</strong></td >
    <td  scope="col"><strong>BENEFICIARY'S NAMES </strong></td >
    <td  scope="col"><strong>HEAD HOUSEHOLD'S NAMES </strong></td >
    <td  scope="col"><strong>FAMILY'S CODE</strong></td >
    <td  scope="col"><strong>COST FOR CONSULTATION</strong></td >
    <td  scope="col"><strong>COST FOR LABORATORY TESTS</strong></td >
    <td  scope="col"><strong>COST FOR MEDICAL IMAGING</strong></td >
    <td  scope="col"><strong>COST FOR HOSPITALISATION</strong></td >
    <td  scope="col"><strong>COST FOR PROCEDURES AND MATERIALS</strong></td >
    <td  scope="col"><strong>COST FOR OTHER CONSUMABLES</strong></td >
    <td  scope="col"><strong>COST FOR MEDEDECINES</strong></td >
    <td  scope="col"><strong>TOTAL AMOUNT</strong></td >
    <td  scope="col"><strong>DETERRENT FEES</strong></td >
    <td  scope="col"><strong>TOTAL AMOUNT TO BE PAID</strong></td >
  </tr>
  
  <tr bgcolor="" style=" font-size:10px;">
    <td  scope="col"></td >
    <td  scope="col">&nbsp;</td >
    <td  scope="col">&nbsp;</td >
    <td  scope="col">&nbsp;</td >
    <td  scope="col">&nbsp;</td >
    <td  scope="col">&nbsp;</td >
    <td  scope="col">&nbsp;</td >
    <td  scope="col">&nbsp;</td >
    <td  scope="col">&nbsp;</td >
    <td  scope="col">100%</td >
    <td  scope="col">100%</td >
    <td  scope="col">100%</td >
    <td  scope="col">100%</td >
    <td  scope="col">100%</td >
    <td  scope="col">100%</td >
    <td  scope="col">100%</td >
    <td  scope="col">100%</td >
    <td  scope="col">200RWF/0%/10%</td >
    <td  scope="col">TOTAL AMOUNT -DETERRENT FEES</td >
  </tr>
  
  
  <?php
  $i=0;
                                                                  $gtcons=0;
																  $gtlab=0;
																  $gtimg=0;
																  $gthosp=0;
																  $gtacts=0;
																  $gtconso=0;
																  $gtmed=0;
																  $ggt1=0;
																  $ggt=0;
																  $gass=0;
  
  $med = "SELECT DISTINCT date FROM orders ORDER BY date ASC";// get the date 
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
									$dat=$rowmed['date'];
																  
   $facture1 = "SELECT DISTINCT client_id, date FROM orders WHERE period='$period' AND date='$dat' AND insured=1 ";
                                             $retvalfac1 = mysqli_query($link, $facture1);
                                             if(! $retvalfac1 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {
														
											 $cid=$rowfac1['client_id'];
											 $odate=$rowfac1['date'];
											                      
											                      
											 
											 
											 $facture2 = "SELECT* FROM clients WHERE client_id=$cid AND insurance='MUSA' AND section!='Gatsata' ";
                                             $retvalfac2 = mysqli_query($link, $facture2);
                                             if(! $retvalfac2 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac2 = mysqli_fetch_array($retvalfac2, MYSQLI_ASSOC))
                                                        {
														
														
														
														
															$i++;
															$code=$rowfac2['client_id'];
													       echo'<td>'.$i.'</td>';
														   echo'<td>'.$cid.'</td>';
														   echo'<td>'.$odate.'</td>';
											               echo'<td>'.$rowfac2['categorie'].'</td>';
														   echo'<td>'.$rowfac2['insurance_code'].'</td>';
														   echo'<td>'.$rowfac2['age'].'</td>';
														   echo'<td>'.$rowfac2['beneficiary'].'</td>';
														   echo'<td>'.$rowfac2['chef'].'</td>';
														   echo'<td>'.$rowfac2['famille'].'</td>';
														          
																  
																  														   
														   
														   
														   
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
																  
																  
																  
																  
																  
                                                                  $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND date='$dat' AND  period='$period' AND insured=1";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
			                                                                        
																					
																					$dt=$rowfac['type'];
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
																 
																 $gt1=$gt-$tm;
																 }
																 else
																 $tm=0;
																 //$ass=$gt*85/100;	
																  $ass=$tm;
																  $gtcons+=$tcons;
																  $gtlab+=$tlab;
																  $gtimg+=$timg;
																  $gthosp+=$thosp;
																  $gtacts+=$tacts;
																  $gtconso+=$tconso;
																  $gtmed+=$tmed;
																  $ggt+=$gt;
																  $ggt1+=$gt1;
																  $gass+=$ass;
																  
																echo'<td>'.$tcons.'</td>';
																echo'<td>'.$tlab.'</td>';	
																echo'<td>'.$timg.'</td>';
																echo'<td>'.$thosp.'</td>';
																echo'<td>'.$tacts.'</td>';	
																echo'<td>'.$tconso.'</td>';	
																echo'<td>'.$tmed.'</td>';	
																echo'<td>'.$gt.'</td>';
																echo'<td>'.$ass.'</td>';
																echo'<td>'.$gt1.'</td></tr>';
																
																											
																																						
														}
														          
																  
																  
																  
												}
  
				 }
  
  
  ?>  
  
  
  <tr>
    <td bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    
    <strong><td><?php echo $gtcons ?></td>
    <td><?php echo $gtlab ?></td>
    <td><?php echo $gtimg ?></td>
    <td><?php echo $gthosp ?></td>
    <td><?php echo $gtacts ?></td>
    <td><?php echo $gtconso ?></td>
    <td><?php echo $gtmed ?></td>
    <td> <?php echo $ggt ?></td>
    <td><?php echo $gass ?></td>
    <td> <?php echo $ggt1 ?></td></strong>
  </tr>
   <?php $grand=$gtcons+$gtlab+$gtimg+$gthosp+$gtacts+$gtconso; $grandmed=$gtmed;  ?>
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
--></table>

</body>
</html>