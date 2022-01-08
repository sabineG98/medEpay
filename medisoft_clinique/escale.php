<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>






<form action="orderdelete.php" method="post">
<p style="background-color:red;">

<strong>Modification</strong><select name="orderd" >
<option value=""></option>
<?php 
  $id=$_GET['id'];
  if (!empty($id))
	{
    $products = "SELECT* FROM orders WHERE client_id=$id ";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				 
                 echo'<option value='.$row['order_id'].'>'.$row['item'].'</option>';
				 
			     }
	}
	
	
	
	
   ?>
  


</select>
<input type="submit" value="" onclick="getVote(this.value)" style="background-image:url(img/del.png); background-repeat:no-repeat;" />
</form>
</p>

</body>
</html>