

<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<title>MBS::.Data Entry</title>




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


<table  style="position:absolute; color:#000; font-size:15px; font-family:Verdana, Geneva, sans-serif; left: 945px; top: -2px;" width="0" border="0" cellspacing="30" cellpadding="0">
  <tr>
    <td> <a href="factures.php">Factures</a></td>
    <td><a href="">Rapports</a></td>
    <td><a href="">Parametres</a></td>
    <td><a href="">Profile</a></td>
  </tr>
</table>


</div>

</div>












<div class="content"><br /><br /><br />
<h3></h3>


<div style="background-color:#B7DBFF; position:absolute; width:988px; height:81px; top: 0px;"></div>
<div style="background-color:#B7DBFF; position:absolute; width:983px; height:146px; top: 340px;"></div>

<div class="rep">
  <p><a href="#">
  <img style="position:absolute; left: 5px; top: 25px;" src="img/fac.JPG" width="61" height="56" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FACTURES </a></p>
</div>


<div class="rep1">
  <p><a href="#">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/med.png" width="100" height="113" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MEDICAMENTS</a></p>
</div>

<div class="rep2">
  <p><a href="#">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/lab.JPG" width="104" height="81" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LABORATOIRE</a></p>
</div>


<div class="rep3">
  <p><a href="#">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/week.JPG" width="58" height="49" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RAPPORTS HEBDO</a></p>
</div>


<div class="rep4">
  <p><a href="#">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/autre.JPG" width="100" height="93" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AUTRES RAPPORTS</a></p>
</div>

<div class="rep5">
  <p><a href="#">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/tarif.JPG" width="148" height="156" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TARIFICATION</a></p>
</div>







<hr />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<hr />
</div>


<div style="position:absolute; border-radius: 0px 200px 10px 10px; width:200px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 20px; top: 90px;"><b>TOUTES LES FACTURES</b></div>




<div id="footer"> <center>Developed by: Dynasoft Lth</center></div>

</div>


</body>
</html>