<?php
					   
$code2=$_POST['client2'];
echo'<table width="0" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                            <tr bgcolor="#CCCCCC" >
                         <td>BENEFICARY</td>
						 				
                          <td>NSURANCE CODE </td>
                           <td colspan="">CAT</td>
						   <td colspan="">CHEF DE F.</td>
						   <td colspan="">AGE</td>
						   <td colspan="">SEXE</td>
						   <td colspan="">SECTION</td>
						   <td colspan="">DISTRICT</td>
						   
						   </tr>
						   
						   ';
$i=0;
$defper = "SELECT * FROM cbhi WHERE code='$code2' OR nid='$code2' ";
        $retvalper = mysqli_query($link, $defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				    $id=$defrowper['musa_id'];
					$code=$defrowper['code'];
					$name=$defrowper['name'];
					$type=$defrowper['type'];
					$sex= $defrowper['sex'];
					$dob= $defrowper['dob'];
					$cat= $defrowper['cat'];
					$section= $defrowper['section'];
					$district= $defrowper['district'];
					
					 
					 
					  if ($type=='B')
					 
					    {
							$chef=$name;
							//$adherent="".$fname= $defrowper['fname']." ".$lname= $defrowper['lname']."";
						}
					 
									
						
					
				
        
					 $i++;
					 
					 
					 if ($i%2==0)
					   echo'<tr bgcolor="#D9FFD9">';
					
					 else
					  echo'<tr>';	   
				   echo'<td>'.$name.'</td>';
				   echo'<td>'.$code.'</td>';
				   echo'<td>'.$cat.'</td>';
				    if ($type=='B')
					 
					    {
				   echo'<td>Lui-meme</td>';
						}
					else
					 {
				   echo'<td>'.$chef.'</td>';
						}
					
				   echo'<td>'.$dob.'</td>';
				   echo'<td>'.$sex.'</td>';
				   echo'<td>'.$section.'</td>';	   
			       echo'<td>'.$district.'
				   <form action="details.php" method="post" target="_parent">
				   
				   
				   
				   
				   </td>';	   
					echo'<td><input type="text" name="date" size="8" value="'.date('Y-m-d').'"></td>
					<input type="hidden" name="district" value="'.$district.'">
					<input type="hidden" name="section" value="'.$section.'">
					<input type="hidden" name="insurance_code" value="'.$code.'">
					<input type="hidden" name="famille" value="'.$code.'">
					<input type="hidden" name="categorie" value="'.$cat.'">
					<input type="hidden" name="beneficiary" value="'.$name.'">
					<input type="hidden" name="age" value="'.$dob.'">
					<input type="hidden" name="sex" value="'.$sex.'">
					<input type="hidden" name="chef" value="'.$chef.'">
					<input type="hidden" name="insurance" value="MUSA" />
					
					
					';
				   echo' <td><button class="button" ><span>Ok </span></button> </form></td>';	   
						   
						   
						   
						   
						   
				 echo'</tr>';
   
				   
				        
						   
						
										  
	             }
		 echo'</table>';



?>