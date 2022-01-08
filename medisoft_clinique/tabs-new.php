<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
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
}     
	include('link.php');
	$id=$_GET['id'];
    $insu=$_GET['insu'];
	$date=$_GET['date'];
	$user=$_SESSION['name'];
	$select_query = "SELECT * FROM users WHERE fullname='$user'";
         $select_query_run = mysqli_query($link,$select_query);         
         if($select_query_run)
         {
         if(mysqli_num_rows($select_query_run) > 0)
         {
            $row = mysqli_fetch_array($select_query_run,MYSQLI_ASSOC);            
            $uid=$row['id'];            
         }
         else
         {  die('Error in the SELECT query' . mysqli_error($link));  }
         }

	$last = "SELECT * FROM orders WHERE client_id='$id' AND date='$date' ORDER BY client_id DESC LIMIT 1 ";
        $retval_last = mysqli_query($link,$last);
        if(! $retval_last )
           {   }//die('Could not get data1: ' . mysqli_error($link));      }                         
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
					 $service1=$rowlast['service'];
				 }
				 switch($service1)
					 {
						case"1":
						  $service='OPD ADULTS';
						  break;
						case"2":
						  $service='CPN';
						  break;
						case"3":
						  $service='IPD';
						  break;
						case"4":
						  $service='PF';
						  break;
					    case"5":
						  $service='Maternity';
						  break;
					    case"6":
						  $service='ARV';
						  break;
						case"7":
						  $service='OPD KIDS';
						  break;
						case"8":
						  $service='SURGERY';
						  break;
						case"9":
						  $service='DENTISTRY';
						  break;
						case"10":
						  $service='NCDs';
						  break;
						case"11":
						  $service='MENTAL HEALTH';
						  break;					   
					   default:
                       // echo "No Service";
					 }			
	?>
<html>
<head>
  <title>EasyTabs Demo</title>
  <script src="vendor/jquery-1.7.1.min.js" type="text/javascript"></script> 
  <script src="vendor/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="lib/jquery.easytabs.min.js" type="text/javascript"></script>
  <style>     	 	 	 
    /* Example Styles  */
    .etabs { margin: 0; padding: 0; }
    .tab { display: inline-block; zoom:1; text-decoration; *display:inline; background:#eee; border: solid 1px #06F; color:#000; border-bottom: none; -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; width:862px; text-align:center;}
    .tab a { font-size: 14px; text-decoration:none; color:#000; line-height: 2em; display: block; padding: 0 10px; outline: none; }
    .tab a:hover { text-decoration: none; }
	.tab:hover { background-color:#CAE4FF; }
    .tab.active { background: #fff; box-shadow: 0px 0px 5px 0px #000; padding-top: 6px; position: relative; top: 1px; border: 3px solid #BDF; }
    .tab a.active { font-weight: bold; }
    .tab-container .panel-container { background: #fff; border: solid #666 1px; padding: 10px; -moz-border-radius: 0 4px 4px 4px; -webkit-border-radius: 0 4px 4px 4px; }
    .panel-container { margin-bottom: 10px; height:442.4px; }
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
   <li class='tab' style="width: 100%;"><a href="#lab"><strong>EXAMENS &nbsp;<?php echo $service;?></strong></a></li>
 </ul>
 <div class='panel-container' style="background-color:#FFF;">                 
   <div id="lab">
     <iframe style="z-index:10;border: 0px; width: 100%; height: 100%; background-color:#FFF;" src="lab.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>&service=<?php echo $service1;?>&uid=<?php echo $uid;?>"></iframe>   
      <img src="img/lab.ico"  style=" left:70%; position:absolute; height:125px; width:125px; top:60px; background-color:transparent; "> 
  </div>   
 </div> 
</div>
</body>
</html>
