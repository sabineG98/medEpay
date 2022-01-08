
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<title>.::CBHI-VERIFICATION</title>


<?php 
error_reporting(E_ERROR | E_PARSE);
 

session_start();
if(!$_SESSION['valid_pass']){
    header("Location: applications.php");
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

input, select{border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;}
</style>
</head>

<body>


<div class="all_container">
<div class="show">

</div>


<div class="liguini">
<div class="img1">

</div>

<div class="show">
<?php //include('sync.php');  ?>



    <div style="position:absolute;">  
<div class="menu1"><a href="home.php"><img  style="position:absolute; left: 210px; top: -13px;" src="img/home.png"  alt="Saisie"  /></a></div>
<div class="menu1"><a href="applications.php"><img  style="position:absolute; left: 250px; top: -13px; " src="img/app.png"  /></a></div>
      <div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 280px; top: -13px; " src="img/logout.png" /></a></div>

    
    
    </div>  
     
    <!--<td><a href="factures.php">Factures</a></td>
    <td><a href="reports.php">Rapports</a></td>
    
    <td><a href="">Parametres</a></td>
    <td><a href="">Profile</a></td>-->



</div>

</div>


<div style="position: absolute; border-radius: 0px 200px 10px 10px; width: 330px; border: 1px solid #09F; height: 31px; background-color: #BDF; left: 19px; top: 80px;"> 

<?php
echo'<form action="cbhi.php" method="POST">';
echo"MONTH<select name='period' >";
$med = "SELECT DISTINCT period FROM orders ORDER BY date DESC";// get the date 
        $retval = mysqli_query($link, $med);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo'<option value="'.$row['period'].'">'.$row['period'].'</option>';
				 }


echo'</select>
<button class="button" ><span>Go </span></button></form>'
?>
</div>



<?php 

if(isset($_POST['period']))
{
	$periodc=$_POST['period'];
	
}
else
{
	$med = "SELECT DISTINCT period FROM orders ORDER BY date DESC LIMIT 1";// get the date 
        $retval = mysqli_query($link, $med);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$periodc=$row['period'];
				 }
	
	

}
?>
<div class="content"> 
<br /><br /><br />


<?php 
$i=0;
$j=0;
$med = "SELECT order_id FROM orders WHERE period='$periodc' AND verified=1";// get the date 
        $retval = mysqli_query($link, $med);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$i++; 
				 }
				 
	  $med = "SELECT order_id FROM orders WHERE period='$periodc'";// get the date 
        $retval = mysqli_query($link, $med);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$j++; 
				 }
				 
				 
				 $p=$i/$j;
				 $per=$p*100;
				 $percentage=number_format((float)$per, 1, '.', '');
				 
				 
				 
				 
		 $deducted = "SELECT SUM(amountde) as deducted FROM verification WHERE period='$periodc'";// get the date 
        $retval = mysqli_query($link, $deducted);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowded = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					$ded=$rowded['deducted'];
				 }		 
				 
				 
				 if (!$ded)
				  $ded=0;
				  
	
				 
				 include('billed.php');
				 $gtt=$tmusa;
				 
				 
				 
				 $after=$tmusa-$ded;
				 
				 
				 
				 
				 include('billedv.php');
				 
				 
				 $p1=$ded/$tmusav;
				 $per1=$p1*100;
				 $percentage1=number_format((float)$per1, 1, '.', '');
				





 
?>









<div style="position: absolute; box-shadow: 0px 0px 0px 0px #000; border: 1px solid #0CF; border-top: 5px solid #0CF; padding: 10px; border-radius: 10px 10px 0px 0px; width: 187px; height: 93px; background-color: #fff; left: 20px; top: 170px;">

<center><h2 style=" font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"><?php echo $percentage?>%</h2></center>
<p style="background-color: #0CF; padding: 1px; font-family:Tahoma, Geneva, sans-serif; font-size:16px; position: absolute; left: -1px; top: 61px; height: 39px; width: 100%;">Verification rate</p>

</div>







<div style="position: absolute; box-shadow: 0px 0px 0px 0px #000; border: 1px solid red; border-top: 5px solid red; padding: 10px; border-radius: 10px 10px 0px 0px; width: 187px; height: 93px; background-color: #fff; left: 260px; top: 170px;">

<center>
  <h2 style=" font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"><?php echo $ded?>Frw</h2></center>
<p style="background-color: red; padding: 1px; font-family:Tahoma, Geneva, sans-serif; font-size:16px; position: absolute; left: -1px; top: 61px; height: 39px; width: 100%;">Deducted amount, <font size="+1" color="#FFFFFF"><strong><?php echo $percentage1?>%</strong></font></p>

</div>








<div style="position: absolute; overflow:hidden; background-color: #CCC; height: 485px; width:450px; left: 500px; top: 11px;">
<?php  include('cbhitab.php');?>


</div>

<div style="position: absolute; background-color: #fff; border: 1px solid #06C; border-left: 5px solid #06C; border-radius: 5px 0px 0px 5px; height: 52px; width: 368px; left: 57px; top: 53px;">

<h2><?php echo $gtt?>Frw</h2>
<div style="position: absolute; background-color: #06C; border: 1px solid #06C; border-left: 5px solid #06C; border-radius: 0px 5px 5px 0px; height: 57px; width: 208px; color: white; left: 160px; top: -4px;">
<img src="img/play2.png" style="position: absolute; left: -9px; top: 17px;" width="24" height="24" />
<h2 style=" position:absolute; left:30px;"><?php echo $after?>Frw</h2>
</div>
</div>


<div style="position: absolute; background-color: #FFF; height: 25px; width: 480px; left: 5px; top: 16px;">


  <strong>
  
  
 <?php echo'<font size="+2" color="#0000FF">'. $periodc.'</font>';  ?>
  </strong> <br /><br /><br /><br /><br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em>Billed amount:</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em>Amount after verification:</em>
  </div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<div style="background-color:#F8F8F8; width:80%;">
<p style=" padding: 1px; font-family:Tahoma, Geneva, sans-serif;  width:80%;border-bottom: 5px solid #06C; font-size:16px;"><strong>REPORTS, </strong><em><?php echo $periodc ?></em></p>


<p style=" padding: 1px;  font-family:Tahoma, Geneva, sans-serif; width:80%; border-bottom: 1px  dashed #06C; font-size:16px;"><a style="color:black;" href="tool.php?period=<?php echo $periodc ?>">Report of medical verification</a></p>


<p style=" padding: 1px; font-family:Tahoma, Geneva, sans-serif; width:80%; border-bottom: 1px  dashed #06C; font-size:16px;"><a style="color:black;" href="utilizationm.php">CBHI Utilization of medical services Monthly</a></p>


<p style=" padding: 1px; font-family:Tahoma, Geneva, sans-serif; width:80%; border-bottom: 1px  dashed #06C; font-size:16px;"><a style="color:black;" href="sheet1.php?period=<?php echo $periodc ?>&gtt=<?php echo $gtt ?> &after=<?php echo $after ?>">Verification sheet</a></p>
<p style=" padding: 1px; font-family:Tahoma, Geneva, sans-serif; width:80%; border-bottom: 1px  dashed #06C; font-size:16px;"><a style="color:black;" href="hcbill7.php?p=<?php echo $periodc ?>">Verified invoice</a></p>
<!--<p style=" padding: 1px; font-family:Tahoma, Geneva, sans-serif; width:80%; border-bottom: 1px  dashed #06C; font-size:16px;"><a style="color:black;" href="#">Pricing (Tarif) check</a></p>-->

</div>


<div id="footer"> <center></center></div>

</div> 


</body> 
</html> 