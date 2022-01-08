<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
$med1 = "SELECT*  FROM address ";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data:1 ' . mysqli_error($link));
                               }    
          
           
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $ds=$rowmed1['district'];
										 $hc=$rowmed1['hc'];

				                       }


?>







<img src="img/bill2.PNG" /><br />




<h2> RELEVE DE CAISSE DU  <?php echo $date   ?></h2>


<table style="font-size:13px; border-collapse: collapse;" widtd ="0" border="1" bordercolor="#999999" cellspacing="0" cellpadding="0">

  <tr bgcolor="#CCCCCC">
    <td><strong>No</strong></td>
    <td><strong>CLIENT NAME</strong></td>
    <td><strong>CLIENT CODE</strong></td>
    <td><strong>RECEIPT ID</strong></td>
    
    <td><strong>ITEMS</strong></td>
    <td ><strong>TOTAL</strong></td>
    <td ><strong>USER</strong></td>
  </tr>
  
  
  
  
  
  
  <?php
  $i=0;
  $gtot=0;
  $products = "SELECT DISTINCT receipt_id,client_name,client_id,user FROM receipt WHERE date='$date' AND active=1";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data:2 ');
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
  $i++;
  
  echo'<tr>';
   echo' <td>'.$i.'</td>';
   echo' <td>'.$row['client_name'].'</td>';
   echo' <td>'.$row['client_id'].'</td>';
   echo' <td>'.$row['receipt_id'].'</td>';
   
  echo'  <td>';
  
  $t=0;
  $tot=0;
  
    $products1 = "SELECT item, unitp, qtty FROM receipt WHERE receipt_id=".$row['receipt_id']." ";
        $retval1 = mysqli_query($link, $products1);
        if(! $retval1 )
           {
               die('Could not get data:3 ');
            }    
          
           
         while($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                 {
					echo $row1['item'];
					echo '('.$row1['qtty'].'x';
					echo $row1['unitp'];
					echo'=';
					echo $row1['unitp']*$row1['qtty'].')';
					$t=$row1['unitp']*$row1['qtty'];
					$tot+=$t;
					
					echo '<br>';
					 
				 }
  
  $gtot+=$tot;
  
  
  echo'</td>';
  
  echo'  <td>'.$tot.'</td>';
   echo' <td>'.$row['user'].'</td>';
 echo' </tr>';
  
  
  
  
				}
				
				
function dette($date1)//show cash  in dettes
  {
    include('link.php');
   $gtotal=0;
	$products = "SELECT SUM(reste) AS total_dette FROM dettes2 WHERE  date ='$date1'";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data:4 ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			 
	            $total_dettes= $row['total_dette'];
				
				 }
				 
				 
				 
				 
					// if ($total_dettes>0)
					 //echo $total_dettes.'  FRW';
					// else 
					// echo 0; 
   
   $_SESSION['tdette']=$total_dettes;
   
   return $total_dettes;
   
} //end of show cash  in dettes
				
				
				
				
  ?>
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Total en Caisse</td>
    <td><?php echo $gtot ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Dette</td>
    <td><?php echo dette($date) ?></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>Total</strong> </td>
    <td><strong><?php echo $gtot+dette($date) ?>  FRW</strong></td>
    <td>&nbsp;</td>
  </tr>
</table>

<h3>Nom, prenom et Signature du caissiere</h3>
............................................................<br />
............................................................
<h3>Nom, prenom et Signature du Comptable</h3>
............................................................<br />
............................................................
<h3>Nom, prenom et Signature du Titulaire</h3>
............................................................<br />
............................................................


</body>
</html>