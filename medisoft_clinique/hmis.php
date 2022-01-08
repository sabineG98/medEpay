<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />

<!--popup iframe settings -->
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />

  
   
   
<title>.::RAPPORTS</title>

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

input, select{border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;}
</style>



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




<div class="content"><br /><br /><br />
<h3></h3>


<div  style=" box-shadow: 0px 0px 1px 0px #000; border: 1px solid #09F; position:absolute; background-color:#FFF; left: 4px; top: 35px;">
<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:200px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: -27px;"><table width="0" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
 <form action="hmis.php" method="post">
  <tr>
    <td>Periode</td>
    <td><select name="periode">
    <?php 
    $per = "SELECT DISTINCT period  FROM orders ORDER BY time DESC LIMIT 12";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				
    echo '<option value="'.$rowper['period'].'">'.$rowper['period'].'</option>';
	             }
    ?>
    </select>
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>
 </form>
</table></div>

<br />

<table  width="0" border="1" cellspacing="0" cellpadding="3">
  <tr  style="background-color:#CCC;">
    <th rowspan="2">No</th>
    <th rowspan="2">MOIS</th>
    <th colspan="4">INDICATEURS</th>
  </tr>
  <tr style="background-color:#E6E6E6;">
      <th>OPD-#des cas de consultations</th>

    <th>#des hospitalisés</th>
    <th>#des accouchements</th>
    <th>#des cas de paludisme<br />(patients qui ont consommé les coartems)</th>

   </tr>
<?php 

if(isset($_POST['periode']))
                     {
						 $period=$_POST['periode'];
						 
					 }
					 else
					 {
						 $period=date('M-Y');
						 
					 }


$i=0;

//find the month
$facture = "SELECT DISTINCT period FROM orders WHERE period='$period' ORDER BY date DESC LIMIT 1";
        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 $i++;
				  echo '<tr class="tr"><td>'.$i.'</td>';
				  $period=$rowfac['period'];
				  echo'<td>'.$rowfac['period'].'';
				                              //find wht i need about the month found
											  $cons=0;
											  $hospi=0;
											  $acc=0;
											  $palu=0;
											  $compassion=0;
											  $indigent=0;
											  $prive=0;
											  
											  $tmusa=0;
											  $trama=0;
											  $tmmi=0;
											  $tmediplan=0;
											  $tcompassion=0;
											  $tindigent=0;
											  $tprive=0;
											  $gt=0;
											  
				                             $facture1 = "SELECT * FROM orders WHERE period='$period' ";
                                             $retvalfac1 = mysqli_query($link, $facture1);
                                             if(! $retvalfac1 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {
															
															$insurance=$rowfac1['type'];
															
															switch($insurance)
															{
															case "consultation":
															    {
																 $cons++;
																 break;	
																}
															case "hospitalisation":
															    {									    
													             $hospi++; 
																 break;
																}
															case "%acc":
															    {
													             $acc++;
																 break;
																}
															case "MEDIPLAN":
															    {
													             $mediplan=$rowfac1['quantity']*$rowfac1['unityp'];
																 $tmediplan+=$mediplan; 
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
														    case "INDIGENT":
															      {
															      $prive=$rowfac1['quantity']*$rowfac1['unityp'];
																  $tprive+=$prive;
																  break;
																  }
																
															// default:
                                                            // echo "error:WRONG MONTH";													
															 
															 }
															 $acc2=$rowfac1['item'];
															 $acc1 =mb_substr($acc2, 0, 3);

															
															if ($acc1=="Acc")
															     $acc++;
																 
																										
															if ($acc1=="COA")
															     $palu++;
																 
															
															
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
				                                        
														
														echo'<td> '.$cons.'</td>';
														?>
												        <td> <?php echo $hospi?></td>
                                                        
                                                        <td> <a href="hospit.php?period=<?php echo $period ?>" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )"><?php echo $acc?>...</a></td>
                                                        <?php
														//echo'<td> '.$acc.'</td>';
														echo'<td> '.$palu.'</td>';




				  
				  
				  
				  
				  
				 }

echo'<tr>';




echo'</tr>';


?>

</table>

<?php
$m0_5=0;
$m5_19=0;
$m20=0;
$f0_5=0;
$f5_19=0;
$f20=0;
$age=date('Y');

//$period='August-2017';
?>




<p>&nbsp;</p>
<table border="1" cellspacing="0" cellpadding="0" width="735">
  <tr>
    <td width="90" rowspan="2" valign="top">&nbsp;  </td>
    <td width="72" colspan="2" valign="top"> &lt;5 yr/ans </td>
    <td width="84" colspan="2" valign="top"> &gt;=5 – 19yr/ans </td>
    <td width="102" colspan="2" valign="top"> &gt;=20 year/ans </td>
  </tr>
  <tr>
    <td width="36" valign="top"> M </td>
    <td width="36" valign="top"> F </td>
    <td width="36" valign="top"> M </td>
    <td width="48" valign="top"> F </td>
    <td width="55" valign="top"> M </td>
    <td width="47" valign="top"> F </td>
  </tr>
  <tr>
    <td width="90" valign="top"> 1. New cases / Nouveaux cas  </td>
    <td width="36" valign="top">
    
    <?php
$facture = "SELECT COUNT(clients.sex) AS m0_5 FROM clients, orders WHERE clients.client_id=orders.client_id AND clients.sex='M' AND $age-age<5 AND orders.type='consultation' AND orders.period='$period'";

        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 echo $rowfac['m0_5'];
				 }
?> 
    
    </td>
    <td width="36" valign="top">
    
    <?php
$facture = "SELECT COUNT(clients.sex) AS m0_5 FROM clients, orders WHERE clients.client_id=orders.client_id AND clients.sex='F' AND $age-age<5 AND orders.type='consultation' AND orders.period='$period'";

        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 echo $rowfac['m0_5'];
				 }
?> 
    
    
    
    </td>
    <td width="36" valign="top"> <?php
$facture = "SELECT COUNT(clients.sex) AS m0_5 FROM clients, orders WHERE clients.client_id=orders.client_id AND clients.sex='M' AND $age-age>=5 AND $age-age<19 AND orders.type='consultation' AND orders.period='$period'";

        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 echo $rowfac['m0_5'];
				 }
?> </td>
    <td width="48" valign="top">
    
    <?php
$facture = "SELECT COUNT(clients.sex) AS m0_5 FROM clients, orders WHERE clients.client_id=orders.client_id AND clients.sex='F' AND $age-age>=5 AND $age-age<19 AND orders.type='consultation' AND orders.period='$period'";

        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 echo $rowfac['m0_5'];
				 }
?>
    
    
    
    
    </td>
    <td width="55" valign="top"> <?php
$facture = "SELECT COUNT(clients.sex) AS m0_5 FROM clients, orders WHERE clients.client_id=orders.client_id AND clients.sex='M' AND $age-age>=20 AND orders.type='consultation' AND orders.period='$period'";

        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 echo $rowfac['m0_5'];
				 }
?> </td>
    <td width="47" valign="top"> 
    
    
    <?php
$facture = "SELECT COUNT(clients.sex) AS m0_5 FROM clients, orders WHERE clients.client_id=orders.client_id AND clients.sex='F' AND $age-age>=20 AND orders.type='consultation' AND orders.period='$period'";

        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 echo $rowfac['m0_5'];
				 }
?>
    
    
    
    
     </td>
  </tr>
  <tr>
    <td width="90" valign="top"> 2. Old cases / Anciens cas  </td>
    <td width="36" valign="top">-</td>
    <td width="36" valign="top">-</td>
    <td width="36" valign="top">-</td>
    <td width="48" valign="top">-</td>
    <td width="55" valign="top">-</td>
    <td width="47" valign="top">-</td>
  </tr>
</table>

 &nbsp; 

  &nbsp; 
 <table border="1" cellspacing="0" cellpadding="0" width="732">
   <tr>
     <td width="287" valign="top"> <strong>D) Origin of outpatients / D)    Origine des Patients Ambulatoires (OPD)</strong> </td>
     <td width="74" valign="top"> Total  </td>
   </tr>
   <tr>
     <td width="287" valign="top"> 1. New cases) / Nouveaux cas (<strong>ZONE</strong>) </td>
     <td width="74" valign="top">
     
     <?php
$facture = "SELECT COUNT(clients.department_aff) AS m0_5 FROM clients, orders WHERE clients.client_id=orders.client_id  AND  clients.department_aff='Z' AND orders.type='consultation' AND orders.period='$period'";

        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 echo $rowfac['m0_5'];
				 }
?>
     
     
     
     
     
     </td>
   </tr>
   <tr>
     <td width="287" valign="top"> 2. New cases / Nouveaux cas (<strong>HORS ZONE</strong>) </td>
     <td width="74" valign="top"><?php
$facture = "SELECT COUNT(clients.department_aff) AS m0_5 FROM clients, orders WHERE clients.client_id=orders.client_id  AND  clients.department_aff='HZ' AND orders.type='consultation' AND orders.period='$period'";

        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 echo $rowfac['m0_5'];
				 }
?></td>
   </tr>
   <tr>
     <td width="287" valign="top"> 3.  New cases / Nouveaux cas (<strong>HORS DISTRICT</strong>) </td>
     <td width="74" valign="top"><?php
$facture = "SELECT COUNT(clients.department_aff) AS m0_5 FROM clients, orders WHERE clients.client_id=orders.client_id  AND  clients.department_aff='HD' AND orders.type='consultation' AND orders.period='$period'";

        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 echo $rowfac['m0_5'];
				 }
?></td>
   </tr>
 </table>
 <br />
  


</div>
</div>
<div id="footer"> <center></center></div>

</div>


	



</body>
</html>