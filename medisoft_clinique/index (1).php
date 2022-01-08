<?php
include('link.php');

//$initial = "TRUNCATE TABLE facture";
//$bgn = mysqli_query($link,$initial);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

<title>MBS::.Home page</title>


<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>


</head>

<body>
<div class="liguini"><br />

<br /><br /><br /><br /><br /><br />
<hr />

</div>

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


<div class="content">
 
 
 
 
 
 
 
 
  <div class="upload">
    
    <img src="img/excel.jpg" width="100" height="100" />
    <div class="up_desc">
  <form action="file.php" method="post" enctype="multipart/form-data">
  <div style="position:absolute; box-shadow: 0px 0px 5px #000; background-color:#F00; width: 526px; left: 1px; top: -27px;">
  <strong>SELECT FACILTY</strong>
<select name="facility">
  <option value="KABUYE">Kabuye</option>
  <option value="BWERAMVURA">Bweramvura</option>
  <option value="GIHOGWE">Gihogwe</option>

</select>
  <br />
  </div>
<input type="file" name="file" id="file">
<input type="submit" name="submit" value="Import">
</form>
  </div>  
</div>
<p><a  href="format.xlsx">Format to use/Format à utiliser</a></p>
</div>


<div  
 style="height:30px; position:absolute; background-image:url(img/overb.JPG); background-repeat:repeat-x; left:689px; top:117px; width:320px; padding: 2px; margin: 1px 0; box-shadow: outset 0 1px 4px rgba(0,0,0,.2); border-radius: 0px 7px 7px 0px; -webkit-box-shadow: outset 0 4px 5px rgba(0,0,0,.2); -webkit-border-radius: 5px; border-color: #09F; background-color:#CCC; border:0px solid #aaa; opacity:1; box-shadow: 0px 0px 5px #000;"         
  >






<img id="icon" src="img/warn.png" width="40" height="34" />
<h3 id="ov"><font color="#000">Before you import!</font></h3>
<p>
</br>
Before you import you should fill your data in a correct form.
For example all dates must be filled using a given format.
just download the <a  href="format.xlsx">Format to use here</a>
and make sure it is well filled. you can copy-past your data into the correct form. </p>
<b><i>Thank you for understanding.</i></b>


</div>


<div id="footer"></div>

</div>
<!--<b>Copyright &copy; 2014 Dynasoft Ltd-->

<!--<div class="leftmenu">


<table width="187" border="0" cellpadding="1" cellspacing="1">
 <tr>
    <td><a class="link" href="index.php" alt="Commerncer à 0">
      <div class="left_menu">&nbsp; &nbsp;&nbsp;<b>Start</b>/Demarer<hr /><i>NB:Comencer à 0</i></div></a></td>
  </tr>
  <tr>
    <td><a class="link" href="districts.php">
      <div class="left_menu">&nbsp; &nbsp;&nbsp;<b>Districts<hr /><i>Tous les districts</i></div></a></td>
  </tr>
  <tr>
    <td><a class="link" href="summary1.php">
      <div class="left_menu">&nbsp; &nbsp;Factures<hr /><i>Facture globale</i> </div></a></td>
  </tr>
  <tr>
    <td><a class="link" href="missing.php">
      <div class="left_menu">&nbsp; &nbsp;Manquants<hr /><i>Codes Manquants</i> </div></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
  </tr>
</table>



         </div>
-->





</body>
</html>