<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::MEDICAMENTS</title>

<?php 
error_reporting(E_ERROR | E_PARSE);
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
  content: '>>';
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

.cl{

 padding: 5px; 

 position: absolute; 
 left: 5px; 
 top: 100px;

}
.cl1 {box-shadow: 0px 0px 10px 0px #000;
		background-color:#C5E2E2;
 padding: 5px; 
 border-radius: 10px; 
 box-shadow: 20px; 
 position: absolute; 
 left: 400px; 
 top: 120px;
}
.cl2 {box-shadow: 0px 0px 10px 0px #000;
		background-color:#C5E2E2;
 padding: 5px; 
 border-radius: 10px; 
 box-shadow: 20px; 
 position: absolute; 
 left: 200px; 
 top: 120px;
}
.style1 {
	font-size: 16px;
	font-weight: bold;
}
</style>
</head>

<body bgcolor="">
<h3> By Date</h3>

<table width="0" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="should.php" method="post">
  <tr>
    <td>Periode:&nbsp;&nbsp;&nbsp; Du</td>
    <td><input type="text" size="10" value="<?php echo date('Y-m-d') ?>" name="p1">
    
    &nbsp;&nbsp;Au
    <input type="text" size="10" value="<?php echo date('Y-m-d') ?>" name="p2">
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>

 </form>
</table>


  <?php
 
$torder=0;
$tot=0;
$t=0;
?>

</br></br></br></br>
<div  style="  position: absolute; background-color:#E1F0F0; left: 450px; overflow:auto; top: 113px; height: 250px; width: 430px;">
  
  <table width="404" border="1" cellpadding="2" cellspacing="1" bordercolor="#000000" style="font-size:13px; border-collapse: collapse;" widtd ="0">
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
  <tr bgcolor="#CCCCCC"> </tr>
  <tr bgcolor="#CCCCCC">
    <td rowspan="2"><strong>No</strong></td>
    <td colspan="2" align="center"><strong>SHOULD HAVE BEEN PAID</strong></td>
 
  </tr>
  <td><strong>Item <font color="#FF0000">(Quantity)</font></strong></td>
      <td><strong>Total<strong></strong></strong></td>
	  
	 
	  
    <?php 
	
	function insured($insurance,$per)
	   {
		   $p1=$_POST['p1'];
					 $p2=$_POST['p2'];
		   $qtte=0;
		   $qtte2=0;
		   $tot=0;
		   //static $insutot;
		   $insutot=0;
		   $insucount=0;
		   $clientid=0;
		   
		   
		   
		    $analy1 = "SELECT quantity, unityp,clients.client_id,insurance  FROM orders,clients WHERE orders.client_id=clients.client_id AND orders.date BETWEEN '$p1' AND '$p2' AND orders.insured=1 AND clients.insurance='$insurance' ";
                        $retvalanaly1 = mysqli_query($link, $analy1);
                        if(! $retvalanaly1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($rowanaly1 = mysqli_fetch_array($retvalanaly1, MYSQLI_ASSOC))
                                      {
					                 
									 if (!empty($rowanaly1['insurance']))
									 
									 
									 if($clientid!=$rowanaly1['client_id'])
									 {
									 $insucount++;
									 }
									 
									 $clientid=$rowanaly1['client_id'];
									 $tot=$rowanaly1['quantity']*$rowanaly1['unityp'];
								     	 
									 $insutot+=$tot;
									 
									 
									 
									
									}
			echo'<tr>';
					  
					 
					
					 
					 echo '<td></td>';
					if ($insurance!='PRIVE')
			         echo'<td>TM-'.$insurance.'(<font color="#FF0000"><strong>'.$insucount.'</strong></font>)</td>';
					else
					echo'<td>'.$insurance.'(<font color="#FF0000"><strong>'.$insucount.'</strong></font>)</td>';
									 echo'<td><font color="#000000"><strong>'.$insutot*$per.'</strong></font></td>'; 
									$ins= $insutot*$per;
									$_SESSION['insu']=$ins;
									 
									 
 echo '</tr>';						
									
									
									
									
									
									
	   }
	
	
	
function should($pa,$pb)
{	
	
$p1=$pa;
$p2=$pb;
	
if(isset($_POST['p1'])&&($_POST['p2']))
                     {
	            //$total2= $row['unitp']*$row['qtty'];
				//$gtotal+=$total2;
				
$i=0;
$firstprev=0;

//find the month
$tot=0;
$t=0;
$ggtot=0;

$analy = "SELECT DISTINCT item  FROM orders, clients WHERE orders.client_id=clients.client_id AND orders.date BETWEEN '$p1' AND '$p2' AND insured=1 AND insurance='PRIVE' ORDER BY item ASC";
        $retvalanaly = mysqli_query($link, $analy);
        if(! $retvalanaly )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowanaly = mysqli_fetch_array($retvalanaly, MYSQLI_ASSOC))
                 {
					 
			
			$tot=0;
			$gtot=0;
			$item=$rowanaly['item'];
			$j=0;	
			$qtte2=0;
			$u=0;		
			
			
			
			
	 $analy1 = "SELECT quantity, unityp  FROM orders, clients WHERE  orders.client_id=clients.client_id AND item='$item'  AND orders.date BETWEEN '$p1' AND '$p2' AND insured=1 AND insurance='PRIVE'";
                        $retvalanaly1 = mysqli_query($link, $analy1);
                        if(! $retvalanaly1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($rowanaly1 = mysqli_fetch_array($retvalanaly1, MYSQLI_ASSOC))
                                      {
					                 $j++;
									 
									 $qtte=$rowanaly1['quantity'];
									 $qtte2+=$qtte;
									 $tot=$rowanaly1['quantity']*$rowanaly1['unityp'];
								     //$u=$rowanaly1['quantity'];	 
									 $gtot+=$tot;
									 
									 /* $conso=$rowanaly1['SUM(qtty)'];
				                   	 $analycost=$rowanaly1['SUM(qtty)']*$rowanaly1['unitp'];
				                  	 echo '(<font color="#FF0000"><strong>'.$rowanaly1['SUM(qtty)'].'</strong></font>)</td>';
					                 echo '<td>'.$analycost.'</td>';*/
									 
									
									}
									
									
									
									
									
									
									
									$i++;
					 if ($i%2==0)
					   echo'<tr bgcolor="#D9FFD9">';
					
					 else
					  echo'<tr>';
					  
					 
					 //$qtte=$rowanaly['qtte'];
					 
					 echo '<td>'.$i.'</td>';
					
			         echo'<td>'.$item.'(<font color="#FF0000"><strong>'.$qtte2.'</strong></font>)</td>';
					 
					 
					 
					 
					  
									 echo'<td><font color="#000000"><strong>'.$gtot.'</strong></font></td>'; 
									$ggtot+=$gtot; 
									 
									 
         $_SESSION['should']=$ggtot;





//$tot+=$analycost;
 echo '</tr>';
 
}
}
////////////////////////////////////////////////////////////////////////////










insured('PRIVE','1');
$prive=$_SESSION['insu'];
insured('RSSB','0.15');
$rssb=$_SESSION['insu'];
insured('MMI','0.15');
$mmi=$_SESSION['insu'];
insured('MEDIPLAN','0.2');
$mediplan=$_SESSION['insu'];
$g7=$ggtot+$prive+$rssb+$mmi+$mediplan;
 echo'<tr bgcolor="#CCCCCC">
    <th colspan="2">TOTAL</th>
    

   
	<td bgcolor="ccccc"><strong>'.$g7.'</strong></td>
  </tr>';
  

}
?>

</table>
</div>

<div style="position: absolute; background-color: #E1F0F0; left: 307px; overflow: auto; top: 378px; height: 50px; width: 273px;">
<?php
$disco=$paid-$g7;
if ($disco<0)
echo'<font color="#FF0000" size="+1"><strong>'.$disco.' FRW: Manquant</font></strong>';

if ($disco>0)
echo'<font color="#0000" size="+1"><strong>+'.$disco.' FRW :Exedant</font> </strong>';

if ($disco=0)
echo'<font color="#0000" size="+1"><strong>Pas de discordance </font> </strong>';

?>

</div>

<br />


</div>
</div>
</body>
</html>