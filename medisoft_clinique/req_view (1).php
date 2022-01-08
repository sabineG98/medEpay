<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



<style>

.button {
	border:hidden;
  display: inline-block;
  border-radius: 4px;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 3px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
   background-image:url(img/open.png);
  background-repeat:no-repeat;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.button1 {
	
  border:hidden;
  display: inline-block;
  border-radius: 4px;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 3px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
  background-image:url(img/print-button.png);
  background-repeat:no-repeat;
}
.button1 span {
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
.test:hover{ background-color:#F4F4F4;}
input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
tr:hover{ border:1px solid #F00;}

</style>
</head>

<body>

<?php 
	include('link.php');
	
	?>
    
<em><strong>Requisitions existants </strong></em> 

  
  
  <table style="font-size:13px; border-collapse: collapse;" width="0" border="0" cellspacing="0" cellpadding="0">
  
  
  <tr bgcolor="">
    <td colspan="7"></td>
   
  </tr>
  <tr bgcolor="#CCCCCC">
    <td><b>No</b></td>
    <td><b>REQUEST CODE</b></td>
    <td><b>DATE</b></td>
    <td colspan=""><b>LOCATION</b></td>
     <td colspan="2"><b>USER</b></td>
     <td><b>Print</b></td>

  </tr>
  
  
  
      <?php 
	  $i=0;
	 $per = "SELECT req_number,comment, date, fullname  FROM req_code, internal, users WHERE req_code.facility_id=internal.Service_id AND req_code.user_id=users.id AND req_code.confirmed=1 ORDER BY req_code.time DESC LIMIT 500";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				
				
				//echo $rowper['req_number'];
				 $i++;
					 if ($i%2==0)
					   echo'<tr bgcolor="#D9FFD9">';
					
					 else
					  echo'<tr>';
					 
					 echo '<td width="35">'.$i.'</td>';
					 echo '<td width="200">'.$rowper['req_number'].'</td>';
					 echo '<td width="130" bgcolor="">'.$rowper['date'].'</td>';
					 echo '<td width="130" bgcolor="">'.$rowper['comment'].'</td>';
					 echo '<td width="130" bgcolor="">'.$rowper['fullname'].'</td>';
					 echo '<form action="req_view1.php" method="post">';
					 echo '<input type="hidden"  name="req_code" value="'.$rowper['req_number'].'">';
                     echo '<td width="50" bgcolor=""><button class="button" ><span>&nbsp;&nbsp;&nbsp;&nbsp;</span></button>';
					 echo '</form>';
					 echo'</td>';
					 echo '<td width="50" bgcolor="">
					 <form action="print_req.php" method="post" target="_top">';
					 echo '<input type="hidden"  name="req_code" value="'.$rowper['req_number'].'">';
					 echo '<button class="button1" ><span>&nbsp;&nbsp;&nbsp;&nbsp;</span></button>';
					  echo '</form>';
					  echo'</td>';
					 
					 
					echo'</tr>';
				
	             }
				
				 
				 
	
	?>
  
  
  
  </table>
  
  
  
  

</body>
</html>