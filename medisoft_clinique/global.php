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


include('link.php');

if(isset($_POST['p1'])&&($_POST['p2']))//get selected dates
              {       
					 $p1=$_POST['p1'];
					 $p2=$_POST['p2'];
	  
			  }





function period($p1,$p2)// displays selected dates
    {
				

    echo'<h3>'.$p1.'_____'.$p2.'</h3>';
	
	 }



function caisse($date1,$date2)//show cash  in hands 
	{
    include('link.php');
		$gtotal=0;
	$products = "SELECT unitp, qtty FROM receipt WHERE  date BETWEEN '$date1' AND '$date2' AND active =1";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			 
	            $total2= $row['unitp']*$row['qtty'];
				$gtotal+=$total2;
				 }
				 
				 
				 
				 
					 if ($gtotal>0)
					 echo $gtotal.'  FRW';
					 else 
					 echo 0; 
					 
					 $t=$gtotal;
	$_SESSION['tcashier']=$t;
	}// end of show cash  in hands
   
   
   
   
   
   
  function dette($date1,$date2)//show cash  in dettes
  {
    include('link.php');
   $gtotal=0;
	$products = "SELECT SUM(reste) AS total_dette FROM dettes2 WHERE  date BETWEEN '$date1' AND '$date2'";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			 
	            $total_dettes= $row['total_dette'];
				
				 }
				 
				 
				 
				 
					 if ($total_dettes>0)
					 echo $total_dettes.'  FRW';
					 else 
					 echo 0; 
   
   $_SESSION['tdette']=$total_dettes;
   
} //end of show cash  in dettes


function item($p11,$p22,$item) //filter by item
	 {
    include('link.php');
				 $gtotal=0;
				 $number=0;
				 
	$products = "SELECT unitp, qtty FROM receipt WHERE item='$item'  AND date BETWEEN '$p11' AND '$p22' AND active > 0";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			   
			     
	            $total2= $row['unitp']*$row['qtty'];
				$gtotal+=$total2;
				$number+=$row['qtty'];
				
				 }
				 
				 
				 
				 
				 
				 
					 if ($gtotal>0)
					 echo '<strong>'.$item.'</strong>(<font color="#FF0000"><strong>'.$number.'</strong></font>):<strong>'.$gtotal.'</strong>  FRW';
					 else 
					 echo '0'; 
					 }// end of filter by item


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
<h3> Filter by date</h3>

<table width="0" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="global.php" method="post">
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
if (!empty($p1))
period($p1,$p2);
?>
<table   border="1" style="font-size:20px; border: thin 1px #F63; border-collapse: collapse;" cellspacing="0" cellpadding="0">
  <tr style="border: thin 1px #F63;"  >
    <td  >Total en caisse</td>
    <td bgcolor="#6CCFFF">
    
    <?php
    
	if (!empty($p1))
	caisse($p1,$p2);
			
	?>
    
    

    
    </td>
  </tr>
  
  
  
  <tr style="border: thin 1px #F63;"  >
    <td  >Dettes</td>
    <td bgcolor="#6CCFFF">
    <?php
    
	if (!empty($p1))
	dette($p1,$p2);
			
	?>

    
    </td>
  </tr>
  
  
  
  <tr style="border: thin 1px #F63;"  >
    <td  ><strong>TOTAL</strong></td>
    <td bgcolor="#6CCFFF">
    
<?php
 
if (!empty($p1))

echo $_SESSION['tcashier']+$_SESSION['tdette'].' FRW';
   
	?> 
    
    </td>
  </tr>
  
</table>
<hr />
<h3> Filter by element</h3>

<table width="0" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="global.php" method="post">
  <tr>
    <td>
    
   <?php 
    $products = "SELECT DISTINCT item  FROM receipt  ORDER BY item ASC  ";
    echo '<select style="width:300px;" name="item">';
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 
					 echo'<option  value="'.$row['item'].'">'.$row['item'].'</option>';
					 
					
				 }
  
   
   
   echo '</select>';
   
   ?>
    
    
    
    </td>
    
    
    <td>Periode:&nbsp;&nbsp;&nbsp; Du</td>
    
    
    
    
    <td><input type="text" size="10" value="<?php echo date('Y-m-d') ?>" name="p11">
    
    &nbsp;&nbsp;Au
    <input type="text"  size="10" value="<?php echo date('Y-m-d') ?>" name="p22">
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>
 </form>
</table>
<?php 
 if(isset($_POST['p11'])&&($_POST['p22']))
                     {
						 
					 $p11=$_POST['p11'];
					 $p22=$_POST['p22']; 
					 $item=$_POST['item'];
					 }

    
	if (!empty($p11))
	item($p11,$p22,$item);
			
				 
					 
?>
<hr />
</body>
</html>