<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::MEDICAMENTS</title>

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


</head>

<body bgcolor="">
<h3> Les copies des factures par jour</h3>



<table width="0" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="copies.php" method="post" target="_blank">
  <tr>
    <td>
    
    <select style="width:300px;" name="item">';
       <option  value="souche">COPIES DES FACTURES</option>
	  <option  value="tableau">RELEVE DE CAISSE </option>
					
</select>
  
    
    
    
    </td>
    
    
    <td>Date</td>
    
    
    
    
    <td><input type="text" size="10" value="<?php echo date('Y-m-d') ?>" name="date">
    
    
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>
 </form>
</table>







</body>
</html>