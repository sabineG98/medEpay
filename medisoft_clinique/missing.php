<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>


<?php include('link.php');



if(isset($_POST['merci']))
{

$id=$_POST['id']; 
$code=$_POST['merci']; 
mysqli_query ($link,"UPDATE facture SET MS_Code ='$code'  WHERE id =$id");
}


if(isset($_POST['csn']))
{
	
$csc=$_POST['csc']; 
$ds=$_POST['ds']; 
$csn=$_POST['csn'];
$secn=$_POST['secn'];



//$req=mysqli_query($link,"INSERT INTO healthc(title,short,full_story,category,slide,home,source,date)
//VALUES('$_POST[title]','$_POST[short]','$_POST[full]','$_POST[category]','$_POST[slide]','$_POST[home]','$_POST[source]','$date')");


mysqli_query ($link,"INSERT INTO healthc (hccode, distrcode, hcname, musasec) 
                               VALUES ('$csc', '$ds', '$csn', '$secn')");

}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

<title>MBS-All districts</title>
</head>

<body>

<div class="liguini"><br />

<br /><br /><br /><br /><br /><br />
<hr />

</div>

<div class="all_container">
<div class="img1"> </div>

<div class="content">





<center>
<h2>TOUS LES CODES MANQUANTS OU MAL ECRITS</h2>
<hr />
<table border="1" cellpadding="0" cellspacing="0">
<tr  bgcolor="#999999">
<th>No.</th>
<th>DISTRICT</th>
<th width="">CODE</th>
<th>MONTANT</th>
<td  bgcolor="#A6FFA6"> <b><font color="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AJOUTER UN CODE<hr />CENTRE DE SANTE&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;SECTION MUSA</font></b></td>
</tr>




<?php
/*
					 
					 
					 
					 
								 
					 
					 
	           
                  }
				  */
				  $i=0;
				  $total=0;
				  
				   $sql2 = "SELECT * FROM facture ORDER BY MS_Code  ASC";

                      $retval2 = mysqli_query($link, $sql2 );
                      if(! $retval2 )
                        {
                        die('Could not get data: ' . mysqli_error($link));
                       }    
         
         
                         while($row2 = mysqli_fetch_array($retval2, MYSQLI_ASSOC))
                             {
					 
					 
					               $hc=substr($row2['MS_Code'], 0, 6);
								  // echo $hc;
					 
					 
					                 
									 $j=0;
					 
			                       //$sql1 = "SELECT healthc.hccode,district.distrname FROM healthc INNER JOIN district WHERE   
								  // healthc.distrcode=district.distrcode ORDER BY healthc.hccode ASC";
								  
					$sql1 = "SELECT hccode FROM healthc WHERE hccode LIKE \"$hc%\" ORDER BY hccode ASC";

                                       $retval1 = mysqli_query($link, $sql1 );
                                          if(! $retval1 )
                                                {
                                                die('Could not get data: ' . mysqli_error($link));
                                                 }    
          
         
                                                while($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                                                     {		      
					 
					                                      if($hc==$row1['hccode'])
														     $j++;
															 //else
															 // $i++;
															/* else
															 echo $hc;
					                                         echo'<br>';*/
					                                      
			                                       	 }
					 
					 
					                                       if ($j==0)
														   {
														   $ds=substr($row2['MS_Code'], 0, 4);
														   $csc=substr($row2['MS_Code'], 0, 6);
															 //echo $row2['MS_Code'].'<br>' ;
					                                        // echo'<br>';					 
					                                          $i++;
															  $total+=$row2['Total_amount'];
					 
					                  $sql3 = "SELECT * FROM district WHERE distrcode LIKE \"$ds%\" ORDER BY distrcode ASC";

                                       $retval3 = mysqli_query($link, $sql3);
									   $row3 = mysqli_fetch_array($retval3, MYSQLI_ASSOC);
									  // while($row3 = mysqli_fetch_array($retval3, MYSQLI_ASSOC))
									       // {
					                    //echo $row3['distrname'].$row2['MS_Code'].'<br>' ;
										
										
										if ($i%2==0)
										  {
										
										
										
										echo'<form action="missing.php" method="post">
										<tr bgcolor="#CCCCCC">';
										echo '<td>'.$i.'</td>';
										if (empty($row3['distrname']))
										{
										echo '<td style="border-color:red"><font color="#FF0000">Incorrect</font></td>';
										echo '<td style="border-color:red" bgcolor="red">';
										echo'<input type="hidden" name="id" value="'.$row2['ID'].'">';
										echo '<input style="" type="text" name="merci" id="mscode"   value="'.$row2['MS_Code'].'">';
										echo'<input type="submit" id="update" value="">
										</form>
										
										</td>';
										  echo '<td bgcolor="">'.$row2['Total_amount'].'</td>';
										  
										  
										  echo'
										  
										  <td bgcolor="#A6FFA6">
<form action="missing.php" method="post">

<input type="hidden" name="csc" value="'.$csc.'" />
<input type="hidden" name="ds" value="'.$ds.'" />
<input type="tex" name="csn" title="Centre de santé" value="" />
<input type="tex" name="secn" title="Section Musa" value="" />
<input type="submit" id="add" value="" />
</form>
</td>
										  
										  
										  ';
										  
										  
										  
										  
										  
										   }
										else
										{
										echo '<td>'.$row3['distrname'].'</td>';
										echo '<td>
										<input type="hidden" name="id" value="'.$row2['ID'].'">
										<input type="text" name="merci" id="mscode"   value="'.$row2['MS_Code'].'">
										<input type="submit" id="update" value="">
										
										
										
										</form>
										
										</td>';
										echo '<td>'.$row2['Total_amount'].'</td>';
										
										
										
										echo'
										  
										  <td bgcolor="#A6FFA6">
<form action="missing.php" method="post">

<input type="hidden" name="csc" value="'.$csc.'" />
<input type="hidden" name="ds" value="'.$ds.'" />
<input type="tex" name="csn" title="Centre de santé" value="" />
<input type="tex" name="secn" title="Section Musa" value="" />
<input type="submit" id="add" value="" />
</form>
</td>
										  
										  
										  ';
										
										
										
										
										
										
										
										echo'</tr>';
										
										
										
										}
										
										  }
							else
							  
							   {
								   
							
										
										echo'<form action="missing.php" method="post">
										<tr>';
										echo '<td>'.$i.'</td>';
										if (empty($row3['distrname']))
										{
										echo '<td style="border-color:red"><font color="#FF0000">Incorrect</font></td>';
										echo '<td style="border-color:red" bgcolor="red">';
										echo'<input type="hidden" name="id" value="'.$row2['ID'].'">';
										echo '<input style="" type="text" name="merci" id="mscode"   value="'.$row2['MS_Code'].'">';
										echo'<input type="submit" id="update" value="">
										</form>
										
										</td>';
										  echo '<td>'.$row2['Total_amount'].'</td>';
										  
										  
										  echo'
										  
										  <td bgcolor="#A6FFA6">
<form action="missing.php" method="post">

<input type="hidden" name="csc" value="'.$csc.'" />
<input type="hidden" name="ds" value="'.$ds.'" />
<input type="tex" name="csn" title="Centre de santé" value="" />
<input type="tex" name="secn" title="Section Musa" value="" />
<input type="submit" id="add" value="" />
</form>
</td>
										  
										  
										  ';
										  
										  
										  
										  
										  
										   }
										   
										else
										{
										echo '<td>'.$row3['distrname'].'</td>';
										echo '<td>
										<input type="hidden" name="id" value="'.$row2['ID'].'">
										<input type="text" name="merci" id="mscode"   value="'.$row2['MS_Code'].'">
										<input type="submit" id="update" value="">
										
										
										
										</form>
										
										</td>';
										echo '<td>'.$row2['Total_amount'].'</td>';
										
										
										
										echo'
										  
										  <td bgcolor="#A6FFA6">
<form action="missing.php" method="post">

<input type="hidden" name="csc" value="'.$csc.'" />
<input type="hidden" name="ds" value="'.$ds.'" />
<input type="tex" name="csn" title="Centre de santé" value="" />
<input type="tex" name="secn" title="Section Musa" value="" />
<input type="submit" id="add" value="" />
</form>
</td>
										  
										  
										  ';
										
										
										
										
										
										
										
										echo'</tr>';		   
								   
								   
								   
							   }
										
										
										
										
										
					            //$hc=substr($row2['MS_Code'], 4, 2);
					             
	                              //echo'<br>';
											//}}
														   }
														   }
                            }




echo'<tr  bgcolor="#999999">';
echo '<th colspan="3">TOTAL</th>';
echo '<th>'.$total.'</th>'

?>

</table>

<hr />

</center>




</div>





</div>
<?php include"menu.php"; ?>

</div>


</body>
</html>