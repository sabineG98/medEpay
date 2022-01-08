<?php

include('connect.php');




?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="wp-content/themes/WpStream/css/screen.css" type="text/css" media="screen, projection" />
<script type="text/javascript">
function show_alert()
{
alert("Igitekerezo cyanyu cyakiriwe, nyuma yigenzurwa cyirashyirwaho");
}
</script>


<title>Untitled Document</title>
</head>

<body bgcolor="#D2D2FF" >




<div class="current_ideas">
  
<table width="96%" border="0"  bgcolor="#F2F2F2">
<form action="idea.php" method="post">
  <tr>
    <td>Amazina</td>
    <td><input type="text" name="nom" size="50" /></td>
  </tr>
  <tr>
    <td>E-mail</td>
    <td><input type="text" name="email" size="50" /></td>
  </tr>
  <tr>
    <td>Igitekerezo</td>
    <td><textarea rows="10" cols="40" name="idea"></textarea>
    <input type="hidden" name="subject" value="inkiko gacaca" />
    </td>
  </tr>
  <tr>
    
    <td></td>
    <td><input type="submit" value="Ohereza" onclick="show_alert()"  /></td>
    
  </tr>
  </form>
</table>

</div>


<div class="insert_idea">

<h3>Ibindi bitekerezo</h3>
<hr />

<?php         

//include('connect.php');
$get = "SELECT idea_id,nom,idea FROM ideas ORDER BY idea_id DESC";
                 $result = mysqli_query($link,$get);
                  while($row = mysqli_fetch_array($result)) 
                      {
						  
						  
						echo'
						
						<fieldset style="background-color:#F8F8F8"> <legend><strong>'.$nom = $row['nom'].'</strong></legend>

                            '.$idea= $row['idea'].'


                        </fieldset>
						
						
						
						
						';  
						 
					  }	





 ?>



<?php

if(isset($_POST['idea']))
    {
$req=mysqli_query($link,"INSERT INTO ideas(nom,email,idea,subject)
VALUES('$_POST[nom]','$_POST[email]','$_POST[idea]','$_POST[subject]')");

if (!$req)
  {
  die('Could not connect: ' . mysqli_error($link));
  }
mysql_close($con);
}


?>


</div>

</body>
</html>