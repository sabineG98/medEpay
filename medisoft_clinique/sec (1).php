<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

include('link.php');
$code =$_REQUEST['district'];

$products = "SELECT distrcode FROM district WHERE distrname='$code'";

        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {  
					 $code=$row['distrcode'];
				 }











    $products = "SELECT musasec FROM healthc WHERE distrcode='$code'";
    echo '<select name="section">';
	    echo'<option  value="">---------------</option>';

        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {  
					 
					 echo'<option  value="'.$row['musasec'].'">'.$row['musasec'].'</option>';
					 
					
				 }
  
    echo'<option  value="">-----------------</option>';

    echo'<option  value=""><strong>NON TROUVE</strong></option>';

   echo '</select>';
   
   ?>
   </body>
</html>