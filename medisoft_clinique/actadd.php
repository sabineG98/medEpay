<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>


<?php

include('link.php');

if(isset($_POST['product']))
{
	
$prod=$_POST['product']; 
$id=$_POST['id'];
$insu=$_POST['insu'];
$date=$_POST['date'];

//echo $id;
$tarif=0;
$price = "SELECT type,ta, tb, tc, td, te, insured FROM acts WHERE act='$prod' ";
        $retvalprice = mysqli_query($link, $price);
        if(! $retvalprice )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowp = mysqli_fetch_array($retvalprice, MYSQLI_ASSOC))
                 {
					     $ta=$rowp['ta'];
					     $tb=$rowp['tb'];
					     $tc=$rowp['tc'];
					     $td=$rowp['td'];
						 $te=$rowp['te'];
					    $insured=$rowp['insured'];
					    $type=$rowp['type'];

				 }
				     switch($insu)
					 {
						case"MUSA":
						  $tarif=$ta;
						  break;
						case"MEDIPLAN":
						  $tarif=$td;
						  break;
						case"CORAR":
						  $tarif=$td;
						  break;
						case"RADIANT":
						  $tarif=$td;
						  break;
					    case"RSSB":
						  $tarif=$tc;
						  break;
					    case"MMI":
						  $tarif=$tb;
						  break;
					    case"UR":
						  $tarif=$tb;
						  break;
						case"INDIGENT":
						  $tarif=$te;
						  break;
				        case"COMPASSION":
						  $tarif=$te;
						  break;
					    case"PRIVE":
						  $tarif=$te;
						  break;
					   default:
                        echo "No Insurance";
					 }
						 
                /*       if ($insu=='MUSA')
					 {
					   $tarif=$ta;
					 }
					 if ($insu=='MEDIPLAN')
					 {
					 $tarif=$tc;
					 }
					 if ($insu=='RSSB' or 'MMI' or 'UR')
					 {
					 $tarif=$tb;
					 }
					 if($insu=='INDIGENT')
					 {
					 $tarif=$td;
					 }
					 if($insu=='COMPASSION')
					 {
					 $tarif=$td;
					 }
					 
					 if($insu=='PRIVE')
					 {
					 $tarif=$td;
					 }*/			
					 
//echo $tarif;


//$tot=$qtty*$tarif;

$status='finished';

$period=date("F-Y", strtotime($date));
$user=$_SESSION['name'];

mysqli_query ($link,"INSERT INTO orders (client_id,item, type, unityp, period, date, status, insured, user) 
                               VALUES ($id,'$prod', '$type', $tarif, '$period', '$date', '$status', '$insured', '$user')");
							   
	
	
 						   

}
if ($type=='consultation')
echo '';
//echo 'Consultation ajouté!';
elseif($type=='laboratoire')
include('lab1.php');

?>

</body>
</html>
