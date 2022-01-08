<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sec.php?district="+int,true);
  xmlhttp.send();
}
</script>

</head>

<body>


<form  method="POST" action="details.php">
<table>
 <tr>
   <td>Date</td><td><input type="text" size="10"  value="<?php echo date('Y-m-d') ?>" placeholder="" name="date" /></td>
   </tr>
   <tr>
   <td>District(MUSA)</td><td>
   
    <?php 
	include('link.php');
    $products = "SELECT distrcode, distrname FROM district";
    echo '<select style="width:300px;" name="district" onchange="getVote(this.value)">';
    echo'<option  value="">---------------</option>';

        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {  
					 //echo'<input type="hidden" name="dcode" value="'.$row['distrcode'].'">';
					 echo'<option  value="'.$row['distrname'].'">'.$row['distrname'].'</option>';
					 
					//echo'<input type="hidden" name="dcode" value="'.$row['distrcode'].'">';
				 }
  

   
   echo '</select>';
   
   ?>
   
  </td>
   </tr>
   <tr>
   <td>Section(MUSA)</td><td><div id="poll"></div></td>
   </tr>
   <tr bgcolor="#00CC00">
   <td><strong>Si vous touvez pas de section</strong></td><td><input type="text" size="50" placeholder="Tapez-la ici" name="section" /></td>
   </tr>
   <tr>
   <td>Code Mutuelle</td><td><input type="text" size="50" placeholder="" name="insurance_code" /></td>
   </tr>
   <tr>
   <td>Nom et prenom du client</td><td><input type="text" size="50" placeholder="" name="beneficiary" /></td>
   </tr>
   
   
   <tr>
   <td>Age</td><td> <select name="age">
   <option value=""></option>
   <?php $age=0; 
   for ($age=date('Y');$age>=1935;$age--) 
         { 
		     echo '<option value="'.$age.'">'.$age.' </option>';
			 
	     }
		 
		 ?>
         
         
         </select></td>
   </tr>
   <tr>
   <td>Sexe</td><td><select name="sex"><option value=""></option><option value="F">Female</option><option value="M">Male</option></select></td>
   </tr>
  <tr>
  <td></td>
  <td>
  
  <input type="hidden" name="insurance" value="MUSA" />
  <input type="submit" value="Ajouter" /><input type="reset" value="Annuler" />
  </td>
  </tr>


</table>


</form>



</body>
</html>