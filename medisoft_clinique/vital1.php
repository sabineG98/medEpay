
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<center>   
   <form action="actadd.php" method="POST">
<table>
   <tr>
   <td>
   
    <input type="text" name="vital" value="Temp:    Kg:     Tension:    Respiration:     Pulsation:     "  />
     
</td>
      <input type="hidden" value="<?php echo $id; ?>" name="id" />
      <input type="hidden" value="<?php echo $insu; ?>" name="insu" />
      <input type="hidden" value="<?php echo $date; ?>" name="date" />


   
   <td><input type="submit" value="" style="background-image:url(img/add.jpg); background-repeat:no-repeat;" /></td>
   </tr>
  

</table>


</form>
  <?php 
 /*if ($insu=='MUSA')
 {
echo' 
 <input type="hidden" value="'.$id.'" name="id" />
 <input type="hidden" value="'.$date.'" name="date" />
 <input type="hidden" name="tm" value="tm" />
 <input type="hidden" name="price" value="200" />
   <input type="submit" onclick="getVote(this.value)" value="TICKET MODERATEUR" />
   
 ';
 }*/
 ?>
 </div>
   </center>



</body>
</html>