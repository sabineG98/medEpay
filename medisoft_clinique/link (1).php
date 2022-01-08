
<?php 
//mysqli_connect("localhost", "root", "");
       // mysqli_select_db("easybilling");
		
		
		
		
		
define ("DB_HOST", "localhost"); // set database host
define ("DB_USER", "root"); // set database user
define ("DB_PASS","raymond1"); // set database password
define ("DB_NAME","private"); // set database name

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
$db = mysqli_select_db(DB_NAME, $link) or die("Couldn't select database");


?>
