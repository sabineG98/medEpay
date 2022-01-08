<?php error_reporting(E_ERROR | E_PARSE);  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style>
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



</head>

<body>
<?php 
    session_start();

	include('link.php');
	
	
	
	$user_id=$_SESSION['id'];
?>




<form action="perte.php" method="POST">
<table>
   <tr>
   <td>
   Comment<br />
   <textarea name="comment" rows="1"  cols="23"></textarea>
   </td></tr>
   
   <tr>
   <td>
   Date<br />
   <input type="text" name="date" value="<?php echo date('Y-m-d') ?>" />   </td>
   </tr>
   <tr><td>
    <?php 
	
	
	
    $products = "SELECT* FROM products ORDER BY description ASC  ";
    echo '<select style="width:300px; height:30px;" name="product">';
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
      
   <td><input type="text" size="3" placeholder='Qtté' name="qtty" /></td>
   <td><button class="button" ><span>+</span></button> </td><td><div id="poll"></div></td>
   </tr>
  

</table>

</form>
<?php
if(isset($_POST['qtty']))
{
	
	$comment=$_POST['comment'];
    $date=$_POST['date'];
	$period=date("M-Y", strtotime($date));
    $product=$_POST['product'];
	$qtty=$_POST['qtty'];
	mysqli_query ($link,"INSERT INTO perte(comment, date, period, prod_id, user_id, qtty) 
                               VALUES ('$comment', '$date', '$period','$product', '$user_id', '$qtty')");
							   
	mysqli_query ($link,"UPDATE products SET qtty=qtty-$qtty WHERE prod_id =$product");						
							  
							  
							  
							  
							  
							  
							  
							   
}


	
?>

<iframe style="width:850px; height:310px; border:1px solid #069; overflow:auto;" src="perte1.php">


</body>
</html>