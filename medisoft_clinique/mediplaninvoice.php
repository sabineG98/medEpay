<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facure Mediplan</title>
</head>
<?php
ini_set('memory_limit', '50M');
ini_set('max_execution_time', 3000);
?>


<?php
include('link.php');
$period=$_GET['p'];


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
</table>-->

<br />





<table style="font-size:13px; border-collapse: collapse;" widtd ="0" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <th  bgcolor="#CCCCCC" colspan="9"><u>SUMMARY OF VOUCHERS FOR MEDIPLAN</u></th>
  </tr>
  
  
  
  <tr bgcolor="#E5E5E5">
    <td  scope="col">No</td >
    <td  scope="col">CODE</td >
    <td  scope="col">DATE</td >
    <td  scope="col">POLICE No.</td >
    <td  scope="col">No CARTE</td >
    <td  scope="col">BENEFICIARY'S NAMES </td >
    
    <!--<td  scope="col">COST FOR CONSULTATION</td >
    <td  scope="col">COST FOR LABORATORY TESTS</td >
    <td  scope="col">COST FOR MEDICAL IMAGING</td >
    <td  scope="col">COST FOR HOSPITALISATION</td >
    <td  scope="col">COST FOR PROCEDURES AND MATERIALS</td >
    <td  scope="col">COST FOR OTHER CONSUMABLES</td >
    <td  scope="col">COST FOR MEDECINES</td >-->
    <td  scope="col">TOTAL AMOUNT<br />(CONSULTATION OU MEDICAMENTS)</td >
    <td  scope="col">TICKET MODERATEUR</td >
    <td  scope="col">MONTANT TOTAL SORAS</td >
  </tr>
  <tr >
    <td  scope="row">&nbsp;</td >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <!--<td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td>-->
    <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF"></td>
    <td bgcolor="#EFEFEF"></td>
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
											                      
											                      
											 
											 
											 $facture2 = "SELECT* FROM clients WHERE client_id=$cid AND insurance='MEDIPLAN' ";
                                             $retvalfac2 = mysqli_query($link, $facture2);
                                             if(! $retvalfac2 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac2 = mysqli_fetch_array($retvalfac2, MYSQLI_ASSOC))
                                                        {
														
														
														
														
															$i++;
															$code=$rowfac2['client_id'];
															$percentage=$rowfac2['percentage'];
													       echo'<td>'.$i.'</td>';
														   echo'<td>'.$cid.'</td>';
											               echo'<td>'.$odate.'</td>';
														   echo'<td>'.$rowfac2['police'].'</td>';
														   echo'<td>'.$rowfac2['cardno'].'</td>';
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
																  
																  
																  
																  
																  
                                                                 $facture = "SELECT * FROM invoice WHERE client_id=$code AND period='$period' AND date='$dat' AND insured=1";
                                                                       $retvalfac = mysqli_query($link, $facture);
                                                                       if(! $retvalfac )
                                                                                {
                                                                            die('Could not get data: ' . mysqli_error($link));
                                                                                }    
          
           
                                                                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                                                                    {
			                                                                        
																					
																					
																					if ($rowfac['type']=='CONSULTATION')	
															                              {
																                            $tcons+=$rowfac['total']; 
															                              }
																				    elseif ($rowfac['type']=='LABORATOIRE')	
															                                { 
																                            $tlab+=$rowfac['total']; 
															                                }
																                             
																					elseif ($rowfac['type']=='IMAGING')	
															                              {
																                           $timg+=$rowfac['total']; 
															                              }
																				     elseif ($rowfac['type']=='hospitalisation')	
															                              {
																                            
																                            $thosp+=$rowfac['total'];
															                              }
																						  
																					 elseif ($rowfac['type']=='soins')	
															                              {
																                            $tacts+=$rowfac['total'];																				 
															                              }
																						  
																						   elseif ($rowfac['type']=='ambulance')	
															                              {
																                              
																                            $tambu+=$rowfac['total'];																				 
															                              }
																						  
																						  
																						  
																					   elseif ($rowfac['type']=='consommable')	
															                              {
																                              
																                            $tconso+=$rowfac['total']; 
															                              }
																						elseif ($rowfac['type']=='MEDICAMENTS INJECTAB')	
															                              {
																                              
																                            $tmed+=$rowfac['total']; 
															                              }
																 


																					}
																
																					
																 $gt=$tcons+$tlab+$timg+$thosp+$tacts+$tconso+$tmed;
																 $ass=$gt*(100-$percentage)/100;	
																 
																  $gtcons+=$tcons;
																  $gtlab+=$tlab;
																  $gtimg+=$timg;
																  $gthosp+=$thosp;
																  $gtacts+=$tacts;
																  $gtconso+=$tconso;
																  $gtmed+=$tmed;
																  $ggt+=$gt;
																  $gass+=$ass;
																  
																/*echo'<td>'.$tcons.'</td>';
																echo'<td>'.$tlab.'</td>';	
																echo'<td>'.$timg.'</td>';
																echo'<td>'.$thosp.'</td>';
																echo'<td>'.$tacts.'</td>';	
																echo'<td>'.$tconso.'</td>';	
																echo'<td>'.$tmed.'</td>';*/	
																echo'<td>'.$gt.'</td>';
																$diff=$gt-$ass;
																echo'<td>'.$diff.'</td>';
																echo'<td>'.$ass.'</td></tr>';
																
																											
																																						
														}
														          
																  
																  
																  
												}
				 }
  
  
  
  ?>  
  
  
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
   <!-- <td><?php echo $gtcons ?></td>
    <td><?php echo $gtlab ?></td>
    <td><?php echo $gtimg ?></td>
    <td><?php echo $gthosp ?></td>
    <td><?php echo $gtacts ?></td>
    <td><?php echo $gtconso ?></td>
    <td><?php echo $gtmed ?></td>-->
    <td><?php echo $ggt ?></td>
    <td><?php echo $ggt-$gass ?></td>
    <td> <?php echo $gass ?></td>
  </tr>
   <?php $grand=$gtcons+$gtlab+$gtimg+$gthosp+$gtacts+$gtconso; $grandmed=$gtmed;  ?>

</table>

</body>
</html>