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
<div style="width: 231px; height: 24px; position: absolute; background-color: #F00; border-radius: 10px 10px 0px 0px; left: 546px; top: 27px;"> &nbsp;&nbsp;<b>MUTUELLE DE SANTE</b>
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
   <td>Date</td><td><input type="text" size="10"  value="<?php echo date('Y-m-d') ?>" placeholder="" name="date" /></td>
   </tr>
   <tr>
   <td>District(MUSA)</td><td>
   
    <?php 
    $products = "SELECT distrcode, distrname FROM district";
    echo '<select  name="district" onchange="getVote(this.value)">';
    echo'<option  value="">---------------</option>';

        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {  
					 //echo'<input type="hidden" name="dcode" value="'.$row['distrcode'].'">';
					 echo'<option  value="'.$row['distrname'].'">'.$row['distrname'].'</option>';
					 
					//echo'<input type="hidden" name="dcode" value="'.$row['distrcode'].'">';
				 }
  

   
   echo '</select>';
   
   ?>
   
  </td>
   </tr>
   <tr>
   <td>Section(MUSA)</td><td><div id="poll"></div></td>
   </tr>
   <tr bgcolor="#00CC00">
   <td><strong>Si vous trouvez pas de section</strong></td><td><input type="text" size="50" placeholder="Tapez-la ici" name="section2" /></td>
   </tr>
   <tr>
   <td>Code Mutuelle</td><td><input autocomplete="off" type="text" size="50" placeholder="" name="insurance_code" /></td>
   </tr>
    <tr>
   <td>Code de famille</td><td><input type="text" size="10" placeholder="" name="famille" /></td>
   </tr>
   
    <tr>
   <td>Categorie</td><td>
   <select style="font-size:20px;" name="categorie">
   <option></option>
   <option value="3">3</option>
   <option value="1">1</option>
   <option value="2">2</option>
   <option value="4">4</option>
   <option value="5">5</option>
   <option value="6">6</option>
   </select>
   
   
   </td>
   </tr>
   
   
   <tr>
   <td>Nom et prenom du client</td><td><input type="text" size="50" placeholder="" name="beneficiary" /></td>
   </tr>
   
  
   
   
   <tr>
   <td>Age</td><td> <select name="age">
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
   <td>Sexe</td><td><select name="sex"><option value=""></option><option value="F">Female</option><option value="M">Male</option></select></td>
   </tr>
   
   <tr>
   <td>Chef de Famille</td><td><input type="text" size="50" placeholder="" name="chef" /></td>
   </tr>
   
  <tr>
  <td></td>
  <td>
  
  <input type="hidden" name="insurance" value="MUSA" />
  <button class="button" ><span>Ajouter</span></button>
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