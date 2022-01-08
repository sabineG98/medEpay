<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RELEVE DE CAISSE</title>
</head>

<body>



<?php 

$med1 = "SELECT*  FROM address ";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                     $ds=$rowmed1['district'];
										 $hc=$rowmed1['hc'];

				                       }


?>






REPUBLIC OF RWANDA <br />
<img src="img/header.JPG" /><br />
MINISTRY OF HEALTH<br />
<?php echo $ds; ?>  DISTRICT<br />
<?php echo $hc; ?>  HC<br />


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

$bigt=0;
$j=1;


for ($i=$interval1; $i<=$interval2; $i++)
{
	
$products = "SELECT* FROM receipt WHERE receipt_id=$i AND active =0";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ');
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					  if ($j%2==0)
					   echo'<tr bgcolor="#D9FFD9">';
					
					 else
					  echo'<tr>';
					 
					 
					 
                     echo'<td>'.$j++.'</td>';
					 include('copy.php');
					 
			         echo'</tr>';
			
				 }
				 
}


?>





<tr>
    <td colspan="4" bgcolor="#666666"></td>
    
    
    <td><strong>Total</strong></td>
    <td >
    <strong><?php 
echo $bigt;
echo ' FRW';
?></strong>
    
    
    
    </td>
    <td bgcolor="#666666"></td>
  </tr>
  
  
  <tr>
    <td colspan="4" bgcolor="#666666"></td>
    
    
    <td><strong><font color="#FF0000">Dettes</strong></font></td>
    <td >
    <strong>
    
    <font color="#FF0000">
    <?php
	
	
						 $gtotal=0;
	$products = "SELECT SUM(reste) AS total_dette FROM dettes2 WHERE  date ='$date' ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ');
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			 
	            $total_dettes= $row['total_dette'];
				
				 }
				 
				 
				 
				 
					 if ($total_dettes>0)
					 echo $total_dettes.'  FRW';
					 else 
					 echo 0; 
	?>
    
    
    
    
    </font>
    
    
    </strong>
    
    
    
    </td>
    <td bgcolor="#666666"></td>
  </tr>
  
  
  
  
  
  
  <tr>
    <td colspan="4" bgcolor="#666666"></td>
    
    
    <td><strong><font size="+1">TOTAL EN CAISSE</font></strong></td>
    <td >
    <strong><font size="+1"><?php 
echo $bigt-$total_dettes;
echo ' FRW';
?></font></strong>
    
    
    
    </td>
    <td bgcolor="#666666"></td>
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
</center>
</body>
</html>