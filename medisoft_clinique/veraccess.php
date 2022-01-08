<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php 
include('link.php');
session_start();
if($_SESSION['veri']!='Verification')
{
    header("Location: no.php");
    exit;
} 



?>

<?php 


if(isset($_POST['pass1'])&&($_POST['pass2']))
{
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	//$user=$_POST['user'];
	//$pw=$_POST['pw'];
	$pass=md5($_POST['pass1']);
	
	

if($_POST['pass1']==$_POST['pass2'])
   {
	  mysqli_query ($link,"TRUNCATE TABLE veraccess");
	  mysqli_query ($link,"INSERT INTO veraccess (pass) 
                               VALUES ('$pass')"); 
    	  echo '<p style="background-color:green;"><strong>Mot de passe crée avec succès!</strong><p/>';
   }
	 else
	  echo '<p style="background-color:red;"><strong>Les deux mots de pass sont differents.</strong><p/>';
}

?>

<?php

$med = "SELECT COUNT(accessid) as access FROM veraccess ";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $access=$rowmed['access'];
			
				 }
?>


<!--<table border="0">

<form action="veraccess.php" method="post">
<tr>
<td>
 Old password
 </td>
 <td>
 <input type="text" name="old"  />
 </td>
 </tr>
 <tr>
 <td>
 New password
 </td>
<td> <input type="text" name="new"  /></td>
</tr>


<tr>
 <td>
 Confirm
 </td>
<td> <input type="text" name="confirm"  /></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Save" /></td>
</tr>

</form>
</table>';
-->


<table border="0">

<form action="veraccess.php" method="post">
<tr>
<td>
 Password
 </td>
 <td>
 <input type="password" name="pass1"  />
 </td>
 </tr>
 <tr>
 <td>
 Confirm
 </td>
<td> <input type="password" name="pass2"  /></td>
</tr>

<tr>
<td></td>
<td><input type="submit" value="Save" /></td>
</tr>

</form>
</table>';

</body>
</html>