<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facture MMI</title>
</head>
<?php
ini_set('memory_limit', '500M');
ini_set('max_execution_time', 30000);
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
include('link.php');
$period=$_GET['p'];
?>
<body>
<br />
<table style="font-size:13px; border-collapse: collapse;" widtd ="0" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <th  bgcolor="#CCCCCC" colspan="20">RELEVE DE FACTURES A L'ASSURANCE MALADIE DES MILITAIRES (MMI)</th>
  </tr>
  <tr bgcolor="#E5E5E5">
    <td  scope="col">No</td >
    <td  scope="col">CODE</td >
    <td  scope="col">DATE</td >
    <td  scope="col">No DE FEUILLE DE PRISE EN CHARGE</td >
    <td  scope="col">No D'AFFILIATION</td >
    <td  scope="col">NOM ET PRENOM ADHERENT </td >
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
    <td  scope="col">15%</td >
    <td  scope="col">85%</td >
  </tr>  
  <?php
  $i=0;
  $gtcons=0;
  $gtlab=0;
  $gtimg=0;
  $gthosp=0;
  $gtacts=0;
  $gtambu=0;
  $gtconso=0;
  $gtmed=0;
  $ggt=0;
  $gass1=0;
  $gass=0;
$med = "SELECT DISTINCT date FROM orders ORDER BY date ASC";// get the date 
        $retvalmed = mysqli_query($link,$med,$link);
        if(! $retvalmed )
           {  die('Could not get data: ' . mysql_error($link));  }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					$dat=$rowmed['date'];																  
   $facture1 = "SELECT DISTINCT client_id, date FROM orders WHERE period='$period' AND date='$dat' AND insured=1 ";
                                             $retvalfac1 = mysqli_query($link,$facture1,$link);
                                             if(! $retvalfac1 )
                                              {  die('Could not get data: ' . mysql_error($link));   }                         
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {														
											 $cid=$rowfac1['client_id'];
											 $odate=$rowfac1['date'];											                      																					
											 $facture2 = "SELECT* FROM clients WHERE client_id=$cid AND insurance='MMI' ";
                                             $retvalfac2 = mysqli_query($link,$facture2,$link);
                                             if(! $retvalfac2 )
                                              {  die('Could not get data: ' . mysql_error($link));     }                        
                                                 while($rowfac2 = mysqli_fetch_array($retvalfac2, MYSQLI_ASSOC))
                                                        {																																																								
															$i++;
															$code=$rowfac2['client_id'];
															//$categorie=$rowfac2['categorie'];															
													       echo'<td>'.$i.'</td>';
														   echo'<td>'.$cid.'</td>';
											               echo'<td>'.$odate.'</td>';
												           echo'<td>'.$rowfac2['matricule'].'&nbsp</td>';
														   echo'<td>'.$rowfac2['insurance_code'].'&nbsp</td>';
														   echo'<td>'.$rowfac2['adherent'].'&nbsp</td>';
														   echo'<td>'.$rowfac2['beneficiary'].'</td>';
														          $cons=0;
																  $lab=0;
																  $img=0;
																  $hosp=0;
																  $acts=0;
																  $ambu=0;
																  $conso=0;
																  $med=0;																  
																  $tcons=0;
																  $tlab=0;
																  $timg=0;
																  $thosp=0;
																  $tacts=0;
																  $tambu=0;
																  $tconso=0;
																  $tmed=0;
																  $gt=0;
																  $ass=0;
																  $assurance=0;																  																//$facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND date='$dat' AND insured=1";
$facture = "SELECT * FROM invoice WHERE client_id=$code AND period='$period' AND date='$dat' AND insured=1";																
$retvalfac = mysqli_query($link,$facture,$link);
if(! $retvalfac )
	{ die('Could not get data: ' . mysql_error($link)); }    
while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
		{						
		if ($rowfac['type']=='consultation')	
			  {				
				$tcons+=$rowfac['total'];				
			  }
		elseif ($rowfac['type']=='laboratoire')	
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
$gt=$tcons+$tlab+$timg+$thosp+$tacts+$tambu+$tconso+$tmed;
$ass=$gt*85/100;	
$ass1=$gt*15/100;//TM
/*if($categorie>0)
{
$assurance=100-$categorie;
$ass=$gt*$assurance/100;
}*/
$gtcons+=$tcons;
$gtlab+=$tlab;
$gtimg+=$timg;
$gthosp+=$thosp;
$gtacts+=$tacts;
$gtambu+=$tambu;
$gtconso+=$tconso;
$gtmed+=$tmed;
$ggt+=$gt;
$gass+=$ass;
$gass1+=$ass1;//TM
echo'<td>'.$tcons.'</td>';
echo'<td>'.$tlab.'</td>';
echo'<td>'.$timg.'</td>';
echo'<td>'.$thosp.'</td>';
echo'<td>'.$tacts.'</td>';
echo'<td>'.$tambu.'</td>';
echo'<td>'.$tconso.'</td>';
echo'<td>'.$tmed.'</td>';
echo'<td>'.$gt.'</td>';
//echo'<td>='.$tcons.'+'.$tlab.'+'.$timg.'+'.$thosp.'+'.$tacts.'+'.$tconso.'+'.$tmed.'</td>';
echo'<td>'.$ass1.'</td>';//TM
echo'<td>'.$ass.'</td></tr>';																										
}
}
}    
  ?>      
  <tr>
    <td bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
    <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>    
    <strong><td><?php echo $gtcons ?></td>
    <td><?php echo $gtlab ?></td>
    <td><?php echo $gtimg ?></td>
    <td><?php echo $gthosp ?></td>
    <td><?php echo $gtacts ?></td>
    <td><?php echo $gtambu ?></td>
    <td><?php echo $gtconso ?></td>
    <td><?php echo $gtmed ?></td>
    <td><?php echo $ggt ?></td>
    <td><?php echo $gass1 ?></td><!--TM-->
    <td> <?php echo $gass ?></td></strong>
  </tr>
   <?php $grand=$gtcons+$gtlab+$gtimg+$gthosp+$gtacts+$gtconso; $grandmed=$gtmed;  ?>
</table>
</body>
</html>