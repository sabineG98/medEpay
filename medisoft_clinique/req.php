<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::TARIFICATION</title>

<script type="text/javascript" src="script.js"></script>

<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","proddetails.php?product="+int,true);
  xmlhttp.send();
}
</script>



<style>

tr:hover{ border:1px solid #F00;}

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
  content: '»';
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
input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
</style>

<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>






<?php
include('link.php');

$user_id=$_SESSION['id'];	

if(isset($_POST['comment']))
{
$code=$_POST['code']; 
$date=$_POST['date'];
$facility='Main';
$comment=$_POST['comment'];
$_SESSION['code']=$code;
$_SESSION['date']=$date;
$_SESSION['facility']=$facility;
$_SESSION['comment']=$comment;
}
else
{
$code=$_SESSION['code']; 
$date=$_SESSION['date'];
$facility=$_SESSION['facility'];
$comment=$_SESSION['comment'];
}




if(isset($_POST['product'])&&($_POST['qtty']))
{
	
$req_number=$_POST['code']; 
$product=$_POST['product']; 
$qtty=$_POST['qtty'];


$med = "SELECT qtty  FROM products WHERE prod_id='$product'";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $prev=$rowmed['qtty'];
					 //$stock=$rowmed['stock'];
					 
				 }
				 

//if ($qtty<=$stock)
//{

$newq=$qtty+$prev;//new qtty			 
//$news=$stock-$qtty;//new stock
mysqli_query ($link,"INSERT INTO req (req_number, prod_id, prev_qtty, order_qtty) 
                               VALUES ('$req_number', '$product','$prev', '$qtty')");
							   
//mysqli_query ($link,"UPDATE products SET stock ='$news', date='$date'  WHERE prod_id =$product");//update the distribution qtty
mysqli_query ($link,"UPDATE products SET qtty ='$newq', date='$date'  WHERE prod_id =$product");//update the stock qtty

echo'<font color="green"><strong>Added!</strong></font></br>';









$per = "SELECT service_id  FROM internal WHERE location='$facility'";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
					 
					 				
                 $loc_id=$rowper['service_id'];
	             }
				 $period=date("M-Y", strtotime($date));
				 
				 mysqli_query ($link,"INSERT INTO req_code (req_number,facility_id, period, date, comment, user_id) 
                               VALUES ($req_number,'$loc_id', '$period', '$date','$comment', $user_id)");
				 
				 
			


							   
		   
//}
//else
//{
	//echo'<font color="#FF0000"><strong>Insufficient Stock</strong></font></br>';
	//}

}







?>


</head>

<body>


<font style="background-color:#CCC;" size="+1" >Requisition No.: <strong><?php echo $code ?></strong> Date: <strong><?php echo $date ?></strong></font>
<br />

  
<form action="req.php" method="POST">
<table>
   <tr>
   <td>
   
    <?php 
    $products = "SELECT* FROM products ORDER BY description ASC  ";
    echo '<select style="width:300px; height:30px;" name="product" onchange="getVote(this.value)">';
        					 echo'<option  value="">Select a drug</option>';

		$retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 
					 echo'<option  value="'.$row['prod_id'].'">'.$row['description'].'</option>';
					 
					
				 }
  
    
   echo '</select>';
   
   ?><br />
     
</td>
   
   <input type="hidden" value="<?php echo $code; ?>" name="code" />
   <input type="hidden" value="<?php echo $date; ?>" name="date" />
   
   <td><input type="text" size="3" placeholder='Qtté' name="qtty" /></td>
   <td><button class="button" ><span>+</span></button> </td><td><div id="poll"></div></td>
   </tr>
  

</table>

</form>
<hr />
   
   
  <iframe style="width:700px; height:350px; border:1px solid #069; overflow:auto;" src="request.php?code=<?php echo $code;?>">
  
  
  
  
  
  </iframe><br /> 
   
   
   <table width="200" border="0">
  <tr>
    <td><form action="req.php" method="post">
   <input type="hidden" value="<?php echo $code; ?>" name="conf" />
   <button class="button" ><span>Confirm</span></button>
   </form>
   </td>
   <td>
   <?php
   if(isset($_POST['conf']))
       {
		  mysqli_query ($link,"UPDATE req_code SET confirmed =1");//confirms the order
		  
      echo'<font color="green"><strong>Confirmed</strong></font></br>';
	  
	   echo' <form action="print_req.php" method="post" target="_top">';
					 echo '<input type="hidden"  name="req_code" value="'.$code.'">';
					 echo '<button class="button1" ><span>&nbsp;&nbsp;&nbsp;&nbsp;</span></button>';
					  echo '</form>';

       }
 ?>
   </td>
  </tr>
</table>

   
   
   
   
   
   




<?php 
/*$i=0;

//find the month
$tot=0;
$med = "SELECT* FROM products ORDER BY description ASC";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $d=date('Y-m-d');
					 
					 $i++;
					 if ($d==$rowmed['date'])
					   echo'<tr bgcolor="#D9FFD9">';
					 elseif($i%2==0)
					 echo'<tr height="15" bgcolor="#D8D8D8">';

					 else
					  echo'<tr>';
					 
					 echo '<form  action="req.php" method="post">';
					 echo '<td width="35">'.$i.'</td>';
					 echo '<td width="300">'.$rowmed['description'].'</td>';
					 echo '<td width="130" bgcolor="">'.$rowmed['qtty'].'</td>';
					 echo '<td><input type="text" name="tarif"></td>';
					 echo '<input type="hidden" name="pid" value="'.$rowmed['prod_id'].'">';
					 echo '<input type="hidden" name="qtty" value="'.$rowmed['qtty'].'">';
					 echo '<td><input type="submit" value="" style="background-image:url(img/upd.jpg); background-repeat:no-repeat;" /></td>';

					 echo '</form>';
					 //echo '<td><form action="tarif.php" method="post">';
					 //echo '<input type="hidden" name="mid" value="'.$rowmed['prod_id'].'">';
					 //echo'<input type="submit" value="" style="background-image:url(img/del.png); background-repeat:no-repeat;" /></form>
					 //</td>';

					echo'</tr>';
				 }
	*/
?>

  





</body>
</html>