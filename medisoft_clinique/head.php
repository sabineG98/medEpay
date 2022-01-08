<?php 
// error_reporting(E_PARSE | E_ERROR);
include('link.php');
session_start();
if(!$_SESSION['name']){
    header("Location: login.php");
    exit;
} 
////////////////////////
$idletime=900;
if(isset($_SESSION['timeout'])){
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $idletime){
		 header("Location: logout.php");
	}
}
$_SESSION['timeout'] = time();	
/////////////////////
$name=$_SESSION['name'];
$usr=$_SESSION['name'];
$select_query = "SELECT * FROM users WHERE fullname='$usr'";
$select_query_run = mysqli_query($link,$select_query);		
		if($select_query_run)
		{
			if(mysqli_num_rows($select_query_run) > 0)
			{
				$row = mysqli_fetch_array($select_query_run,MYSQLI_ASSOC);				
				$use_id=$row['id'];
				$fullname=$row['fullname'];
				$post=$row['post'];
				$username=$row['username'];
				$password=$row['password'];
				$levels=$row['levels'];
			}
			else
			{ die('Error in the SELECT query' . mysqli_error($link));	}
		}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->   
    <link rel="shortcut icon" href="img/icon.jpg" type="image/x-icon"/>    
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="dist/css/icons/material-design-iconic-font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="dist/css/icons/themify-icons/themify-icons.css" rel="stylesheet">
    <link href="boot.css" rel="stylesheet" type="text/css" media="screen" />      
    <script type="text/javascript" src="highslide/highslide-with-html.js"></script>     
    <link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
    <script type="text/javascript">
      hs.graphicsDir = 'highslide/graphics/';
      hs.outlineType = 'rounded-white';
      hs.wrapperClassName = 'draggable-header';
    </script> 
    <style>
      .blink{	animation:blinkingText 1.2s infinite; }
      @keyframes blinkingText{
          0%{background-color:#ff0;}
          49%{background-color:#ff0;}
          60%{background-color:transparent;}
          99%{background-color:transparent;}
          100%{background-color:#ff0;}
        }
    </style>