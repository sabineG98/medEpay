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



$status = "SELECT COUNT(status) AS bkp  FROM orders WHERE status=0 ";
        $retval_status = mysqli_query($link, $status);
        if(! $retval_status )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowstatus = mysqli_fetch_array($retval_status, MYSQLI_ASSOC))
                 {
					 $bkp=$rowstatus['bkp'];
				 }


if ($bkp>=100)
{
include('bkp.php');
}




//include('apps.php');
$user=$_SESSION['user'];





if(isset($_POST['date'])&&($_POST['beneficiary']))
{
	
$date=$_POST['date'];
$beneficiary=$_POST['beneficiary'];
$d=$_POST['d'];
$m=$_POST['m'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$tel=$_POST['tel'];
$mother=$_POST['mother'];
$father=$_POST['father'];
$nationality=$_POST['nationality'];
$district=$_POST['district'];
$sector=$_POST['sector'];
$cell=$_POST['cell'];
$insurance=$_POST['insurance'];
$fiche=$_POST['fiche'];
$affiliation=$_POST['affiliation'];
$insurance_code=' ';
$matricule=$_POST['matricule'];
$adherent=$_POST['adherent'];
$departement=$_POST['departement'];
$location=$_POST['departement'];
$pourcentage=$_POST['pourcentage'];
$police=$_POST['police'];
$card=$_POST['card'];
$employer=$_POST['employer'];
$profession=$_POST['profession'];
$period=date("F-Y", strtotime($date));
$user=$_SESSION['name'];	 
$client_id=$_POST['client_id'];
$age=$age.'-'.$m.'-'.$d;



if (!empty($affiliation)) 
{
$insurance_code=$affiliation;
}
if (!empty($card)) 
{
$insurance_code=$card;
}

if($client_id==0)
    {
	  mysqli_query ($link,"INSERT INTO clients (insurance_code ,  beneficiary ,  age ,  sex ,  tel ,  mother ,  father ,  nationality ,  district ,  sector ,  cell ,  employer ,  facility ,  location ,  matricule ,  police ,  adherent ,profession,  cardno ,  insurance ,  percentage , date,  period ,  user, status, fiche) 
	  
                               VALUES ('$insurance_code' ,  '$beneficiary' ,  '$age' ,  '$sex' ,  '$tel' ,  '$mother' ,  '$father' , '$nationality' ,  '$district' , '$sector' ,  '$cell' ,  '$employer' ,  '$facility' ,  '$location',  '$matricule' , '$police' ,  '$adherent'  ,'$profession',  '$card' ,  '$insurance' ,  '$pourcentage' , '$date',  '$period' ,  '$user', 1, $fiche)"); 
    }
	
	if($client_id>0)
    {
	  mysqli_query ($link,"UPDATE clients SET insurance_code='$insurance_code' ,  beneficiary='$beneficiary' ,  age='$age' ,  sex='$sex' ,  tel='$tel' ,  mother='$mother' ,  father='$father' ,  nationality='$nationality' ,  district='$district' ,  sector='$sector' ,  cell='$cell' ,  employer='$employer' ,  facility='$facility' ,  location='$location' ,  matricule='$matricule' ,  police='$police' ,  adherent='$adherent' ,profession='$profession',  cardno='$card' ,  insurance='$insurance' ,  percentage='$pourcentage' , date='$date',  period='$period' ,  user='$user', status=1, fiche=$fiche WHERE client_id=$client_id");
	  
                              
    }
  						  
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
    
    
     <div style="position: absolute; width: 700px; border:0px; top:10px; height: 66px; left:0px;">
 

<!-- <div id='cssmenu'>
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
[ACTES MEDICALES]
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
</div>-->

 <a style="color:white;" href="orderdelete.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
<img src="img/edit1.png" width="20" height="20" />Modifier 
 </a>
 
 
 
 <font color="#FFFFFF">
 &nbsp;&nbsp;&nbsp;
<img src="img/pricing.png" width="20" height="20" /> [
 <!--<a style="color:white;"  href="tarif.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
Medicaments
</a>
 ||
 <a style="color:white;" href="tarif-conso.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
Consommables</a>
||--><a style="color:white;" href="tarif-acts.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
TARIF RAPIDE
</a></a>
 ]
 </font>
 
 <!--<a  style="color:white;" href="credit.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
<img src="img/check.png" width="20" height="20" />Dette 
 </a>
 
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

<div style="background-color:#FFF; border-radius: 10px 10px 10px 10px; border: 1px solid #FFF; font-size:20px; width:888px; height:43px; position:absolute; left: 4px; top: 27px;">

<!--<table border="0" cellpadding="5">
<tr>-->

<img src="img/patient.png" width="51" height="43">
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
					 $categorie=$rowlast['percentage'];
					 $insu=$rowlast['insurance'];
					 $cname=$rowlast['beneficiary'];
					 echo '<b>'.$rowlast['beneficiary'].','.$rowlast['age'].','.$rowlast['sex'].'</b>-('.$rowlast['insurance'].':'.$rowlast['insurance_code'].'--<strong>'.$categorie.'%</strong>)';
					 echo '----->'.$date.'---&nbsp;<b><i>CODE:</i><font color="#FF0000">'.$id.' </font>';
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
					 $categorie=$rowlast['percentage'];
					 $insu=$rowlast['insurance'];
					 $cname=$rowlast['beneficiary'];
					 echo '<b>'.$rowlast['beneficiary'].','.$rowlast['age'].','.$rowlast['sex'].'</b>-('.$rowlast['insurance'].':'.$rowlast['insurance_code'].'--<strong>'.$categorie.'%</strong>)';
					 echo '----->'.$date.'---&nbsp;<b><i>CODE:</i><font color="#FF0000">'.$id.' </font>';
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


<div  style="width: 1282px; height: 429px; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; position: absolute; background-color: #EBEBEB; left: 5px; top: 77px;">
<div style="position:absolute; border-radius: 0px 0px 0px 0px;  width:166px; border: 1px solid #09F; height:25px; background-color:red; left: 1120px; top: -30px;"><img src="img/find.png" width="24" height="24" /><a style="color:white;" href="find.php"  onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">Find a patient</a></div>
<br />


<iframe style="position: absolute; overflow: hidden; background-color: #FFF; left: -1px; top: 7px; width: 1278px; height: 401px;" src="tabs.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
<div style="position: absolute; border-radius: 0px 200px 10px 10px; width: 266px; border: 1px solid #09F; height: 25px; background-color: #FFF; left: -4px; top: 407px;"><b>FACTURE 







 </b>

   

</div>

<iframe style="position: absolute; overflow: hidden; box-shadow: 0px 0px 10px 0px #000; border: 2px solid #F00; background-color: #FFF; left: -4px; top: 432px; width: 1285px; height: 275px;" src="invoice.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&categorie=<?php echo $categorie; ?>&date=<?php echo $date; ?>&period=<?php echo $period; ?>">
</iframe>
</div>
<div style="position: absolute; background-color: #fff; box-shadow: 0px 0px 7px 0px #000; width:auto border: 1px solid #000; left: 983px; top: 37px;">
<form method="" action="home.php">
<button class="button" ><span> SUIVANT/NEXT</span></button>
</form>
</div>

</div>
</div>

 <?php 
 $_SESSION['id']=$id;
 $_SESSION['date']=$date;
  $_SESSION['cname']=$cname;
  $_SESSION['insurance']=$insu;
 
 
 
 
 ?>
</body>
</html>