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

<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:350px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: 7px;"><b>CONSOMMATIONS DES MEDICAMENTS</b></div>

<div  style="width:752px; height:440px; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; overflow:auto; position:absolute; background-color:#FFF; left: 4px; top: 35px;">




<table width="0" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
 <form action="medecines.php" method="post">
  <tr>
    <td>Periode:&nbsp;&nbsp;&nbsp; Du</td>
    <td><input type="text" value="<?php echo date('Y-m-d') ?>" name="p1">
    
    &nbsp;&nbsp;Au
    <input type="text" value="<?php echo date('Y-m-d') ?>" name="p2">
    </td>
    <td><input type="submit" value="OK" /></td>
  </tr>
 </form>
</table>
<hr />
<table width="0" border="1" cellspacing="0" cellpadding="0">
  
  
  <tr bgcolor="#AAD5FF">
<?php
/*$defper = "SELECT DISTINCT period  FROM orders ORDER BY time DESC LIMIT 1";
        $defretvalper = mysqli_query($link, $defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($defretvalper, MYSQLI_ASSOC))
                 {
				
                    $defperiod=$defrowper['period'];
	             }*/
				 
				if(isset($_POST['p1'])&&($_POST['p2']))
                     { 
					 $p1=$_POST['p1'];
					 $p2=$_POST['p2'];
					 
				 
    

    echo'<th colspan="4"><Du'.$p1.'Au'.$p2.'</th>';
   }
   ?>
  </tr>
  <tr bgcolor="#CCCCCC">
    <th>No</th>
    <th>DESIGNATION</th>
    <th>QUANTITTE CONSOMEE</th>
    <th>MONTANT(FRW)</th>
  </tr>




<?php 
if(isset($_POST['p1'])&&($_POST['p2']))
                     {
$i=0;

//find the month
$tot=0;
$med = "SELECT DISTINCT item  FROM orders WHERE type='med' AND date BETWEEN '$p1' AND '$p2'";
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
					 
						
					    $med1 = "SELECT SUM(quantity), unityp  FROM orders WHERE type='med' AND item='$med' AND date BETWEEN '$p1' AND '$p2'";
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
	


  echo'<tr bgcolor="#CCCCCC">
    <th colspan="3">TOTAL</th>
    
    <th>'.$tot.'</th>
  </tr>
  
</table>';
}
?>


<br />
</div>
</div>
</div>




</body>
</html>