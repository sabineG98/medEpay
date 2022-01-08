<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<!--popup iframe settings -->
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />

   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<title>Untitled Document</title>
</head>

<body>





<img src="img/alert.png" width="24" height="24" /><font color="#FF0000" size="+3">Stock Alerts</font>


<div style="position: absolute; font-size: 16px; overflow: auto; background-color: #FFF0F0; padding-left: 10px; border: 2px solid red; border-radius: 2px; height: 495px; width: 351px; left: 13px; top: 64px;">


   <?php 
   include('link.php');
	  $i=0;
	 $per = "SELECT * FROM products WHERE qtty <=3 ORDER BY qtty  ";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
					echo $rowper['description'].'<font color="#FF0000">----<strong>'.$rowper['qtty'].'</strong></font><br>';
				 }
					 
	?>
    

</div>




</body>
</html>