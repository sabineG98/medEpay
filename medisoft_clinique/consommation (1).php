<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>consommation</title>



<style>
tr:hover{ border:1px solid #F00;}
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

<?php
include('link.php');

?>

<!--<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:350px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: 7px;"><b>CONSOMMATIONS DES MEDICAMENTS</b></div>-->

<div  style="width:752px; height:440px; box-shadow: 0px 0px 0px 0px #000; border: 1px solid #09F; overflow:auto; position:absolute; background-color:#FFF; left: 4px; top: 15px;">




<table width="0" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="consommation.php" method="post">
  <tr>
    <td>Periode:&nbsp;&nbsp;&nbsp; Du</td>
    <td><input type="text" value="<?php echo date('Y-m-d') ?>" name="p1">
    
    &nbsp;&nbsp;Au
    <input type="text" value="<?php echo date('Y-m-d') ?>" name="p2">
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>
 </form>
</table>
<table width="0" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
  
  
  <tr bgcolor="#AAD5FF">
<?php
/*$defper = "SELECT DISTINCT period  FROM orders ORDER BY time DESC LIMIT 1";
        $defretvalper = mysqli_query($link, $defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($defretvalper, MYSQLI_ASSOC))
                 {
				
                    $defperiod=$defrowper['period'];
	             }*/
				 
				if(isset($_POST['p1'])&&($_POST['p2']))
                     { 
					 $p1=$_POST['p1'];
					 $p2=$_POST['p2'];
					 
				 
    

    echo'<th colspan="4"><Du'.$p1.'Au'.$p2.'</th>';
   }
   ?>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td><strong>No&nbsp;&nbsp;</strong></td>
    <td><strong>DESIGNATION&nbsp;</strong></td>
    <td><strong>QUANTITE CONSOMMEE&nbsp;</strong></td>
    <td><strong>MONTANT&nbsp;</strong></td>
    <td><strong>STOCK ACTUEL&nbsp;</strong></td>

    <td><strong>VALEUR DE STOCK&nbsp;</strong></td>
  </tr>




<?php 
if(isset($_POST['p1'])&&($_POST['p2']))
                     {
$i=0;
$firstprev=0;

//find the month
$tot=0;
$totstock=0;
$med = "SELECT DISTINCT item  FROM orders WHERE type='med' AND date BETWEEN '$p1' AND '$p2'";
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
					
					 else
					  echo'<tr>';
					  
					 $med=$rowmed['item'];
					 echo '<td>'.$i.'</td>';
					 
					 echo'<td>'.$med.'</td>';
					 
						
					    $med1 = "SELECT SUM(orders.quantity), orders.unityp,products.prod_id, products.qtty  FROM orders, products WHERE orders.type='med' AND orders.item='$med' AND orders.date BETWEEN '$p1' AND '$p2' AND products.description='$med'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                  $pro_id=$rowmed1['prod_id'];
									  $conso=$rowmed1['SUM(orders.quantity)'];
				                   	 $medcost=$rowmed1['SUM(orders.quantity)']*$rowmed1['unityp'];
				                  	 echo '<td style="color:red;"><strong>'.$rowmed1['SUM(orders.quantity)'].'</strong></td>';
					                 echo '<td>'.$medcost.'</td>';
									 
									 // get and display  the qtty remaining for products 
				
									 

$section = "SELECT SUM(order_qtty) AS totalreq FROM req, req_code WHERE req.prod_id=$pro_id AND req_code.date BETWEEN '$p1' AND '$p2' ";
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $totalreq=$row['totalreq'];
				 }
										
										
$section = "SELECT prev_qtty FROM req, req_code WHERE req.prod_id=$pro_id AND req_code.date BETWEEN '$p1' AND '$p2' ORDER BY req_code.time DESC LIMIT 1  ";
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 $firstprev=$row['prev_qtty'];
				 }		 
						 			
			
							
					$a=$totalreq+$firstprev;		
					$rest=$a-$conso;				
										
										
										
										
										
										
					                 echo '<td bgcolor="">'.$rowmed1['qtty'].'</td>';
									 $stockcost=$rowmed1['qtty']*$rowmed1['unityp'];
									 echo '<td bgcolor="">'.$stockcost.'</td>';
				                       }
					 $tot+=$medcost;
					 $totstock+=$stockcost;
					 echo '</tr>';
				 }
	


  echo'<tr bgcolor="#CCCCCC">
    <th colspan="3">TOTAL</th>
    
    <td><strong>'.$tot.'</strong></td>
	<td><strong></strong></td>
	<td bgcolor="ccccc"><strong>'.$totstock.'</strong></td>
  </tr>
  
</table>';
}
?>


<br />


</div>
</div>
</body>
</html>
