<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<!--popup iframe settings -->
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>         
<title>.::Details::.</title>

<?php 
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
?>
<?php
error_reporting(E_ERROR | E_PARSE);
include('link.php');

$user=$_SESSION['user'];

if(isset($_POST['date'])&&($_POST['name']))
{	
$date=$_POST['date'];
$fullname=$_POST['name'];
$dob=$_POST['dob'];
$sex=$_POST['sex'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$credit=$_POST['credit'];
$cvc=$_POST['cvc'];
$exp=$_POST['exp'];
$country=$_POST['country'];
$city=$_POST['city'];
$insurance=$_POST['insurance'];
$period=date("F-Y", strtotime($date));
$user=$_SESSION['name'];
$client_id=$_POST['code'];
switch($insurance)
{
case"RSSB":
	$percentage=10;
	break;
  case"UAP":
	$percentage=10;
	break;
  case"SANLAM":
	$percentage=20;
	break;
  case"MMI":
	$percentage=50;
	break;
  case"RADIANT":
	$percentage=30;
	break;
  case"PRIVATE":
	$percentage=100;
    break;					   
 default:
  //echo "No Insurance";
}		
if($client_id==0)
    {
	  $a=mysqli_query ($link,"INSERT INTO clients (date,fullname,dob,sex,tel,email,credit,cvc,exp,country,city,insurance,percentage,name,period,user,status) 
                                          VALUES ('$date', '$fullname', '$dob', '$sex', '$tel', '$email', '$credit', '$cvc', '$exp', '$country', '$city', '$insurance','$percentage','$name', '$period', '$user', 1)"); 
      if(!$a){ die("Sorry, could not insert data: ".mysqli_error($link)); }

   /* Stripe class call */
   include('functions/stripe-class.php');
   $stripeClass = new stripeClass();
   $response = $stripeClass->createCustomer($fullname,$tel,$city,$country,$email);
   }
	if($client_id>0)
    {
	  $b=mysqli_query ($link,"UPDATE clients SET name='$fullname', dob='$dob', sex='$sex', tel='$tel', insurance='$insurance', Email='$Email', credit='$credit', cvc='$cvc', country='$country', city='$city', exp='$exp', percentage='$percentage', date='$date', period='$period', user='$user', status=1 WHERE client_id=$client_id");	  
     if(!$b){ die("Sorry, could not Update data: ".mysqli_error($link)); }
    }
  						  
}

$_SESSION['period']=$period;
$_SESSION['date']=$date;

?>
</head> 
<body>
<div class="all_container">
   <div class="show">
      <div style="position:absolute;">         
         <div style="position: absolute; width: 700px; border:0px; top:10px; height: 66px; left:20px;"> 
            <a style="color:white;" href="orderdelete.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
               <img src="img/edit1.png" width="20" height="20" />Modify 
            </a> 
         </div>
         
         <div class="menu1"><a href="home.php"><img style="position:absolute; left: 1620px; top: -13px;" src="img/home.png"  alt="Saisie"  /></a></div>
         <div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 1650px; top: -13px; " src="img/logout.png" /></a></div>        
      </div>  
   </div>

   <div style="width:99.5%;opacity:0.9;background-color:#FFF;position:absolute;top:54px;padding:2px;margin:1px 0;border: 1px solid #000; -webkit-border-radius:5px; box-shadow: 0px 0px 20px #000; height: 780px; overflow:auto;">
      <div style="background-color:#FFF;border-radius:10px 10px 10px 10px;border:1px solid #FFF;font-size:20px;width:99%;height:43px;position:absolute;left:4px;top:27px;text-align:center;">
      <img src="img/patient.png" width="51" height="43">
         <?php
            if(isset($_POST['code']))
            {
               $code=$_POST['code'];
               $date=$_POST['date'];
               $period=date("F-Y", strtotime($date));
               $_SESSION['period']=$period;

               $last = "SELECT DISTINCT *  FROM clients WHERE client_id='$code'";
                     $retval_last = mysqli_query($link, $last);
                     if(! $retval_last ){ die('Could not get data: ' . mysqli_error($link)); }                         
                        while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                           {
                           $id=$rowlast['client_id'];					 
                           $insu=$rowlast['insurance'];
                           $percentage=$rowlast['percentage'];
                           $cname=$rowlast['name'];
                           echo '<b>'.$rowlast['name'].'</b>&nbsp;-&nbsp;&nbsp;D.O.B:&nbsp;<b>'.$rowlast['dob'].'</b>&nbsp;-&nbsp;&nbsp;SEX:&nbsp;<b>'.$rowlast['sex'].'</b>&nbsp;-&nbsp;&nbsp;(<strong>'.$rowlast['insurance'].'-'.$percentage.'%</strong>)&nbsp;-';
                           echo '&nbsp;CODE:<b><font color="#FF0000">'.$id.' </font>';            
                           break;		         
                           }
                              if (empty($id))
                              {
                              header("Location: home.php");
                                 exit;
                              }
            }
         ?> 
      </div>
         <br /><br /><br />
      <div  style="width: 99%; height: 690px; border: 0px solid #09F; position: absolute; background-color: #fff; left: 5px; top: 77px;">
         <!-- <a style="color:white;font-size:24px;" href="find.php"  onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
            <div style="position:absolute;border-radius:5px 5px 0px 0px;border-bottom:0px;width:430px;border-top:1px solid #09F;border-left:1px solid #09F;border-right:1px solid #09F;height:44px;background-color:#999;left:1290px;top:23px;z-index:1;">
               <center><img src="img/find.png" width="24" height="24" />
               Find a patient</center>
            </div>
         </a> -->
         <br />
         <iframe style="position:absolute;border:0px;background-color:#FFF;left:-1px;top:7px;width:100%;height:670px;" src="tabs.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
      </div>

   </div>
</div>

 <?php 
 $_SESSION['id']=$id;
 $_SESSION['date']=$date;
  $_SESSION['cname']=$cname;
  $_SESSION['insurance']=$insu; 
 ?>
</body>
</html>