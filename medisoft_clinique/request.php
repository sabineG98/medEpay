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
  background-color:#C40000;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 3px;
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
.test:hover{ background-color:#F4F4F4;}
input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
</style>
</head>



<body>



<?php
session_start();
include('link.php');
if(isset($_GET['code']))
{
$code=$_GET['code'];
$_SESSION['code1']=$code;
}
else
{
$code=$_SESSION['code1'];
}

//echo $code;



if(isset($_POST['req_id']))
{
	$req_id=$_POST['req_id'];
	$med = "SELECT * FROM req, products WHERE req.req_id='$req_id' AND req.prod_id=products.prod_id";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $prod_id=$rowmed['prod_id'];
					 $qtty=$rowmed['qtty'];
					 //$stock=$rowmed['stock'];
					 $order=$rowmed['order_qtty'];
										 
				 }

$newq=$qtty-$order;
//$news=$stock+$order;
 mysqli_query ($link,"UPDATE products SET qtty =qtty-$order WHERE prod_id =$prod_id");//update the distribution qtty
 //mysqli_query ($link,"UPDATE products SET stock ='$news' WHERE prod_id =$prod_id");//update the distribution qtty

 mysqli_query ($link,"DELETE FROM req WHERE req_id =$req_id ");//update the distribution qtty

				 
	
}






?>



<table style="font-size:13px; border-collapse: collapse;" width="0" border="0" cellspacing="0" cellpadding="0">
  
  
  <tr bgcolor="">
    <td colspan="7"></td>
   
  </tr>
  <tr bgcolor="#CCCCCC">
    <td><b>No</b></td>
    <td><b>DESIGNATION</b></td>
    <td><b>QTT PRECEDENT</b></td>
    <td colspan=""><b>QTTE COMDE</b></td>
     <td colspan=""><b>ANNULER</b></td>
   

  </tr>
  
  <?php 
$i=0;

//find the month
$med = "SELECT *  FROM products, req WHERE products.prod_id=req.prod_id AND req.req_number=$code ORDER BY req_id DESC ";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					
					 
					 $i++;
					 if ($i%2==0)
					   echo'<tr bgcolor="#D9FFD9">';
					// else
					// echo'<tr height="15" bgcolor="#D8D8D8">';

					 else
					  echo'<tr>';
					 
					 echo '<form  action="request.php" method="post">';
					 echo '<td width="35">'.$i.'</td>';
					 echo '<td width="300">'.$rowmed['description'].'</td>';
					 echo '<td width="130" bgcolor="">'.$rowmed['prev_qtty'].'</td>';
					 echo '<td width="130" bgcolor="">'.$rowmed['order_qtty'].'</td>';
					 echo '<input type="hidden" name="req_id" value="'.$rowmed['req_id'].'">';
				     echo '<td><button class="button" ><span>x</span></button></td>';

					 echo '</form>';
					 //echo '<td><form action="tarif.php" method="post">';
					 //echo '<input type="hidden" name="mid" value="'.$rowmed['prod_id'].'">';
					 //echo'<input type="submit" value="" style="background-image:url(img/del.png); background-repeat:no-repeat;" /></form>
					 //</td>';

					echo'</tr>';
				 }
	
?>
  
  
  
  
  
  
  
  
  
  
  
  </table>
</body>
</html>