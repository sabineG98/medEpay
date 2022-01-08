

<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
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
      <div class="menu1"><a href="home.php"><img  style="position:absolute; left: 207px; top: -18px; width: 49px; height: 37px;" src="img/hm.png" width="120" alt="Saisie" height="42" /></a></div>
      <div class="menu1"><a href="applications.php"><img  style="position:absolute; left: 269px; top: -13px; width: 96px; height: 28px;" src="img/appp.JPG" width="120" height="42" /></a></div>
      <div class="menu1"><a href="applications.php"><img  style="position:absolute; left: 381px; top: -12px; width: 49px; height: 28px;" src="img/pro.png" width="120" height="42" /></a></div>

    
    
    </div>  
     
    <!--<td><a href="factures.php">Factures</a></td>
    <td><a href="reports.php">Rapports</a></td>
    
    <td><a href="">Parametres</a></td>
    <td><a href="">Profile</a></td>-->



</div>

</div>




<div class="content"><br /><br /><br />

<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:350px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: 7px;"><b>CONSOMMATIONS DES MEDICAMENTS</b></div>

<div  style="width:752px; height:440px; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; overflow:auto; position:absolute; background-color:#FFF; left: 4px; top: 35px;">




<table width="0" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
 <form action="medecines.php" method="post">
  <tr>
    <td>Periode</td>
    <td><select name="periode">
    <?php 
    $per = "SELECT DISTINCT period  FROM orders ORDER BY time DESC";
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
    <td><input type="submit" value="OK" /></td>
  </tr>
 </form>
</table>
<hr />

<?php
$defper = "SELECT DISTINCT period  FROM orders ORDER BY time DESC LIMIT 1";
        $defretvalper = mysqli_query($link, $defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($defretvalper, MYSQLI_ASSOC))
                 {
				
                    $defperiod=$defrowper['period'];
	             }
				 
				if(isset($_POST['periode']))
                     { 
				 $defperiod=$_POST['periode'];
					 }
				 
    ?>
<table width="0" border="1" cellspacing="0" cellpadding="0">
  
  
  <tr bgcolor="#AAD5FF">
    <th colspan="4"><?php echo $defperiod ?></th>
   
  </tr>
  <tr bgcolor="#CCCCCC">
    <th>No</th>
    <th>DESIGNATION</th>
    <th>QUANTITTE CONSOMEE</th>
    <th>MONTANT(FRW)</th>
  </tr>




<?php 
$i=0;

//find the month
$tot=0;
$med = "SELECT DISTINCT item  FROM orders WHERE type='med' AND period='$defperiod'";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $i++;
					 $med=$rowmed['item'];
					 echo '<tr><td>'.$i.'</td>';
					 
					 echo'<td>'.$med.'</td>';
					 
						
					    $med1 = "SELECT SUM(quantity), unityp  FROM orders WHERE type='med' AND item='$med' AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					 
				                   	 $medcost=$rowmed1['SUM(quantity)']*$rowmed1['unityp'];
				                  	 echo '<td>'.$rowmed1['SUM(quantity)'].'</td>';
					                 echo '<td>'.$medcost.'</td>';
					 
				                       }
					 $tot+=$medcost;
					 echo '</tr>';
				 }
	
?>

  <tr bgcolor="#CCCCCC">
    <th colspan="3">TOTAL</th>
    
    <th><?php echo $tot ?></th>
  </tr>
  
</table>




<br />
</div>
</div>
<div id="footer"><center>Developed by: Medisoft Ltd</center></div>

</div>


</body>
</html>