<?php

/*
include"link.php";

if (isset($_POST["dperfac"])) 
$deletep=$_POST['dperfac'];

mysqli_query ($link,"DELETE FROM `facture` WHERE Perfac='$deletep'");
*/

//echo $deletep;

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<script>
function show_alert()
{
   return confirm("Are you sure to DELETE?");
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div style="position:absolute; border: 1px solid #09F; background-color:#CCC; box-shadow: 0px 0px 5px 0px #000; color:#000; left: 890px; top: 168px; width: 258px; height: 29px;">
<center><strong>ALL BILLS</strong></center>

</div>
<div style="position:absolute; border: 1px solid #09F; background-color:#F7F7F7; padding:7px;  border-radius: 0px 0px 13px 13px;
 box-shadow: 0px 0px 5px 0px #000; color:#000; height:240px; overflow:auto; top:202px; left:890px;  width: 245px;">
<table border="0" cellpadding="0" cellspacing="0">

<?php
$dperiod = "SELECT DISTINCT Perfac FROM facture ORDER BY Record_date DESC  ";
       $dmonth = mysqli_query($link, $dperiod );
       
while($dmois = mysqli_fetch_array($dmonth, MYSQLI_ASSOC))
{
	
	echo '<form action="summary1.php" method="post" >';
	echo '<tr><td width="200">';
	$dukwezi=$dmois['Perfac'];
	echo '<a href=summary1.php?perfac='.$dukwezi=$dmois['Perfac'].'>'.$dukwezi=$dmois['Perfac'].'</a>';
	echo '<input type="hidden" name="dperfac" value="'.$dukwezi.'" >';
	echo '<hr></td><td><input type="submit"  value="x" onclick=" return show_alert()"></td></tr>';
	echo '</form>';
	//$facility=$mois['Facility'];
	
}
echo'<table>';
?>

</div>









</body>
</html>