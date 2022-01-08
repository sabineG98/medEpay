<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.button {border:hidden;display:inline-block;border-radius:4px;background-color:#069;color:#FFF;text-align:center;font-size:16px;padding:7px;width:auto;transition:all 0.5s;cursor: pointer; margin: 2px;}
.button span { cursor: pointer; display: inline-block; position: relative; transition: 0.5s;}
.button span:after {content: 'Create';position: absolute;opacity: 0;top: 0; right: -20px; transition: 0.5s;}
/* .button:hover span { padding-right: 25px;} */
.button:hover span:after {opacity: 1; right: 0;}
</style>
</head>
<?php 
include('link.php');
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
?>
<body>
<div class="content"><br /><br /><br />
<div  style="width:429px;height:370px;box-shadow: 0px 0px 0px 0px #000;border:1px solid #09F;overflow:auto;position:absolute;background-color:#FFF;left:1px;top:11px;">
<table width="0" border="0" cellspacing="10" cellpadding="0">
<form action="adduser.php" method="post">
  <tr>
    <td>Name</td>
    <td><input type="text" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" name="nom" size="30" required /></td>
  </tr>
  <tr>
    <td>Role</td>
    <td>
    <select style="border: 1px solid #069;  height:30px; width:310px; padding-left:30px;  font-size:16px;" name="post" required >
    <option value="Director">Director</option>
    <option value="Doctor (Specialist)">Doctor (Specialist)</option>
    <option value="Doctor (Generalist)">Doctor (Generalist)</option>
    <option value="Doctor (Dentist)">Dentist</option>
    <option value="Nurse A0">Nurse A0</option>
    <option value="Nurse A1">Nurse A1</option>
    <option value="Lab Technician">Lab</option>
    <option value="Other paramedical staff">Other paramedical staff</option>
    <option value="accountant">Accountant</option>
    <option value="reception">Reception</option>
    <option value="caissiere">caissiere</option>
    <option value="Verification">Verification</option>
    <option value="other">Other</option>
    </select>    
     </td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input type="text" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" name="user" size="30" required /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" name="pw" size="30" required /></td>
  </tr>
  <tr>
    <td>Confirm </td>
    <td><input type="password" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" name="pw2" size="30" required /></td>
  </tr>
  <tr>
  <td></td>  
  <td><button class="button" ><span>Create </span></button></td>
  </tr>
  </form>
</table>

<?php 
if(isset($_POST['user'])&&($_POST['pw']))
{
	$fname=$_POST['nom'];
	$post=$_POST['post'];
	$user=$_POST['user'];
	//$pw=$_POST['pw'];
	$hpw=md5($_POST['pw']);
	
if($_POST['pw']==$_POST['pw2'])
   {
		// Query to find the last inserted id number	
		$select_query = "SELECT MAX(id) AS last_id FROM users";
		$select_query_run = mysqli_query($link,$select_query);		
		if($select_query_run)
		{
			if(mysqli_num_rows($select_query_run) > 0)
			{
				$row = mysqli_fetch_array($select_query_run,MYSQLI_ASSOC);				
				$last_id=$row['last_id'];
			}
			else
			{	die('Error in the SELECT query' . mysqli_error($link));	}
		}
		$last_id++;			   
		// End of the Query to find the last inserted id number			   
	   $query = "INSERT INTO users (id,fullname, post, username, password,status) VALUES ($last_id,'$fname', '$post','$user','$hpw','active')";
	   $query_run = mysqli_query ($link,$query); 							   
		  if(! $query_run) { die('Could not insert data: ' . mysqli_error($link));  }    
				else			   
    	  echo '<p style="background-color:green;"><strong>User created successfully !</strong><p/>';
	     }
	 else
	  echo '<p style="background-color:red;"><strong>Passwords don\'t match !.</strong><p/>';
//$i++;
  }
?>
<br />
</div>
</div>
</body>
</html>


