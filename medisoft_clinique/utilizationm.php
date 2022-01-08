<?php include('link.php'); ?>

<?php 

session_start();
if(!$_SESSION['valid_pass']){
    header("Location: applications.php");
    exit;
} 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CBHI-Utilization of Medical Services</title>
</head>

<body>
<div style="height:30px; width:100%; left:0px; top:0px;  background-color:#666; position:fixed;">





<table width="0" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
 <form action="utilizationm.php" method="post">
  <tr>
    <td>Periode:&nbsp;&nbsp;&nbsp; Du</td>
    <td><input type="date" value="<?php echo date('Y-m-d') ?>" name="p1">
    
    &nbsp;&nbsp;Au
    <input type="date" value="<?php echo date('Y-m-d') ?>" name="p2">
    </td>
    <td><input type="submit" value="OK" /></td>
    <td><a href="cbhi.php">Dashboard</a></td>
  </tr>
 </form>
</table>

</div>

<br />

<br />

<font size="+2">
<?php
if(isset($_POST['p1'])&&($_POST['p2']))
{
	
      $p1=$_POST['p1']; 
	  $p2=$_POST['p2'];
	  
echo'<strong>From </strong>'. $p1.' <strong>To </strong>';
echo $p2;
}

?>
</font>





<table cellspacing="0" border="1" style="border-collapse:collapse; font-size:13px;" cellpadding="0">
  <col width="59" span="2" />
  <col width="184" />
  <col width="79" span="3" />
  <col width="75" span="3" />
  <col width="110" />
  <col width="79" />
  <col width="114" />
  <col width="86" />
  <col width="114" />
  <col width="77" />
  <col width="108" span="3" />
  <col width="102" />
  <col width="156" />
  <col width="114" />
  <col width="114" />
  <col width="125" />
  <col width="114" />
  <col width="159" />
  <col width="64" span="5" />
  <tr>
    <td rowspan="3" width="59">No</td>
    <td rowspan="3" width="59">PERIOD</td>
    <td rowspan="3" bgcolor="#DFDFDF" width="184">HEALTH FACILITY</td>
    <td colspan="7" bgcolor="#FFCECE" width="572">NUMBER    OF PATIENTS FREQUENTING HEALTH FACILITIES</td>
    <td colspan="9" width="896">SPECIAL CASES TO BE    REPORTED</td>
    <td colspan="11"  bgcolor="#FFEAD5" width="1102">ESTIMATED COST OF MEDICAL BENEFITS TO CBHI MEMBERS</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FFCECE" width="237">Number of<br />
      Out Patients <br />
      /<br />
      Nombre de <br />
      Patients Ambulants</td>
    <td colspan="3" bgcolor="#FFCECE" width="225">Number of<br />
      In Patients <br />
      /<br />
      Nombre de<br />
      Patients Hospitalisés</td>
    <td rowspan="1" bgcolor="#FFCECE" width="110">Total    Number of<br />
      Patients  (Out patients &amp; In    patients)<br />
      /<br />
      Nombre Total de<br />
      Patients (Ambulants &amp; Hospitalisés)</td>
    <td rowspan="2" bgcolor="#D5FFD5" width="79">Number of    Indigents<br />
      /<br />
      Nombre d'Indigents</td>
    <td rowspan="2" bgcolor="#D5FFD5" width="114"><br />
      Total Cost of Medical Benefits related Indigents<br />
      /<br />
      Coût Total des Prestations Médicales relatif aux Indigents</td>
    <td rowspan="2" bgcolor="#D5FFD5" width="86">Number of    Indigents who didn't pay Co-payment<br />
      /<br />
      Nombre d'Indigents qui n'ont pas payé le Ticket Modérateur</td>
    <td rowspan="2" bgcolor="#D5FFD5"  width="114"><br />
      Co-payment not paid by Indigents <br />
      /<br />
      Ticket Modérateur non payé par les Indigents</td>
    <td rowspan="2" bgcolor="#FFFF00" width="77">Number    of Prisoners<br />
      /<br />
      Nombre de Prisonniers</td>
    <td rowspan="2" bgcolor="#FFFF00" width="108">Total    Cost of Medical Benefits related Prisoners<br />
      /<br />
      Coût Total des Prestations Médicales relatif aux Prisoniers</td>
    <td rowspan="2" bgcolor="#FFCB97" width="108">Number    of Transfer Cases<br />
      /<br />
      Nombre de Cas Transférés </td>
    <td rowspan="2" bgcolor="#C7C7E2" width="108">Number of CT Scan    Cases <br />
      /<br />
      Nombre de Cas de Scanner </td>
    <td rowspan="2" bgcolor="#C7C7E2" width="102">Total Cost of CT    Scan<br />
      /<br />
      Coût Total Scanner</td>
    <td rowspan="2" bgcolor="#FFEAD5" width="156"><br />
      Cost of Consultation<br />
      /<br />
      Montant Consultation   <br />
      <br />
      100%</td>
    <td rowspan="2" bgcolor="#FFEAD5" width="114"><br />
      Cost of Laboratory Tests<br />
      /<br />
      Montant Examen de Laboratoire   <br />
      <br />
      100%</td>
    <td rowspan="2" bgcolor="#FFEAD5" width="114"><br />
      Cost of Medical Imaging<br />
      /<br />
      Montant Imagerie Medicale   <br />
      <br />
      100%</td>
    <td rowspan="2" bgcolor="#FFEAD5" width="125"><br />
      Cost of Hospitalization<br />
      /<br />
      Montant Hospitalisation   <br />
      <br />
      <br />
      100%</td>
    <td rowspan="2" bgcolor="#FFEAD5" width="114"><br />
      Cost of Medical Procedures &amp; Materials<br />
      /<br />
      Montant Actes &amp; Consommables Médicaux   <br />
      <br />
      100%</td>
    <td rowspan="2" bgcolor="#FFEAD5" width="159"><br />
      <br />
      <br />
      <br />
      Ambulance  <br />
      <br />
      <br />
      <br />
      100%</td>
    <td rowspan="2" bgcolor="#FFEAD5" width="64"><br />
      Cost of Other Consummables<br />
      /<br />
      Montant Autres Consommables Médicaux   <br />
      <br />
      100%</td>
    <td rowspan="2" bgcolor="#FFEAD5" width="64"><br />
      <br />
      <br />
      Cost of Drugs<br />
      /<br />
      Montant Médicaments   <br />
      <br />
      100%</td>
    <td rowspan="2" bgcolor="#FFEAD5" width="64"><br />
      <br />
      <br />
      <br />
      Total Cost<br />
      /<br />
      Coût Total  <br />
      <br />
      100%</td>
    <td rowspan="2" bgcolor="#FFEAD5" width="64">Total    Cost<br />
      Co-payment  <br />
      /<br />
      Coût Total Ticket Moderateur<br /></td>
    <td rowspan="2" bgcolor="#FFEAD5" width="64"><br />
      Total Estimated Cost of Medical Benefits<br />
      / <br />
      Coût Total Estimatif des Prestations <br />
      =<br />
      Total Cost 100% - <br />
      Total Ticket Moderateur</td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td>Z</td>
    <td>HZ</td>
    <td>HD</td>
    <td>Z</td>
    <td>HZ</td>
    <td>HD</td>
    <td></td>
    
  </tr>
  <tr>
    <td>1</td>
    <td>
    
    <?php
if(isset($_POST['p1'])&&($_POST['p2']))
{
	
      $p1=$_POST['p1']; 
	  $p2=$_POST['p2'];
	  
echo''. $p1.' <strong>-</strong>';
echo $p2;
}

?>
    
    
    </td>
    <td>
    <?php 

if(isset($_POST['p1'])&&($_POST['p2']))
{
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
	
}
	
	?>
    
    
    
    
    </td>
    <td>
     <?php
	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$zone1 = "SELECT COUNT(orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND clients.section='$section1' AND orders.type='consultation' AND orders.date BETWEEN '$p1' AND '$p2'  AND clients.insurance='MUSA'";// get the zone numbers
        $retval = mysqli_query($link, $zone1);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
					$zone=$row['zone'];
				 }
	
}
	
	?>
    
    
    </td>
    <td>  <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT DISTINCT COUNT(orders.client_id) AS zone1 FROM orders,clients WHERE orders.client_id=clients.client_id AND clients.section!='$section1' AND orders.type='consultation' AND clients.district='$district'  AND orders.date BETWEEN '$p1' AND '$p2'  AND clients.insurance='MUSA'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					//echo $row['zone1'];
					$zonetest=$row['zone1'];
					echo $zonetest;
				 }
				 
				 
}
				 ?>
                 </td>
    <td>
    <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT DISTINCT COUNT(orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.district!='$district' AND orders.type='consultation'  AND orders.date BETWEEN '$p1' AND '$p2'  AND clients.insurance='MUSA'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
					$zone2=$row['zone'];
				 }
				 
				 
}
				 ?>
    
    </td>
    <td>
    
    <?php
	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$zone1 = "SELECT COUNT( orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND clients.section='$section1' AND orders.type='hospitalisation' AND orders.date BETWEEN '$p1' AND '$p2'  AND clients.insurance='MUSA'";// get the zone numbers
        $retval = mysqli_query($link, $zone1);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
					$zone3=$row['zone'];
				 }
	
}
	
	?>
    
    
    </td>
    <td>
    
    <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT DISTINCT COUNT(orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND clients.section!='$section1' AND clients.district='$district'  AND orders.type='hospitalisation' AND orders.date BETWEEN '$p1' AND '$p2'  AND clients.insurance='MUSA'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
					$zone4=$row['zone'];
				 }
				 
				 
}
				 ?>
    
    
    
    </td>
    <td>
    
    
         <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT DISTINCT COUNT(orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.district!='$district' AND orders.type='hospitalisation'  AND orders.date BETWEEN '$p1' AND '$p2'  AND clients.insurance='MUSA'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
					$zone5=$row['zone'];
				 }
				 
				 
}
				 ?>
    
    </td>
    <td><?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT COUNT(orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND   orders.type='consultation' AND orders.date BETWEEN '$p1' AND '$p2' AND clients.insurance='MUSA'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					//echo $row['zone']+$zone3+$zone4+$zone5;
					
					//$zone5=$row['zone'];
				 }
				 
				 $tz=$zone+$zonetest+$zone2+$zone3+$zone4+$zone5;
				 echo $tz;
}
				 ?>
    
    
    
    </td>
    <td> <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  COUNT( DISTINCT orders.client_id) AS indigent FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND clients.categorie='1'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['indigent'];
				 }
				 
				 
}
				 ?>
                 </td>
    <td>
	<?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS indigent FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND clients.categorie='1'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['indigent'];
				 }
				 
				 
}
				 ?>
                 
         </td>
    <td>
    
    <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  COUNT(id) AS indi FROM indigents WHERE categorie=1 OR categorie=2  AND date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 { 
				    
					echo $row['indi'];
				     $in=$row['indi']*200;
				 }
				 
				 
}
				 ?>
    
    
    </td>
    <td><?php if(isset($_POST['p1'])&&($_POST['p2'])) echo $in;    ?></td>
    <td>0</td>
    <td>0</td>
    <td>
    
    <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  COUNT(orders.type) AS transfers FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='ambulance' AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['transfers'];
				 }
				 
				 
}
				 ?>
    
    
    
    </td>
    <td>0</td>
    <td>0</td>
    <td>
    
    <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS cons FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='consultation'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['cons'];
				 }
				 
				 
}
				 ?>
    
    
    
    
    </td>
    <td>
    
     <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS lab FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='laboratoire'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['lab'];
				 }
				 
				 
}
				 ?>
    
    
    
    </td>
    <td>0</td>
    <td>  <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS hospi FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='hospitalisation'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['hospi'];
				 }
				 
				 
}
				 ?></td>
    <td>
     <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS soins FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='soins'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['soins'];
				 }
				 
				 
}
				 ?>
    
    
    
    </td>
    <td>
    
    
     <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS ambulance FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='ambulance'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['ambulance'];
					$tm0=$row['ambulance']*0.1;
				 }
				 
				 
}
				 ?>
    
    
    
    </td>
    <td>
    <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS conso FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='consommable'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['conso'];
				 }
				 
				 
}
				 ?>
    
    
    </td>
    <td>
    <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS med FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='med'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['med'];
				 }
				 
				 
}
				 ?>
    
    
    </td>
    <td>
    
     <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  SUM( orders.unityp*orders.quantity) AS total FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND  orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $total=$row['total'];
					echo $row['total'];
				 }
				 
				 
}
				 ?>
    
    
    
     </td>
    <td>
    
    <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT  COUNT( DISTINCT orders.client_id) AS tm1 FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.insurance='MUSA' AND orders.type='consultation'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
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
				 
				 
}
				 ?>
    
    </td>
    <td> <?php
	
		 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	echo $total-$tms;
	
}
	?>
    
    </td>
  </tr>
</table>
</body>
</html>