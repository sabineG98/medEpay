<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
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
<title>.::SERVICES::.</title>
<style>
.imgx
{
	position: absolute;
	background-color: #FFF;
	background-repeat: no-repeat;
	top: 30px;
	z-index: 0;
	left: 18px;
	width: 989px;
	height: 92px;
	border-radius: 0px 0px 0px 0px;
	border: 0px solid #000;
	border-color: #000;
}
.blink{
	animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
		0%{background-color:#ff0;}
		49%{background-color:#ff0;}
		60%{background-color:transparent;}
		99%{background-color:transparent;}
		100%{background-color:#ff0;}
	}
</style>
<?php 
include('link.php');
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
$name=$_SESSION['name'];
$usr=$_SESSION['name'];
$select_query = "SELECT * FROM users WHERE fullname='$usr'";
		$select_query_run = mysqli_query($link,$select_query);		
		if($select_query_run)
		{
			if(mysqli_num_rows($select_query_run) > 0)
			{
				$row = mysqli_fetch_array($select_query_run,MYSQLI_ASSOC);				
				$use_id=$row['id'];
				$fullname=$row['fullname'];
				$post=$row['post'];
				$username=$row['username'];
				$password=$row['password'];
				$levels=$row['levels'];
			}
			else
			{
				die('Error in the SELECT query' . mysqli_error($link));
			}
		}
?>
</head>
<body>
<div class="all_container">
<div class="show">
</div>
<div >
<div class="imgx">
</div>
<div class="show">
    <div style="position:absolute;">  
      <div class="menu1"><a href="home.php"><img  style="position:absolute; left: 210px; top: -13px;" src="img/home.png"  alt="Saisie"  /></a></div>
<div class="menu1"><a href="applications.php"><img  style="position:absolute; left: 250px; top: -13px; " src="img/app.png"  /></a></div>
      <div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 280px; top: -13px; " src="img/logout.png" /></a></div>
      <div class="menu1"><a href="inbox.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )"><img  style="position:absolute; left: 310px; top: -13px; " src="img/coment2.png" />
      <?php
$products="SELECT count(msg) AS msgs FROM messages,users WHERE users.id=messages.from_id AND messages.to_id = '$use_id' AND ifread=0 ORDER BY msg_date DESC";
        $retval = mysqli_query($link,$products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }                         
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {								 			 
						$msgs=$row['msgs'];
						if($msgs>0)
						{
							echo'<span class="blink" style="position:absolute; left: 330px; top: -22px; background-color:#FF0; border-radius:60%; ">';
							echo $msgs;
							echo'</span>';
						}						
				 }
			?>
      </a></div>
 <?php 
	$noon=date('12:00:00');
$evening=date('17:30:00');
$now=date('H:i:s');
if($now>$noon && $now<$evening)
{
echo'<br>Bon Apres-midi <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; 
}
elseif($now>$evening)
{
echo'<br>Bonsoir <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; 
}
else
{
echo'<br>Bonjour <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; 
 } 
	?>
    </div>     
</div>
</div>
<div class="content" style="overflow:hidden;" style="overflow:hidden;"><br /><br /><br />
<h3></h3>
<div style="background-color: #6C6; position: absolute; border-radius: 0px 0px 0px 0px; width: 991px; height: 110px; top: 0px; left: 0px;"></div>
<div style="background-color: #6C6; position: absolute; width: 990px; height: 107px; top: 414px; left: 0px;"></div>
<div style="background-color: #6C6; position: absolute; border-radius: 0px 0px 0px 0px; width: 60px; height: 25px; top: 560px; left: 331px;"></div>
<div style="background-color: #CCC; position: absolute; border-radius: 20px 0px 0px 20px; width: 30px; box-shadow: 0px 0px 5px 0px #000; height: 155px; top: 138px; left: 980px;"></div>
<div class="rep">
  <p><a href="consultation.php?service=3">
  <img style="position:absolute; left: 5px; top: 25px;" src="img/eyes.jpg" width="61" height="56" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; OPHTHAL <br> 
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MOLOGY </a></p>
</div>

<div class="rep1">
  <p><a href="consultation.php?service=2">
  <img style="position:absolute; left: 5px; top: 25px; width: 70px; height: 55px;" src="img/cpn.jpg" width="100" height="113" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CPN</a></p>
</div>

<div class="rep2">
  <p><a href="consultation.php?service=5">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/maternity.jpg" width="104" height="81" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MATERNITY</a></p>
</div>

<div class="rep4">
  <p><a href="consultation.php?service=4">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/pf.png" width="100" height="93" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PF</a></p>
</div>

<div class="rep5">
  <p><a href="menu1.php?service=6">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/arv.JPG" width="148" height="156" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ARV</a></p>
</div>

<div class="rep6">
  <p><a href="opd-adult.php?service=1">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/opdd.png" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OPD ADULTS</a></p>
</div>

<div class="cbhi">
  <p><a href="pcmi.php?service=7">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/opdd.png" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OPD KIDS</a></p>
</div>

<div class="rep8">
  <p><a href="consultation.php?service=8">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px; border-radius:0px 0px 30px 30px;" src="img/surgery.jpg" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SURGERY</a></p>
</div>

<div class="rep3">
  <p><a href="consultation.php?service=9">
  <img style="position:absolute; left: 5px; top: 25px; width: 60px; height: 55px;" src="img/dent.png" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DENTISTRY</a></p>
</div>

<div class="rep9">
  <p><a href="consultation.php?service=10">
  <img style="position:absolute; left: 5px; top: 15px; width: 60px; height: 55px;" src="img/ncds.png" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NCDs</a></p>
</div>

<div class="rep8" style="top:317px; left: 523px;">
  <p><a href="consultation.php?service=11">
  <img style="position:absolute; left: 5px; top: 20px; width: 60px; height: 55px;" src="img/mh.jpg" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MENTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HEALTH</a></p>
</div>
<div class="rep8" style="top:317px; left: 717px;">
  <p><a href="consultation.php?service=12">
  <img style="position:absolute; left: 5px; top: 20px; width: 60px; height: 55px;" src="img/download.png" width="256" height="256" /> <br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CIRCUMCISION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>
<div style="position:absolute; border-radius: 0px 200px 10px 10px; width:200px; border: 0px solid #09F; height:27px; background-color:#6C6; left: 18px; top: 95px;"><b>SERVICES</b></div>
<div id="footer"> <center></center></div>
</div>
</body>
</html>