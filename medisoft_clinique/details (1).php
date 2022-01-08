<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />

<!--popup iframe settings -->
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />

   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   
   
   
<title>.::Details</title>

<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>


<?php
error_reporting(E_ERROR | E_PARSE);
include('link.php');
//include('apps.php');
$user=$_SESSION['user'];

if(isset($_POST['insurance_code'])&&($_POST['beneficiary']))
{
	
      $insurance=$_POST['insurance']; 
      $date=$_POST['date'];
	  $district=$_POST['district'];
	  $section=$_POST['section'];
	  if (empty($_POST['section']))
	     {
	     $section=$_POST['section2'];
		 }
	  $insurance_code=$_POST['insurance_code'];
	  $categorie=$_POST['categorie'];//new 
	  $famille=$_POST['famille'];//new
      $beneficiary=$_POST['beneficiary'];
	  $age=$_POST['age'];
	  $sex=$_POST['sex'];
	  $serie=$_POST['serie'];
	  $adherent=$_POST['adherent'];
	  $department_aff=$_POST['department_aff'];
	  $police=$_POST['police'];
      $period=date("F-Y", strtotime($date));
	  $user=$_SESSION['name'];
	  $chef=$_POST['chef'];//new

	  mysqli_query ($link,"INSERT INTO clients (district, section, insurance, insurance_code, categorie, famille, chef, beneficiary, serie,adherent, department_aff, age, sex, police, date, mois,user) 
                               VALUES ('$district', '$section','$insurance','$insurance_code', '$categorie', '$famille', '$chef', '$beneficiary','$serie', '$adherent', '$department_aff', '$age', '$sex','$police','$date','$period','$user')"); 
  						  
}


$_SESSION['period']=$period;
$_SESSION['date']=$date;

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
    
    
     <div style="position: absolute; width: 600px; border:0px; top:10px; height: 66px; left:0px;">
 

 <div id='cssmenu'>
 <ul>
   <li>
<a href="orderdelete.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
<img src="img/edit.jpg" width="20" height="20" />Modifier 
 </a>
 </li>
   <li class='active has-sub'><a href='#'><img src="img/tai.JPG" width="20" height="20" />Tarif Rapide</a>
      <ul>
         <li class='has-sub'><a href="tarif.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
[MEDICAMENTS]
</a>
         </li>
         <li class='has-sub'><a href="tarif-conso.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
[CONSOMMABLES]</a>
         </li>
         <li class='has-sub'><a href="tarif-acts.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
[]
</a></a>
         </li>
         

      </ul>
      
     <li>
<a href="credit.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
<img src="img/dette3.png" width="20" height="20" />Dette 
 </a>
   </li>
   
   <li>
<a href="coment.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
<img src="img/coment.png" width="20" height="20" />Comentaires 
 </a>
   </li>
</ul>
</div>
 
 
 
 
 
 
<!-- 
 <a href="orderdelete.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
 &nbsp;&nbsp;&nbsp;<img src="img/edit.png" width="40" height="40" /> 
 </a>-----TARIF.::
<a href="tarif.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
[Medicaments]
</a>
<>
<a href="tarif-conso.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
[Consommables]
</a>
<>
<a href="tarif-acts.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
[Actes]
</a>-->
</div>
    
    
    
    
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


<div style="width:1289px; opacity: 1; background-image:url(images/content2.png); background-repeat:no-repeat; background-color:#FFF; position:absolute; left:-152px; top: 54px; box-shadow: 0px 0px 40px #888888; padding: 2px; margin: 1px 0; border: 1px solid #000; box-shadow: inset 15px 15px 15px rgba(0,0,0,.2); border-radius: 0px 0px 0px 0px; -webkit-box-shadow: inset 0 1px 4px rgba(0,0,0,.2); -webkit-border-radius: 5px; border-color:#000; box-shadow: 0px 0px 20px #000; height: 819px; overflow:auto;">

<div style="background-color:#CAE4FF; border-radius: 10px 10px 10px 10px; border: 1px solid #F00; font-size:20px; width:888px; height:43px; position:absolute; left: 4px; top: 27px;">

<!--<table border="0" cellpadding="5">
<tr>-->
<?php

if(isset($_POST['code']))
{
$code=$_POST['code'];
$date=$_POST['date'];
$period=date("F-Y", strtotime($date));
$_SESSION['period']=$period;

$last = "SELECT DISTINCT *  FROM clients WHERE insurance_code='$code' OR client_id='$code'";
        $retval_last = mysqli_query($link, $last);
        if(! $retval_last )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
					 $id=$rowlast['client_id'];
					 $categorie=$rowlast['categorie'];
					 $insu=$rowlast['insurance'];
					 echo '<b>'.$rowlast['beneficiary'].'</b>-';
					 echo $rowlast['insurance_code'];
					 echo '('.$rowlast['insurance'].')----->'.$date.'---&nbsp;<b><i>CODE:</i><font color="#FF0000">'.$id.' </font></b>';
					 break;
		             //$id=0;
					 
					 /*$c=$rowlast['musa_code'];
					 $n=$rowlast['noms'];*/
					
				 }
				   if (empty($id))
					{
					header("Location: home.php");
                    exit;
					}

}
else 
{
	$last = "SELECT * FROM clients WHERE insurance_code='$insurance_code' AND user='$user' ORDER BY client_id DESC LIMIT 1 ";
        $retval_last = mysqli_query($link, $last);
        if(! $retval_last )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
					 $id=$rowlast['client_id'];
					 $categorie=$rowlast['categorie'];
					 $insu=$rowlast['insurance'];
					 echo '<b>'.$rowlast['beneficiary'].'</b>-';
					 echo $rowlast['insurance_code'];
					 echo '('.$rowlast['insurance'].')----->'.$date.'---&nbsp;<b><i>CODE:</i><font color="#FF0000">'.$id.' </font></b>';
					 break;

					 /*$c=$rowlast['musa_code'];
					 $n=$rowlast['noms'];*/
					
					
				 }
}
?> 
<!--</tr>
</table>-->
</div>
<br /><br /><br />
<h3></h3>


<div  style="width:1282px; height:390px; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; position:absolute; background-color:#EBEBEB; left: 6px; top: 105px;">
<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:166px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: -27px;"><b>Doit payer</b></div>
<br />


<iframe style="position:absolute; overflow:hidden; background-color:#FFF; left: -1px; top: 7px; width: 1278px; height: 298px;" src="tabs.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
<div style="position:absolute; border-radius: 0px 200px 10px 10px; width:166px; border: 1px solid #09F; height:25px; background-color:#F00; left: 1px; top: 309px;"><b>FACTURE </b>

</div>

<iframe style="position:absolute; overflow:hidden; box-shadow: 0px 0px 10px 0px #000; border: 2px solid #F00; background-color:#FFF; left: -4px; top: 338px; width: 1285px; height: 369px;" src="invoice.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&categorie=<?php echo $categorie; ?>&date=<?php echo $date; ?>&period=<?php echo $period; ?>">
</iframe>
</div>
<div style="position:absolute; background-color:#F00; box-shadow: 0px 0px 7px 0px #F00; width:auto border: 1px solid #red; left: 901px; top: 32px;">
<form method="" action="home.php">
<button class="button" ><span> SUIVANT/NEXT</span></button>
</form>
</div>

</div>
</div>

 <?php 
 $_SESSION['id']=$id;
 $_SESSION['date']=$date;
 
 
 
 
 ?>
</body>
</html>