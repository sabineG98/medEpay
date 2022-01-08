<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::MEDICAMENTS</title>

<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>







<?php
include('link.php');

?>


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

<body bgcolor="">





<?php

				if(isset($_POST['p1'])&&($_POST['p2']))
                     { 
					 $p1=$_POST['p1'];
					 $p2=$_POST['p2'];
					 
				 
    

    echo'<h3>'.$p1.'_____'.$p2.'</h3>';
   }
   ?>
   
   
   <table width="404" border="1" cellpadding="2" cellspacing="1" bordercolor="#000000" style="font-size:13px; border-collapse: collapse;" widtd ="0">

  <tr bgcolor="#CCCCCC">
    <td width="191"><strong>SHOULD HAVE BEEN PAID</strong></td>
    <td width="196"><div align="center"><strong>PAID</strong></div></td>
   </tr>
  <tr bgcolor="#CCCCCC">
    <td>  
	
	<ol><li>
	
	
	<?php
if(isset($_POST['p1'])&&($_POST['p2']))
                     {

						 
						$p1=$_POST['p1'];
					 $p2=$_POST['p2']; 
				
						 
						 
						// $gtotal=0;
	$products = "SELECT  item, unitp, qtty, SUM(qtty) AS number FROM receipt WHERE   date BETWEEN '$p1' AND '$p2' AND active>0";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			     $number=$row['number'];
	            //$total2= $row['unitp']*$row['qtty'];
				//$gtotal+=$total2;
				 }
				 
				 
				 $gtotal=0;
	$products = "SELECT item,unitp, qtty FROM receipt WHERE  date BETWEEN '$p1' AND '$p2' AND active>0";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			     //$number=$row['number'];
				$item= $row['item']; 
	            $total2= $row['unitp']*$row['qtty'];
				$gtotal+=$total2;
				 }
				 
				 
				 
				 
				 
				 
					 if ($gtotal>0)
					 echo '<strong>'.$item.'</strong>(<font color="#FF0000"><strong>'.$number.'</strong></font>):<strong>'.$gtotal.'</strong>  FRW';
					 else 
					 echo '0'; }

?>	
	
	
	
	
	
	
	
	
	
	</li></ol>
	
	
	
	
	
	
	
	                            </td>
    <td>&nbsp;</td>
  </tr>
   
 
</table>
</body>
</html>
