
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<link href="dist/css/style.min.css" rel="stylesheet">
<link href="dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
<link href="dist/css/icons/material-design-iconic-font/css/materialdesignicons.min.css" rel="stylesheet">
<link href="dist/css/icons/themify-icons/themify-icons.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::TARIFICATION</title>
<?php 
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
?>
<?php
include('link.php');
if(isset($_POST['tta']))
{
$id=$_POST['pid']; 
$ta=$_POST['tta'];
$tb=$_POST['tb'];
$tc=$_POST['tc'];
$td=$_POST['td'];
$te=$_POST['te'];
$date=date('Y-m-d');
$a=mysqli_query ($link,"UPDATE acts SET ta=$ta, tb=$tb, tc=$tc, td=$td, te=$te, date='$date' WHERE act_id =$id");
if(!$a){ die('Could not Update data :'.mysqli_error($link));}
}

if(isset($_POST['mid']))
{
$mid=$_POST['mid']; 
mysqli_query ($link,"DELETE FROM acts WHERE act_id='$mid'");
}

if(isset($_POST['cat'])&&($_POST['ta']))
{	
$item=$_POST['act']; 
$category=$_POST['cat']; 
$assure=$_POST['insured'];
$type=$_POST['cat'];
$ta=$_POST['ta'];
$tb=$_POST['tb'];
$tc=$_POST['tc'];
$td=$_POST['td'];
$te=$_POST['te'];
$date=date('Y-m-d');
$z=mysqli_query ($link,"INSERT INTO acts (act,category, type, ta, tb, tc, td, te, insured, date) VALUES ('$item','$category', '$type', $ta, $tb, $tc, $td, $te, '$assure', '$date')");
if(!$z){ die('Could not insert data :'.mysqli_error($link));}
}
?>
</head>
<body>
<form action="tarif-actsx.php" method="post">
<table style="font-size:13px; border-collapse: collapse;" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr bgcolor="#AAD5FF">
    <th >NEW ACT </th>
    <th >CATEGORY</th>
    <th >INSURED?</th>
    <th colspan="">MUSA</th>
    <th colspan="">MMI, Mit. Uni</th>
    <th colspan="">RSSB/RAMA</th>
    <th colspan="">PRIVATE INS</th>
    <th colspan="2">PRIVATE</th>
  </tr>
  <tr>
    <td><input type="text"  name="act" size="" class="form-control" /></td>
     <td>
    <select name="cat" class="form-control">
    <option value=""></option>
    <option value="laboratoire">laboratoire</option>
    <option value="soins">soins</option>
    <option value="consultation">consultation</option>
    <option value="ambulance">ambulance</option>
    <option value="hospitalisation">hospitalisation</option>
    </select>
     </td>
    <td>
    <select name="insured" class="form-control">
    <option value="1">Yes</option>
    <option value="0">No</option>
        </select>
     </td>
    <td><input type="text" name="ta" value="" size="10" class="form-control"/></td>
    <td><input type="text" name="tb" value="" size="10" class="form-control"/></td>
    <td><input type="text" name="tc" value="" size="10" class="form-control"/></td>
    <td><input type="text" name="td" value="" size="10" class="form-control"/></td>
    <td><input type="text" name="te" value="" size="10" class="form-control"/></td>
    <td><button style="background:transparent;border:0;height:20px;"><i class="mdi mdi-checkbox-marked-circle h3"></i></button></td>
      

  </tr>
</table>
</form>
<hr />
<div style="border:0px solid #f00;overflow:auto;">
<table style="font-size:13px; border-collapse: collapse;" width="100%" border="1" cellspacing="0" cellpadding="0" class="text-dark table table-sm table-bordered table-hover table-striped">
  <tr bgcolor="#AAD5FF">
    <th  bgcolor="#AAD5FF" colspan="11"><center><b>MEDICAL ACTS -Tarification by minisante</b></center></th>
  </tr>
  <tr bgcolor="#999">
    <td><b>No</b></td>
    <td><b>DESIGNATION</b></td>
    <td><b>TYPE</b></td>
    <td><b>INSURED?</b></td>
    <td bgcolor="#B9DCFF" colspan=""><b>TA<br />MUSA</b></td>
    <td bgcolor="#D8D8D8" colspan="" width="95"><b>TB<br />MMI, Mit. Uni</b></td>
    <td bgcolor="#B9DCFF" colspan=""><b>TC<br />RSSB/RAMA</b></td>
    <td bgcolor="#D8D8D8" colspan="" width="95"><b>TD<br />PRIVATE INS</b></td>
    <td bgcolor="#B9DCFF" colspan=""><b>TE<br />PRIVATE</b></td>    
    <td bgcolor="#D8D8D8" colspan="2"><b>ACTIONS</b></td>    
  </tr>
<?php 
$i=0;
//find the month
$tot=0;
$med = "SELECT* FROM acts ORDER BY act ASC";
        $retvalmed = mysqli_query($link,$med);
        if(! $retvalmed )
           { die('Could not get data: ' . mysqli_error($link));  }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $d=date('Y-m-d');					 
					 $i++;
					 if ($d==$rowmed['date'])
					   echo'<tr bgcolor="#D9FFD9">';					 
					 else
					  echo'<tr>';					 
					 echo '<form  action="tarif-actsx.php" method="post">';
					 echo '<td width="35">'.$i.'</td>';
					 echo '<td width="300">'.$rowmed['act'].'</td>';
					 echo '<td width="70">'.$rowmed['type'].'</td>';
					 echo '<td width="70">';
					 if($rowmed['insured']=='1')
					 echo'Yes';
					 else
					 echo'No';
					 echo '</td>';					 
					 echo '<td width="70" bgcolor="#B9DCFF"><input type="text" name="tta" class="form-control form-control-sm" size="5" value="'.$rowmed['ta'].'"></td>';
					 echo '<td width="70" bgcolor="#D8D8D8"><input type="text" name="tb" class="form-control form-control-sm"  size="5" value="'.$rowmed['tb'].'"></td>';
					 echo '<td width="70" bgcolor="#B9DCFF"><input type="text" name="tc" class="form-control form-control-sm"  size="5" value="'.$rowmed['tc'].'"></td>';					 
					 echo '<td width="70" bgcolor="#D8D8D8"><input type="text" name="td" class="form-control form-control-sm"  size="5" value="'.$rowmed['td'].'"></td>';					 
					 echo '<td width="70" bgcolor="#B9DCFF"><input type="text" name="te" class="form-control form-control-sm"  size="5" value="'.$rowmed['te'].'"></td>';					 
					 echo '<input type="hidden" name="pid" value="'.$rowmed['act_id'].'">';
					 echo '<td><button style="background:transparent;border:0;height:20px;"><i class="mdi mdi-checkbox-marked-circle h3"></i></button></td>';
					 echo '</form>';
					 echo '<td><form action="tarif-actsx.php" method="post">';
					 echo '<input type="hidden" name="mid" value="'.$rowmed['act_id'].'">';
					 echo '<button style="background:transparent;border:0;height:20px;"><i class="mdi mdi-close-circle-outline h3"></i></button></form></td>';
					 echo '</tr>';
				 }
?>
</table>
<br />
</div>
</body>
</html>