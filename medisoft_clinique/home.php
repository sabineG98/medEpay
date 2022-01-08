<?php include('head.php'); ?>
<title>.::MUSA::.</title>
<?php include('navbar.php'); ?>
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
<style>
 #overv2
{
	height:40px;
	position:absolute;
	background-image:url(img/overb.JPG);
	background-repeat:repeat-x;
	left:5px;
	top:95px;
	width:351px;
	padding: 2px;
	margin: 1px 0;
	box-shadow: outset 0 1px 4px rgba(0,0,0,.2);
	border-radius: 5px 5px 5px 5px;
	border-color: #09F;
	background-color:#D9ECFF;
	border:0px solid #aaa;
	opacity:1;
	box-shadow: 0px 0px 20px #000;
	overflow:hidden;
	
}
#overv2:hover
{
	border:2px solid #00F;
	height:500px;
	width:1100px;
	opacity:0.95;
	overflow:auto;
	transition: width 1s;
	transition: height 1s;
	
}
</style>
</head>


<?php
// include('link.php');

if(isset($_POST['client_id']))
{
	
$client_id=$_POST['client_id']; 
$fullname=$_POST['fullname']; 
$cell=$_POST['cell'];
$sector=$_POST['sector'];
$mother=$_POST['mother'];
$father=$_POST['father'];
$district=$_POST['district'];
$tel=$_POST['tel'];
$sex=$_POST['sex'];
$ages=$_POST['age'];
$date=$_POST['date'];
$insurance=$_POST['insurance'];
}
else
{
$client_id=0;
$fullname=''; 
$mother='';
$father='';
$cell='';
$sector='';
$district='';
$tel='';
$sex='';
$ages='';
$insurance='';
$date=date('Y-m-d');

}
?>
    
    <div class="container">                    
            <div class="row">
                <div class="col-lg-8 pt-4">
                  <div class="row mob">
                    <div class="d-flex d-none d-md-none d-sm-none d-lg-block" style="width:231px;height:24px;position:absolute;background-color:#F00;border-radius:10px 10px 0px 0px;left:529px;top:57px;color:#FFF;text-align:center;"> &nbsp;&nbsp;<b>NEW CLIENT</b></div> <div class="clearfix"></div>
                    <div class="d-flex d-none d-md-none d-sm-block d-lg-none" style="width:180px;height:24px;position:absolute;background-color:#F00;border-radius:10px 10px 0px 0px;left:360px;top:57px;z-index:1;color:#FFF;text-align:center;"> &nbsp;&nbsp;<b>NEW CLIENT</b></div> <div class="clearfix"></div>
                    <div id="overv" class="d-flex">
                    <div class="d-flex d-none d-md-block d-sm-none d-lg-none" style="width: 231px; height: 24px; position: absolute; background-color: #F00; border-radius: 10px 10px 0px 0px; left: 490px; top: 57px;color:#FFF;text-align:center;"> &nbsp;&nbsp;<b>NEW CLIENT</b></div> <div class="clearfix"></div>
                      <!-- <img src="img/warn.png" width="40" height="34" />
                      <h3><font color="#000">&nbsp;New client</font></h3> -->
                      <div id="overv2" style="background-color:#FFF; background-image:none;">
                      <h3><font color="#FF0000">Find a client/Trouver un client</font></h3>
                      <iframe src="find.php" style="width:1070px; height:440px; border:0px solid #aaa; top:0px;"></iframe>
                      </div>  
                    </div>
                          <div class="ml-1 musadiv">
                                  <center><br />
<form  method="POST"  action="nu1.php" >
<table>
 <tr>
   <td align="right">Date</td><td><input type="text" size="10"  value="<?php echo $date ?>" placeholder="" name="date" /></td>
   </tr>
 
    <tr>
   <td><strong>NOM DU PATIENT(Beneficiaire)</strong></td><td><input type="text" size="50" placeholder="" name="beneficiary" value="<?php echo $fullname; ?>" /></td>
   </tr>
   
   <tr>
   <td align="right">Date de naissance</td><td> 
   <select name="d">
   <option value="<?php if(!empty($ages)){echo date('d',strtotime($ages));} ?>"><?php if(!empty($ages)){echo date('d',strtotime($ages));} ?></option>
   <?php $d=0; 
   for ($d=1;$d<=31;$d++) 
         { echo '<option value="'.$d.'">'.$d.' </option>';  }		 		 
		 ?>
   </select>
   
   <select name="m">
   <option value="<?php if(!empty($ages)){echo date('m',strtotime($ages));} ?>"><?php if(!empty($ages)){echo date('m',strtotime($ages));} ?></option>
   <?php $m=0; 
   for ($m=1;$m<=12;$m++) 
         { echo '<option value="'.$m.'">'.$m.' </option>'; }		 		 
		 ?>
   </select>
   
   <select name="age">
   <option value="<?php if(!empty($ages)){ echo date('Y',strtotime($ages));} ?>"><?php if(!empty($ages)){ echo date('Y',strtotime($ages));} ?></option>
   <?php $age=0; 
   for ($age=date('Y');$age>=date('Y')-100;$age--) 
         {  echo '<option value="'.$age.'">'.$age.' </option>';   }		 
		 ?>
   </select>      
   </td>
   </tr>   
   <tr>
   <td align="right">Sexe</td><td><select name="sex"><option value="<?php echo $sex ?>"><?php echo $sex ?></option><option value="F">Female</option><option value="M">Male</option></select></td>
   </tr>         
   <tr>
   <td align="right">Telephone</td><td><input autocomplete="off" type="text" size="15" value="<?php echo $tel ?>" placeholder="" name="tel" /></td>
   </tr>    
    <tr>
   <td align="right">Mere</td><td><input autocomplete="off" type="text" size="50" value="<?php echo $mother ?>" placeholder="" name="mother" /></td>
   </tr>       
   <tr>
   <td align="right">Pere</td><td><input autocomplete="off" type="text" size="50"  value="<?php echo $father ?>"placeholder="" name="father" /></td>
   </tr>         
   <tr>
   <td align="right">Nationalite</td><td><input autocomplete="off" type="text" size="20" placeholder="" value="Rwanda" name="nationality" /></td>
   </tr>         
   <tr>
   <td align="right">District</td><td><input autocomplete="off" type="text" size="20" value="<?php echo $district ?>" placeholder="" name="district" /></td>
   </tr>      
   <tr>
   <td align="right">Secteur</td><td><input autocomplete="off" type="text" size="20" value="<?php echo $sector ?>" placeholder="" name="sector" /></td>
   </tr>      
   <tr>
   <td align="right">Cellure</td><td><input autocomplete="off" type="text" size="20" value="<?php echo $cell ?>" placeholder="" name="cell" /></td>
   </tr>      
   <tr>
   <td align="right">ASSURANCE</td><td>
   <select style="font-size:20px;" name="insurance">
   <option value="<?php echo $insurance ?>"><?php echo $insurance ?></option>
   <option value="RSSB" >RSSB</option>
   <option value="UAP">UAP</option>
   <option value="SANLAM">SANLAM</option>
   <option value="PRIVE">PRIVE</option>
   <option value="MMI">MMI</option>
   <option value="RADIANT">RADIANT</option>
   </select>   
   <input  type="hidden" value="<?php echo $client_id ?>"  name="client_id" />   
   </td>
   </tr>
   <tr>
   <td align="right"><font color="#FF0000"><strong>FICHE?</strong></font></td><td>
   <select style="font-size:20px;" name="fiche">   
   <option selected="selected" value="1" >OUI</option>
   <option value="0">NON</option>   
   </select>   
   <input  type="hidden" value="<?php echo $client_id ?>"  name="client_id" />   
  </td>
  </tr>                                      
  <tr>
  <td></td>
  <td>    
  <button class="button" ><span>SUIVANT</span></button>
  </td>
  </tr>
</table>
</form>
<font size="+5">
<?php if ($client_id>0)echo '#'.$client_id ?>
</font>
</center>
</div>
</div>
</div>
<div style="position:absolute;height:78px;border-radius:0px 0px 30px 30px;opacity:0.95;background-image:url(img/logo.PNG);background-size:contain;background-repeat:no-repeat;width:200px;background-color:#FFF;box-shadow:0px 0px 5px 0px #000;left:69px;z-index:10;">
</div>
</div>
</div>
<?php include('foot.php'); ?>