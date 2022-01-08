

<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<title>:::Applications</title>

<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
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
      <div class="menu1"><a href="home.php"><img  style="position:absolute; left: 210px; top: -13px;" src="img/home.png"  alt="Saisie"  /></a></div>
<div class="menu1"><a href="applications.php"><img  style="position:absolute; left: 250px; top: -13px; " src="img/app.png"  /></a></div>
      <div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 280px; top: -13px; " src="img/logout.png" /></a></div>

    <?php   echo'<br>Bonjour '.$_SESSION['name'].'!' ?>
    
    
    </div>  
     
    <!--<td><a href="factures.php">Factures</a></td>
    <td><a href="reports.php">Rapports</a></td>
    
    <td><a href="">Parametres</a></td>
    <td><a href="">Profile</a></td>-->



</div>

</div>






<div class="content" style="overflow:hidden;" style="overflow:hidden;"><br /><br /><br />
<h3></h3>


<div style="background-color: #B7DBFF; position: absolute; border-radius: 0px 0px 0px 0px; width: 991px; height: 110px; top: 0px; left: 0px;"></div>
<div style="background-color: #B7DBFF; position: absolute; width: 990px; height: 107px; top: 414px; left: 0px;"></div>
<div style="background-color: #B7DBFF; position: absolute; border-radius: 0px 0px 0px 0px; width: 60px; height: 25px; top: 560px; left: 331px;"></div>
<div style="background-color: #CCC; position: absolute; border-radius: 20px 0px 0px 20px; width: 30px; box-shadow: 0px 0px 5px 0px #000; height: 155px; top: 138px; left: 980px;"></div>
<div class="rep">
  <p>
  <a href="factures.php">
  <img style="position:absolute; left: 5px; top: 25px;" src="img/fac.JPG" width="61" height="56" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FACTURES </a></p>
</div>


<div class="rep1">
  <p><a href="revenues.php">
  <img style="position:absolute; left: 5px; top: 25px; width: 70px; height: 55px;" src="img/income.jpg" width="100" height="113" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; REVENUES</a></p>
</div>

<div class="rep2">
  <p><a href="medecines1.php">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/med.png" width="104" height="81" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHARMACIE</a></p>
</div>


<div class="rep3">
  <p><a href="#">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/cbhi.jpg" width="58" height="49" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VERIFICATION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
</div>



<div class="cbhi">
  <p><a href="laboratory.php">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/lab1.png" width="58" height="49" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LABORATOIRE</a></p>
</div>
<div class="rep4">
  <p><a href="clients.php">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/client.JPG" width="100" height="93" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HISTORIQUE</a></p>
</div>

<div class="rep5">
  <p><a href="pricing.php">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/tarif.JPG" width="148" height="156" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TARIFICATION</a></p>
</div>
<div class="rep6">
  <p><a href="journal.php">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/Journal.png" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CASHIER</a></p>
</div>

<!--<div class="rep7">
  <p><a href="dettes.php">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/dette3.jpg" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETTES                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
</div>-->

<div class="rep8">
  <p><a href="#">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/report.png" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RAPPORTS</a></p>
</div>

<div class="rep9">
 <p><a href="usercontrol.php">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/users.png" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UTILISATEURS</a></p>
</div>







<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

</div>


<div style="position:absolute; border-radius: 0px 200px 10px 10px; width:200px; border: 0px solid #09F; height:27px; background-color:#BDF; left: 19px; top: 95px;"><b>APPLICATIONS</b></div>




<div id="footer"> <center></center></div>

</div>


</body>
</html>