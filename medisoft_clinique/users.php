<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::MEDICAMENTS</title>

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


</head>

<body bgcolor="">
<h3> Caisse par utilisateur</h3>

<table width="0" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="users.php" method="post">
  <tr>
    <td>
    
   <?php 
    $products = "SELECT DISTINCT user  FROM receipt  ORDER BY user ASC  ";
    echo '<select style="width:300px;" name="user">';
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 
					 echo'<option  value="'.$row['user'].'">'.$row['user'].'</option>';
					 
					
				 }
  
   
   
   echo '</select>';
   
   ?>
    
    
    
    </td>
    
    
    <td>Periode:&nbsp;&nbsp;&nbsp; Du</td>
    
    
    
    
    <td><input type="text" size="10" value="<?php echo date('Y-m-d') ?>" name="p1">
    
    &nbsp;&nbsp;Au
    <input type="text"  size="10" value="<?php echo date('Y-m-d') ?>" name="p2">
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>
 </form>
</table>



<table   border="1" style="font-size:20px; border: thin 1px #F63; border-collapse: collapse;" cellspacing="0" cellpadding="0">
  <tr style="border: thin 1px #F63;"  >
    <td  >Total</td>
    <td bgcolor="#6CCFFF">
    
<?php
	
	if(isset($_POST['user']))
                     {
						 
						  $user=$_POST['user'];
						  $p1=$_POST['p1'];
					      $p2=$_POST['p2'];
						 
						 $gtotal=0;
	$products = "SELECT unitp, qtty FROM receipt WHERE  date BETWEEN '$p1' AND '$p2' AND active =1 AND user='$user'";
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
					 }
	?>
    
    </td>
  </tr>
  
  
  
  <tr style="border: thin 1px #F63;"  >
    <td  >Dettes</td>
    <td bgcolor="#6CCFFF">
    
<?php
	
	if(isset($_POST['p1'])&&($_POST['p2']))
                     {
						 $user=$_POST['user'];
						  $p1=$_POST['p1'];
					      $p2=$_POST['p2'];
						 
						 
						 $gtotal=0;
	$products = "SELECT SUM(reste) AS total_dette FROM dettes2 WHERE  date BETWEEN '$p1' AND '$p2' AND user='$user'";
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
					 echo 0; }
	?>
    
    </td>
  </tr>
  
  
  
  <tr style="border: thin 1px #F63;"  >
    <td  ><strong>TOTAL EN CAISSE</strong></td>
    <td bgcolor="#6CCFFF">
    
<?php
	if(isset($_POST['p1'])&&($_POST['p2']))
                     {
						 $caisse=$t+$total_dettes;
	echo '<strong>'.$caisse.'</strong>'; 
	echo' <strong>FRW</strong>';
					 }
	?>
    
    </td>
  </tr>
  
</table>



</body>
</html>