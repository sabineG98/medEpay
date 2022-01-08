  <?php 
	include('link.php');
	$id=$_GET['id'];
    $insu=$_GET['insu'];
	$date=$_GET['date'];

	
	?>
<html>
<head>
  <title>EasyTabs Demo</title>
  <script src="vendor/jquery-1.7.1.min.js" type="text/javascript"></script> 
  <script src="vendor/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="lib/jquery.easytabs.min.js" type="text/javascript"></script>

  <style>
     
	 
	 <?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>
	 
	 
	 
	 
	 
	 
	 
	 
    /* Example Styles  */
    .etabs { margin: 0; padding: 0; }
    .tab { display: inline-block; zoom:1; text-decoration; *display:inline; background:#eee; border: solid 1px #06F; color:#000; border-bottom: none; -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; }
    .tab a { font-size: 14px; text-decoration:none; color:#000; line-height: 2em; display: block; padding: 0 10px; outline: none; }
    .tab a:hover { text-decoration: none; }
	.tab:hover { background-color:#CAE4FF; }
    .tab.active { background: #fff; box-shadow: 0px 0px 5px 0px #000; padding-top: 6px; position: relative; top: 1px; border: 3px solid #F00; }
    .tab a.active { font-weight: bold; }
    .tab-container .panel-container { background: #fff; border: solid #666 1px; padding: 10px; -moz-border-radius: 0 4px 4px 4px; -webkit-border-radius: 0 4px 4px 4px; }
    .panel-container { margin-bottom: 10px; height:325px; }
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
  
  <?php $post=$_SESSION['post'];    ?>
  
  
  <li class='tab'><a href="#cons"><strong><img src="img/vital.png" width="24" height="24">Signes vitaux</strong></a></li>
  <li class='tab'><a href="#lab"><strong><img src="img/symptoms.png" width="24" height="24">Symptomes</strong></a></li>
  <li class='tab'><a href="#med"><strong><img src="img/labo.png" width="24" height="24">Laboratoire</strong></a></li>
  <li class='tab'><a href="#conso"><strong><img src="img/diag.png" width="24" height="24">Diagnostiques</strong></a></li>
  <li class='tab'><a href="#act"><strong><img src="img/treat.png" width="24" height="24">Traitement/Actes</strong></a></li><!--active-->  
  <li class='tab'><a href="#hosp"><strong><img src="img/pres.png" width="24" height="24">Prescription</strong></a></li>
 <!-- <li class='tab'><a href="#amb"><strong><img src="img/bill.png" width="24" height="24">Facture</strong></a></li> -->
  <!-- <li class='tab'><a href="#amb"><strong><img src="img/appoi.png" width="24" height="24">Staff</strong></a></li>-->




 </ul>
 <div class='panel-container'>
    
     <div id="cons">
     <iframe style="position:absolute; border: 0px solid #F00; width: 95%; height: 320px;" src="vital.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
     
     
     <!--<iframe style="position:absolute; border: 0px solid #F00; width: 549px; height: 44px;" src="vital.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
     
     
    <img src="img/opd.png"  style=" left:1050px; position:absolute; height:150px; width:150px;"> -->
    
    </div>
    
    
    
    
   <div id="lab">
     <iframe style="position:absolute; border: 0px solid #F00; width: 95%; height: 320px;" src="sympto.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
   
<!--     <img src="img/lab.ico"  style=" left:1050px; position:absolute; height:150px; width:150px;"> 
-->
 
 
  </div>
  
  
  
  <div id="med">
  
     <iframe style="position:absolute;  border: 0px solid #F00; width: 95%; height: 320px;" src="lab.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>">
     </iframe>

<!--    <img src="img/drugs.jpg"  style=" left:1050px; position:absolute; height:150px; width:150px;"> 
-->
  </div>
  
  <div id="conso">
     <iframe style="position:absolute; border: 0px solid #F00; width: 95%; height: 320px;" src="diag.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
<!--     <img src="img/cons.jpg"  style=" left:950px; position:absolute; height:150px; width:300px;"> 
-->
  </div>
  
  
  <div id="act">
    <iframe style="position:absolute; border: 0px solid #F00; width: 95%; height: 320px;" src="actes.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>

<!--    <img src="img/inj.jpg"  style=" left:1050px; position:absolute; height:150px; width:150px;"> 
-->

  </div>
  
  <div id="hosp">
     <iframe style="position:absolute; border: 0px solid #F00; width: 95%; height: 320px;" src="presc.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
<!--          <img src="img/hosp.png"  style=" left:1050px; position:absolute; height:150px; width:150px;"> 
-->
  </div>
  
  <!-- <div id="amb"> -->
     <!-- <iframe style="position: absolute; border: 0px solid #F00; width: 1000px; height: 320px; " src="bill.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe> -->
<!--          <img src="img/amb.jpg"  style=" left:1050px; position:absolute; height:150px; width:200px;"> 
-->
  <!-- </div> -->
  
  
 </div>
</div>
</body>
</html>
