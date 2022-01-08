
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<title>.::TARIFICATION</title>


<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>






<?php
include('link.php');

if(isset($_POST['tarif']))
{

$id=$_POST['pid']; 
$new=$_POST['tarif']; 
$date=date('Y-m-d');
mysqli_query ($link,"UPDATE consommables SET unit_price ='$new', date='$date'  WHERE id =$id");
}


if(isset($_POST['item'])&&($_POST['unityp']))
{
	
$item=$_POST['item']; 
$unityp=$_POST['unityp'];
$date=date('Y-m-d');

mysqli_query ($link,"INSERT INTO consommables (name_consommable, unit_price, date) 
                               VALUES ('$item','$unityp', '$date')");

}







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
<div style="background-color:#fff; width:382px; height:68px; position:absolute; left: 572px; top: 36px;">
<form action="tarifconso.php" method="post">
<table style="font-size:13px; border-collapse: collapse;" width="0" border="1" cellspacing="0" cellpadding="0">
  <tr bgcolor="#AAD5FF">
    <th >NOUVEAU CONSOMMABLE</th>
    <th colspan="2">PRIX UNITAIRE</th>
  </tr>
  <tr>
    <td><input type="text"  name="item" size="30"  /></td>
    <td><input type="text" name="unityp" size="10" /></td>
    <input type="hidden" name="type" value="med" />
    <td><input type="submit" value="" style="background-image:url(img/add.jpg); background-repeat:no-repeat;" /></td>
  </tr>
</table>
<BR /><BR />
</form>
<form action="tarif.php">
<input type="submit" style="border-color:#F00;" value="MEDICAMENTS" />
</form>


</div>


<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:350px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: 7px;"><b>TARIFICATION</b></div>

<div  style="width:552px; height:460px; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; overflow:auto; position:absolute; background-color:#FFF; left: 4px; top: 35px;">




<table style="font-size:13px; border-collapse: collapse;" width="0" border="0" cellspacing="0" cellpadding="0">
  
  
  <tr bgcolor="#AAD5FF">
    <th colspan="5">CONSOMMABLES</th>
   
  </tr>
  <tr bgcolor="#CCCCCC">
    <th>No</th>
    <th>DESIGNATION</th>
    <th>PRIX ACTUEL</th>
    <th colspan="2">NOUVEAU PRIX</th>
    

  </tr>





<?php 
$i=0;

//find the month
$tot=0;
$med = "SELECT* FROM consommables ORDER BY name_consommable ASC";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $d=date('Y-m-d');
					 
					 $i++;
					 if ($d==$rowmed['date'])
					   echo'<tr bgcolor="#00FF66">';
					 else
					  echo'<tr>';
					 
					 echo '<form  action="tarifconso.php" method="post">';
					 echo '<td>'.$i.'</td>';
					 echo '<td>'.$rowmed['name_consommable'].'</td>';
                     echo '<td bgcolor="#CCCCCC">'.$rowmed['unit_price'].'</td>';
					 echo '<td><input type="text" name="tarif"></td>';
					 echo '<input type="hidden" name="pid" value="'.$rowmed['id'].'">';
					 echo '<td><input type="submit" value="" style="background-image:url(img/upd.jpg); background-repeat:no-repeat;" /></td>';

					 echo '</form></tr>';
				 }
	
?>

  
</table>
<br />
</div>
</div>
<div id="footer"> <center>Developed by: Dynasoft Lth</center></div>

</div>


</body>
</html>