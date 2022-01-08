<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <?php 
	$section = "SELECT DISTINCT COUNT( DISTINCT orders.client_id) AS zone FROM orders,clients WHERE orders.client_id=clients.client_id AND clients.district='$district'  AND orders.date BETWEEN '$p1' AND '$p2'";// get the zone numbers
        $retval = mysqli_query($link, $section);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
					echo $row['zone'];
				 }
				 ?>
</body>
</html>