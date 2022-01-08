<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>consommation</title>



<style>
.button {
	border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#E60000;
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
tr:hover{ border:1px solid #F00;}

</style>



</head>

<body>

<?php
include('link.php');

?>

<!--<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:350px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: 7px;"><b>CONSOMMATIONS DES MEDICAMENTS</b></div>-->
<!--Remise et reprise<br />-->

<?php
echo'<form action="inv_print.php" method="post" target="_top">';
					 echo '<input type="hidden"  name="req_code" value="7">';
					 echo '<button class="button" ><span>Remise et reprise</span></button></form>';					 					 
?>

<div  style="width:99.9%; height:440px;border: 1px solid #09F; overflow:auto;background-color:#FFF;">
<table width="100%" border="0" style="font-size:17px; border:1 solid #CCC; border-collapse: collapse;" cellspacing="0" cellpadding="0">  
    
  <tr bgcolor="#AAD5FF"></tr>
  <tr bgcolor="#CCCCCC">
  <th width="10">No</th>
    <th width="400">DESIGNATION</th>
    <th>UNIT PRICE</th>
    <th>STOCK QUANTITY</th>
    <th>VALUE IN RWF</th>   
  </tr>
<?php 		
						$i=0;
						$total=0;
            $med1 = "SELECT *  FROM products ORDER BY description";
            $retvalmed1 = mysqli_query($link,$med1);
            if(! $retvalmed1 )
                   { die('Could not get data: ' . mysqli_error($link));  }                         
                  while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                          {							   
                            $i++;
                            if ($i%2==0)
                              echo'<tr bgcolor="#D9FFD9">';					
                            else
                             echo'<tr>';					 				                  	 
                                    echo '<td><center>'.$i.'</center></td>';
                                    echo '<td>'.$rowmed1['description'].'</td>';
                                    echo '<td style="text-align:right;padding-right:30px;">'.$rowmed1['unit_price'].'</td>';
                                    $value=$rowmed1['unit_price']*$rowmed1['qtty'];
                                    echo '<td style="text-align:right;padding-right:30px;">'.$rowmed1['qtty'].'</td>';
                                    echo '<td style="text-align:right;padding-right:30px;">'.$value.'</td>';
                                        $total+=$value;
                              echo'</tr>';							   							   						   							   
				                       }														 	
echo'<tr bgcolor="#CCCCCC">
    <th>TOTAL</th>
    <th></th>
    <th></th>
    <th></th>
    <th style="text-align:right;padding-right:30px;">'.number_format($total,0,",",".").'</th>      
  </tr>';
echo'</table>';
?>
<br />
</div>
</div>
</body>
</html>
