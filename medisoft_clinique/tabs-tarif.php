  <?php 
	//include('link.php');
	
	?>
<html>
<head>
  <title>EasyTabs Demo</title>
  <script src="vendor/jquery-1.7.1.min.js" type="text/javascript"></script> 
  <script src="vendor/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="lib/jquery.easytabs.min.js" type="text/javascript"></script>

  <style>
     
	 
	 <?php 

/*session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
*/
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
    .panel-container { margin-bottom: 10px; height:2320px;  }
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
<!--   <li class='tab'><a href="#cons"><strong>MEDICAMENTS</strong></a></li>
   <li class='tab'><a href="#lab"><strong>CONSOMMABLES</strong></a></li>-->
   <li class='tab'><a href="#med"><strong>ACTES MEDICALES-Tarification par minisante</strong></a></li>

 </ul>
 <!--<div class='panel-container'>
     <div id="cons">
     <?php //include('tarif.php'); ?>
     <iframe style="position:absolute; border: 0px solid #F00; width: 888px; height: 2200px;" src="tarif.php"></iframe>
     
    </div>
    
    
    
    
   <div id="lab">
     <iframe style="position:absolute; border: 0px solid #F00; width: 888px; height: 2200px;" src="tarif-conso.php"></iframe>
  </div>-->
  
  
  
  <div id="med">
     <iframe style="position:absolute; border: 0px solid #F00; width: 888px; height: 2200px;" src="tarif-acts.php"></iframe>

  </div>
  
  
  
  
 </div>
</div>
</body>
</html>
