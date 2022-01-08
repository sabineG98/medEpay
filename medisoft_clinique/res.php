<div style="position:absolute; box-shadow: 0px 0px 10px 0px #000; width: 364px;">

<form action="prodadd.php" method="POST">
<table>
   <tr>
   <td>
   
    <?php 
    $products = "SELECT* FROM products ORDER BY description ASC  ";
    echo '<select name="product">';
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					 
					 echo'<option value="'.$row['description'].'">'.$row['description'].'</option>';
					 
					
				 }
  
   
   
   echo '</select>';
   
   ?>
   
   
   
   
   
   
   
   
   
   
   <br /> 
   <div id="result"></div>
  
</td>
   <td><input type="text" size="3" disabled="disabled" name="unitp" /></td>
   
   <?php
    /*echo'<input type="hidden"  name="musa" value="'.$c.'" />'; 
	echo'<input type="hidden"  name="noms" value="'.$n.'" />';
   */
     
   ?>
   
   <td><input type="text" size="3" name="qtty" /></td>
   <td><input type="submit" value="" style="background-image:url(img/add.jpg); background-repeat:no-repeat;" /></td>
   </tr>
  

</table>


</form>
</div>