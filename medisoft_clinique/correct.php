<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Correction</title>
</head>

<body>
<center>
<?php 

include("link.php");

$date=date('Y-m-d');
$period=date("F-Y", strtotime($date));

if(isset($_POST['date1'])&&($_POST['date2']))
{
	$date1=$_POST['date1'];
    $date2=$_POST['date2'];
	
	$last = "SELECT order_id, date  FROM orders WHERE date='$date1'";
        $retval_last = mysqli_query($link, $last);
        if(! $retval_last )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
	
	              
	              $id=$rowlast['order_id'];
	              mysqli_query ($link,"UPDATE orders SET date ='$date2'  WHERE order_id =$id");
	             
				 }
				 echo'<h2 style="color:green;">"Correction done successfully!</h2>';
                 echo'<hr>';

}


if(isset($_POST['period1'])&&($_POST['period2']))
{
	$period1=$_POST['period1'];
    $period2=$_POST['period2'];
	
	$last = "SELECT order_id, period  FROM orders WHERE period='$period1'";
        $retval_last = mysqli_query($link, $last);
        if(! $retval_last )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
	
	              
	              $id=$rowlast['order_id'];
	              mysqli_query ($link,"UPDATE orders SET period ='$period2'  WHERE order_id =$id");
	             
				 }
				 echo'<h2 style="color:green;">"Correction done successfully!</h2>';
                 echo'<hr>';

}



?>



<h1>DATES CORRECTION</h1>
<hr />
<h3>Date</h3>
<form action="correct.php" method="post">
Where date is
<input type="text" name="date1" value="<?php echo $date ?>"  />
change to
<input type="text" name="date2" value="<?php echo $date ?>"  />
<input type="submit" value="Update" />
</form>

<hr /><hr />
<h3>Period</h3>
<form action="correct.php" method="post">
Where month is
<input type="text" value="<?php echo $period ?>" name="period1" />
change to
<input type="text" value="<?php echo $period ?>" name="period2" />
<input type="submit" value="Update" />
</form>


</center>

</body>
</html>