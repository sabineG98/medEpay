
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center>   
   <form action="consoadd.php" method="POST">
<table>
   <tr>
   <td>
   
    <?php 
    $products = "SELECT* FROM consommables ORDER BY name_consommable ASC  ";
    echo '<select style="width:300px;" name="product">';
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 
					 echo'<option  value="'.$row['name_consommable'].'">'.$row['name_consommable'].'</option>';
					 
					
				 }
  
   
   
   echo '</select>';
   
   ?>
     
</td>
     <td><input type="text" size="3" placeholder='Qtté' name="qtty" /></td>

      <input type="hidden" value="<?php echo $id; ?>" name="id" />
      <input type="hidden" value="<?php echo $insu; ?>" name="insu" />
      <input type="hidden" value="<?php echo $date; ?>" name="date" />

   
   <td><input type="submit" value="" style="background-image:url(img/add.jpg); background-repeat:no-repeat;" /></td>
   </tr>
  

</table>


</form>
   
   </center>

</body>
</html>