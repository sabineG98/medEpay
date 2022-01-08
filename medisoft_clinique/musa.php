<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<title>.::Mutuelle de santé</title>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="script.js"></script>

<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sec.php?district="+int,true);
  xmlhttp.send();
}
</script>



<!--<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/print.css" type="text/css" media="screen" />
<link rel="pingback" href="xmlrpc.php" />-->


<link href="css.css" rel="stylesheet" type="text/css" media="screen" />

<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>


<?php
include('link.php');

if(isset($_POST['code']))
{
	
$code=$_POST['code']; 
$fullname=$_POST['fullname']; 

mysqli_query ($link,"INSERT INTO clients (musa_code, noms) 
                               VALUES ('$code', '$fullname')");
}






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

input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
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






<div class="content">
<div style="width: 231px; height: 24px; position: absolute; background-color: #F00; border-radius: 10px 10px 0px 0px; left: 546px; top: 27px;"> &nbsp;&nbsp;<b>NOUVEAU CLIENT</b>
<div style="background-color: #C2E7FC; border: 1px solid #09F; box-shadow: 0px 0px 5px 0px #000; border-radius: 5px 5px 5px 5px; width: 766px; height: 440px; position: absolute; left: -534px; top: 25px;">






<!-- LIVE SEARCH CODE--> 


<!--<div><form id="searchform">
		<div>
		 &nbsp;&nbsp;&nbsp;<input type="text" value="Shakisha inkuru" onblur="if (this.value == '')  {this.value = 'Shakisha inkuru';}" onfocus="if (this.value == 'Shakisha inkuru') {this.value = '';}"  onkeyup="lookup(this.value);"/>
		</div>
		<div id="suggestions"></div>-->


<center>
<br />

<form  method="POST"  action="details.php" >
<table>
 <tr>
   <td align="right">Date</td><td><input type="text" size="10"  value="<?php echo date('Y-m-d') ?>" placeholder="" name="date" /></td>
   </tr>
 
    <tr>
   <td><strong>NOM DU PATIENT</strong></td><td><input type="text" size="50" placeholder="" name="beneficiary" /></td>
   </tr>
   
   <tr>
   <td align="right">Age</td><td> <select name="age">
   <option value=""></option>
   <?php $age=0; 
   for ($age=date('Y');$age>=date('Y')-100;$age--) 
         { 
		     echo '<option value="'.$age.'">'.$age.' </option>';
			 
	     }
		 
		 ?>
         
         
         </select></td>
   </tr>
   
   <tr>
   <td align="right">Sexe</td><td><select name="sex"><option value=""></option><option value="F">Female</option><option value="M">Male</option></select></td>
   </tr>
      
   

   <tr>
   <td align="right">Telephone</td><td><input autocomplete="off" type="text" size="15" placeholder="" name="police" /></td>
   </tr> 
   
    <tr>
   <td align="right">Mere</td><td><input autocomplete="off" type="text" size="50" placeholder="" name="mother" /></td>
   </tr> 
   
   
   <tr>
   <td align="right">Pere</td><td><input autocomplete="off" type="text" size="50" placeholder="" name="father" /></td>
   </tr>
   
   
   
   <tr>
   <td align="right">Nationalite</td><td><input autocomplete="off" type="text" size="20" placeholder="" value="Rwanda" name="nationality" /></td>
   </tr>
   
   
   
   <tr>
   <td align="right">District</td><td><input autocomplete="off" type="text" size="20" placeholder="" name="district" /></td>
   </tr>
   
   
   <tr>
   <td align="right">Secteur</td><td><input autocomplete="off" type="text" size="20" placeholder="" name="sector" /></td>
   </tr>
   
   
   <tr>
   <td align="right">Cellure</td><td><input autocomplete="off" type="text" size="20" placeholder="" name="sector" /></td>
   </tr>
   
   

    <tr>
   <td align="right">ASSURANCE</td><td>
   <select style="font-size:20px;" name="insurance">
   <option></option>
   <option value="RSSB" >RSSB</option>
   <option value="MEDIPLAN">MEDIPLAN</option>
   <option value="PRIVE">PRIVE</option>
   
   </select>
   
   
   </td>
   </tr>
   
   
     
  
   
   
   
   
   
   
   
  
   
  <tr>
  <td></td>
  <td>
  
  <input type="hidden" name="insurance" value="MUSA" />
  <button class="button" ><span>SUIVANT</span></button>
  </td>
  </tr>


</table>


</form>

</center>
</div>
</div>
<br /><br /><br />
<h3></h3>

<iframe src="sync.php" style="position:100px; border: 0px solid #069;  left:500px;  height:100px; width:100px;" >
</iframe>



</div>


<div id="overv">
<img id="icon" src="img/warn.png" width="40" height="34" />
<h3 id="ov"><font color="#000">Nouveau client</font></h3>
<p>&nbsp;</p>
</div>

  
<div id="footer"></div>

</div>


</body>
</html>