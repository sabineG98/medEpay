<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<title>.::Revenues</title>

<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include('link.php');
?>

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
</head>
<body>
<div class="all_container">
<div class="show"></div>
<div class="liguini">
<div class="img1"></div>
<div class="show">
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
<div  style="width:752px; height:390px; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; position:absolute; background-color:#FFF; left: 4px; top: 35px;">
<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:200px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: -27px;"><b>TOUTES LES FACTURES</b></div>

<?php if($_SESSION['status']=='activated'){ ?>

<table width="0" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
 <form action="revenues.php" method="post">
  <tr>
    <td>Periode</td>
    <td><select name="periode">
    <?php 
    $per = "SELECT DISTINCT period  FROM orders ORDER BY time DESC";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper ) {   die('Could not get data: ' . mysqli_error($link));  }                         
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {				
    echo '<option value="'.$rowper['period'].'">'.$rowper['period'].'</option>';
	             }
    ?>
    </select>
    </td>
    <td><input class="button" type="submit" value="OK" /></td>
  </tr>
 </form>
</table>
<hr />
<?php
$defper = "SELECT DISTINCT period  FROM orders ORDER BY time DESC LIMIT 1";
        $defretvalper = mysqli_query($link, $defper);
        if(! $retvalper ){  die('Could not get data: ' . mysqli_error($link));    }                         
         while($defrowper = mysqli_fetch_array($defretvalper, MYSQLI_ASSOC))
                 {				
                    $defperiod=$defrowper['period'];
	             }
				 
				if(isset($_POST['periode']))
                     { 
				 $defperiod=$_POST['periode'];
					 }				 
    ?>

<table width="613" height="194" border="1" cellpadding="0" cellspacing="0">  
   <tr bgcolor="#AAD5FF">
    <th colspan="3"><?php echo $defperiod ?></th>   
  </tr>
  <tr bgcolor="#CCCCCC">
    <th width="36" scope="col">No</th>
    <th width="432" scope="col">DESCRIPTION</th>
    <th width="137" scope="col">MONTANT</th>
  </tr>
  <tr>
    <td>1</td>
    <td>CONSULTATION</td>
    <td>
    <?php     
    $totm=0;
					    $med1 = "SELECT SUM(total)  FROM invoice WHERE type='CONSULTATION'  AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
				                   	 $medcost=$rowmed1['SUM(total)'];					 
				                       }
					 $totm=$medcost;
    echo $totm.' FRW';
	    ?>
    </td>
  </tr>
  <tr>
    <td>2</td>
    <td>LABORATORY</td>
    <td>    
    <?php     
    $totm=0;
					    $med1 = "SELECT SUM(total)  FROM invoice WHERE type='LABORATOIRE'  AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
				                   	 $medcost=$rowmed1['SUM(total)'];					 
				                       }
					 $totm=$medcost;
    echo $totm.' FRW';
	    ?>
</td>
  </tr>
  <tr>
    <td>3</td>
    <td>MEDICAL IMAGING</td>
    <td>
    <?php     
    $totm=0;
					    $med1 = "SELECT SUM(total)  FROM invoice WHERE type='IMAGING'  AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
				                   	 $medcost=$rowmed1['SUM(total)'];					 
				                       }
					 $totm=$medcost;
    echo $totm.' FRW';
	    ?>    
    </td>
  </tr>
  <tr>
    <td>4</td>
    <td>HOSPITALISATION </td>
    <td>    
    <?php     
    $totm=0;
					    $med1 = "SELECT SUM(total)  FROM invoice WHERE type='HOSPITALISATION'  AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {					 
				                   	 $medcost=$rowmed1['SUM(total)'];
				                       }
					 $totm=$medcost;
    echo $totm.' FRW';
	    ?>
    </td>
  </tr>
  <tr>
    <td>5</td>
    <td>MEDICAMENRS INJECTABLES</td>
    <td>   
   <?php     
    $totm=0;  
					    $med1 = "SELECT SUM(total)  FROM invoice WHERE type='MEDICAMENTS INJECTAB'  AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {					 
				                   	 $medcost=$rowmed1['SUM(total)'];
				                       }
					 $totm=$medcost;
    echo $totm.' FRW';
	    ?>          
   </td>
  </tr>
  <!--<tr>
    <td>6</td>
    <td>Recettes Ambulance</td>
    <td>    
    <?php	
	$totlab=0;
$med = "SELECT DISTINCT item  FROM orders WHERE type='laboratoire' AND period='$defperiod'";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed ){ die('Could not get data: ' . mysqli_error($link)); }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $med=$rowmed['item'];
					    $med1 = "SELECT SUM(quantity), unityp  FROM orders WHERE type='ambulance' AND item='$med' AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {					 
				                   	 $medcost=$rowmed1['SUM(quantity)']*$rowmed1['unityp'];					 
				                       }
					 $totlab+=$medcost;
				 }
   echo $totlab;	
	?>      
    </td>
  </tr>  
    <tr>
    <td>8</td>
    <td>Recettes Maternité</td>
    <td>        
     <?php			
	$totlab=0;
$med = "SELECT DISTINCT item  FROM orders WHERE type='laboratoire' AND period='$defperiod'";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed ){ die('Could not get data: ' . mysqli_error($link)); }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $med=$rowmed['item'];
					    $med1 = "SELECT SUM(quantity), unityp  FROM orders WHERE type='mat' AND item='$med' AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {					 
				                   	 $medcost=$rowmed1['SUM(quantity)']*$rowmed1['unityp'];					 
				                       }
					 $totlab+=$medcost;
				 }
   echo $totlab;										
	?>               
    </td>
  </tr>  
  <tr>
    <td>7</td>
    <td>Vente d'imprimés/doc med</td>
    <td>&nbsp;</td>
  </tr>-->
<!--   <tr bgcolor="#CCCCCC">
    <th width="36" colspan="2" scope="col">TOTAL</th>
    <th width="137" scope="col"></th>
  </tr>
-->
</table>

<?php }else{ echo '<iframe style="position: absolute; border: 0px solid #09F; overflow: hidden; background-color: #FFF; left: -1px; top: -27px; width: 933px; height: 500px;" src="no.php"></iframe>'; } ?>

<br />
</div>
</div>
<div id="footer"> <center></center></div>
</div>
</body>
</html>