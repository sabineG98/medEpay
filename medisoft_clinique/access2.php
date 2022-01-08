<?php
error_reporting(E_ERROR | E_PARSE);

session_start();


include"link.php";
$pass=$_POST['password'];
$hash=md5($pass);
$pass=$hash;



if($pass!=NULL)
{

$query=mysqli_query($link,"SELECT pass FROM veraccess WHERE pass='$pass'");
				while($result=mysqli_fetch_array($query))
				{
					$pass2=$result['pass'];
				
				}
				
				
				
				if($pass2==NULL)
				{
					$null='yes';
					header("Location: applications.php"); // Modify to go to the page you would like
                    exit;
					
				}
				
				if($pass2!=NULL)
				{
					
					$_SESSION['valid_pass']=$pass2;
					//$_SESSION['name']=$name;
					//$_SESSION['post']=$post;

					
					
					header("Location: cbhi.php"); // Modify to go to the page you would like
                    exit; 
					
					
				}
				
				
				
				
				
				
	
}
else
{
	include"applications.php";
}


?>