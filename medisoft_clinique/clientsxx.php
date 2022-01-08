<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<title>.::CLIENTS</title>


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


<div  style=" width:100% overflow:auto; box-shadow: 0px 0px 0px 0px #000; border: 0px solid #09F; position:absolute; background-color:#FFF; left: 4px; top: 35px;">
<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:250px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: -27px;"><b>HISTORIQUE DES CLIENTS</b></div>

<table width="0" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
 <form action="clients.php" method="post">
  <tr>
    <td><strong>CODE DU CLIENT </strong></td>
    <td><input  type="text" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" name="client" size="30" /></td>
    <td>
    </td>
    <td><button class="button" ><span>Ok </span></button></td>
  </tr>
 </form>
</table>
<hr />

<?php

if (isset($_POST["order"])) 
{
$deletet=$_POST['order'];
$code=$_POST['client2'];

if ($_SESSION['post']=='accountant')
{
mysqli_query ($link,"DELETE FROM orders WHERE order_id=$deletet");
echo  '<h2 style="background-color:#F00;" > Suprimé!<h2/>';
}
else
{
	echo  '<h2 style="background-color:#F00;" > Pas autorisé à faire cette operation!<h2/>';

}
}



if(isset($_POST['client']))
{
$code=$_POST['client'];
$defper = "SELECT DISTINCT client_id, insurance, insurance_code, beneficiary FROM clients WHERE insurance_code='$code' OR client_id='$code' ";
        $retvalper = mysqli_query($link, $defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				   $id=$defrowper['client_id'];
                   echo '<b style="text-transform:uppercase;">'.$defrowper['beneficiary'].'-'.$defrowper['insurance_code'].'['.$defrowper['insurance'].']-#'.$id
				   .'</b>';
				   echo'<hr>';
				   
				        echo'<table width="0"  border="1" cellspacing="0" cellpadding="0">
                            <tr bgcolor="#CCCCCC" >
                         <td>Designation</td>
						 <td>Qtté</td>
						
                          <td>Prix U</td>
                           <td colspan="0">Total</td>
						   <td colspan="">Date de consomation</td>
						   ';
						   
						$defper = "SELECT* FROM invoice WHERE client_id=$id ORDER BY date DESC ";
                            $retvalper = mysqli_query($link, $defper);
                            if(! $retvalper )
                               {
                                die('Could not get data: ' . mysqli_error($link));
                                }    
          
           
                                 while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                                          {
										echo '<form action="clients.php" method="post">';
										
				                           echo'<tr>';
										   echo '<td>'.$defrowper['act'].'</td>';
										   echo'<td>'.$defrowper['quantity'].'</td>';
										   echo'<td>'.$defrowper['unityp'].'</td>';
										   $t=$defrowper['quantity']*$defrowper['unityp'];
										   echo'<td>'.$t.'</td>'; 
										   echo '<input type="hidden" name="order" value="'.$defrowper['order_id'].'">';
							               echo '<input type="hidden" name="client2" value="'.$id.'">';
										    echo'<td>'.$defrowper['date'].'</td>';
										   
										  // echo'<td><input style="background-color:#F00;" type="submit" value="X"></td>';
										   echo'</form>';
										   echo '</tr>';
                                          }
										  echo'</table>';
	             }
				 
				
   }
				 
    ?>

















<br />
</div>
</div>
<div id="footer"> <center></center></div>

</div>


</body>
</html>