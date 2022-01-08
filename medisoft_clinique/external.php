<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



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
</head>

<body>
<strong>SUPPLIERS</strong>
  <hr />
<form action="external.php" method="post" >
<table width="" border="0">
  <tr>
    <td>Supplier name</td>
    <td><input type="text" name="suppname"  /></td>
  </tr>
  <tr>
    <td>Contact person</td>
    <td><input type="text" name="suppcontact"  /></td>
  </tr>
  <tr>
    <td>Telephone</td>
    <td><input type="text" name="suppphone"  /></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="suppemail"  /></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input type="text" name="suppaddress"  /></td>
  </tr>
  
  <tr>
    <td></td>
    <td><button class="button" ><span>Save</span></button></td>
    
  </tr>
  
 </form>
</table>
<?php
include ('link.php');
if(isset($_POST['suppname']))
{
	
$suppname=$_POST['suppname']; 
$suppcontact=$_POST['suppcontact'];
$suppphone=$_POST['suppphone']; 
$suppemail=$_POST['suppemail'];
$suppaddress=$_POST['suppaddress'];

mysqli_query ($link,"INSERT INTO suppliers (supp_name, contact, phone, email, address) 
                               VALUES ('$suppname', '$suppcontact', '$suppphone', '$suppemail', '$suppaddress')");
							   
							   echo'Supplier registered successfuly';

}
?>
</body>
</html>