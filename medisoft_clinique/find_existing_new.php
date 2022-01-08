<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <script type="text/javascript" language="javascript">
   function getVote1(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll1").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","datedetails.php?date="+int,true);
  xmlhttp.send();
}

function stringleng(inputtxt)
{ 
		var field = inputtxt.value; 

		if(isNaN(field))
			{ 
			alert("Please Enter a valid date !");

			return false;
			document.form1.date.focus() ;
			}
}

</script>
</head>

<body>

<?php

/////	echo'<form action="details.php" method="post" target="_parent" name="form1"  onsubmit="return stringleng(document.form1.abc)">';
	echo'<table width="0" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                            <tr bgcolor="#CCCCCC" >
                         <td>BENEFICARY</td>
						 <td>CODE</td>
						
                          <!--<td>INSURANCE CODE </td>-->
                           <td colspan="">CAT</td>
						  <!-- <td colspan="">CHEF DE F.</td>-->
						   <td colspan="">AGE</td>
						   <td colspan="">SEXE</td>
						   <!--<td colspan="">REG DATE</td>-->
						   
						   
						   
						   ';
						   
$code=$_REQUEST['client'];
$i=0;
$time=date('Y-m-d');
$defper = "SELECT * FROM clients WHERE time>$time AND  insurance_code ='$code' OR client_id='$code' OR beneficiary LIKE'%$code%'  ORDER BY client_id DESC LIMIT 1000 ";
        $retvalper = mysqli_query($link,$defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				   $id=$defrowper['client_id'];
				   
				    $i++;
					 
					 
					 if ($i%2==0)
					   echo'<tr bgcolor="#D9FFD9">';
					
					 else
					  echo'<tr>';
				   echo'<form action="labo.php" method="post" target="_parent" name="form1" >';//////////
				   echo'<td>'.$defrowper['beneficiary'].'</td>';
				   echo'<td>'.$id.'</td>';
				  // echo'<td>'.$defrowper['insurance_code'].'</td>';
				   echo'<td>'.$defrowper['percentage'].'</td>';
				  // echo'<td>'.$defrowper['chef'].'</td>';
				   echo'<td>'.$defrowper['age'].'</td>';
				   echo'<td>'.$defrowper['sex'].'</td>';
				  // echo'<td>'.$defrowper['date'].'</td>';
				   echo'<td><input type="hidden" name="code" value="'.$id.'">
				   <input type="text" name="date" size="8" value="'.date('Y-m-d').'"  autofocus="autofocus"/></td>';
				   echo' <td><button class="button" ><span>Ok </span></button></td>';
				   echo' <td><div id="poll1"></div></td>';
				   
				   echo'</tr>';
   
				   
				        
						   
						
										  
	             }		 
    ?>


</body>
</html>
