<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facture-section MUSA</title>
</head>
<?php
ini_set('memory_limit', '50M');
ini_set('max_execution_time', 3000);
?>

<?php
include('link.php');
$period=$_GET['p'];
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




<table style="font-size:13px; border-collapse: collapse;" widtd ="0" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <th  bgcolor="#CCCCCC" style=" text-transform:uppercase;" colspan="17">RELEVE DES FACTURES MUTUELLE DE SANTE/  <?php echo ''.$facmonth.'-'.$facyear ?></th>
  </tr>
  
  
  
  <tr bgcolor="#E5E5E5">
    <td  scope="col">No</td >
     <td  scope="col">CODE</td >
    <td  scope="col">DATE</td >
    <td  scope="col">CAT</td >
    <td  scope="col">CODE MUSA</td >
    <td  scope="col">NOM ET PRENOM BENEFICIAIRE </td >
    <td  scope="col">COST FOR CONSULTATION</td >
    <td  scope="col">COST FOR LABORATORY TESTS</td >
    <td  scope="col">COST FOR MEDICAL IMAGING</td >
    <td  scope="col">COST FOR HOSPITALISATION</td >
    <td  scope="col">COST FOR PROCEDURES AND MATERIALS</td >
    <td  scope="col">COST FOR AMBULANCE</td >
    <td  scope="col">COST FOR OTHER CONSUMABLES</td >
    <td  scope="col">COST FOR MEDECINES</td >
    
    <td  scope="col">TOTAL AMOUNT</td >
    <td  scope="col">DETERENT FEES(TM)</td>
    <td  scope="col">TOTAL AMOUNT TO BE PAID</td >
  </tr>
  
  
  <?php
  $i=0;
                                                                  $gtcons=0;
																  $gtlab=0;
																  $gtimg=0;
																  $gthosp=0;
																  $gtacts=0;
																  $gtamb=0;
																  $ggt1=0;
																  $gtconso=0;
																  $gtmed=0;
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
                                                                  
																  
   $facture1 = "SELECT DISTINCT client_id,date FROM orders WHERE period='$period' AND date='$dat'";
                                             $retvalfac1 = mysqli_query($link, $facture1);
                                             if(! $retvalfac1 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {
														
											 $cid=$rowfac1['client_id'];
											 $odate=$rowfac1['date'];
											                      
											                      
											 
											 
											 $facture2 = "SELECT* FROM clients WHERE client_id=$cid AND insurance='MUSA'";
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
														   echo'<td>'.$rowfac2['beneficiary'].'</td>';
														    $categorie=$rowfac2['categorie'];      
																  
																  														   
														   
														   
														   
														          $cons=0;
																  $lab=0;
																  $img=0;
																  $hosp=0;
																  $acts=0;
																  $amb=0;
																  $conso=0;
																  $med=0;
																  
																  $tcons=0;
																  $tlab=0;
																  $timg=0;
																  $thosp=0;
																  $tacts=0;
																  $tamb=0;
																  $tconso=0;
																  $tmed=0;
																  $gt=0;
																  $ass=0;
																  
																  
																  $acc=0;
																  $cat=0;
																  
																  
																  $a=0;
                                                                  $b=0;
																  
																  
                                                                  $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND date='$dat' AND period='$period' AND insured=1";
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
																							  $accou=$rowfac['item'];
				                                                                         if ($accou='Acc%')
				                                                                                  {
				                                                                                     $acc=1;
				                                                                                   }
																                            $acts=$rowfac['quantity']*$rowfac['unityp'];  
																                            $tacts+=$acts;																				 
															                              }
																						  
																						elseif ($rowfac['type']=='ambulance')	
															                              {
																							  $accou=$rowfac['item'];
				                                                                        
																                            $amb=$rowfac['quantity']*$rowfac['unityp'];  
																                            $tamb+=$amb;																				 
															                              }  
																						  
																						  
																						  
																					   elseif ($rowfac['type']=='consommable')	
															                              {
																                            $conso=$rowfac['quantity']*$rowfac['unityp'];  
																                            $tconso+=$conso; 
															                              }
																						elseif ($rowfac['type']=='med')	
															                              {
																							  
																							  $drug=$rowfac['item'];
	//detect of a client has malaria																						

	if ( 
	
	   substr( $drug, 0, 3 ) == "Coa" 
	or substr( $drug, 0, 3 ) == "COA"
	or substr( $drug, 0, 3 ) == "coa"
	or substr( $drug, 0, 3 ) == "ART"
	or substr( $drug, 0, 3 ) == "art"
	or substr( $drug, 0, 3 ) == "Art"
	or substr( $drug, 0, 3 ) == "qui"
	or substr( $drug, 0, 3 ) == "QUI"
	or substr( $drug, 0, 3 ) == "Qui")
	
	
    {
	$a=1;
	}
	
	if($a==1)
	{
		$b=1;
	}// end of detect
																                            $med=$rowfac['quantity']*$rowfac['unityp'];  
																                            $tmed+=$med; 
															                              }
																						  
																 


																					}
																
																					
																 $gt=$tcons+$tlab+$timg+$thosp+$tacts+$tamb+$tconso+$tmed;
																
																
																
																
																 															 
																 
																 																 
																 $tm=200;
																 
																 switch ($categorie)
                                                                    {
																		
                                                                    case "1":
																	$tm=0;
                                                                    break;
																	
																	case "2":
																	 if ($b==1)
																	 {
																	   $tm=0;
																	 }
                                                                    break;

							                                        default:
                                                                    $tm=200;
                                                                    }
																										
																	
																	
																	if ($tcons==0)
																	{
																	  $tm=0;
																	}
																	  
																	
																 if ($tm==0)
																 {
	 $products = "SELECT unityp FROM orders WHERE client_id=$code AND type='TM' AND date='$dat'";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				 
				 $tm=$row['unityp'];
					
				 }
																 
														}	
																 
																 
																 
																 
																 
																 
																 
																// if ($categorie==1 or $tcons==0 or $acc==1)// ($tcons<0 or $categorie==1 or $acc==1)cat for categorie
																// {
																// $tm=0;
																// }
																 
																 
																// if ($categorie==2 and  $b==1)// ($tcons<0 or $categorie==1 or $acc==1)cat for categorie
																// {
																// $tm=0;
																// }
																
																
																$gt1=$gt-$tm;
																
																 if ($tamb>0)
																 {
																 $tm1=$tamb*0.1;
																 $tm=$tm+$tm1;
																 $gt1=$gt-$tm;
																 }
																 
																 $ass=$tm;
																 
																 
																 
																 //$ass=$gt*85/100;	
																 
																  $gtcons+=$tcons;
																  $gtlab+=$tlab;
																  $gtimg+=$timg;
																  $gthosp+=$thosp;
																  $gtacts+=$tacts;
																  $gtamb+=$tamb;
																  $gtconso+=$tconso;
																  $gtmed+=$tmed;
																  $ggt+=$gt;
																  $ggt1+=$gt1;
																  $gass+=$ass;
																  
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='consultation' AND date='$dat' AND insured=1";
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
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='laboratoire' AND date='$dat' AND insured=1";
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
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='hospitalisation' AND date='$dat' AND insured=1";
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
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='soins' AND date='$dat' AND insured=1";
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
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='ambulance' AND date='$dat' AND insured=1";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
											echo '-'.$rowfac['item'].'('.$rowfac['quantity'].'*'.$rowfac['unityp'].'Frw='.$rowfac['unityp']*$rowfac['quantity'].'Frw)<br>';
																					}
																																							
																
																if ($tamb>0)
																echo '<b>Total:'.$tamb;													
																echo'</td>';	
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																echo'<td>';
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='consommable' AND date='$dat' AND insured=1";
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
																       $facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND type='med' AND date='$dat' AND insured=1";
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
																
																//$ggt1+=$gt1;
																echo'<td>'.$gt.'</td>';
																echo'<td>'.$tm.'</td>';
																
															    echo'<td>'.$gt1.'</td>';										
																																						
														}
														   echo '</tr>';       
																  
																  
																  
												}
  
				 }
  
  
  ?>  
  
  
  <tr>
    <td bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
    <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    
    <td><?php echo $gtcons ?></td>
    <td><?php echo $gtlab ?></td>
    <td><?php echo $gtimg ?></td>
    <td><?php echo $gthosp ?></td>
    <td><?php echo $gtacts ?></td>
    <td><?php echo $gtamb ?></td>
    <td><?php echo $gtconso ?></td>
    <td><?php echo $gtmed ?></td>
    
    <td><?php echo $ggt ?></td>
    <td><?php echo $gass ?></td>
    
    
    <td><?php echo $ggt1 ?></td>
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