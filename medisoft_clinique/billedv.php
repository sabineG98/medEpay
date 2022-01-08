<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php
$facture = "SELECT DISTINCT period FROM orders WHERE verified=0 ORDER BY date DESC";
        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 $i++;
					 if ($i%2==0)
				  echo '<tr bgcolor="#FFFFFF" class="tr">';
				      else
				  echo '<tr style="background-color:#E6E6E6;" class="tr">';
				 echo'<td></td>';
				  $period=$periodc;
				  echo'<td>';
				                              //find wht i need about the month found
											  $musa=0;
											  $rama=0;
											  $mmi=0;
											  $mediplan=0;
											  $corar=0;
											  $radiant=0;
											  $compassion=0;
											  $indigent=0;
											  $prive=0;
											  
											  $tmusav=0;
											  $trama=0;
											  $tmmi=0;
											  $tmediplan=0;
											  $tcorar=0;
											  $tradiant=0;
											  $tcompassion=0;
											  $tindigent=0;
											  $tprive=0;
											  $tm=0;
											  $gt=0;
											  
				                             $facture1 = "SELECT insurance, type, quantity,unityp FROM clients, orders WHERE clients.client_id=orders.client_id AND period='$period' AND insured=1 AND verified=1";
                                             $retvalfac1 = mysqli_query($link, $facture1);
                                             if(! $retvalfac1 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {
															
															$insurance=$rowfac1['insurance'];
															
															switch($insurance)
															{
															case "MUSA":
															    {
																	if ($rowfac1['type']=='consultation')	
															                              {
																                            $tm+=200; 
															                              }
																	
																 $musa=$rowfac1['quantity']*$rowfac1['unityp'];  
																 $tmusav+=$musa; 
																 break;	
																}
															case "RSSB":
															    {									    
													             $rama=$rowfac1['quantity']*$rowfac1['unityp']; 
																 $trama+=$rama; 
																 break;
																}
															case "MMI":
															    {
													             $mmi=$rowfac1['quantity']*$rowfac1['unityp']; 
																 $tmmi+=$mmi;
																 break;
																}
															case "MEDIPLAN":
															    {
													             $mediplan=$rowfac1['quantity']*$rowfac1['unityp'];
																 $tmediplan+=$mediplan; 
																 break;
																}
															case "CORAR":
															    {
													             $corar=$rowfac1['quantity']*$rowfac1['unityp'];
																 $tcorar+=$corar; 
																 break;
																}
																
																case "RADIANT":
															    {
													             $radiant=$rowfac1['quantity']*$rowfac1['unityp'];
																 $tradiant+=$radiant; 
																 break;
																}
															case "COMPASSION":
															     {
															      $compassion=$rowfac1['quantity']*$rowfac1['unityp'];
																  $tcompassion+=$compassion;
																  break;
																 }
														    case "INDIGENT":
															     {
															      $indigent=$rowfac1['quantity']*$rowfac1['unityp'];
																  $tindigent+=$indigent;
																  break;
																 }
														    case "PRIVE":
															      {
															      $prive=$rowfac1['quantity']*$rowfac1['unityp'];
																  $tprive+=$prive;
																  break;
																  }
																
															// default:
                                                            // echo "error:WRONG MONTH";													
															 
															 }
															
															
															
															
															
															/*if ($rowfac1['insurance']=='MUSA')	
															  {
																 $musa=$rowfac1['quantity']*$rowfac1['unityp'];  
																 $tmusav+=$musa; 
															  }
																 
														    elseif ($rowfac1['insurance']=='RSSB') 
															      {
													             $rama=$rowfac1['quantity']*$rowfac1['unityp']; 
																  $trama+=$rama; 
																  }
															 elseif ($rowfac1['insurance']=='MMI') 
															     {															
													             $mmi=$rowfac1['quantity']*$rowfac1['unityp']; 
																 $tmmi+=$mmi;
																 }
																
															 elseif ($rowfac1['insurance']=='MEDIPLAN') 
															   {
															
													             $mediplan=$rowfac1['quantity']*$rowfac1['unityp'];
																  $tmediplan+=$mediplan; 
															   }
																 
															 elseif ($rowfac1['insurance']=='COMPASSION') 
															      {
															      $compassion=$rowfac1['quantity']*$rowfac1['unityp'];
																  $tcompassion+=$compassion;
																  }
														     elseif ($rowfac1['insurance']=='INDIGENT') 
															      {
															      $indigent=$rowfac1['quantity']*$rowfac1['unityp'];
																  $tindigent+=$indigent;
																  }
														      elseif ($rowfac1['insurance']=='PRIVE') 
															      {
															      $prive=$rowfac1['quantity']*$rowfac1['unityp'];
																  $tprive+=$prive;
																  }*/
																
				                                          }
				                                        //$tmusav=$tmusav-$tm;
														$trama=$trama-($trama*0.15);
														$tmmi=$tmmi-($tmmi*0.15);
														$tmediplan=$tmediplan-($tmediplan*0.10);
														    $tcorar=$tcorar-($tcorar*0.10);//not yet confirmed(%)
														    $tradiant=$tradiant-($tradiant*0.10);//not yet confirmed(%)
														$gt=$tmusav+$trama+$tmmi+$tmediplan+$tcorar+$tradiant+$tcompassion+$tindigent+$tprive;
                    
				 }
				 
?>
</body>
</html>