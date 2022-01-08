<?php
include('link.php');

//$initial = "TRUNCATE TABLE facture";
//$bgn = mysqli_query($link,$initial);



if(isset($_POST['Medec']))
{

$Record_date =  date('Y-m-d',strtotime($_POST['Record_date'])); 
$MS_code = $_POST['MS_code'];
$Benef_fname = $_POST['Benef_fname'];
$Service = $_POST['Service'];
$Consultation = $_POST['Consultation'];
$Laboratory = $_POST['Laboratory'];
$Imagery = $_POST['Imagery'];
$Hospit = $_POST['Hospit'];
$Medec = $_POST['Medec'];
$Medec_acts = $_POST['Medec_acts'];
$Materials = $_POST['Materials'];
$Total_amount = $_POST['Total_amount'];
	
	

mysqli_query ($link,"INSERT INTO facture 
                           (Record_date, MS_Code, Benef_fname, 
  Service, Consultation, Laboratory, Imagery, Hospit, Medec, Medec_acts, Materials,
   Total_amount) 
                           VALUES ('".$Record_date."','".$MS_code."', '".$Benef_fname."',
						    '".$Service."', '".$Consultation."', '".$Laboratory."', '".$Imagery."',
							 '".$Hospit."',  '".$Medec."', '".$Medec_acts."', '".$Materials."', '".$Total_amount."')");
							   
}








?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<title>MBS::.Data Entry</title>





<script type="text/javascript" language="javascript">

function autocalc(oText)
{
	if (isNaN(oText.value)) //filter input
	{
		alert('Numbers only!');
		oText.value = '';
	}
	var field, val, oForm = oText.form, Total_amount = a = 0;
	for (a; a < arguments.length; ++a) //loop through text elements
	{
		field = arguments[a];
		val = parseFloat(field.value); //get value
		if (!isNaN(val)) //number?
		{
			Total_amount += val; //accumulate
		}
	}
	oForm.Total_amount.value = Total_amount; //out
}
		
		
		
		function autolab(oText)
{
	if (isNaN(oText.value)) //filter input
	{
		alert('Numbers only!');
		oText.value = '';
	}
	var field, val, oForm = oText.form, Laboratory = a = 0;
	for (a; a < arguments.length; ++a) //loop through text elements
	{
		field = arguments[a];
		val = parseFloat(field.value); //get value
		if (!isNaN(val)) //number?
		{
			Laboratory += val; //accumulate
		}
	}
	oForm.Laboratory.value = Laboratory; //out
}

</script>







</head>

<body onLoad="document.forms[0].reset()">

<div class="all_container">
<div class="liguini"><br />

<br /><br /><br /><br /><br />
<hr />

</div>
<img src="img/facturation1.jpg" height="97" class="img1">

<div class="content">

<h3>&nbsp;</h3>
<div class="up_show">
<div style="position:absolute; left: 47px; top: 15px; width: 811px;">
<table  style="position:absolute; border: 1px thin #09F;  left: -47px; width: 982px; top: -6px;" border="1"  bordercolor="#ECF5FF" cellspacing="0" cellpadding="0">
 
 
 
 
 
  <tr  style="border: 6px outset #000; background-color:#CCC;" >
  
    <td  scope="col">No.</th>
    <td  scope="col">Date</th>
    <td  scope="col">Code Musa</th>
    <td  scope="col">Full Names</th>
    <td  scope="col">Serv</th>
    <td  scope="col">Cons</th>
    <td  scope="col">Labo</th>
    <td  scope="col">Imag</th>
    <td  scope="col">Hosp</th>
    <td  scope="col">Med.</th>
    <td  scope="col">Act.</th>
    <td  scope="col">Mate</th>
    <!--<td  scope="col">TM</th>-->
    <td  scope="col">Total</th>
    
  </tr>






  <?php
  
    $wow = "SELECT ID FROM facture WHERE MS_Code  ORDER BY ID DESC  LIMIT 1";

        $retval1 = mysqli_query($link, $wow );
        if(! $retval1 )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                 {
					$woow=$row1['ID']; 
				 }
  
  
  $range=$woow-15;
  
  
  
  
  
  
  $sql = "SELECT * FROM facture WHERE ID > $range ORDER BY ID ASC  LIMIT 15";

        $retval = mysqli_query($link, $sql );
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
	
							
			
echo"<tr id='text2'>
    <td>"  . $row['ID']."</td>
    <td>" . $row['Record_date']."</td>
	<td>" . $row['MS_Code']."</td>
	<td>" . $row['Benef_fname']."</td>
    <td>0</td>
    <td>" . $row['Consultation']."</td>
    <td>" . $row['Laboratory']."</td>
    <td>0</td>
    <td>" . $row['Hospit']."</td>
    <td>" . $row['Medec']."</td>
    <td>" . $row['Medec_acts']."</td>
    <td>" . $row['Materials']."</td>
    <td>" . $row['Total_amount']."</td>
  </tr>";
					   
                  }
  
  
  ?>






  <tr style="border: 6px inset #09F; ">
  
  <form action="entry.php" method="post" >
  
    <td scope="col"><?php echo $woow+1;  ?></th>
    <td scope="col"><input type="text" name="Record_date"      style="width:75px;" /></th>
    <td scope="col"><input type="text" name="MS_code"        style="width:156px;"/></th>
    <td scope="col"><input type="text" name="Benef_fname"      style="width:260px;"/></th>
    <td scope="col"><input type="text" name="Service"    onKeyUp="return autocalc(this, Consultation, Laboratory, Imagery,Hospit, Medec, Medec_acts, Materials)" tabindex="1"      style="width:35px;" /></th>
    <td scope="col"><input type="text" name="Consultation" onKeyUp="return autocalc(this, Service, Laboratory, Imagery,Hospit, Medec, Medec_acts, Materials)" tabindex="2"    style="width:35px;" /></th>
    <td scope="col"><div class="labo">
                   <input type="text" name="Laboratory" tabindex="-1"   onKeyUp="return autocalc(this,Service, Consultation, Imagery,Hospit, Medec, Medec_acts, Materials)" tabindex="3"   style="width:35px;" />
    > Automatic Calculation
    <br /><table>
           <tr>
              <td><input type="text" name="l1" size="1" onKeyUp="return autolab(this, l2, l3, l4, l5, l6)" tabindex="1" /></td>
              <td><input type="text" name="l2" size="1" onKeyUp="return autolab(this, l1, l2, l4, l5, l6)" tabindex="1" /></td>
              <td><input type="text" name="l3" size="1" onKeyUp="return autolab(this, l1, l2, l4, l5, l6)" tabindex="1" /></td>
              <td><input type="text" name="l4" size="1" onKeyUp="return autolab(this, l1, l2, l3, l5, l6)" tabindex="1" /></td>
              <td><input type="text" name="l5" size="1" onKeyUp="return autolab(this, l1, l2, l3, l4, l6)" tabindex="1" /></td>
              <td><input type="text" name="l6" size="1" onKeyUp="return autolab(this, l1, l2, l3, l4, l5)" tabindex="1" /></td>
            </tr>
         </table>
        </div>
     </th>
    <td scope="col"><input type="text" name="Imagery" onKeyUp="return autocalc(this,Service, Consultation, Laboratory,Hospit, Medec, Medec_acts, Materials)" tabindex="4"         style="width:35px;" /></th>
    <td scope="col"><input type="text" name="Hospit"  onKeyUp="return autocalc(this,Service, Consultation, Laboratory, Imagery, Medec, Medec_acts, Materials)" tabindex="5"         style="width:35px;" /></th>
    
    <td scope="col"><input type="text" name="Medec"   onKeyUp="return autocalc(this,Service, Consultation, Laboratory, Imagery, Hospit, Medec_acts, Materials)" tabindex="6"         style="width:35px;" /></th>
      
    
    
    
    
    <td scope="col"><input type="text" name="Medec_acts" onKeyUp="return autocalc(this,Service, Consultation, Laboratory, Imagery, Hospit, Medec, Materials)" tabindex="7"      style="width:35px;" /></th>
    <td scope="col"><input type="text" name="Materials"  onKeyUp="return autocalc(this,Service, Consultation, Laboratory, Imagery, Hospit, Medec, Medec_acts)" tabindex="8"      style="width:35px;" /></th>
    <!--<td scope="col"><input type="text" name="TM"               style="width:35px;" /></th>-->
    <td scope="col"><input type="text" name="Total_amount" readonly="readonly" value="0"  tabindex="-1"    style="width:35px; color:#F00;" /></th>
   
  </tr>
  <tr>
  <td><input type="submit" id="go" value="-" style="background-color:#FFF; background-image:url(img/add.JPG); color:#FFF;" /></td>
  </tr>
  </form>
  <script>
    document.getElementById('go').addEventListener('keypress', function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });
</script>

</table>

 
</div>




</div>
</div>


<div id="overv">
<img id="icon" src="img/warn.png" width="40" height="34" />
<h3 id="ov"><font color="#000">Data Entry</font></h3>
<p>&nbsp;</p>
</div>


<div id="footer"></div>

</div>


</body>
</html>