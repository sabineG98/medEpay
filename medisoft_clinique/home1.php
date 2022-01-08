<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="refresh" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="script.js"></script>
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />


<!--popup iframe settings -->
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />

   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   
   <title>.::Home</title>



<?php 



session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 


include('link.php');
?>


<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 590px;
	height:410px;
	background-color:#FFF;
	color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    top: 150%;
    margin-left: -300px;
	transition-duration:1s;
	box-shadow: 0px 0px 5px 0px #000;
	border-bottom:5px solid #09F;
	border-top:5px solid #09F;

}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    bottom: 100%;
    left: 40%;
    margin-left: -13px;
    border-width: 13px;
    border-style: solid;
    border-color: transparent transparent white transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>

</head>

<body background="img/31.jpg">






<div class="all_container">
<div class="show">

</div>





<iframe src="iframe.php" style="position: absolute; background-color: #FFF; font-size:22px; padding-left:10px; opacity: 0.7; border: 1px solid #09C; border-radius: 6px; height: 583px; width: 387px; left: 1000px; top: 34px;">

<!--<img src="img/find.png" width="24" height="24" /><a href="orderdelete.php"  onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">Find a patient</a><br />

<hr />
<img src="img/alert.png" width="24" height="24" /><font color="#FF0000">Stock Alerts</font>


<div style="position: absolute; font-size: 16px; overflow:auto; background-color:#FFF0F0; padding-left: 10px; border: 2px solid red; border-radius: 2px; height: 473px; width: 351px; left: 13px; top: 94px;">-->


   <?php 
	 /* $i=0;
	 $per = "SELECT * FROM products WHERE qtty <=3 ORDER BY qtty  ";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
					echo $rowper['description'].'<font color="#FF0000">----<strong>'.$rowper['qtty'].'</strong></font><br>';
				 }
					 */
	?>
    

<!--</div>-->



</iframe>





<div class="liguini">


<div class="img1">

<?php


if(isset($_POST['bkp']))
{
	include('bkp.php');
	
}






$status = "SELECT COUNT(status) AS bkp  FROM orders WHERE status=0 ";
        $retval_status = mysqli_query($link, $status);
        if(! $retval_status )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowstatus = mysqli_fetch_array($retval_status, MYSQLI_ASSOC))
                 {
					 $bkp=$rowstatus['bkp'];
				 }
				 
				 
			
if ($bkp>100)
{
include('bkp.php');
}


if ($bkp>=50)
{
echo'<div style=" position:absolute; width:100%; height:100%;" >
<h3> <font color="red">Your data is not safe.</font>
<form action="home.php" method="post">
<input type="hidden" value="1" name="bkp" />

<button class="button" ><span>Back up</span></button>&nbsp;&nbsp;</h3>
</form>
</div>';
}
if ($bkp<=10)
{
echo'<div style=" position:absolute; width:100%; height:100%;" >
<h3><font color="green"> Your data is safe!</font></h3>
</div>';
}

if ($bkp>10 && $bkp<50)
{
echo'<form action="home.php" method="post">
<input type="hidden" value="1" name="bkp" />

<button class="button" ><span>Back up</span></button>&nbsp;&nbsp;</h3>
</form>';
}
  //include('clock.php'); ?>
</div>

<div class="show" >



    <div style="position:absolute;">
    
    
    
      
      <div class="menu1"><a href="home.php"><img  style="position:absolute; left: 210px; top: -13px;" src="img/home.png"  alt="Saisie"  /></a></div>
<div class="menu1"><a href="applications.php"><img  style="position:absolute; left: 250px; top: -13px; " src="img/app.png"  /></a></div>
      <div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 280px; top: -13px; " src="img/logout.png" /></a></div>

    <?php   echo'<br>Bonjour '.$_SESSION['name'].'!' ?>

    </div>
     
    <!--<td><a href="factures.php">Factures</a></td>
    <td><a href="reports.php">Rapports</a></td>
    
    <td><a href="">Parametres</a></td>
    <td><a href="">Profile</a></td>-->



</div>

</div>









<div class="content" style="overflow:hidden;"><br /><br /><br />

<h3></h3>
<div style="background-color: #B7DBFF; position: absolute; width: 991px; height: 81px; top: 0px; left: -1px;"></div>
<div style="background-color: #B7DBFF; padding-left:13px; position: absolute; width: 1013px; height: 195px; top: 326px; left: -14px;">

<form action="details.php" method="post">
<p style="background-color:#09C;"><strong>ANCIEN CAS</strong>
<input type="text" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" size="50" placeholder="Code d'assurance (AC)" name="code" />------<input type="text" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" size="10"  value="<?php echo date('Y-m-d') ?>" placeholder="" name="date" />
<button class="button" ><span>Ok </span></button>&nbsp;&nbsp;
</form>
</p>


</div>

<div style="position: absolute; background-color: #333; left: 77px; top: -2px;">

<div class="insurer">

<form action="musa.php" method="">

<input type="submit" value="MUTUELLE" style="width:182px; cursor: pointer; opacity:0.8; font-size:20px; height:120px;" />
</form>
<div style="top:65%; position:absolute; font-size:18px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(CBHI)</div>
</div>





<div  class="insurer1">
<form action="mmi.php" method="">

<input type="submit" value="MMI" style="width:182px; cursor: pointer; opacity:0.8; font-size:20px; height:120px;" />
</form>
<!--<div style="top:65%; position:absolute; color:blue;">TOT:13100||TM:5620<br />Clients:15</div>
-->
</div>



<div class="insurer2">
<form action="radiant.php" method="">

<input type="submit" value="RADIANT" style="width:182px; cursor: pointer; opacity:0.9; font-size:20px; height:120px;" />
</form>
<!--<div style="top:65%; position:absolute; color:blue;">TOT:0||TM:0<br />Clients:0</div>
-->
</div>


<div class="prive">
<form action="prive.php" method="">

<input type="submit" value="PRIVE" style="width:182px; cursor: pointer; opacity:0.8; font-size:20px; height:120px;" />
</form>
<!--<div style="top:65%; position:absolute; color:blue;">TOT:13500<br />Clients:8</div>
-->
</div>


<div class="insurer3">
<form action="rssb.php" method="">

<input type="submit" value="RSSB(RAMA)" style="width:182px; cursor: pointer; opacity:0.8; font-size:20px; height:120px;" />
</form>
<!--<div style="top:65%; position:absolute; color:blue;">TOT:13500||TM:56224<br />Clients:17</div>
-->
</div>

<div class="insurer4">

<form action="mediplan.php" method="">

<input type="submit" value="MEDIPLAN" style="width:182px; cursor: pointer; opacity:0.8; font-size:20px; height:120px;" />
</form>
<!--<div style="top:65%; position:absolute; color:blue;">TOT:0||TM:0<br />Clients:0</div>
-->
</div>


<div class="indigent">
<form action="indigents.php" method="">

<input type="submit" value="INDIGENTS" style="width:182px; cursor: pointer; opacity:0.8; font-size:20px; height:120px;" />
</form>
<!--<div style="top:65%; position:absolute; color:blue;">TOT:0||TM:0<br />Clients:0</div>
-->
</div>

<div class="compassion">
<form action="corar.php" method="">

<input type="submit" value="SAHAM" style="width:182px; cursor: pointer; opacity:0.8; font-size:20px; height:120px;" />
</form>
<!--<div style="top:65%; position:absolute; color:blue;">TOT:0||TM:0<br />Clients:0</div>
-->
</div>

<!--<div class="corar">
CORAR

<form action="#" method="">

<input type="submit" value="CORAR" alt="NOT YET CONFIGURED" style="width:182px; font-size:20px; height:120px;" />
</form>
</div>-->




</div>










<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

</div>


<div id="overv2" style=" background-color:#FFF; background-image:none;">
<h3><font color="#FF0000">Find a client/Trouver un client</font></h3>
<iframe src="find.php" style="width:1070px; height:440px; border:0px solid #aaa; top:0px;"></iframe>

</div>



  
<div id="footer"><center></center></div>

</div>


</body>
</html>