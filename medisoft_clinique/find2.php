<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style>
.button {
	border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#069;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 7px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
tr:hover{ border:5px solid #F00;}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
include('link.php');

?>

<div  style=" width:100% overflow:auto; box-shadow: 0px 0px 0px 0px #000; border: 0px solid #09F; position:absolute; background-color:#FFF; left: 4px; top: 35px;">
<div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:250px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: -27px;"><b>CLIENT FINDER</b></div>

<table width="0" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
 <form action="find2.php" method="post">
  <tr>
    <td><strong>CODE, INSURENCE CODE , NAME </strong></td>
    <td><input  type="text" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" name="client" size="30" /></td>
    <td>
    </td>
    <td><button class="button" ><span>Ok </span></button></td>
  </tr>
 </form>
</table>
<hr />
<?php


if(isset($_POST['client']))
{
	
	echo'<table width="0" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                            <tr bgcolor="#CCCCCC" >
                         <td>First Name</td>
						 <td>Last Name</td>
						
                          <td>Affilliation number </td>
                           
						   
						   
						   
						   ';
						   
$code=$_POST['client'];
$i=0;
$defper = "SELECT * FROM rssb WHERE aff_num='$code' ";
        $retvalper = mysqli_query($link, $defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				  // $id=$defrowper['client_id'];
				   
				    $i++;
					 
					 
					 if ($i%2==0)
					   echo'<tr bgcolor="#D9FFD9">';
					
					 else
					  echo'<tr>';
				   echo'<form action="details.php" method="post" target="_parent">';
				   echo'<td>'.$defrowper['fname'].'</td>';
				  echo'<td>'.$defrowper['lname'].'</td>';
				   echo'<td>'.$defrowper['aff_num'].'</td>';
				  
				   echo'<td><input type="hidden" name="code" value=""><input type="text" name="date" value="'.date('Y-m-d').'"></td>';
				   echo' <td><button class="button" ><span>Ok </span></button></td>';
				   echo'</form>';
				   echo'</tr>';
   
				   
				        
						   
						
										  
	             }
		 echo'</table>';
				
   }
				 
    ?>

















<br />
</div>

</body>
</html>