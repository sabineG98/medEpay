<?php include('head.php'); ?>
<title>.::INVOICES::.</title>
<?php include('navbar.php'); ?>
<?php ini_set('memory_limit', '500M'); ini_set('max_execution_time', 300000); ?>

<div class="container">
  <div class="col-lg-12 mt-5">
    <div style="background-color:#ECF5FF !important;width:100%;opacity:1;position:relative;box-shadow:0px 0px 0px #888;padding:2px;margin:1px 0;box-shadow:inset 5px 5px 5px rgba(0,0,0,.2);-webkit-box-shadow:inset 0 1px 4px rgba(0,0,0,.2);-webkit-border-radius:10px;border-color:#000;box-shadow:0px 0px 5px #000;height:79vh;overflow:auto;">
      <div style="position:absolute;border:0px solid #09F;overflow:hidden;background-color:#FFF;left:-1px;top:7px;width:100%;height:600px;">
	  	 <div style="position:absolute;z-index:1;border-radius:0px 200px 10px 10px;width:170px;border:1px solid #09F;height:25px;background-color:#BDF;left:4px;top:33px;color:#000;padding-left:20px;padding-top:3px;"><b>ALL INVOICES<a href="factures_gihogwe.php"><!--....--></a></b></div>
         	<div style="width:99.5%;height:90%;box-shadow:0px 0px 5px 0px #000;border:1px solid #09F;position:relative;background-color:#FFF;left:4px;top:60px;overflow:auto;">	

<?php if($_SESSION['status']=='activated'){ ?>

	<table width="1070" style="font-size:15px;color:#000;" cellspacing="0" cellpadding="3">
  <tr style="background-color:#999;border:1px solid #000;">
    <th rowspan="2" style="border:1px solid #000;">No</th>
    <th rowspan="2" style="border:1px solid #000;">MONTHS</th>
    <th colspan="6" class="text-center">INSURANCES</th>
    <th rowspan="2" style="border:1px solid #000;">TOTAL</th>
  </tr>
  <tr style="background-color:#E6E6E6;">
    <th style="border:1px solid #000;">RSSB/RAMA</th>
    <th style="border:1px solid #000;">UAP</th>
    <th style="border:1px solid #000;">SANLAM</th>
    <th style="border:1px solid #000;">MMI</th>
    <th style="border:1px solid #000;">RADIANT</th>
    <th style="border:1px solid #000;">PRIVE</th>
   </tr>
<?php 
$i=0;
//find the month
$facture = "SELECT DISTINCT period FROM orders ORDER BY date DESC";
        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac ){ die('Could not get data: ' . mysqli_error($link)); }                         
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
											  $rama=0;
											  $uap=0;
											  $mediplan=0;
											  $mmi=0;
											  $radiant=0;
											  $prive=0;											  											  
											  $trama=0;
											  $tuap=0;
											  $tmediplan=0;
											  $tmmi=0;
											  $tradiant=0;
											  $tprive=0;
											  $tm=0;
											  $gt=0;

				                             $facture1 = "SELECT insurance, total FROM invoice WHERE period='$period' AND insured=1 ";
                                             $retvalfac1 = mysqli_query($link, $facture1);
                                             if(! $retvalfac1 ) {  die('Could not get data: ' . mysqli_error($link));   }                         
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {
															//$percentage=$rowfac1['percentage']/100;			
															$insurance=$rowfac1['insurance'];	
															switch($insurance)
															{														
															case "RSSB":
															    {									    
													             $rama=$rowfac1['total']; 
																 $trama+=$rama; 
																 break;
																}
															case "UAP":
															    {
													             $uap=$rowfac1['total'];
																 $tuap+=$uap;
																 break;
																}
															case "MEDIPLAN":
															    {
													             $mediplan=$rowfac1['total'];
																 $tmediplan+=$mediplan; 
																 break;
																}
																
															case "MMI":
															    {
													             $mmi=$rowfac1['total'];
																 $tmmi+=$mmi; 
																 break;
																}
																
															case "RADIANT":
															    {
													             $radiant=$rowfac1['total'];
																 $tradiant+=$radiant; 
																 break;
																}															
														    case "PRIVE":
															      {
															      $prive=$rowfac1['total'];
																  $tprive+=$prive;
																  break;
																  }														
															 }																						
				                                          }				                                       
														//$trama=$trama-($trama*$percentage);
														//$tuap=$tuap-($tuap*$percentage);
														//$tmediplan=$tmediplan-($tmediplan*$percentage);
														$gt=$trama+$tuap+$tmediplan+$tprive;														
												        echo'<td> <a href="rssbinvoice.php?p='.$period.'">'.$trama.'</a></td>';
														echo'<td> <a href="#">'.$tuap.'</a>';														
														echo'<td> <a href="mediplaninvoice.php?p='.$period.'">'.$tmediplan.'</a></td>';
														echo'<td> <a href="mminvoice.php?p='.$period.'">'.$tmmi.'</a>';
														echo'<td> <a href="radiantinvoice.php?p='.$period.'">'.$tradiant.'</a>';
													    echo'<td> <a href="priveinvoice.php?p='.$period.'">'.$tprive.'</a></td>';
														echo'<td> '.$gt.'</td></tr></div>';				  				  				  				  				  
				 }
echo'<tr>';
echo'</tr>';
?>
</table>

<?php }else{ echo '<iframe style="position: absolute; border: 0px solid #09F; overflow: hidden; background-color: #FFF; left: -1px; top: 20px; width: 933px; height: 500px;" src="no.php"></iframe>'; } ?>

<br />
</div>
</div>
</div>
</div>
</div>
<?php include('foot.php'); ?>