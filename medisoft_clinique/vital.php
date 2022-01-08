
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
input, select{border: 1px solid #069;  height:20px; padding-left:30px;  font-size:16px;}


</style>



</head>

<body>
  
 <form action="vital.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>" method="post">
<table>
   <tr>
   <td align="right">Temperature</td><td><input type="text" name="temp" size="2" value=""  /><sup>o</sup>C</td>
   </tr>
   
   <tr>
   <td align="right">Poids</td><td><input type="text" name="poids" size="2" value=""  />Kg</td>
   </tr>
    
    
    <tr>
   <td align="right">Tension arteriel</td><td><input type="text" name="tension" size="5" value=""  /></td>
   </tr>
   
   
   <tr>
   <td align="right">Respiration</td><td><input type="text" name="respiration" size="2" value=""  />/mn</td>
   </tr>
   
   
   <tr>
   <td align="right">Pulsation</td><td><input type="text" name="pulse" size="3" value=""  /></td>
   </tr>
   
   
   <tr>
   <td>
      <input type="hidden" value="<?php echo $id; ?>" name="id" />
      <input type="hidden" value="<?php echo $insu; ?>" name="insu" />
      <input type="hidden" value="<?php echo $date; ?>" name="date" />
   </td>
   <td><button class="button" ><span>+</span></button></td>
   </tr>
     

  

</table>
</form>

  <?php 
  
  if(isset($_POST['vital_id']))
{
	$vital_id=$_POST['vital_id'];
	mysqli_query($link,"DELETE FROM vital WHERE vital_id=$vital_id");
}

if(isset($_POST['date']))
{
	$temp=$_POST['temp'];
	$tension=$_POST['tension'];
	$poids=$_POST['poids'];
	$respiration=$_POST['respiration'];
	$pulse=$_POST['pulse'];
	$id=$_POST['id'];
	$date=$_POST['date'];
	$user=$_SESSION['name'];
	
	mysqli_query($link,"INSERT INTO vital(client_id,temperature,poid,tension,respiration,pulse,date,user)
	VALUES($id,'$temp','$poids','$tension','$respiration','$pulse','$date','$user')");
	
	echo'Registered successfully.';
}

  ?>

   
   
<div style="position: absolute; height: 1000px; overflow: auto; height: 242px; width: 558px; left: 300px; top: 10px;";>



<table style="font-size:13px; border-collapse: collapse;" widtd ="0" border="0" cellspacing="0" cellpadding="5">
  <tr bgcolor="#85C2C2">
    <td><strong>Date</strong></td>
    <td><strong>Temperature</strong></td>
    <td><strong>Poids</strong></td>
    <td><strong>Tension arteriel</strong></td>
    <td><strong>Respiration</strong></td>
    <td><strong>Pulsation</strong></td>
  </tr>
  

<?php
$last=0;
 $products = "SELECT* FROM vital WHERE client_id=$id ORDER BY date DESC ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			$vital_id=$row['vital_id'];
			$last++;
			if ($last%2==0)
			  {
             echo'<tr bgcolor="#D9F2FF">';
			  }
			  else
			 {
             echo'<tr bgcolor="">';
			  }
			  
			  
			  if ($row['date']==date('Y-m-d'))
			  {
             echo' <td style="color:red;">Today '.$row['date'].'</td>';
			  }
			  else
			 {
             echo' <td>'.$row['date'].'</td>';
			  }
			  
             
			 
			 
             echo' <td>'.$row['temperature'].'</td>';
             echo'<td>'.$row['poid'].'</td>';
             echo'<td>'.$row['tension'].'</td>';
             echo'<td>'.$row['respiration'].'</td>';
             echo'<td>'.$row['pulse'].'</td>';
			 if ($row['date']==date('Y-m-d'))
			 {
			 echo'<td><form action="vital.php?id='.$id.'&insu='.$insu.'&date='.$date.'" method="post">';
			 echo'<input type="hidden" name="vital_id" value="'.$vital_id.'">';
			 echo'<input type="image" src="img/del.png" style=" border:0px solid #FFF;">';
			 echo'</form></td>';
			 }
             echo' </tr>';	  
				}


?>
</table>
<?php
if($last==0)
echo 'NO RECORDS';
?>
</div>



</body>
</html>