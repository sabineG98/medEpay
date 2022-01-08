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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="script.js"></script>


<!--<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/print.css" type="text/css" media="screen" />
<link rel="pingback" href="xmlrpc.php" />-->


<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<title>MBS::.Data Entry</title>





<script type="text/javascript" language="javascript">

function autocalc(oText)
{
	if (isNaN(oText.value)) //filter input
	{
		alert('Numbers only!');
		oText.value = '';
	}
	var field, val, oForm = oText.form, Total_amount = a = 0;
	for (a; a < arguments.length; ++a) //loop through text elements
	{
		field = arguments[a];
		val = parseFloat(field.value); //get value
		if (!isNaN(val)) //number?
		{
			Total_amount += val; //accumulate
		}
	}
	oForm.Total_amount.value = Total_amount; //out
}
		
		
		
		function autolab(oText)
{
	if (isNaN(oText.value)) //filter input
	{
		alert('Numbers only!');
		oText.value = '';
	}
	var field, val, oForm = oText.form, Laboratory = a = 0;
	for (a; a < arguments.length; ++a) //loop through text elements
	{
		field = arguments[a];
		val = parseFloat(field.value); //get value
		if (!isNaN(val)) //number?
		{
			Laboratory += val; //accumulate
		}
	}
	oForm.Laboratory.value = Laboratory; //out
}

</script>







</head>

<body>

<div class="all_container">
<div class="liguini"><br />

<br /><br /><br /><br /><br />
<hr />

</div>
<img src="img/facturation1.jpg" height="97" class="img1">

<div class="content">
<div style="background-color:#CCC; width:744px; height:43px; position:absolute; left: 158px; top: 168px;">

<!-- LIVE SEARCH CODE--> 


<!--<div><form id="searchform">
		<div>
		 &nbsp;&nbsp;&nbsp;<input type="text" value="Shakisha inkuru" onblur="if (this.value == '')  {this.value = 'Shakisha inkuru';}" onfocus="if (this.value == 'Shakisha inkuru') {this.value = '';}"  onkeyup="lookup(this.value);"/>
		</div>
		<div id="suggestions"></div>-->





<form  method="POST" action="details.php">
<table>
   <tr>
   <td><input type="text" size="50" placeholder="CODE MUTUELLE DE SANTE" name="code" /></td>
   <td><input type="text" size="50" placeholder="NOMS DU CLIENT" name="fullname" /></td>
   <td><input type="submit" value="Ajouter" /></td>
   </tr>
  

</table>


</form>
</div>
<br /><br /><br />
<hr />
<h3></h3>





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