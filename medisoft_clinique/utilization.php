<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CBHI-Utilization of Medical Services</title>
<style>

.rotation  {           
          
           
            -ms-transform: rotate(7deg); /* IE 9 */
    -webkit-transform: rotate(7deg); /* Chrome, Safari, Opera */
    transform: rotate(7deg);

}
</style>
</head>
<?php  include ('link.php');?>

<?php 

session_start();
if(!$_SESSION['valid_pass']){
    header("Location: applications.php");
    exit;
} 

?>





<body>

<div style="height:30px; width:100%; left:0px; top:0px;  background-color:#666; position:fixed;">





<table width="0" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
 <form action="utilization.php" method="post">
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
  <col width="64" span="19" />
  <tr>
    <td rowspan="3" width="64">No</td>
    <td rowspan="3"   bgcolor="#DFDFDF" width="64">HEALTH FACILITY</td>
    <td colspan="6" bgcolor="#FFCECE" width="384"> <font color="#FF0000">NUMBER    OF PATIENTS FREQUENTING HEALTH FACILITIES</font></td>
    <td colspan="5" width="320">SPECIAL CASES TO BE REPORTED</td>
    <td colspan="6" bgcolor="#FFCECE" width="384">ESTIMATED COST OF MEDICAL BENEFITS TO CBHI MEMBERS</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FFCECE" width="192">Number of<br />
      Out Patients <br /></td>
    <td colspan="3" bgcolor="#FFCECE" width="192">Number of<br />
      In Patients <br /></td>
    <td rowspan="2" bgcolor="#D5FFD5" align="right" width="64">Number    of Indigents<br /></td>
    <td rowspan="2" align="right" bgcolor="#D5FFD5" width="64">Cost of Medical Benefits related Indigents<br /></td>
    <td rowspan="2" align="right" bgcolor="#FFFF00" width="64">Number of Prisoners<br /></td>
    <td rowspan="2" align="right" bgcolor="#FFFF00" width="64">Cost of Medical Benefits related Prisoners<br /></td>
    <td rowspan="2" align="right"  bgcolor="#FFCB97"  width="64">Number of Transfer Cases<br /></td>
    <td rowspan="2" bgcolor="#FFCECE" width="64">Cost of Medical Procedures &amp; Materials 100%</td>
    <td rowspan="2" bgcolor="#FFCECE" width="64">Cost    of Drugs 100%</td>
    <td rowspan="2" bgcolor="#FFCECE" width="64">Ambulance    100%</td>
    <td rowspan="2" bgcolor="#FFCECE" width="64">Total Cost 100%</td>
    <td rowspan="2" bgcolor="#FFCECE" width="64">Total Cost<br />
      Co-payment  <br />
      <br /></td>
    <td rowspan="2" bgcolor="#FFCECE" width="64">Total    Estimated Cost of Medical Benefits = Total Cost 100% - <br />
      Total Ticket Moderateur</td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td>Z</td>
    <td>HZ</td>
    <td>HD</td>
    <td>Z</td>
    <td>HZ</td>
    <td>HD</td>
    
  </tr>
  <tr  bgcolor="#BFBFBF">
    <td>1</td>
    <td align="right">
    
    <?php 

if(isset($_POST['p1'])&&($_POST['p2']))
{
	$section = "SELECT * FROM location  LIMIT 1";// get the location 
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $district=$row['district'];
					 $section1=$row['section'];
					 echo $row['section'];
				 }
	
}
	
	?>
    
    
    
    
    </td>
    <td align="right">
    
     <?php
	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$zone1 = "SELECT COUNT( DISTINCT orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND clients.section='$section1' AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $zone1);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
				 }
	
}
	
	?>
    </td>
    <td align="right">
    
   
    
     <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT DISTINCT COUNT( DISTINCT orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND clients.section!='$section1' AND clients.district='$district'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
				 }
				 
				 
}
				 ?>
    
    
    
    
    
    </td>
    <td align="right">
    
    <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT DISTINCT COUNT( DISTINCT orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.district!='$district'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
				 }
				 
				 
}
				 ?>
    
    
    
    
    
    
    </td>
    <td align="right"> <?php
	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$zone1 = "SELECT COUNT( DISTINCT orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND clients.section='$section1' AND orders.type='hospitalisation' AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $zone1);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
				 }
	
}
	
	?></td>
    <td align="right">
     <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT DISTINCT COUNT( DISTINCT orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND clients.section!='$section1' AND clients.district='$district'  AND orders.type='hospitalisation' AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
				 }
				 
				 
}
				 ?></td>
    <td align="right">
     <?php 
	 	 if(isset($_POST['p1'])&&($_POST['p2']))
{ 
	$section = "SELECT DISTINCT COUNT( DISTINCT orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND  clients.district!='$district' AND orders.type='hospitalisation'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
				 }
				 
				 
}
				 ?>
    
    
    
    </td>
    <td align="right">
    
     <?php 
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
    <td align="right">
    
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
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">
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
    <td align="right">
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
    <td align="right"> <?php 
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
				 ?></td>
    <td align="right">
    
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
    <td align="right">
    
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
    <td align="right">
     
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
    <td align="right">
    
    <?php
	
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