<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>




<div style="width: 231px; height: 24px; position: absolute; background-color:transparent; border-radius: 10px 10px 0px 0px; color:#FFF; left: 524px; top: 59px;"> &nbsp;&nbsp;<b>RSSB(RAMA)</b>
<div style="background-color: #C2E7FC; border: 1px solid #09F; color:#000; box-shadow: 0px 0px 5px 0px #000; border-radius: 5px 5px 5px 5px; width: 757px; height: 288px; position: absolute; left: -525px; top: 24px;">






<!-- LIVE SEARCH CODE--> 


<!--<div><form id="searchform">
		<div>
		 &nbsp;&nbsp;&nbsp;<input type="text" value="Shakisha inkuru" onblur="if (this.value == '')  {this.value = 'Shakisha inkuru';}" onfocus="if (this.value == 'Shakisha inkuru') {this.value = '';}"  onkeyup="lookup(this.value);"/>
		</div>
		<div id="suggestions"></div>-->


<center>
<br />

<?php  include('find_rssb_t.php'); 


if(!empty($id))
				{		
             
echo'
<strong>RSSB Client found!</strong>
<form  method="POST" action="details.php" target="_parent">
<table>
   <tr>
   <td>Date</td><td><input type="text" size="10"  value="'.date("Y-m-d") .'" placeholder="" name="date" /></td>
   </tr>
   <tr>
   <td>Serie N<sup><u>o</u></sup>.</td><td><input type="text" size="10" placeholder="" name="serie" /></td>
   </tr>
   <tr>
   <td>N<sup><u>o</u></sup>. d\'affiliation</td><td><input type="text" size="15" value="'.$aff_num.'" name="insurance_code" /></td>
   </tr>
   <tr>
   <td>Noms de l\'adherant</td><td><input type="text" size="40" value="'. $adherent .'" name="adherent" /></td>
   </tr>
   <tr>
   <td>Departement affectaire</td><td><input type="text" size="40" placeholder="" name="department_aff" /></td>
   </tr>
   <tr>
   <td>Beneficiaire</td><td><input type="text" size="40" value="'.$fname.' '.$lname.'" name="beneficiary" /></td>
   </tr>
   <tr>
   <td>Age</td><td> <select name="age">
   <option value=""></option>';
    $age=0; 
   for ($age=date('Y');$age>=1935;$age--) 
         { 
		     echo '<option value="'.$age.'">'.$age.' </option>';
			 
	     }
		 
		 
         
       echo'  
         </select></td>
   </tr>
   <tr>
   <td>Sexe</td><td><select name="sex"><option value=""></option><option value="F">Female</option><option value="M">Male</option></select></td>
   </tr>
  <tr>
  <td></td>
  <td>
  <input type="hidden" name="insurance" value="RSSB" /><button class="button" ><span>Ajouter</span></button>
  </td>
  </tr>


</table>


</form>';
}
else
{
	echo'<strong>Sorry, no records</strong>';
}
?>
</center>
</div>
</div>









</body>
</html>