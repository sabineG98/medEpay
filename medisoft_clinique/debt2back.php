<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::DETTES</title>

<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>


</head>
<body>


<div  style=" width:920PX; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; overflow:auto; position:absolute; background-color:#FFF; left: 4px; top: 35px;">


<?php
include('link.php');

if(isset($_POST['pay']))
{
$dette=$_POST['dette_id'];
$reste=$_POST['reste']; 


$receipt_id=$_POST['receipt_id'];

$client_id=$_POST['client_id'];
$cname=$_POST['cname'];
$pay=$_POST['pay']; 
$rem=$reste-$pay;
$date=date('Y-m-d');
$name=$_SESSION['name'];
mysqli_query ($link,"UPDATE dettes2 SET reste=$rem  WHERE dette_id =$dette");



//get the number
$number = "SELECT receipt_id  FROM receipt ORDER BY receipt_id DESC LIMIT 1";
                        $retvalmed1 = mysqli_query($link, $number);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($row = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $no=$row['receipt_id'];
				                       }

$no=$no+1;





//mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item, unitp, qtty, date, user) 
                             //  VALUES ('$no', '$client_id', '$cname', 'Remboursement-dette' , '$pay', '1', '$date', '$name')");
				

                             mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name, item,type, unitp, qtty, date, user) 
                             VALUES ('$no', '$client_id', '$cname', 'Remboursement-dette','Remboursement' , '$pay', '1', '$date', '$name')");
      



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












<table style="font-size:13px; border-collapse: collapse;" widtd ="0" border="1" bordercolor="#999999" cellspacing="0" cellpadding="0">
  
  
  <tr bgcolor="#AAD5FF">
    <th colspan="15">INFORMATION</th>
   
  </tr>
  <tr bgcolor="#CCCCCC">
    <td><b>No</b></td>
    <td><b>CODE</b></td>
    <td><b>NOMS</b></td>
    <td><b>NO. D'IDENTITE</td>
    <td colspan=""><b>TELEPHONE</b></td>
    <td colspan=""><b>DISTRICT</b></td>
    <td colspan=""><b>SECTEUR</b></td>
    <td colspan=""><b>CELLULE</b></td>
    <td colspan=""><b>VILLAGE</b></td>
    <td colspan=""><b>MONTANT FACTURE</b></td>
    <td colspan=""><b>MONTANT PAYE</b></td>
    <td colspan=""><b>MONTANT EN DETTE</b></td>
    <td colspan=""><b>DATE DE PAYEMENT</b></td>
    <td colspan="2"><b>MONTANT REMBOURSE</b></td>

  </tr>





<?php 
$i=0;

//find the month
$tot=0;
$med = "SELECT* FROM dettes2,clients WHERE clients.client_id=dettes2.client_id AND reste>0 ORDER BY dettes2.date  DESC";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $d=date('Y-m-d');
					 
					 $i++;
					 
					 if($i%2==0)
					 echo'<tr height="15" bgcolor="#D8D8D8">';

					 else
					  echo'<tr>';
					 
					 echo '<form  action="debt2.php" method="post">';
					 echo '<td width="35">'.$i.'</td>';
					 echo '<td >'.$rowmed['client_id'].'</td>';
					 echo '<td >'.$rowmed['beneficiary'].'</td>';
                     echo '<td >'.$rowmed['nid'].'</td>';
					 echo '<td>'.$rowmed['tel'].'</td>';
					 echo '<td>'.$rowmed['district'].'</td>';
					 echo '<td>'.$rowmed['sector'].'</td>';
					 echo '<td>'.$rowmed['cell'].'</td>';
					 echo '<td>'.$rowmed['village'].'</td>';
					 echo '<td>'.$rowmed['total'].'</td>';
					 echo '<td>'.$rowmed['paid'].'</td>';
					 echo '<td style="background-color:red;">'.$rowmed['reste'].'</td>';
					 echo '<td>'.$rowmed['pdate'].'</td>';
					 echo '<td><input type="text" size="10" name="pay"></td>';
		             echo '<input type="hidden" name="dette_id" value="'.$rowmed['dette_id'].'">';
					 
					 echo '<input type="hidden" name="receipt_id" value="'.$rowmed['receipt_id'].'">';
					 echo '<input type="hidden" name="client_id" value="'.$rowmed['client_id'].'">';
					 echo '<input type="hidden" name="cname" value="'.$rowmed['beneficiary'].'">';
                     echo '<input type="hidden" name="reste" value="'.$rowmed['reste'].'">';

					 
					 echo '<td><input type="submit" value="" style="background-image:url(img/upd.jpg); background-repeat:no-repeat;" /></td>';

					 echo '</form>';
					 echo '<td>
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