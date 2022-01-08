<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::MEDICAMENTS</title>

<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>







<?php
include('link.php');

?>


</head>

<body bgcolor="">
<h3> Les entrées Journalières encaissées selon les utilisateurs</h3>

<table width="200" border="0">
  <tr>
    <td>
    <form action="users.php" method="post">
    <select name="user">
    <option value="">Selectionner l'utilisateur</option>
       <?php 
    $per = "SELECT DISTINCT user  FROM orders ORDER BY date DESC";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				//$d=$rowper['date'];
    echo '<option value="'.$rowper['user'].'">'.$rowper['user'].'</option>';
	             }
    ?>
    
    </select>
    
    
    
    </td>
     <td><input type="submit" value="Ok"</td>
</form>
  </tr>
</table>




<table  style="font-size:13px; border-collapse: collapse;" width="0" border="0" cellspacing="0" cellpadding="3">
  <tr  style="background-color:#CCC;">
    <th rowspan="2">No</th>
    <th rowspan="2">MOIS</th>
    <th colspan="9">ASSURANCES</th>
    <th rowspan="2">TOTAL</th>
  </tr>
  <tr style="background-color:#E6E6E6;">
    <th>MUSA</th>
    <th>RSSB/RAMA</th>
    <th>MMI</th>
    <th>MEDIPLAN</th>
    <th>CORAR</th>
    <th>RADIANT</th>
    <th>COMPASSION</th>
    <th>INDIGENTS</th>
    <th>PRIVE</th>

   </tr>
<?php 
$i=0;

//find the month


if(isset($_POST['user']))
                     {
						 $user=$_POST['user'];
						 echo'<h3>'.$user.'</h3>';
						 echo'';

$facture = "SELECT DISTINCT date FROM orders WHERE user='$user' ORDER BY date DESC LIMIT 31";
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
				  
				  echo'<td>'.$i.'</td>';
				  //$period=$rowfac['period'];
				  $date=$rowfac['date'];
				  echo'<th>'.$rowfac['date'].'</th>';
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
											  
											  $notmusa=0;
											  $notcorar=0;
											  $notradiant=0;
											  $notrssb=0;
											  $notmmi=0;
											  $notmediplan=0;
											  
											  $tmusa=0;
											  $trama=0;
											  $tmmi=0;
											  $tmediplan=0;
											  $tcorar=0;
											  $tradiant=0;
											  $tcompassion=0;
											  $tindigent=0;
											  $tprive=0;
											  $gt=0;
											  
											  $tnotmusa=0;
											  $tnotrssb=0;
											  $tnotmmi=0;
											  $tnotmediplan=0;
											  $tnotcorar=0;
											  $tnotradiant=0;
											  
				                             $facture1 = "SELECT insurance, insured, type, quantity,unityp FROM clients, orders WHERE clients.client_id=orders.client_id AND orders.date='$date' AND orders.user='$user' ";
                                             $retvalfac1 = mysqli_query($link, $facture1);
                                             if(! $retvalfac1 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {
															
															if ($rowfac1['insurance']=='MUSA')	
															  {
																  if($rowfac1['insured']==1)
																 $musa=$rowfac1['quantity']*$rowfac1['unityp'];  
																 
																 
																 
															             if($rowfac1['type']=='consultation')
															                 {
																                $musa=200;
																                $tmusa+=$musa; 
															                 }
															 
															               if($rowfac1['insured']==0)
															                {
															             	 $notmusa=$rowfac1['quantity']*$rowfac1['unityp'];
															             	 $tnotmusa+=$notmusa; 
															                }
															 
															  }
																 
														    elseif ($rowfac1['insurance']=='RSSB') 
															      {
																	   if($rowfac1['insured']==1)
																	   {
													                     $rama=$rowfac1['quantity']*$rowfac1['unityp']; 
																          $trama+=$rama; 
																	   }
																  
																      if($rowfac1['insured']==0)
															                {
															             	 $notrssb=$rowfac1['quantity']*$rowfac1['unityp'];
															             	 $tnotrssb+=$notrssb; 
															                }
																			
																			
																  }
															 elseif ($rowfac1['insurance']=='MMI') 
															     {				
																    if($rowfac1['insured']==1)		
																	      {									
													                     $mmi=$rowfac1['quantity']*$rowfac1['unityp']; 
																         $tmmi+=$mmi;
																		  }
																     
																	 
																	 
																	  if($rowfac1['insured']==0)
															                {
															             	 $notmmi=$rowfac1['quantity']*$rowfac1['unityp'];
															             	 $tnotmmi+=$notmmi; 
															                }
																 }
																 
															 elseif ($rowfac1['insurance']=='MEDIPLAN') 
															   {
															       if($rowfac1['insured']==1)
																             {
													                        $mediplan=$rowfac1['quantity']*$rowfac1['unityp'];
																            $tmediplan+=$mediplan; 
																			 }
																        if($rowfac1['insured']==0)
															                {
															             	 $notmediplan=$rowfac1['quantity']*$rowfac1['unityp'];
															             	 $tnotmediplan+=$notmediplan; 
															                }
															   }
															   
															   
															   
															   
															   elseif ($rowfac1['insurance']=='CORAR') 
															   {
															       if($rowfac1['insured']==1)
																             {
													                        $corar=$rowfac1['quantity']*$rowfac1['unityp'];
																            $tcorar+=$corar; 
																			 }
																        if($rowfac1['insured']==0)
															                {
															             	 $notcorar=$rowfac1['quantity']*$rowfac1['unityp'];
															             	 $tnotcorar+=$notcorar; 
															                }
															   }
															   
															   elseif ($rowfac1['insurance']=='RADIANT') 
															   {
															       if($rowfac1['insured']==1)
																             {
													                        $radiant=$rowfac1['quantity']*$rowfac1['unityp'];
																            $tradiant+=$radiant; 
																			 }
																        if($rowfac1['insured']==0)
															                {
															             	 $notradiant=$rowfac1['quantity']*$rowfac1['unityp'];
															             	 $tnotradiant+=$notradiant; 
															                }
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
																  }
																
				                                          }
														  
				                                        $tmusa=$tmusa+$tnotmusa;
														
														$trama=$trama-($trama*0.85);
														$trama=$trama+$tnotrssb;
														
														$tmmi=$tmmi-($tmmi*0.85);
														$tmmi=$tmmi+$tnotmmi;
														
														
														$tmediplan=$tmediplan-($tmediplan*0.90);
														$tmediplan=$tmediplan+$tnotmediplan;
														
														$tcorar=$tcorar-($tcorar*0.90); // this percentage has to be verified
														$tcorar=$tcorar+$tnotcorar;
														
														
														$tradiant=$tradiant-($tradiant*0.90);// this percentage has to be verified
														$tradiant=$tradiant+$tnotradiant;
														
														
														
														$tcompassion=0;
														$tindigent=0;
														
														$gt=$tmusa+$trama+$tmmi+$tmediplan+$tcorar+$tradiant+$tcompassion+$tindigent+$tprive;
														echo'<td> '.$tmusa.'</td>';
												        echo'<td>'.$trama.'</td>';
														echo'<td> '.$tmmi.'</td>';
														echo'<td> '.$tmediplan.'</td>';
														
														echo'<td> '.$tcorar.'</td>';
														echo'<td> '.$tradiant.'</td>';
														
													    echo'<td> '.$tcompassion.'</td>';
										                echo'<td> '.$tindigent.'</td>';
														echo'<td> '.$tprive.'</td>';

														echo'<td> '.$gt.'</td></tr></div>';

				  
				  
				  
				  
				  
				 }

echo'<tr>';




echo'</tr>';
}

?>


</table>






</body>
</html>