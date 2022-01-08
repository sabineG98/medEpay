  <?php 
	//include('link.php');
	
	?>
<html>
<head>
  <title>EasyTabs</title>
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
    .panel-container { margin-bottom: 10px; height:520px;  }
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
   <li class='tab'><a href="#cons"><strong>CONSUMMATION</strong></a></li>
   <li class='tab'><a href="#lab"><strong>REQUISITION</strong></a></li>
   <li class='tab'><a href="#ver"><strong>INVENTORY</strong></a></li>
   <li class='tab'><a href="#ver2"><strong>LOSSES</strong></a></li>
   <!--<li class='tab'><a href="#ver3"><strong>RAPPORT(HMIS)</strong></a></li>-->
   <li class='tab'><a href="#ver4"><strong>PARAMETERS</strong></a></li>
 </ul>
 <div class='panel-container'>
  <div id="cons">    
  <iframe style="border: 0px solid #F00; width: 100%; height: 100%;" src="consommation.php"></iframe>     
  </div>
                
  <div id="lab">   
    <iframe style="border: 0px solid #F00; width: 100%; height: 100%;" src="req1.php"></iframe>            
  </div>
  
  <div id="ver">    
    <iframe style="border: 0px solid #F00; width: 100%; height: 100%;" src="inventaire.php"></iframe>    
  </div>
  
  <div id="ver2">
    <iframe style="border: 0px solid #F00; width: 100%; height: 100%;" src="perte.php"></iframe>
  </div>
  
  <!--<div id="ver3">
     <iframe style="border: 0px solid #F00; width: 100%; height: 100%;" src="phar_rep.php"></iframe>
  </div>-->
      
 <div id="ver4">
    <iframe style="border: 0px solid #F00; width: 100%; height: 100%;" src="settings.php"></iframe>
 </div>
    
 </div>
</div>
</body>
</html>
