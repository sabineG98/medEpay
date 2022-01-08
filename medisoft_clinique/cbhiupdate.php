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
