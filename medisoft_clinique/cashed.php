<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::MEDICAMENTS</title>

<?php 
error_reporting(E_ERROR | E_PARSE);

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>







<?php
include('link.php');

?>

<style>
.coment:hover{
		box-shadow: 0px 0px 10px 0px #000;
		background-color:#C5E2E2;
		
}
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

<body bgcolor="">

<h3> Find an invoice</h3>


<table width="0" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="d.php" method="post">
  <tr>
    <th>RECEIPT#</th>
    <td><input type="text" value="" name="receipt">
    
    
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>
 </form>
</table>



<div class="coment" style=" padding: 5px; border-radius: 10px; box-shadow: 20px; position: absolute; left: 375px; top: 10px;">
  <?php					  
						  		 

	echo '<table style="font-size:11px; border-collapse: collapse;" widtd ="0" border="1" bordercolor="#999999" cellspacing="0" cellpadding="0">

  <tr bgcolor="#CCCCCC">
    <td><strong>No</strong></td>
    <td><strong>NAMES</strong></td>
    <td><strong>CODE</strong></td>
    <td><strong>REC#</strong></td>
    
    <td><strong>ITEMS</strong></td>
    <td ><strong>TOT</strong></td>
	<td><strong>DATE</strong></td>
    <td ><strong>USER</strong></td>
  </tr>
';


$today=date('Y-m-d');
	$j=1;
$products = "SELECT DISTINCT receipt_id FROM receipt WHERE date='$today' AND active>0 ORDER BY receipt_id DESC  ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					  if ($j%2==0)
					  {
					   echo'<tr bgcolor="#D9FFD9">';
					   }
					 else
					 {
					  echo'<tr>';
					 }
					 
					 
                     echo'<td>'.$j++.'</td>';
					 
					 include('copy2.php');
					 
			         echo'</tr>';
			
				 }
				 
          




					 
					 
					 
?>
  </div>
 
</body>
</html>