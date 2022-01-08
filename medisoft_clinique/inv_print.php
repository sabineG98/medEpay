<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Remise/reprise</title>
<style>
.button {
	border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#333;
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





include('link.php');


?>

<?php
$med = "SELECT *  FROM address";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $district= $rowmed['district'];
					 $hc= $rowmed['hc'];
				 }
	?>







REPUBLIQUE DU RWANDA  <br /> 
<img src="republic.PNG" width="84" height="82" /> <br />
MINISTERE DE LA SANTE <br />
DISTRICT <?php echo $district ?> 
<br />
CENTRE DE SANTE <?php echo $hc ?> 
<br /><br /><br /> 


                     
                     
 <strong><u>INVENTAIRE DES MEDICAMENTS EN PHARMACIE DE DISTRIBUTION DU <?php echo date('d/m/Y') ?></u></strong> <br /><br /> 
                     
<table width="0" border="1" style="font-size:12px; border:1 solid #CCC; border-collapse: collapse;" cellspacing="0" cellpadding="0">
  
  
  <tr bgcolor="#AAD5FF">

  </tr>
  <tr bgcolor="#CCCCCC">
    <th>No</th>
    <th width="300">DESIGNATION</th>
    <th>PRIX UNITAIRE</th>
    <th>QUANTITE STOCK</th>
    <th>VALEUR EN FRW</th>
   
  </tr>




<?php 

					 
						$i=0;
						$total=0;
					    $med1 = "SELECT *  FROM products ";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
							   
							   $i++;
					
					  echo'<tr>';
					 
				                  	 
									 echo '<td>'.$i.'</td>';
									 echo '<td>'.$rowmed1['description'].'</td>';
									 echo '<td>'.$rowmed1['unit_price'].'</td>';
									 $value=$rowmed1['unit_price']*$rowmed1['qtty'];
									 echo '<td><strong>'.$rowmed1['qtty'].'</strong></td>';
									 echo '<td>'.$value.'</td>';
							         $total+=$value;
					   echo'</tr>';
							   
							   
				                       }
					
					
				 
	

echo'<tr bgcolor="#CCCCCC">
    <th>TOTAL</th>
    <th></th>
    <th></th>
    <th></th>
    <th>'.$total.'</th>
   
  </tr>';

echo'</table>';

?>


<br /><br />
 
 <strong>POUR LA REMISE</strong><br />
  <em>(noms + signature)</em><br /><br />
  .........................................................................................................................<br /><br />

 
 <strong>POUR LA REPRISE</strong><br />
  <em>(noms + signature)</em><br /><br />
  .........................................................................................................................<br /><br />

 
 
  

</body>
</html>