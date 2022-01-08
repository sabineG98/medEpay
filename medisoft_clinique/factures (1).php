<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<title>.::Toutes les Factures</title>


<?php
ini_set('memory_limit', '500M');
ini_set('max_execution_time', 300000);
?>

<?php

include('link.php');

?>


</head>

<body>


<div class="all_container">
<div class="show">

</div>


<div class="liguini">
<div class="img1">

</div>

<div class="show">
<?php  //include('clock.php')  ?>



    <div style="position:absolute;">  
      <div class="menu1"><a href="home.php"><img  style="position:absolute; left: 210px; top: -13px;" src="img/home.png"  alt="Saisie"  /></a></div>
<div class="menu1"><a href="applications.php"><img  style="position:absolute; left: 250px; top: -13px; " src="img/app.png"  /></a></div>
      <div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 280px; top: -13px; " src="img/logout.png" /></a></div>


    
    
    </div>  
     
    <!--<td><a href="factures.php">Factures</a></td>
    <td><a href="reports.php">Rapports</a></td>
    
    <td><a href="">Parametres</a></td>
    <td><a href="">Profile</a></td>-->



</div>

</div>




<div class="content" style="top:40px; height:600px;"><br /><br /><br />
<h3></h3>


<div  style=" box-shadow: 0px 0px 0px 0px #000; border: 1px solid #09F; position:absolute; background-color:#FFF; left: 4px; top: 35px;">
<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:250px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: -27px;"><b>TOUTES LES FACTURES<a href="factures_gihogwe.php"><!--....--></a></b></div>



<table width="0" style="font-size:15px; border-collapse: collapse;"  border="0" cellspacing="0" cellpadding="3">
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
$facture = "SELECT DISTINCT period FROM orders ORDER BY date DESC";
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
				  $period=$rowfac['period'];
				  echo'<td>'.$rowfac['period'].'';
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
											  
											  $tmusa=0;
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
											  
				                             $facture1 = "SELECT insurance, type, quantity,unityp FROM clients, orders WHERE clients.client_id=orders.client_id AND period='$period' AND insured=1 ";
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
																 $tmusa+=$musa; 
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
																 $tmusa+=$musa; 
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
				                                        //$tmusa=$tmusa-$tm;
														$trama=$trama-($trama*0.15);
														$tmmi=$tmmi-($tmmi*0.15);
														$tmediplan=$tmediplan-($tmediplan*0.10);
														    $tcorar=$tcorar-($tcorar*0.10);//not yet confirmed(%)
														    $tradiant=$tradiant-($tradiant*0.10);//not yet confirmed(%)
														$gt=$tmusa+$trama+$tmmi+$tmediplan+$tcorar+$tradiant+$tcompassion+$tindigent+$tprive;
														echo'<td>
														 
														 [<a href="hcbill4.php?p='.$period.'">'.$tmusa.'</a>]
														
														 [ <a href="hcbill3.php?p='.$period.'"><strong>....</strong></a>]<br>
														 (TM:'.$tm.')
														</td>';
												        echo'<td> <a href="rssbinvoice.php?p='.$period.'">'.$trama.'</a></td>';
														echo'<td> <a href="mminvoice.php?p='.$period.'">'.$tmmi.'</a></td>';
														echo'<td> <a href="mediplaninvoice.php?p='.$period.'">'.$tmediplan.'</a></td>';
														echo'<td> <a href="corarinvoice.php?p='.$period.'">'.$tcorar.'</a></td>';
														echo'<td> <a href="radiantinvoice.php?p='.$period.'">'.$tradiant.'</a></td>';
													    echo'<td> <a href="compassinvoice.php?p='.$period.'">'.$tcompassion.'</a></td>';
										                echo'<td> <a href="indigentinvoice.php?p='.$period.'">'.$tindigent.'</a></td>';
										                echo'<td> <a href="priveinvoice.php?p='.$period.'">'.$tprive.'</a></td>';

														echo'<td> '.$gt.'</td></tr></div>';



				  
				  
				  
				  
				  
				 }

echo'<tr>';




echo'</tr>';


?>

</table>







<br />
</div>
</div>
<div id="footer"> <center></center></div>

</div>


</body>
</html>