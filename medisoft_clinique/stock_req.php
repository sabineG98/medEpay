<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::TARIFICATION</title>


<?php 

session_start();

?>




<?php
include('link.php');

if(isset($_POST['tarif']))
{
$code=$_POST['code'];
$id=$_POST['pid']; 
$qtty=$_POST['qtty']; 
$new=$_POST['tarif']; 
$req=$new+$qtty; 
$date=date('Y-m-d');

mysqli_query ($link,"UPDATE products SET stock ='$req', date='$date'  WHERE prod_id =$id");



if ($new>0)
 {
mysqli_query ($link,"INSERT INTO stock_req (prod_id, req_number, preqtty, qtty) 

                               VALUES ('$id', $code, $qtty, $new)");
 }
}



/*if(isset($_POST['mid']))
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
*/






?>


</head>

<body>













<?php
if(isset($_POST['supplier']))
{
	
$code=$_POST['code']; 
$date=$_POST['date'];
$supplier=$_POST['supplier'];
$period=date("M-Y", strtotime($date));

$_SESSION['supplier']=$supplier;
$_SESSION['code']=$code;

	 $per = "SELECT supp_id  FROM suppliers WHERE supp_name='$supplier'";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
					 
					 				
                 $supp_id=$rowper['supp_id'];
	             }
				 
				 mysqli_query ($link,"INSERT INTO stock_req_code (supp_id, period, date) 
                               VALUES ('$supp_id', '$period', '$date')");
				 
				 
			}	 
	
	?>




<?php 

$supplier=$_SESSION['supplier'];
$code=$_SESSION['code'];



	 /*$per = "SELECT req_number  FROM stock_req_code ORDER BY time ASC";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				
                 $code=$rowper['req_number'];
	             }*/
				 
	
	?>


<table style="font-size:13px; border-collapse: collapse;" width="0" border="0" cellspacing="0" cellpadding="0">
  
  
<font size="+2" >Requisition CODE.: <strong><?php echo $code ?></strong> Supplier: <strong><?php echo $supplier ?></strong> Date: <strong><?php echo $date ?></strong></font>
  <tr bgcolor="#CCCCCC">
    <td><b>No</b></td>
    <td><b>DESIGNATION</b></td>
    <td><b>RESTES</b></td>
    <td colspan="2"><b>QTTE REQUISITIONNE</b></td>
    

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
					 
					 echo '<form  action="stock_req.php" method="post">';
					 echo '<td width="35">'.$i.'</td>';
					 echo '<input type="hidden" name="code" value="'.$code.'">';
					 echo '<td width="300">'.$rowmed['description'].'</td>';
					 echo '<td width="130" bgcolor="">'.$rowmed['stock'].'</td>';
					 echo '<td><input type="text" name="tarif"></td>';
					 echo '<input type="hidden" name="pid" value="'.$rowmed['prod_id'].'">';
					 
					 
					 					 
										 /*echo '<input type="hidden" name="supp_id" value="'.$supp_id.'">';
					                     echo '<input type="hidden" name="period" value="'.$period.'">';*/


					 
					 echo '<input type="hidden" name="qtty" value="'.$rowmed['stock'].'">';
					 echo '<td><input type="submit" value="" style="background-image:url(img/upd.jpg); background-repeat:no-repeat;" /></td>';

					 echo '</form>';
					 //echo '<td><form action="tarif.php" method="post">';
					 //echo '<input type="hidden" name="mid" value="'.$rowmed['prod_id'].'">';
					 //echo'<input type="submit" value="" style="background-image:url(img/del.png); background-repeat:no-repeat;" /></form>
					 //</td>';

					echo'</tr>';
				 }
	
?>

  
</table>
<br />
</div>



</body>
</html>