<?php 
error_reporting(E_ERROR | E_PARSE);

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>
<?php include('link.php');

	$id=$_GET['id'];
	$insu=$_GET['insu'];
	$date=$_GET['date'];
	
	
mysqli_query($link,"DROP VIEW labo");

mysqli_query($link,"CREATE VIEW labo AS
SELECT act
FROM  acts WHERE type!='LABORATOIRE' AND active=1");

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


<style>
body{width:610px;}
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:485px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}


.button {
	border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#096;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 10px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: 'ADD';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button1 {
	
  border:hidden;
  display: inline-block;
  border-radius: 4px;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 3px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
  background-image:url(img/print-button.png);
  background-repeat:no-repeat;
}
.button1 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.button:hover span:after {
  opacity: 1;
  right: 0;
}
.test:hover{ background-color:#F4F4F4;}
input, select{border: 1px solid #069;  height:17px; padding-left:30px;  font-size:16px;}


</style>
<script src="search/jquery.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "search/labsearch.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>

<body>

<?php 

if(isset($_POST['date']))
{
	$act=$_POST['act'];
	
	
	$price = "SELECT act_id, ta,tb,tc,td,tf,tg,insured FROM acts WHERE act='$act' LIMIT 1";
        $retvalprice = mysqli_query($link, $price);
        if(! $retvalprice )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowp = mysqli_fetch_array($retvalprice, MYSQLI_ASSOC))
                 {
					 
					 $item_id=$rowp['act_id'];
					 $ta=$rowp['ta'];
					 $tb=$rowp['tb'];
					 $tc=$rowp['tc'];
					 $td=$rowp['td'];
					 $tf=$rowp['tf'];
					 $tg=$rowp['tg'];
					 $insured=$rowp['insured'];
					 			
					
				 }
		
if($insu=='PRIVE')
$tarif=$ta;
elseif($insu=='RSSB')
$tarif=$tb;
elseif($insu=='UAP')
$tarif=$tc;
elseif($insu=='MEDIPLAN')
$tarif=$td;
elseif($insu=='MMI')
$tarif=$tg;
elseif($insu=='RADIANT')
$tarif=$tf;

if($tarif==0)
  {
	  $tarif=$ta;
	  $insured=0;
  }
	
	$qtty=$_POST['qtty'];
	$id=$_POST['id'];
	$date=$_POST['date'];
	$period=date("F-Y", strtotime($date));
	$user_id=$_SESSION['uid'];


	mysqli_query($link,"INSERT INTO orders(client_id,item_id,quantity,unityp,period,date,insured,user_id)
	VALUES($id,$item_id,$qtty,$tarif,'$period','$date',$insured,$user_id)");
	
}

  ?>



<div style="position: absolute; height: 1000px; overflow: auto; height: 163px; width: 490px; left: 12px; top: 91px;";>

<?php


$i=0;
echo'<hr>';
 $products = "SELECT act,unityp,quantity FROM acts, orders WHERE  acts.act_id=orders.item_id AND type!='LABORATOIRE' AND client_id=$id AND orders.date='$date' AND orders.active=1  ORDER BY time ASC ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				  
				    $i++;
				   echo $i.')'.$row['act'];
				   echo '--------<strong>('.$row['quantity'].'*'.$row['unityp'].'FRW='.$row['unityp']*$row['quantity'].'FRW)</strong><br>';
				   
			      
				 }
				 


?>

</div>




   <form action="actes.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>" method="POST">
<table>
   <tr>
   <td>
   
    <input type="text" id="search-box" size="50" autocomplete="off" name="act" placeholder="ACTES" />

<div id="suggesstion-box"></div>
</div>
     
</td>
     <td>
     <input type="text" style="height:17px;" size="3" placeholder='Qtt??' name="qtty" /></td>

      <input type="hidden" value="<?php echo $id; ?>" name="id" />
      <input type="hidden" value="<?php echo $insu; ?>" name="insu" />
      <input type="hidden" value="<?php echo $date; ?>" name="date" />


   
   <td><button class="button" ><span>+</span></button>
</td>
   </tr>
  

</table>


</form>
   
   

</body>
</html>