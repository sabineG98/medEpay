
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
   
   <form action="sympto.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>" method="POST">
<table>
   <tr>
   <td align="right">Symptomes</td><td><textarea name="sympto" cols="40" rows="5" ></textarea></td>
   </tr>
   
  
   
   
   <tr>
   <td>
      <input type="hidden" value="<?php echo $id; ?>" name="id" />
      <input type="hidden" value="<?php echo $insu; ?>" name="insu" />
      <input type="hidden" value="<?php echo $date; ?>" name="date" />
   </td><td><button class="button" ><span>+</span></button></td>
   </tr>
    
  

</table>

</form>
 <?php 

  if(isset($_POST['sympto_id']))
{
	$sympto_id=$_POST['sympto_id'];
	mysqli_query($link,"DELETE FROM sympto WHERE sympto_id=$sympto_id");
}

if(isset($_POST['date']))
{
	$sympto=$_POST['sympto'];
	$id=$_POST['id'];
	
	$date=$_POST['date'];
	$user=$_SESSION['name'];
	
	mysqli_query($link,"INSERT INTO sympto(client_id,sympto,date,user)
	VALUES($id,'$sympto','$date','$user')");
	
	echo'Registered successfully.';
}

  ?>
 
 
 
 <div style="position: absolute; height: 1000px; overflow: auto; height: 242px; width: 363px; left: 550px; top: 10px;";>



<table style="font-size:13px; border-collapse: collapse;" widtd ="0" border="0" cellspacing="0" cellpadding="5">
  <tr bgcolor="#85C2C2">
    <td><strong>Date</strong></td>
    <td><strong>Symptomes</strong></td>
    
  </tr>
  

<?php
$last=0;
 $products = "SELECT* FROM sympto WHERE client_id=$id AND sympto!='NULL' ORDER BY date DESC ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			$sympto_id=$row['sympto_id'];
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
			  
             
			 
			 
             echo' <td>'.$row['sympto'].'</td>';
             
			 if ($row['date']==date('Y-m-d'))
			 {
			 echo'<td><form action="sympto.php?id='.$id.'&insu='.$insu.'&date='.$date.'" method="post">';
			 echo'<input type="hidden" name="sympto_id" value="'.$sympto_id.'">';
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