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










</head>

<body>


<div class="all_container">
<div class="show">

</div>


<div class="liguini">
<div class="img1">

</div>

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




<div 
style='
    width: 985px;
	opacity: 1;
	background-image: url(images/content2.png);
	background-repeat: no-repeat;
	background-color: #FFF;
	position: absolute;
	left: 17px;
	top: 114px;
	box-shadow: 0px 0px 40px #888888;
	padding: 2px;
	margin: 1px 0;
	border: 1px solid #000;
	box-shadow: inset 15px 15px 15px rgba(0,0,0,.2);
	border-radius: 0px 0px 0px 0px;
	-webkit-box-shadow: inset 0 1px 4px rgba(0,0,0,.2);
	-webkit-border-radius: 5px;
	border-color: #000;
	box-shadow: 0px 0px 20px #000;
	height: 2500px;
	overflow: auto;
    '

>



<br /><br /><br />

<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:350px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: 7px;"><b>TARIFICATION GLOBALE</b></div>

<div  style="width:970px; height:2450px; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; overflow:auto; position:absolute; background-color:#FFF; left: 4px; top: 35px;">



<iframe style="position: absolute; overflow: hidden; border: 1px solid #FFFFFF; background-color: #FFF; left: -1px; top: 7px; width: 933px; height: 2400px;" src="tabs-tarif.php"></iframe>


<br />
</div>
</div>
</div>




</body>
</html>