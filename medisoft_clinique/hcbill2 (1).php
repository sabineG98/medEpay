



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facture-section MUSA</title>
</head>

<?php
include('link.php');
$period=$_POST['ukwezi'];
$district=$_POST['district'];
$hcbill=$_POST['bill'];



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

<br />
-->




<table style="font-size:13px;" widtd ="0" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <th  bgcolor="#CCCCCC" style=" text-transform:uppercase;" colspan="17">Relevé des Factures <?php echo $district.'-Section: '.$hcbill.'/mois- '.$facmonth.'-'.$facyear ?></th>
  </tr>
  
  
  
  <tr bgcolor="#E5E5E5">
    <td  scope="col">No</td >
    <td  scope="col">DATE</td >
    <td  scope="col">CODE MUSA</td >
    <td  scope="col">NOM ET PRENOM BENEFICIAIRE </td >
    <td  scope="col">COST FOR CONSULTATION</td >
    <td  scope="col">COST FOR LABORATORY TESTS</td >
    <td  scope="col">COST FOR MEDICAL IMAGING</td >
    <td  scope="col">COST FOR HOSPITALISATION</td >
    <td  scope="col">COST FOR PROCEDURES AND MATERIALS</td >
    <td  scope="col">COST FOR OTHER CONSUMABLES</td >
    <td  scope="col">COST FOR MEDEDECINES</td >
    <td  scope="col">TOTAL AMOUNT-(TM=200)</td >
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
																  $ggt=0;
																  $gass=0;
  
                                                                  
																  
   $facture1 = "SELECT DISTINCT client_id FROM orders WHERE period='$period' ";
                                             $retvalfac1 = mysqli_query($link, $facture1);
                                             if(! $retvalfac1 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {
														
											 $cid=$rowfac1['client_id'];
											 
											                      
											                      
											 
											 
											 $facture2 = "SELECT* FROM clients WHERE client_id=$cid AND insurance='MUSA' AND district='$district' AND section='$hcbill' ";
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
											               echo'<td>'.$rowfac2['date'].'</td>';
														   echo'<td>'.$rowfac2['insurance_code'].'</td>';
														   echo'<td>'.$rowfac2['beneficiary'].'</td>';
														          
																  
																  														   
														   
														   
														   
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
																  
																  
																  
																  
																  
                                                                  $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period'";
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
																
																					
																 $gt=($tcons+$tlab+$timg+$thosp+$tacts+$tconso+$tmed)-200;
																 
																 $ass=$gt*85/100;	
																 
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
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='consultation'";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '-'.$rowfac['item'].'('.$rowfac['quantity'].'*'.$rowfac['unityp'].'Frw='.$rowfac['unityp']*$rowfac['quantity'].'Frw)<br>';
																					}
																																							
																
																if ($tcons>0)
																echo '<b>Total:'.$tcons;													
																echo'</td>';
																
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='laboratoire'";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '-'.$rowfac['item'].'('.$rowfac['quantity'].'*'.$rowfac['unityp'].'Frw='.$rowfac['unityp']*$rowfac['quantity'].'Frw)<br>';
																					}
																																							
																
																if ($tlab>0)
																echo '<b>Total:'.$tlab;													
																echo'</td>';
																echo'<td></td>';
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='hospitalisation'";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '-'.$rowfac['item'].'('.$rowfac['quantity'].'*'.$rowfac['unityp'].'Frw='.$rowfac['unityp']*$rowfac['quantity'].'Frw)<br>';
																					}
																																							
																
																if ($thosp>0)
																echo '<b>Total:'.$thosp;													
																echo'</td>';
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='soins'";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '-'.$rowfac['item'].'('.$rowfac['quantity'].'*'.$rowfac['unityp'].'Frw='.$rowfac['unityp']*$rowfac['quantity'].'Frw)<br>';
																					}
																																							
																
																if ($tacts>0)
																echo '<b>Total:'.$tacts;													
																echo'</td>';
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='consommable'";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '-'.$rowfac['item'].'('.$rowfac['quantity'].'*'.$rowfac['unityp'].'Frw='.$rowfac['unityp']*$rowfac['quantity'].'Frw)<br>';
																					}
																																							
																
																if ($tconso>0)
																echo '<b>Total:'.$tconso;													
																echo'</td>';
																
																
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='med'";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
																						echo '-'.$rowfac['item'].'('.$rowfac['quantity'].'*'.$rowfac['unityp'].'Frw='.$rowfac['unityp']*$rowfac['quantity'].'Frw)<br>';
																					}
																																							
																
																if ($tmed>0)
																echo '<b>Total:'.$tmed;													
																echo'</td>';
																
																
																echo'<td>'.$gt.'</td>';
																
																											
																																						
														}
														   echo '</tr>';       
																  
																  
																  
												}
  
  
  
  
  ?>  
  
  
  <tr>
    <td bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
    <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    
    <td><?php echo $gtcons ?></td>
    <td><?php echo $gtlab ?></td>
    <td><?php echo $gtimg ?></td>
    <td><?php echo $gthosp ?></td>
    <td><?php echo $gtacts ?></td>
    <td><?php echo $gtconso ?></td>
    <td><?php echo $gtmed ?></td>
    <td><?php echo $ggt ?></td>
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