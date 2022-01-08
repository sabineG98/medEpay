
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
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

if(isset($_POST['tarif']))
{

$id=$_POST['pid']; 
$new=$_POST['tarif']; 
$date=date('Y-m-d');
mysqli_query ($link,"UPDATE products SET unit_price ='$new', date='$date'  WHERE prod_id =$id");
}

if(isset($_POST['mid']))
{

$mid=$_POST['mid']; 

mysqli_query ($link,"DELETE FROM products WHERE prod_id='$mid'");
}


if(isset($_POST['item'])&&($_POST['unityp']))
{
	
$item=$_POST['item']; 
$assure=$_POST['insured'];
$type=$_POST['type']; 
$unityp=$_POST['unityp'];
$date=date('Y-m-d');

mysqli_query ($link,"INSERT INTO products (description, type, unit_price, date, insured) 
                               VALUES ('$item', '$type', '$unityp', '$date', '$assure')");

}







?>


</head>

<body>









<form action="tarif.php" method="post">
<table width="0" border="1" cellspacing="0" cellpadding="0">
  <tr bgcolor="#AAD5FF">
    <th >NOUVEAU MEDICAMENT</th>
    <th >ASSURE?</th>
    <th colspan="2">PRIX UNITAIRE</th>
  </tr>
  <tr>
    <td><input type="text"  name="item" size="60"  /></td>
    <td>
    <select name="insured">
    <option value="1">Oui</option>
    <option value="0">Non</option>
        </select>
     </td>
    <td><input type="text" name="unityp" size="10" /></td>
    <input type="hidden" name="type" value="med" />
    <td><input type="submit" value="" style="background-image:url(img/add.jpg); background-repeat:no-repeat;" /></td>
  </tr>
</table>
</form>
<hr />












<table width="0" border="0" cellspacing="0" cellpadding="0">
  
  
  <tr bgcolor="#AAD5FF">
    <th colspan="7">MEDICAMENTS</th>
   
  </tr>
  <tr bgcolor="#CCCCCC">
    <td><b>No</b></td>
    <td><b>DESIGNATION</b></td>
    <td><b>ASSURE?</b></td>
    <td><b>PRIX ACTUEL</td>
    <td colspan="3"><b>NOUVEAU PRIX</b></td>
    

  </tr>





<?php 
$i=0;

//find the month
$tot=0;
$med = "SELECT* FROM products ORDER BY description ASC";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $d=date('Y-m-d');
					 
					 $i++;
					 if ($d==$rowmed['date'])
					   echo'<tr bgcolor="#D9FFD9">';
					 elseif($i%2==0)
					 echo'<tr height="15" bgcolor="#D8D8D8">';

					 else
					  echo'<tr>';
					 
					 echo '<form  action="tarif.php" method="post">';
					 echo '<td width="35">'.$i.'</td>';
					 echo '<td width="300">'.$rowmed['description'].'</td>';
					 echo '<td width="100">';
					 if($rowmed['insured']=='1')
					 echo'Oui';
					 else
					 echo'Non';
					 echo '</td>';
                     echo '<td width="130" bgcolor="">'.$rowmed['unit_price'].'</td>';
					 echo '<td><input type="text" name="tarif"></td>';
					 echo '<input type="hidden" name="pid" value="'.$rowmed['prod_id'].'">';
					 echo '<td><input type="submit" value="" style="background-image:url(img/upd.jpg); background-repeat:no-repeat;" /></td>';

					 echo '</form>';
					 echo '<td><form action="tarif.php" method="post">';
					 echo '<input type="hidden" name="mid" value="'.$rowmed['prod_id'].'">';
					 echo'<input type="submit" value="" style="background-image:url(img/del.png); background-repeat:no-repeat;" /></form>
					 </td>';

					echo'</tr>';
				 }
	
?>

  
</table>
<br />
</div>



</body>
</html>