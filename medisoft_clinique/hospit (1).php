<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

include ('link.php');
$period=$_GET['period'];

?>




<table style="font-size:13px;" widtd ="0" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <th style="text-transform:uppercase;" bgcolor="#CCCCCC" colspan="14">LISTE DES CLIENTS HOSPITALISE-<?php echo $period; ?></th>
  </tr>
  
  
  
  <tr bgcolor="#E5E5E5">
    <td  scope="col">No</td >
    <td  scope="col">CODE</td >
    <td  scope="col">ASSURANCE</td >
    <td  scope="col">No D'AFFILIATION</td >
    <td  scope="col">NOM ET PRENOM BENEFICIAIRE </td >
    <td  scope="col">CATEGORIE </td >
    <td  scope="col">NOMBRE DE JOURS</td >
  </tr>
  
  
  <?php
  $i=0;
                                                                  


                                                                  
																  
   $facture1 = "SELECT DISTINCT client_id FROM orders WHERE period='$period' ";
                                             $retvalfac1 = mysqli_query($link, $facture1);
                                             if(! $retvalfac1 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {
														
											 $cid=$rowfac1['client_id'];
											                      
											 
											 
											 $facture2 = "SELECT* FROM clients,orders WHERE clients.client_id=orders.client_id AND clients.client_id=$cid AND type='hospitalisation' AND period='$period'  ";
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
											               //echo'<td>'.$odate.'</td>';
												           echo'<td>'.$code.'</td>';
														   echo'<td>'.$rowfac2['insurance'].'</td>';
														   echo'<td>'.$rowfac2['insurance_code'].'</td>';
														   echo'<td>'.$rowfac2['beneficiary'].'</td>';
														   $item=$rowfac2['item'];
														   $qtty=$rowfac2['quantity'];       
														    echo'<td>'.$item.'</td>';
														    echo'<td>'.$qtty.'</td></tr>';  
																  														   
														}
														   
														   
														}   
																  
																  
																  
																  
																    
																                            //$thosp+=$hosp; 
																							
																						
																			
															    
															                            	  
															    
																              


																					
																
																					
															                
																  
																	        
																
															
																
																											
																																						
														
														          
																            
																  
																  
												
				 
  
  
  
  
  ?>  
  
  
 
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
    <td></td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
--></table>



</body>
</html>