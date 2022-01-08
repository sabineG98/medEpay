  <?php 
	include('link.php');
	error_reporting(E_ERROR | E_PARSE);
	$id=$_GET['id'];
	$date=$_GET['date'];
	$uid=$_GET['uid'];
	$categorie=$_GET['categorie'];
	$service=$_GET['service'];
	$period=date("F-Y", strtotime($date));	
    $insu1=$_GET['insu'];
	switch($insu1)
{
  case"1":
	$insu='MUSA';
	break;
  case"2":
	$insu='RSSB';
	break;
  case"3":
	$insu='PRIVE';
	break;
  case"4":
	$insu='INDIGENT';
	break;  
  case"5":
	$insu='MMI';
	break;
  case"6":
	$insu='RADIANT';
	break;
  case"7":
	$insu='MEDIPLAN';
	break;
  case"8":
	$insu='SANLAM';
	break;	 
 default:
  $insu=$insu1;
}				
	?>
<html>
<head>
  <title>EasyTabs Demo</title>
  <script type="text/javascript" src="highslide/highslide-with-html.js"></script>
  <link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
  <script src="vendor/jquery-1.7.1.min.js" type="text/javascript"></script> 
  <script src="vendor/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="lib/jquery.easytabs.min.js" type="text/javascript"></script>    
  <link href="dist/css/style.min.css" rel="stylesheet">
	 <?php 
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
////////////////////////
$idletime=900;
if(isset($_SESSION['timeout'])){
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $idletime){
		 header("Location: logout.php");
	}
}
$_SESSION['timeout'] = time();	
/////////////////////
?>
<?php
    if(isset($_POST['next']))
    {
        $id=$_POST['clientid'];
        $date=$_POST['date'];
        mysqli_query ($link,"UPDATE orders SET done =1  WHERE client_id ='$id' AND date='$date' AND type!='med' AND type!='laboratoire'");
		mysqli_query ($link,"UPDATE lab_results SET done =1  WHERE client_id ='$id' AND date='$date'");
    }
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
    /* Example Styles  */
    .etabs { margin: 0; padding: 0; }
    .tab { display: inline-block; zoom:1; text-decoration; *display:inline; background:#eee; border: solid 1px #06F; color:#000; border-bottom: none; -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; }
    .tab a { font-size: 12px; text-decoration:none; color:#000; line-height: 2em; display: block; padding: 0 6px; outline: none; }
    .tab a:hover { text-decoration: none; }
	.tab:hover { background-color:#CAE4FF; }
    .tab.active { background: #fff; box-shadow: 0px 0px 5px 0px #000; padding-top: 6px; position: relative; top: 1px; border: 3px solid #BDF; }
    .tab a.active { font-weight: bold; }
    .tab-container .panel-container { background: #fff; border: solid #666 1px; padding: 10px; -moz-border-radius: 0 4px 4px 4px; -webkit-border-radius: 0 4px 4px 4px; }
    .panel-container { margin-bottom: 10px; height:290px; }
  </style>
  <script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
    });
  </script>
</head>
<body>
<div id="tab-container" class='tab-container'>
  <ul class='etabs'>
   <?php
   $med="SELECT * FROM diag_client,clients WHERE clients.client_id=diag_client.client_id AND diag_client.client_id='$id' AND clients.insurance='$insu' AND diag_client.date='$date'";
        $rtvalmed = mysqli_query($link,$med);
        if(! $rtvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
	  	if(mysqli_num_rows($rtvalmed)>0)
		{			
		$res=mysqli_fetch_array($rtvalmed,MYSQLI_ASSOC);
		$diag=$res['diag_id'];
		   echo'<li class="tab"><a href="#cons"><strong>CONSULTATION</strong></a></li>
				<li class="tab"><a href="#lab"><strong>EXAMENS</strong></a></li>
				<li class="tab"><a href="#diag"><strong>DIAGNOSTICS</strong></a></li>
				<li class="tab"><a href="#med"><strong>MEDICAMENTS</strong></a></li>
				<li class="tab"><a href="#conso"><strong>CONSOMABLES</strong></a></li>
				<li class="tab"><a href="#act"><strong>ACTES MEDICALES</strong></a></li>
				<li class="tab"><a href="#hosp"><strong>HOSPITALISATION</strong></a></li>	
				<li class="tab"><a href="#ref"><strong>REFERENCE</strong></a></li>';
		}
		else
		{
		echo'<li class="tab"><a href="#diag"><strong>DIAGNOSTICS </strong></a></li>';	
		}
?>
		
 </ul>
 <div class='panel-container' style="background-color:#FFF; height: 573px;">
  <?php
    $med="SELECT * FROM diag_client,clients WHERE clients.client_id=diag_client.client_id AND diag_client.client_id='$id' AND clients.insurance='$insu' AND diag_client.date='$date'";
        $rtvalmed = mysqli_query($link,$med);
        if(! $rtvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
	  	if(mysqli_num_rows($rtvalmed)>0)
		{	
 $res=mysqli_fetch_array($rtvalmed,MYSQLI_ASSOC);
 $diag=$res['diag_id'];
 if($diag=='')
 {
 echo'<div id="diag">
   <iframe style="position:absolute; border: 0px solid #F00; width: 549px; height: 250px; background-color:#FFF;" src="diag.php?id='.$id.'&insu='.$insu.'&date='.$date.'&uid='.$uid.'"></iframe>   
      <img src="img/diag.png"  style=" left:610px; position:absolute; height:150px; width:150px; top:50px; background-color:#FFF;">
 </div>';
 }
 else
 {
	echo'<div id="cons">
   <iframe style="position:absolute; border: 0px solid #F00; width: 549px; height: 150px;" src="cons.php?id='.$id.'&insu='.$insu.'&date='.$date.'&uid='.$uid.'&service='.$service.'"></iframe>     
       <img src="img/opd.png" class="d-none d-md-block" style="left:80%;position:absolute;height:150px;width:150px;">     
       <img src="img/opd.png" class="d-none d-md-none d-sm-block d-xs-block" style="left:80%;position:absolute;height:120px;width:120px;top:120px;">     
 </div> 			
	
	<div id="lab">
   <iframe style="position:absolute;border:0px solid #F00;width:98%;height:278px;background-color:#FFF;" src="location/examen.php?id='.$id.'&insu='.$insu.'&date='.$date.'&uid='.$uid.'&service='.$service.'"></iframe>   
      <img src="img/lab.ico" class="d-none d-md-block" style=" left:78%; position:absolute; height:150px; width:150px; background-color:#FFF;">
      <img src="img/lab.ico" class="d-none d-md-none d-sm-block d-xs-block" style=" left:78%; position:absolute; height:120px; width:120px; top:120px; background-color:#FFF;">
 </div>
      
 <div id="diag">
   <iframe style="position:absolute; border: 0px solid #F00; width: 549px; height: 250px; background-color:#FFF;" src="diag.php?id='.$id.'&insu='.$insu.'&date='.$date.'&uid='.$uid.'"></iframe>   
      <img src="img/diag.png" class="d-none d-md-block" style=" left:80%; position:absolute; height:150px; width:150px; top:50px; background-color:transparent;">
 </div>
    
 <div id="med">  
   <iframe style="position:absolute;  border: 0px solid #F00; width: 555px; height: 250px;" src="med.php?id='.$id.'&insu='.$insu.'&date='.$date.'&uid='.$uid.'&service='.$service.'"></iframe>
      <img src="img/drugs.jpg" class="d-none d-md-block" style=" left:80%; position:absolute; height:150px; width:150px;"> 
      <img src="img/drugs.jpg" class="d-none d-md-none d-sm-block d-xs-block" style=" left:79%; position:absolute; height:120px; width:120px;top: 130px;"> 
 </div>
  
 <div id="conso">
   <iframe style="position:absolute;border:0px solid #F00;width:549px;height: 250px;" src="consomed.php?id='.$id.'&insu='.$insu.'&date='.$date.'&uid='.$uid.'&service='.$service.'"></iframe>      
      <img src="img/cons.jpg" class="d-none d-md-block" style=" left:67%; position:absolute; height:150px; width:300px;"> 
      <img src="img/cons.jpg" class="d-none d-md-none d-sm-block d-xs-block" style=" left:65%; position:absolute; height:110px; width:200px;top:130px;"> 
 </div>
    
 <div id="act">
   <iframe style="position:absolute; border: 0px solid #F00; width: 549px; height: 150px;" src="actes.php?id='.$id.'&insu='.$insu.'&date='.$date.'&uid='.$uid.'&service='.$service.'"></iframe>     
       <img src="img/inj.jpg" class="d-none d-md-block" style=" left:80%; position:absolute; height:150px; width:150px;"> 
       <img src="img/inj.jpg" class="d-none d-md-none d-sm-block d-xs-block" style=" left:75%; position:absolute; height:120px; width:120px;top: 120px;"> 
 </div>
  
 <div id="hosp">
   <iframe style="position:absolute; border: 0px solid #F00; width: 615px; height: 150px;left:0px;" src="hosp.php?id='.$id.'&insu='.$insu.'&date='.$date.'&uid='.$uid.'&service='.$service.'"></iframe>
       <img src="img/hosp.png" class="d-none d-md-block" style=" left:80%; position:absolute; height:150px; width:150px;"> 
       <img src="img/hosp.png" class="d-none d-md-none d-sm-block d-xs-block" style=" left:75%; position:absolute; height:120px; width:120px;top: 120px;"> 
 </div>
 
 <div id="ref">
     <iframe style="position: absolute; border: 0px solid #F00; width: 549px; height: 144px; " src="ref.php?id='.$id.'&insu='.$insu.'&date='.$date.'&uid='.$uid.'&service='.$service.'"></iframe>
       <img src="img/ref.png" class="d-none d-md-block" style=" left:80%; position:absolute; height:150px; width:150px;"> 
       <img src="img/ref.png" class="d-none d-md-none d-sm-block d-xs-block" style=" left:80%; position:absolute; height:120px; width:120px;top: 120px;"> 
  </div>'; 
 }}
  ?>                
 
 <div id="diag">
 <?php
  if($diag=='')
 {
 include('diag2.php');
 }
 ?>
   <!--<iframe style="position:absolute; border: 0px solid #F00; width: 549px; height: 250px; background-color:#FFF;" src="diag.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>&uid=<?php echo $uid; ?>"></iframe>-->   
      <img src="img/diag.png" class="d-none d-md-block" style=" left:80%;position:absolute;height:150px;width:150px;top:50px;background-color:transparent;">
      <img src="img/diag.png" class="d-none d-md-none d-sm-block d-xs-block" style="left:79%;position:absolute;height:120px;width:120px;top:110px;background-color:transparent;">
 </div>
 </div> 
</div>
 <iframe style="position:absolute;overflow:hidden;box-shadow:0px 0px 10px 0px #000;border:2px solid #F00;background-color:#FFF;top:338px;width:99.9%;height:287px;" src="invoice-co.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&categorie=<?php echo $categorie; ?>&date=<?php echo $date; ?>&period=<?php echo $period; ?>"></iframe>
<!-----------------clear-consultation-waiting-list--------------------->
   <form action="tabs-new-consultx.php" method="post" >
<input type="hidden"  name="next" />
<input type="hidden" name="clientid" value="<?php echo $id ?>" />
<input type="hidden" name=" date" value="<?php echo $date ?>" />
<input type="hidden" name="period" value="<?php echo $period ?>" />
<input type="hidden" name="categorie" value="<?php echo $categorie ?>" />
<input type="hidden" name="uid" value="<?php echo $uid ?>" />
<button class="d-none d-md-block" style="position:absolute; left: 85%; top: 230px; border:0px; background-color:transparent;" ><img src="img/verified.png"></button>
<button class="d-none d-md-none d-sm-block d-xs-block" style="position:absolute; left: 80%; top: 250px; border:0px; background-color:transparent;" ><img src="img/verified.png"></button>
</form>
<!-----------------clear-consultation-waiting-list--------------------->
</body>
</html>
