<?php 
include ('link.php');

$id=$_POST['id']; 
$MS_code=$_POST['merci']; 
$sql = "UPDATE facture SET MS_Code =$code  WHERE id =$id";

//include ('missing.php');


?>
