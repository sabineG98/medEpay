<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php



include('link.php');
$code =$_REQUEST['product'];

$products = "SELECT  qtty FROM products  WHERE description='$code'";

        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {  
				    //echo '<font color="#FF0000">';
					$prev=$row['qtty'];
					if($row['qtty']>=1)
					{
					echo '<font color="green">';
					echo 'stock:<strong>'.$row['qtty'].'</strong>&nbsp;&nbsp;&nbsp;';
					//echo 'Stock:<strong>'.$row['stock'].'</strong>';
					echo'</font>';
					}
					else
					{
					echo '<font color="#FF0000" size="+3">';
					echo '<strong>Stock out</strong>&nbsp;&nbsp;&nbsp;';
					//echo 'Stock:<strong>'.$row['stock'].'</strong>';
					echo'</font>';
					}

				 }

?>







   </body>
</html>