<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<link href="dist/css/style.min.css" rel="stylesheet">
<title>.::users manager</title>
<?php 
error_reporting(0 | 1);
session_start();
if($_SESSION['post']!='accountant' && $_SESSION['post']!='titulaire' && $_SESSION['post']!='admin'){
    header("Location: no.php");
    exit;
} 
?>
</head>
<body>
<div  style=" width:100%; box-shadow: 0px 0px 1px 0px #000; border: 1px solid #09F; overflow:auto; background-color:#FFF; left: 0px; top: 35px;">
<?php
include('link.php');
if(isset($_POST['level']))
{
$id=$_POST['pid']; 
$new=$_POST['level']; 
//$date=date('Y-m-d');
//mysqli_query ($link,"UPDATE products SET qtty ='$new', date='$date'  WHERE prod_id =$id");
mysqli_query ($link,"UPDATE users SET levels ='$new' WHERE id =$id");
}

if(isset($_POST['mid']))
{
$mid=$_POST['mid']; 
mysqli_query ($link,"DELETE FROM users WHERE id='$mid'");
}

if(isset($_POST['item'])&&($_POST['unityp']))
{
$item=$_POST['item']; 
$assure=$_POST['insured'];
$type=$_POST['type']; 
$unityp=$_POST['unityp'];
$date=date('Y-m-d');
mysqli_query ($link,"INSERT INTO products (description, type, unit_price, date, insured) VALUES ('$item', '$type', '$unityp', '$date', '$assure')");
}
?>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-sm table-bordered table-hover text-dark">    
  <tr bgcolor="#AAD5FF"><th colspan="9"><center><strong><b>EXISTING USERS</b></strong></center></th></tr>
  <tr bgcolor="#000" class="text-white">
    <td><b>No</b></td>
    <td><b>NAMES</b></td>
    <td><b>ROLES</td>
    <td colspan=""><b>USERNAMES</b></td>
    <td colspan=""><b>SIGNATURES&nbsp;</b></td>
    <td colspan="2"><b>LEVELS</b></td>
	<td colspan="2"><b>ACTIONS</b></td>	
  </tr>

<?php 
$i=0;
//find the month
$tot=0;
$med = "SELECT * FROM users ORDER BY fullname ASC";
        $retvalmed = mysqli_query($link,$med);
        if(! $retvalmed )
           { die('Could not get data: ' . mysqli_error($link));  }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {					 
					 $i++;					 
					 if($i%2==0)
					 echo'<tr height="10" bgcolor="#D8D8D8">';
					 else
					  echo'<tr bgcolor="#999">';					 
					 echo '<form  action="usermanager.php" method="post">';
					 echo '<td width="35">&nbsp;'.$i.'</td>';
					 echo '<td width="300">'.$rowmed['fullname'].'</td>';
                     echo '<td width="130" bgcolor="">'.$rowmed['post'].'</td>';
					 echo '<td width="130" bgcolor="">'.$rowmed['username'].'</td>';
					 echo '<td width="100" bgcolor="">';
					 if(empty(substr($rowmed['signature'],1))){echo '<a onclick="return hs.htmlExpand(this,{objectType:\'iframe\',width:600})" href="docs/index_user.php?id='.$rowmed['id'].'">No Signature</a>';}else{echo '<a style="text-decoration:none;color:#000;" onclick="return hs.htmlExpand(this,{objectType:\'iframe\',width:850})" href="docs/index_user_edit.php?id='.$rowmed['id'].'">Signed <img src="img/ref.png" height="20px" style="mix-blend-mode:multiply;"/></a>';}echo'</td>';
					 echo '<td width="100" bgcolor="">'.$rowmed['levels'].'</td>';					 
					 echo '<input type="hidden" name="pid" value="'.$rowmed['id'].'">';
					  if ($_SESSION['post']=='accountant'|| $_SESSION['post']=='titulaire'|| $_SESSION['post']=='admin'){
					 //echo '<td><input type="text" style=" width:30px;" name="level"></td>';/*to-set-user's-level*/
					 echo '<td><select style=" width:150px;" name="level">
					 			<option value="0"></option>
								<option value="1">Bill Printing Privilege</option>
								<option value="2">Create Account Privilege</option>
								<option value="3">Stock Privilege</option>
					 		</td>';/*to-set-user's-level*/
					/*to-set-user's-level*/
					 echo '<td style="text-align:right;"><input type="submit" value="" style="background-image:url(img/upd.jpg);background-repeat:no-repeat;width:23px;border:0px;" /></td>';
					  }
					 echo '</form>';
					 echo '<td><form action="usermanager.php" method="post">';
					 echo '<input type="hidden" name="mid" value="'.$rowmed['id'].'">';
					 if ($_SESSION['post']=='accountant'|| $_SESSION['post']=='titulaire'|| $_SESSION['post']=='admin')
					 echo'<input type="submit" value="" style="background-image:url(img/del.png); background-repeat:no-repeat;  width:23px; border:0px;" />';
					 echo'</form>
					 </td>';
					echo'</tr>';
				 }	
?>
</table>
<br />
</div>
<br />
</div>
</div>
</div>
</body>
</html>