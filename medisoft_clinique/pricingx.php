<!-- <!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<script type="text/javascript">
hs.graphicsDir = 'highslide/graphics/';
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';
</script>
<title>.::TARIFICATION</title>
<style>
.blink{	animation:blinkingText 1.2s infinite;}
@keyframes blinkingText{0%{background-color:#ff0;}49%{background-color:#ff0;}60%{background-color:transparent;}99%{background-color:transparent;}100%{background-color:#ff0;}	}
</style>
<?php 
// session_start();
// if(!$_SESSION['valid_user']){
//     header("Location: login.php");
//     exit;
// } 
// ////////////////////////
// $idletime=900;
// if(isset($_SESSION['timeout'])){
// 	$session_life = time() - $_SESSION['timeout'];
// 	if($session_life > $idletime){
// 		 header("Location: logout.php");
// 	}
// }
// $_SESSION['timeout'] = time();	
/////////////////////
?>
<?php 
  // include('link.php');
  // if(!$_SESSION['name']){
  //     header("Location: login.php");
  //     exit;
  // } 
  // $name=$_SESSION['name'];
  // $usr=$_SESSION['name'];
  // $select_query = "SELECT * FROM users WHERE fullname='$usr'";
  //     $select_query_run = mysqli_query($link,$select_query);      
  //     if($select_query_run)
  //     {
  //       if(mysqli_num_rows($select_query_run) > 0)
  //       {
  //         $row = mysqli_fetch_array($select_query_run,MYSQLI_ASSOC);          
  //         $use_id=$row['id'];
  //         $fullname=$row['fullname'];
  //         $post=$row['post'];
  //         $username=$row['username'];
  //         $password=$row['password'];
  //         $levels=$row['levels'];
  //       }
  //       else{ die('Error in the SELECT query' . mysqli_error($link));  }
  //     }
?>
</head>
<body>
<div class="all_container">
<div class="show"></div>
<div class="liguini">
<div class="img1"></div>
<div class="show">
    <div style="position:absolute;">  
     <?php
    // if ($_SESSION['post']!='nurse' && $_SESSION['post']!='pharmacist')
    // 	{
    //   echo'<div class="menu1"><a href="home.php"><img  style="position:absolute; left: 210px; top: -13px;" src="img/home.png"  alt="Saisie"  /></a></div>';
    //   	}
		?>
<div class="menu1"><a href="applications.php"><img  style="position:absolute; left: 250px; top: -13px; " src="img/app.png"  /></a></div>
<div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 280px; top: -13px; " src="img/logout.png" /></a></div>
<div class="menu1"><a href="inbox.php" onclick="return hs.htmlExpand(this,{objectType:'iframe'})"><img style="position:absolute;left:310px;top:-13px;" src="img/coment2.png" />
        <?php
// $products="SELECT count(msg) AS msgs FROM messages,users WHERE users.id=messages.from_id AND messages.to_id='$use_id' AND ifread=0 ORDER BY msg_date DESC";
//           $retval = mysqli_query($link,$products);
//           if(! $retval )
//             { die('Could not get data: ' . mysqli_error($link));  }    
//           while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
//             {								 			 
//               $msgs=$row['msgs'];
//               if($msgs>0)
//               {
//                 echo'<span class="blink" style="position:absolute; left: 330px; top: -22px; background-color:#FF0; border-radius:60%; ">';
//                 echo $msgs;
//                 echo'</span>';
//               }
//             }
        ?>
        </a>
      </div>
    <?php 
// 	$noon=date('12:00:00');
// $evening=date('17:30:00');
// $now=date('H:i:s');
// if($now>$noon && $now<$evening)
// {echo'<br>Bon Apres-midi <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; }
// elseif($now>$evening)
// {echo'<br>Bonsoir <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; }
// else{echo'<br>Bonjour <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; } 
	?> 
    </div>  
</div>
</div>
<div style='width:985px;opacity:1;background-image:url(images/content2.png);background-repeat:no-repeat;background-color:#FFF;position:absolute;left:17px;
top:114px;box-shadow:0px 0px 40px #888888;padding:2px;margin:1px 0;border:1px solid #000;box-shadow:inset 15px 15px 15px rgba(0,0,0,.2);border-radius:0px 0px 0px 0px;-webkit-box-shadow:inset 0 1px 4px rgba(0,0,0,.2);-webkit-border-radius:5px;border-color:#000;box-shadow:0px 0px 20px #000;height:2500px;	overflow:auto;'><br /><br /><br />
<div style="position:absolute;border-radius:0px 200px 10px 10px;width:350px;border:1px solid #09F;height:25px; background-color:#BDF; left: 1px; top: 7px;"><b>TARIFICATION GLOBALE</b></div>
<div style="width:970px;height:2450px;box-shadow:0px 0px 5px 0px #000;border:1px solid #09F;overflow:auto;position:absolute;background-color:#FFF;left:4px; top: 35px;">
<iframe style="position:absolute;overflow:hidden;border:1px solid #FFFFFF;background-color:#FFF;left:-1px;top:7px;width:933px;height:2400px;" src="tabs-tarif.php"></iframe><br />
</div>
</div>
</div>
</body>
</html> -->

<?php include('head.php'); ?>
<title>.::TARIFICATION::.</title>
<?php include('navbar.php'); ?>

<div class="container">
  <div class="col-lg-12 mt-5">
    <div style="background-color:#ECF5FF !important;width:100%;opacity:1;position:relative;padding:2px;margin:1px 0;-webkit-box-shadow:inset 0 1px 4px rgba(0,0,0,.2);-webkit-border-radius:10px;box-shadow:0px 0px 5px #000;height:88vh;overflow:auto;">
      <div style="position:absolute;overflow:auto;background-color:#FFF;left:-1px;top:7px;width:100%;height:87vh;">
	  	 <div style="position:absolute;z-index:1;border-radius:0px 200px 10px 10px;width:220px;border:1px solid #09F;height:25px;background-color:#BDF;left:4px;top:10px;color:#000;padding-left:20px;padding-top:3px;"><b>GLOBAL TARIFICATION</b></div>
        <div style="width:99.2%;height:82vh;border-top:1px solid #09F;overflow:auto;position:absolute;background-color:#FFF;left:4px;top:35px;">
          <iframe style="position: absolute; overflow: auto; background-color: #FFF; left: -1px;top:0px;width:100%; height:81vh;border:0px solid #09F;" src="tabs-tarifx.php"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('foot.php'); ?>