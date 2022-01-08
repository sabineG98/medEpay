<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Verification Sheet</title>
</head>

<body>



<?php 

session_start();
if(!$_SESSION['valid_pass']){
    header("Location: applications.php");
    exit;
} 

?>


<?php 
include('link.php');
$period=$_GET['period'];
$gtt=$_GET['gtt'];
$after=$_GET['after'];



?>

<table style="border-collapse:collapse; border:2px solid #000; width:50%" cellpadding="0" cellspacing="0" border="1">
  <tr style="border:2px solid #000;">
    <td style="padding-left:10px;"  colspan="5">
    <img src="img/rssb.PNG"  style="position: absolute; width: 123px; height: 62px;"/>
    <br /><br /><br /><br />
    <center>
      <div style="background-color:#CCC;"><strong>VERIFICATION SHEET RSSB/CBHI</strong></div></center>
    <table cellspacing="0" cellpadding="0">
      <col width="81" />
      <col width="100" />
      <col width="92" />
      <col width="107" />
      <col width="85" />
      <col width="68" />
      <col width="102" />
      <col width="95" />
      <tr >
        <td colspan="2" width="181">Health Facility </td>
        <td colspan="6" width="549"><?php 


	$section = "SELECT * FROM address  LIMIT 1";// get the location 
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $district=$row['district'];
					 $section1=$row['hc'];
					 echo $row['hc'];
				 }

	
	?> HC</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2">CBHI    Section</td>
        <td colspan="6"><?php 


	$section = "SELECT * FROM address  LIMIT 1";// get the location 
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $district=$row['district'];
					 $section1=$row['hc'];
					 echo $row['hc'];
				 }
	

	
	?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2">Administrative    District </td>
        <td colspan="6"><?php 


	$section = "SELECT * FROM address  LIMIT 1";// get the location 
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $district=$row['district'];
					 $section1=$row['hc'];
					 echo $row['district'];
				 }
	

	
	?></td>
      </tr>
    </table>
    <br />
    
    </td>
   
  </tr>
  <tr style="border:2px solid #000; padding-left:10px;">
    <td  style="padding-left:10px;" colspan="2">
    <table style="border-collapse:collapse;  "  border="1"cellspacing="0" cellpadding="0">
      <col width="81" />
      <col width="100" />
      <col width="92" />
      <col width="107" />
      <tr>
        <td colspan="2" width="181">Invoice number / Provider  </td>
        <td colspan="2" width="199">#</td>
      </tr>
      <tr>
        <td colspan="2">Period</td>
        
        <td colspan="2"><?php echo $period; ?></td>
      </tr>
      <tr>
        <td colspan="2">Reception    date</td>
        <td colspan="2"><?php echo date('d-m-Y') ?></td>
      </tr>
      <tr>
        <td colspan="2">Number    of Vouchers</td>
        <td colspan="2">
        
        
        <?php 


	$section = "SELECT  COUNT(orders.client_id) AS vouchers FROM orders,clients WHERE orders.client_id=clients.client_id AND clients.insurance='MUSA' AND orders.type='consultation'  AND orders.period='$period'";// get the location 
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $district=$row['vouchers'];
					 
					 echo $row['vouchers'];
				 }
				 ?>
        
        </td>
      </tr>
    </table>
    
    
    
    </td>
    <td style="padding-left:10px;"  colspan="3">
    <br /><br />
    <table cellspacing="0" style="border-collapse:collapse;" border="1" cellpadding="0">
      
      <tr>
        <td colspan="20" width="197">Amount billed              </td>
       
        <td  width="69"><?php echo $gtt; ?></td>
        <td  width="75">Rwf</td>
      </tr>
      <tr>
        <td colspan="20" >Amount    after Verification              </td>
        
        <td><?php echo $after; ?></td>
        <td>Rwf</td>
      </tr>
      <tr>
        <td colspan="20">Difference    + or -     </td>
       
        <td><?php echo $gtt-$after; ?></td>
        <td>Rwf</td>
      </tr>
      <tr>
        <td colspan="20">RRA    Taxes (3%) </td>
       
        <td><?php echo $after*0.03; ?></td>
        <td>Rwf</td>
      </tr>
      <tr>
        <td colspan="20">Medical    procedures</td>
        
        <td>
        <?php 

	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS med FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='med'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					//echo $row['med'];
					$billmed=$row['med'];
				 }
				 

				 ?>
        
        
        
         <?php 
	$dd = "SELECT  SUM( verification.amountde) AS dd FROM verification, orders WHERE verification.orders_id=orders.order_id AND orders.type='med' AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $dd);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowdd = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$ddcons=$rowdd['dd'];
				 }
				 $aftermed=$billmed-$ddcons;
				// echo $aftermed;
			
				 ?>
        <?php 

	/*$section = "SELECT  SUM( orders.unityp*orders.quantity) AS med FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type!='med'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['med'];
					$billmed=$row['med'];
				 }*/
				 
				 
				 echo $after-$aftermed;

				 ?>
        
        
        
        
        </td>
        <td>Rwf</td>
      </tr>
      <tr>
        <td colspan="20">Drugs</td>
       
        <td> <?php 

	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS med FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='med'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					//echo $row['med'];
					$billmed=$row['med'];
				 }
				 

				 ?>
        
        
        
         <?php 
	$dd = "SELECT  SUM( verification.amountde) AS dd FROM verification, orders WHERE verification.orders_id=orders.order_id AND orders.type='med' AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $dd);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowdd = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$ddcons=$rowdd['dd'];
				 }
				 $aftermed=$billmed-$ddcons;
				 echo $aftermed;
			
				 ?>
        
        </td>
        <td>Rwf</td>
      </tr>
    </table>      <br />
    

    
    
    
    </td>
  </tr>
  <tr>
   <td colspan="2"><table cellspacing="0" cellpadding="0">
     <tr>
       <td colspan="2" width="181">Amount paid  (in    figures):</td>
       <td colspan="2" width="199"><?php echo $after; ?></td>
     </tr>
   </table></td>
    <td colspan="3"><table cellspacing="0" cellpadding="0">
      <col width="102" />
      <col width="95" />
      <col width="207" />
      <col width="69" />
      <tr>
        <td colspan="4" width="473"> Amount paid (in    words):</td>
      </tr>
      <tr>
        <td></td>
        <td colspan="2">&nbsp;</td>
        <td></td>
      </tr>
    </table></td>
  </tr>
  <tr style="border:2px solid #000;">
     <td  style=" padding-left:20px;"colspan="5">
     
     <table style="border-collapse:collapse;" cellspacing="0" border="1" cellpadding="0">
     
       Observations <br /><br /><br /><br /><br /><br /><br /><br />
       Summary of verification data
       <tr>
         <td width="81">&nbsp;</td>
         <td width="100">Consultation</td>
         <td width="92">Laboratory</td>
         <td width="107">Imaging</td>
         <td width="85">Hospita-<br />
           lization</td>
         <td width="68">Acts &amp; <br />
           Materials</td>
         <td width="102">Ambulance</td>
         <td width="95">Other<br />
           Consumables</td>
         <td width="207">Drugs</td>
         <td width="69">Co-payment</td>
         <td width="">Amount after<br /> Verification</td>
       </tr>
       <tr>
         <td> Amount billed</td>
         <td>
         
         <?php 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS cons FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='consultation'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['cons'];
					$billcons=$row['cons'];
				 }
				 
				 
				 ?>
         
         
         
         
         </td>
         <td>
         
          <?php 
 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS lab FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='laboratoire'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['lab'];
					$billlab=$row['lab'];
				 }
				 
				 

				 ?>
         
         </td>
         <td>0</td>
         <td>
         
         <?php 

	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS hospi FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='hospitalisation'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['hospi'];
					$billhospi=$row['hospi'];
				 }
				 
				 

				 ?>
         
         
         </td>
         <td>
         
         
         
          <?php 
 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS soins FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='soins'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['soins'];
					$billsoins=$row['soins'];
				 }
				 
				 

				 ?>
                 
                 </td>
         <td>
         
         <?php 

	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS ambulance FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='ambulance'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['ambulance'];
					$tm0=$row['ambulance']*0.1;
					$billamb=$row['ambulance'];
				 }
				 
				 

				 ?>
         
         
         </td>
         <td>
         
          <?php 
 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS conso FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='consommable'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['conso'];
					$billconso=$row['conso'];
				 }
				 
				 

				 ?>
         
         </td>
         <td>
         
         
          <?php 

	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS med FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='med'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['med'];
					$billmed=$row['med'];
				 }
				 

				 ?>
         
         
         </td>
         <td> <?php 

	$section = "SELECT  COUNT( DISTINCT orders.client_id) AS tm1 FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='consultation'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $tm1=$row['tm1']*200;
					 echo $tm0+$tm1;
					$tms=$tm0+$tm1;
				 }
				 

				 ?></td>
         <td><?php echo $gtt; ?></td>
       </tr>
       <tr>
         <td>Amount after verification</td>
         <td>
         
         
         <?php 
	$dd = "SELECT  SUM( verification.amountde) AS dd FROM verification, orders WHERE verification.orders_id=orders.order_id AND orders.type='consultation' AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $dd);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowdd = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$ddcons=$rowdd['dd'];
				 }
				 $aftercons=$billcons-$ddcons;
				 echo $aftercons;
			
				 ?>
         
         
         
         
         
         
         </td>
         <td>
         
         <?php 
	$dd = "SELECT  SUM( verification.amountde) AS dd FROM verification, orders WHERE verification.orders_id=orders.order_id AND orders.type='laboratoire' AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $dd);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowdd = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$ddcons=$rowdd['dd'];
				 }
				 $afterlab=$billlab-$ddcons;
				 echo $afterlab;
			
				 ?>
         
         </td>
         <td>0</td>
         <td> <?php 
	$dd = "SELECT  SUM( verification.amountde) AS dd FROM verification, orders WHERE verification.orders_id=orders.order_id AND orders.type='hospitalisation' AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $dd);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowdd = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$ddcons=$rowdd['dd'];
				 }
				 $afterhospi=$billhospi-$ddcons;
				 echo $afterhospi;
			
				 ?>
                 </td>
         <td><?php 
	$dd = "SELECT  SUM( verification.amountde) AS dd FROM verification, orders WHERE verification.orders_id=orders.order_id AND orders.type='soins' AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $dd);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowdd = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$ddcons=$rowdd['dd'];
				 }
				 $aftersoins=$billsoins-$ddcons;
				 echo $aftersoins;
			
				 ?>
                 </td>
         <td>
         
         <?php 
	$dd = "SELECT  SUM( verification.amountde) AS dd FROM verification, orders WHERE verification.orders_id=orders.order_id AND orders.type='soins' AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $dd);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowdd = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$ddcons=$rowdd['dd'];
				 }
				 $afteramb=$billamb-$ddcons;
				 echo $afteramb;
			
				 ?>
         </td>
         <td><?php 
	$dd = "SELECT  SUM( verification.amountde) AS dd FROM verification, orders WHERE verification.orders_id=orders.order_id AND orders.type='consommable' AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $dd);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowdd = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$ddcons=$rowdd['dd'];
				 }
				 $afterconso=$billconso-$ddcons;
				 echo $afterconso;
			
				 ?>
                 </td>
         <td>
         <?php 
	$dd = "SELECT  SUM( verification.amountde) AS dd FROM verification, orders WHERE verification.orders_id=orders.order_id AND orders.type='med' AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $dd);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowdd = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$ddcons=$rowdd['dd'];
				 }
				 $aftermed=$billmed-$ddcons;
				 echo $aftermed;
			
				 ?>
         
         
         
         </td>
         <td>
         
         <?php 

	$section = "SELECT  COUNT( DISTINCT orders.client_id) AS tm1 FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='consultation'  AND orders.period='$period'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $tm1=$row['tm1']*200;
					 echo $tm0+$tm1;
					$tms=$tm0+$tm1;
				 }
				 

				 ?>
         </td>
         <td><?php echo $after; ?></td>
       </tr>
     </table>
     
     <br />
     
     
     </td>
     
  </tr>
    <tr>
     <td colspan="5">&nbsp;</td>
  </tr>
  <tr  style="border:2px solid #000;">
    <td><table cellspacing="0" cellpadding="0">
      <col width="42" />
      <col width="81" />
      <col width="100" />
      <col width="92" />
      <tr>
        <td colspan="2" width="123">Verified by</td>
        <td width="100">&nbsp;</td>
        <td width="92">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Date:</td>
        <td align="right">&nbsp;</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2">Signature:</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2">Names:</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4">Medical    Benefits Verification Agent / Officer                                                                                                               </td>
      </tr>
    </table></td>
    <td colspan="3"><table cellspacing="0" cellpadding="0">
      <col width="107" />
      <col width="85" />
      <col width="68" />
      <col width="102" />
      <tr>
        <td colspan="2" width="192">Approved at 1st level</td>
        <td width="68">&nbsp;</td>
        <td width="102">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">Date:</td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Signature:</td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Names:</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4">CBHI Section Manager                                                                                                               </td>
      </tr>
    </table></td>
    <td><table cellspacing="0" cellpadding="0">
      <col width="95" />
      <col width="207" />
      <tr>
        <td colspan="2" width="302">Approved at 2nd level</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td>Date:</td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td>Signature:</td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td>Names</td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2"> Branch supervisor </td>
      </tr>
    </table></td>
    
  </tr>

  <tr  style="border:2px solid #000;">
    <td colspan="3"><table cellspacing="0" cellpadding="0">
      <col width="42" />
      <col width="81" />
      <col width="100" />
      <col width="92" />
      <tr>
        <td colspan="2" width="123">Reviewed by</td>
        <td width="100">&nbsp;</td>
        <td width="92">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Date:</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2">Signature:</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2">Names:</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4">Director    of Medical Benefits Verification Unit</td>
      </tr>
    </table></td>
    <td colspan="2"><table cellspacing="0" cellpadding="0">
      <col width="102" />
      <col width="95" />
      <col width="207" />
      <tr>
        <td colspan="2" width="197">Approved by</td>
        <td width="207"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Date:</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Signature:</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Names:</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3">CBHI    Medical Benefits Division Manager</td>
      </tr>
    </table></td>
   
  </tr>
</table>

</body>
</html>