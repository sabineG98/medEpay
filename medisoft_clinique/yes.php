<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php 
include ('link.php');


if(isset($_POST['fname'])&&($_POST['lname']))
{
$id=$_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];


mysqli_query($link,"UPDATE formtest SET fname ='$fname',lname ='$lname' WHERE id =$id");
}


?>


<table border="1">
   <tr><td>fname</td><td>lname</td></tr>
   <?php
$med = "SELECT* FROM formtest";// get the date 
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowcbhi= mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 echo'<tr>
					 <form action="yes.php" method="post">
					 <td><input type="hidden" value="'.$rowcbhi['id'].'" name="id" /><input type="text" name="fname"  value="'.$rowcbhi['fname'].'"></td><td><input type="text"  name="lname" value="'.$rowcbhi['lname'].'"><input type="submit" value="ok" /></td>
					 </form>
					 
					 
					 
					 </tr>';
				 }
?>
</table>


<p>Suggestions: <span id="txtHint"></span></p> 
</body>
</html>