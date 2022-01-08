<?php
    error_reporting(E_ERROR | E_PARSE);
    include('link.php');
			
	session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

	$id=$_GET['id'];
	$insu=$_GET['insu'];
	$date=$_GET['date'];

 if(isset($_POST['diag_id']))
{
	$diag_id=$_POST['diag_id'];
	mysqli_query($link,"DELETE FROM sympto WHERE diagno=$diag_id");
}

if(isset($_POST['date']))
{
	$diag=$_POST['diag'];
	$id=$_POST['id'];	
	$date=$_POST['date'];
	$user=$_SESSION['name'];	
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body{width:610px;}
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:950px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
.button {border:hidden;display: inline-block; border-radius: 4px;background-color:#096;color: #FFFFFF;text-align: center;font-size: 16px;padding: 10px;  width: auto; transition: all 0.5s; cursor: pointer; margin: 2px;}
.button span { cursor: pointer; display: inline-block; position: relative; transition: 0.5s;}
.button span:after { content: 'ADD'; position: absolute; opacity: 0; top: 0; right: -20px; transition: 0.5s;}
.button:hover span { padding-right: 25px;}
.button1 { border:hidden;display:inline-block;border-radius:4px;color:#FFFFFF;text-align:center;font-size:16px;padding:3px;width: auto;transition: all 0.5s;
  cursor: pointer;margin: 2px;background-image:url(img/print-button.png);background-repeat:no-repeat;}
.button1 span { cursor: pointer; display: inline-block; position: relative; transition: 0.5s;}
.button:hover span:after { opacity: 1; right: 0;}
.test:hover{ background-color:#F4F4F4;}
input, select{border: 1px solid #069;  height:20px; padding-left:30px;  font-size:16px;}
</style>
<script src="search/jquery.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "search/diagnosis.php",
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
	  $diag=$_POST['diag'];
	  $id=$_POST['id'];	
	  $date=$_POST['date'];
	  $user=$_SESSION['name'];	
  $x="SELECT diagno_id FROM diagnosis WHERE diagnosis.diagno_id ='$diag'";	  
  $ret = mysqli_query($link, $x);
        if(! $ret )
           {  die('Could not get data: ' . mysqli_error($link));    }  
		   if (mysqli_num_rows($link,$ret)>0)
		   { mysqli_query($link,"INSERT INTO sympto(client_id,diagno,date,user) VALUES ($id,'$diag','$date','$user')"); }
		   else
		   { 
		   mysqli_query($link,"INSERT INTO diagnosis(diagnosis,code) VALUES ('$diag','N/A')"); 
		   		$xi="SELECT diagno_id FROM diagnosis WHERE diagnosis.diagnosis ='$diag'";	  
				$reti = mysqli_query($link, $xi);
					  if(! $reti )
					   {  die('Could not get data: ' . mysqli_error($link));    }  
					   while($roi = mysqli_fetch_array($reti, MYSQLI_ASSOC))
						 {	
						 $q=$roi['diagno_id'];
						 }
		   mysqli_query($link,"INSERT INTO sympto(client_id,diagno,date,user) VALUES ($id,'$q','$date','$user')");
		   }                                	
  }
?>

<div style="position: absolute; height: 1000px; overflow: auto; height: 163px; width: 490px; left: 12px; top: 91px;";>
<?php
$i=0;
echo'<hr>';
 $products = "SELECT diagno,diagnosis FROM sympto, diagnosis WHERE  sympto.diagno=diagnosis.diagno_id AND sympto.client_id=$id AND sympto.date='$date'  ORDER BY date ASC ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {  die('Could not get data: ' . mysqli_error($link));    }                         
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {				  
				    $i++;
					$diagno=$row['diagno'];
				   echo '<table><tr><td>- '.$row['diagnosis'].'</td><td><form action="diag.php?id='.$id.'&insu='.$insu.'&date='.$date.'" method="post">';
			 echo'<input type="hidden" name="diag_id" value="'.$diagno.'">';
			 echo'<input type="image" src="img/del.png" style=" border:0px solid #FFF;">';
			 echo'</form></td></tr></table>';
			 //echo $id.'-'.$insu.'-'.$date.'-'.$diagno;
				   //echo '<br>';			      
				 }				 
?>
</div>
<center>
<form action="diag.php" method="POST">
  <table>
     <tr>
       <td align="right">Diagnostiques</td><td>   
       <input type="text" id="search-box" size="50" autocomplete="off" name="diag" placeholder="Diagonisis" />
        <div id="suggesstion-box"></div>
          </div>   
       </td>  
       <td>
          <input type="hidden" value="<?php echo $id; ?>" name="id" />
          <input type="hidden" value="<?php echo $insu; ?>" name="insu" />
          <input type="hidden" value="<?php echo $date; ?>" name="date" />
       </td><td><button class="button" ><span>+</span></button></td>
     </tr>       
  </table>
</form>
 </div> 
   </center>
</body>
</html>