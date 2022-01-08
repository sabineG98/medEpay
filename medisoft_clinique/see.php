<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 

if(isset($_POST['insurance_code'])&&($_POST['beneficiary']))
{
	
       $insurance=$_POST['insurance']; 
      $date=$_POST['date'];
	  echo $district=$_POST['district'];
	  echo $section=$_POST['section'];
	  if (empty($_POST['section']))
	     {
	     $section=$_POST['section2'];
		 echo $section;
		 }
	  /*$insurance_code=$_POST['insurance_code'];
      $beneficiary=$_POST['beneficiary'];
	  $age=$_POST['age'];
	  $sex=$_POST['sex'];
	  $serie=$_POST['serie'];
	  $adherent=$_POST['adherent'];
	  $department_aff=$_POST['department_aff'];
	  $police=$_POST['police'];
	  $period=date("F-Y");*/

  						  
}



?>






</body>
</html>