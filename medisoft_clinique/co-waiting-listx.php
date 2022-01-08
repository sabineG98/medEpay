<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="" />
<title></title>
<style>
.button1 {
  border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#069;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 0 7px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
}
.button1 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.button1 span:after {
  content: 'Ok';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.button1:hover span {
  /* padding-right: 25px; */
}
.button1:hover span:after {
  opacity: 1;
  right: 0;
}
input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
tr:hover{ border:2px solid #BDF;}
</style>
<script src="js/jquery.js"></script>
<script>

/*$("Document").ready(function () {	
			
			refreshOnline();   
	
	function refreshOnline() {	
	setInterval(function(){
	var x = 2+3;
	 $.ajax({		 		
                url: "listrecord.php",
                type: "GET",
                data: "id="+x,
                success: function (data) {
                    $("#form_output").html(data);
					console.log(data);
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            }); // AJAX Get Jquery statment   
	},2500);
}
	
}); //Begin of Jquery Statement // JavaScript Document*/
</script>

</head>
<body id="">
<div style="border: 1px solid #069; width:auto; height:320px; overflow:auto; border-radius:10px;">
<center><button class="button" id="buttton">  
<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
include('link.php');
?>
<?php
$service=$_GET['service'];
$date1=date('Y-m-d');
$products = "SELECT COUNT(DISTINCT client_id) AS tot FROM orders WHERE orders.date='$date1' AND orders.type NOT IN ('med','laboratoire') AND orders.done=0 AND orders.service='$service' ";
        $retval = mysqli_query($link,$products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
			while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {					 
			    echo $row['tot'];
				 }
?>
 Patient(s) are waiting</button></center><br />
<center><!--<table style="font-size:13px; border-collapse: collapse;"  width="400" border="1" cellspacing="0" cellpadding="0">-->
<table width="100%" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
<tr bgcolor="#CCCCCC">
<th colspan="4" style="font-size:20px;"><center>Waiting List</center></th>
</tr>
<tr bgcolor="skyblue">
 <th><center>No</center></th>
  <th>Names</th>
  <th><center>Client Code</center></th>
  <th><center>Select</center></th>
  </tr>
  <?php         
  $products1 = "SELECT DISTINCT client_id FROM orders WHERE date='$date1' AND done=0 ";
        $retval1 = mysqli_query($link,$products1);
        if(! $retval1 )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
			while($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                 {
					 $clien=$row1['client_id'];
				 }        
  $i=0;
  $clients="SELECT DISTINCT beneficiary,orders.client_id,service FROM clients,orders WHERE clients.client_id=orders.client_id AND orders.type NOT IN ('med','laboratoire') AND orders.done=0 AND orders.date='$date1' AND orders.service='$service'"; 
  $qry_run=mysqli_query($link,$clients);
  	if(!$qry_run)
		{
			die('Could not get data:'.mysqli_error($link));	
		}
		while($rows=mysqli_fetch_array($qry_run,MYSQLI_ASSOC))
			{
				$i++;
				$clie=$rows['client_id'];
				if($i%2==0)
				{
				echo '<tr bgcolor="#D9FFD9">';
				}
				else
				echo '<tr bgcolor="#FFF">';
				echo'<form action="consultation.php?service='.$service.'" method="post" target="_parent" name="form1"  >';
				echo '<td><center>'.$i.'</center></td>';
				echo '<td>'.ucfirst($rows['beneficiary']).'</td>';
				echo '<td><center>'.$clie.'</center></td>';
				 echo'<input type="hidden" name="code" value="'.$clie.'">
				   <input type="hidden" name="service" value="'.$service.'">
				   <input type="hidden" name="date" size="8" value="'.date('Y-m-d').'"  autofocus="autofocus"/>';
				echo' <td width="70"><center><button class="button1" onclick="run('.$service.','.$clie.','.date('Ymd').')"><span>Ok </span></button></center></td>';
				echo '</form>';
				echo '</tr>';
			}
  ?>
 </table></center>
</div>
<br />
<div style="border: 1px solid #069; width:auto; height:320px; overflow:auto; border-radius:10px;">
<center><button class="button"  >  
<?php
$date1=date('Y-m-d');
$prodcts = "SELECT COUNT(DISTINCT lab_results.client_id) AS tot FROM lab_results,orders,acts WHERE orders.type='laboratoire' AND orders.client_id=lab_results.client_id AND lab_results.date='$date1'  AND orders.done=3 AND orders.service='$service' AND lab_results.service=orders.service AND lab_results.done=0 AND lab_results.exam_id=acts.act_id AND orders.item=acts.act_id";
        $retal = mysqli_query($link,$prodcts);
        if(! $retal )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
			while($ro = mysqli_fetch_array($retal, MYSQLI_ASSOC))
                 {					 
			    echo $ro['tot'];
				 }
?>
 Patient(s) got lab results</button></center><br />
<center><!--<table style="font-size:13px; border-collapse: collapse;"  width="400" border="1" cellspacing="0" cellpadding="0">-->
<table width="100%" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
<tr bgcolor="#CCCCCC">
<th colspan="5" style="font-size:20px;"><center>Waiting List</center></th>
</tr>
<tr bgcolor="skyblue">
 <th><center>No</center></th>
  <th>Names</th>
  <th><center>Client Code</center></th>
  <th><center>Exams & Results</center></th>
  <th><center>Select</center></th>
  </tr>
  <?php       
  $prducts1 = "SELECT DISTINCT client_id FROM lab_results WHERE date='$date1'";
        $reval1 = mysqli_query($link,$prducts1);
        if(! $reval1 )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
			while($rw1 = mysqli_fetch_array($reval1, MYSQLI_ASSOC))
                 {
					 $clen=$rw1['client_id'];
				 }        
  $i=0;  
  $cients="SELECT DISTINCT beneficiary,lab_results.client_id,orders.type,orders.done FROM clients,lab_results,orders,acts WHERE  orders.type='laboratoire' AND clients.client_id=lab_results.client_id AND lab_results.date='$date1' AND orders.done=3 AND orders.service='$service' AND lab_results.service=orders.service AND lab_results.done=0 AND lab_results.exam_id=acts.act_id AND orders.item=acts.act_id"; 
  $qry_run=mysqli_query($link,$cients);
  	if(!$qry_run)
		{
			die('Could not get data:'.mysqli_error($link));	
		}
		while($rows=mysqli_fetch_array($qry_run,MYSQLI_ASSOC))
			{
				$i++;
				$lien=$rows['client_id'];
				$benef=$rows['beneficiary'];							
				if($i%2==0)
				{
				echo '<tr bgcolor="#D9FFD9">';
				}
				else
				echo '<tr bgcolor="#FFF">';
				echo'<form action="consultation.php?service='.$service.'" method="post" target="_parent" name="form1"  >';
				echo '<td><center>'.$i.'</center></td>';
				echo '<td>'.ucfirst($benef).'</td>';
				echo '<td><center>'.$lien.'</center></td>';
				echo '<td>';				
				$j=1;
				$com="SELECT * FROM acts,lab_results WHERE acts.act_id=lab_results.exam_id AND lab_results.client_id='$lien' AND lab_results.date='$date1'";
				 $com_run=mysqli_query($link,$com);
				  if(!$com_run)
					  {
						  die('Could not get data:'.mysqli_error($link));	
					  }
					  while($rws=mysqli_fetch_array($com_run,MYSQLI_ASSOC))
						  {
							  $act=$rws['act'];
							  $result=$rws['pos_neg_result'];
							  $comment=$rws['comment'];
				echo '&nbsp;'.$j++ .'- '. $act.'&nbsp;'.'(';				
							if($result=='3')
								{
								echo '<font color="#006600">Negatif</font>';	
								}
								elseif($result=='1')
								{
									echo '<font color="#FF0000">Positif</font>';	
								}
								elseif($result=='2')
								{
								echo '<font color="#0033FF">'.$comment.'</font>';		
								}
								else
								{
								echo '<font color="#FF00FF">'.$result.'</font>';		
								}
					echo')<br>';
						  }
					echo'</td>';
				 echo'<input type="hidden" name="code" value="'.$lien.'">
				   <input type="hidden" name="service" value="'.$service.'">';
				  // $datex=date('Y-m-d',strtotime());
				   $com="SELECT orders.date FROM orders,acts WHERE client_id='$lien' AND acts.act_id=orders.item ";
				 $com_run=mysqli_query($link,$com);
				  if(!$com_run)
					  {
						  die('Could not get data:'.mysqli_error($link));	
					  }
					  while($rws=mysqli_fetch_array($com_run,MYSQLI_ASSOC))
						  {
							  $date=$rws['date'];
				   
				  echo' <input type="hidden" name="date" size="8" value="'.$date.'"  autofocus="autofocus"/>';
						  }
				echo' <td width="70"><center><button class="button1" onclick="run('.$service.','.$lien.','.date('Ymd').')"><span>Ok </span></button></center></td>';
				echo '</form>';
				echo '</tr>';
			}
  ?>
 </table></center>
</div>
</body>
</html>